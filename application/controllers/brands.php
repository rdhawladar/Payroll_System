<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Brands extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('brand','',TRUE);
	}

	public function index()
	{
		if($this->session->userdata('logged_in')){

		$config = array();
        $config["base_url"] = base_url() . 'brands/index';
        $config["total_rows"] = $this->brand->brand_count();
        
        include APPPATH.'config/pagination.php';
        $this->pagination->initialize($config);
 
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["results"] = $this->brand->
            get_brands($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
 
				$this->load->view('brand/view',$data);
			
			
		}else{
			redirect(base_url(''));
		}
		
	}

	public function create()
	{
		if($this->session->userdata('logged_in')){

		$this->form_validation->set_rules('brand_name','Brand Name','required|trim|xss_clean|callback_alpha_dash_space|callback_get_brand_name');
			if($this->form_validation->run()==FALSE){
				$this->load->view('brand/create');
			}else{
				$this->brand->add();
				redirect('brands');
			}
			
		}else{
			redirect('login');
		}


	}

	public function edit($id)
	{
		if($this->session->userdata('logged_in')){

		$this->form_validation->set_rules('brand_name','Brand Name','required|trim|xss_clean|callback_alpha_dash_space');
			if($this->form_validation->run()==FALSE){
				
	   $data['records'] = $this->brand->fetch_brand($id);
	   $this->load->view('brand/edit',$data);
		}else{
			$id=$this->input->post('did');
			$data=array('brand_name'=>$this->input->post('brand_name'),
						'status'=>$this->input->post('status'),
				);
			$this->brand->edit($id,$data);
			redirect('brands');
		}
		}
	}

	function alpha_dash_space($str)
			{
			    return ( ! preg_match("/^([-a-z_ ])+$/i", $str)) ? FALSE : TRUE;
			} 

	function get_brand_name($brand_name)
	{
		$result = $this->brand->check_brand($brand_name);
		if($result==TRUE)
			{ 
				$this->form_validation->set_message('get_brand_name','That category is already in use');
				
				return FALSE;
			}else{
					return TRUE;
			}
	}

	function updated_status()
	{
		$data =$this->input->post('brand_check');
					  

		for($i = 0; $i < sizeof($data); $i++){
			//print_r($data[$i]);
			$this->db->set('status',$this->input->post('status'));
			$this->db->where('id',$data[$i]);
			$this->db->update('brand');

		}
		redirect('brands');
	}
}