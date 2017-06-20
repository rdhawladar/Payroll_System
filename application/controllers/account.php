<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('accounts','',TRUE);
}

	public function index()
	{
		if($this->session->userdata('logged_in'))
		{
			$this->load->view('home');
 		}else{
			redirect(base_url(''));
		}
	}

    public function orders()
    {
    	if($this->session->userdata('logged_in'))
    		{
    			$this->load->view('CP/order_home');
    		}else{
    			redirect(base_url(''));
    		}
    }

    public function inventory()
    {
    	if($this->session->userdata('logged_in'))
    		{
    			$this->load->view('CP/inventory');
    		}else{
    			redirect(base_url(''));
    		}
    }
	public function create()
	{
		if($this->session->userdata('logged_in'))
		{
		$this->form_validation->set_rules('fname','First Name','xss_clean|trim|alpha_numeric');
		$this->form_validation->set_rules('mname','Middle Name','xss_clean|trim|alpha_numeric');
		$this->form_validation->set_rules('lname','Last Name','xss_clean|trim|alpha_numeric');
		$this->form_validation->set_rules('email','Email','required|xss_clean|trim|callback_check_email');
		$this->form_validation->set_rules('contact','Contact No.','xss_clean|trim|max_length[21]|numeric');
		$this->form_validation->set_rules('grade','Contact No.','xss_clean|trim|max_length[21]|numeric');

			if($this->form_validation->run() == FALSE){
				$this->load->view('employee/create');
			}else{
			$this->accounts->registered();
			redirect('account/view_employees');
			}
		}else{

			redirect(base_url(''));
		}
	}

	function check_email($email)
	{
		$result = $this->accounts->get_email($email);
		if($result==TRUE)
			{
				$this->form_validation->set_message('check_email','Email is already in use');

				return FALSE;
			}else{
					return TRUE;
			}
	}


	public function edit($id)
	{
		if ($this->session->userdata('logged_in')) {
		$this->form_validation->set_rules('fname','First Name','xss_clean|trim|alpha_numeric');
		$this->form_validation->set_rules('mname','Middle Name','xss_clean|trim|alpha_numeric');
		$this->form_validation->set_rules('lname','Last Name','xss_clean|trim|alpha_numeric');
		$this->form_validation->set_rules('email','Email','required|xss_clean|trim');
		$this->form_validation->set_rules('contact','Contact No.','xss_clean|trim|max_length[21]|numeric');
		$this->form_validation->set_rules('grade','Grade.','xss_clean|trim|max_length[21]|numeric');

			if($this->form_validation->run() == FALSE){

			$data["position"] = $this->accounts->fetch_position();
	  		$data["records"]= $this->accounts->profile($id);
	  		$this->load->view('CP/my_profile',$data);

			}else{
				$empid=$this->input->post('did');

				$data = array('F_name' => $this->input->post('fname'),
						  'M_name' => $this->input->post('mname'),
						  'L_name' => $this->input->post('lname'),
						  'MS' => $this->input->post('MS'),
						  'email' => $this->input->post('email'),
						  'Contacts' => $this->input->post('contact'),
						  'grade' => $this->input->post('grade')
						  		);
				$this->accounts->update_employee($empid,$data);
				redirect('account/edit/'.$empid);

	  	}
		}else{
			redirect(base_url(''));
		}
	}

	public function edit_employee($id)
	{
		if ($this->session->userdata('logged_in')) {
			$data["position"] = $this->accounts->fetch_position();
	  		$data["records"]= $this->accounts->fetch_employee($id);
	  		$this->load->view('employee/edit',$data);
		}else{
			redirect(base_url(''));
		}
	}

	public function edit_process()
	{
			$empid=$this->input->post('did');
			$data = array(	  'MS' => $this->input->post('MS'),
                              'F_name' => $this->input->post('fname'),
						  'email' => $this->input->post('email'),
						  'Contacts' => $this->input->post('contact'),
						  'status' =>  $this->input->post('status'),
						  'position_id'=> $this->input->post('position'),
						  'grade' =>  $this->input->post('grade')
									);

			$this->accounts->update_employee($empid,$data);
			redirect('account/edit_employee/'.$empid);
	}

	public function view_employees()
	{
		 if($this->session->userdata('logged_in'))
        {

        $config = array();
        $config["base_url"] = base_url() . "account/view_employees";
        $config["total_rows"] = $this->accounts->employee_count();

        include APPPATH.'config/pagination.php';
        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["results"] = $this->accounts->
            get_employees($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();

        $this->load->view("employee/view", $data);

		}
		else{
			  redirect(base_url(''));
		}
	}
	function update_status()
	{
		if($this->session->userdata('logged_in'))
		{
				$data =$this->input->post('emp_status');


				for($i = 0; $i < sizeof($data); $i++){
					//print_r($data[$i]);
					$this->db->set('status',$this->input->post('status'));
					$this->db->where('id',$data[$i]);
					$this->db->update('account');

				}
				redirect('account/view_employees');
			}else{
				redirect(base_url(''));
			}
	}

	public function change_password()
	{
		if($this->session->userdata('logged_in'))
		{
		$id=$this->input->post('did');
		$data = array( 'password'=>md5($this->input->post('password')));
		$this->db->where('id',$id);
		$this->db->update('account',$data);
		redirect('account/edit/'.$id);

		}else{
				redirect(base_url(''));
			}
	}

    Public function generate_pdf(){
        echo "testing....";
        $this->load->library('Pdf');
        $this->load->view('home');

/*        $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->SetTitle('My Title');
        $pdf->SetHeaderMargin(30);
        $pdf->SetTopMargin(20);
        $pdf->setFooterMargin(20);
        $pdf->SetAutoPageBreak(true);
        $pdf->SetAuthor('Author');
        $pdf->SetDisplayMode('real', 'default');

        $pdf->Write(5, 'Some sample text');
        $pdf->Output('My-File-Name.pdf', 'I');*/
    }

    public function today()
    {                                   
        echo date('d')." ".date('F', strtotime('m'))."-".date('Y')."<br>";
    }
    
    
    
}