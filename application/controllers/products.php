<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('product','brand','category'),'',TRUE);
	}

	public function index()
	{
		if($this->session->userdata('logged_in')){
		$config = array();
        $config["base_url"] = base_url() . "products/index";
        $config["total_rows"] = $this->product->product_count();

        include APPPATH.'config/pagination.php';
        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["results"] = $this->product->
            get_products($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
			$this->load->view('products/view',$data);
		}else{
			redirect(base_url(''));
		}
	}

	public function create()
	{
		if($this->session->userdata('logged_in')){

		$this->form_validation->set_rules('product_name','Product Name','required|trim|xss_clean|callback_alpha_dash_space');
		$this->form_validation->set_rules('stock','Stock','trim|xss_clean|numeric');
		$this->form_validation->set_rules('price','price','required|trim|xss_clean|decimal');
		
			if($this->form_validation->run()==FALSE){

				$data['brand'] = $this->brand->load_brand();
				$data['category']=$this->category->load_category();
				$this->load->view('products/create',$data);
			}else{
				$this->product->add();
				redirect('products');
			}
			
		}else{
			redirect('login');
		}


	}

	public function edit($id)
	{
		if($this->session->userdata('logged_in')){

		$this->form_validation->set_rules('stock','Stock','trim|xss_clean|numeric');
		$this->form_validation->set_rules('price','price','required|trim|xss_clean|decimal');
		if($this->form_validation->run()==FALSE){
			$data['brand'] = $this->brand->load_brand();
			$data['category']=$this->category->load_category();
			$data['records'] = $this->product->fetch_product($id);
		  
		   $this->load->view('products/edit',$data);
		}else{

			$id=$this->input->post('did');
			$cstock = $this->input->post('cstock');
			$nstock = $this->input->post('stock');
			$stock =$cstock+$nstock;
			$data=array(
					 'category_id'=>$this->input->post('category'),
					 'brand_id'=>$this->input->post('brand'),
					 'Quantity'=>$stock,
					 'price'=>$this->input->post('price'),
					 'status'=>$this->input->post('status')
					 );
			$this->product->edit($id,$data);
			redirect('products');
		}
		}
	}

	function alpha_dash_space($str)
			{
			    return ( ! preg_match("/^([-a-z0-9_ ])+$/i", $str)) ? FALSE : TRUE;
			}

	function update_status()
	{
		$data =$this->input->post('pro_status');
		for($i = 0; $i < sizeof($data); $i++){
			//print_r($data[$i]);
			$this->db->set('status',$this->input->post('status'));
			$this->db->where('id',$data[$i]);
			$this->db->update('product');
		}
		redirect('products');
	}

}