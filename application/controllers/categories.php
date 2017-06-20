<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categories extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('category','',TRUE);
	}

	public function index()
	{
		if($this->session->userdata('logged_in')){

		$config = array();
        $config["base_url"] = base_url() . "categories/index";
        $config["total_rows"] = $this->category->category_count();
        
        include APPPATH.'config/pagination.php';
        $this->pagination->initialize($config);
 
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["results"] = $this->category->
            get_category($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
 
				$this->load->view('category/view',$data);
			
			
		}else{
			redirect('login');
		}
		
	}

	public function create()
	{
		if($this->session->userdata('logged_in')){

		$this->form_validation->set_rules('category_name','Category','required|trim|xss_clean|callback_alpha_dash_space|callback_get_category_name');
			if($this->form_validation->run()==FALSE){
				$this->load->view('category/create');
			}else{
				$this->category->add();
				redirect('categories');
			}
			
		}else{
			redirect('login');
		}


	}

	public function edit($id)
	{
		if($this->session->userdata('logged_in')){

		$this->form_validation->set_rules('category_name','Category','required|trim|xss_clean|callback_alpha_dash_space');
			if($this->form_validation->run()==FALSE){
				
	   $data['records'] = $this->category->fetch_category($id);
	   $this->load->view('category/edit',$data);
		}else{
			$id=$this->input->post('did');
			$data=array('category_name'=>$this->input->post('category_name'),
						'status'=>$this->input->post('status'),
				);
			$this->category->edit($id,$data);
			redirect('categories');
		}
		}
	}

	function alpha_dash_space($str)
			{
			    return ( ! preg_match("/^([-a-z_ ])+$/i", $str)) ? FALSE : TRUE;
			} 

	function get_category_name($category_name)
	{
		$result = $this->category->check_category($category_name);
		if($result==TRUE)
			{ 
				$this->form_validation->set_message('get_category_name','That category is already in use');
				
				return FALSE;
			}else{
					return TRUE;
			}
	}
	function update_status()
	{
		$data =$this->input->post('cat_status');
					  

		for($i = 0; $i < sizeof($data); $i++){
			//print_r($data[$i]);
			$this->db->set('status',$this->input->post('status'));
			$this->db->where('id',$data[$i]);
			$this->db->update('category');

		}
		redirect('categories');
	}

}