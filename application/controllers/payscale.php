<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Payscale extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('payscales','',TRUE);
}

	public function index()
	{

		if($this->session->userdata('logged_in'))
		{
			$this->load->view('CP/home');
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


    	public function create_grade()
	{
		if($this->session->userdata('logged_in'))
		{
		$this->form_validation->set_rules('grade','Grade','xss_clean|trim|max_length[10]|numeric');
		$this->form_validation->set_rules('designation','Designation','xss_clean|trim|alpha_numeric');
		$this->form_validation->set_rules('pay_scale','Pay Scale','xss_clean|trim|max_length[20]|numeric');
		$this->form_validation->set_rules('basic','Basic','required|xss_clean|trim|max_length[20]|numeric');
			if($this->form_validation->run() == FALSE){
            $this->load->view('payroll/payscale/create_grade');


        // $percentage= $this->payscales->get_percentage();
            $data['percentage']= $this->payscales->get_percentage();
                           //var_dump($data['percentage']);
                           //exit();
            foreach ($data['percentage'] as $data)
            {
                   echo $data->item;
                   echo $data->percent;
            }

			}else
            {
            $grade = $this->input->post('grade');
    	    $basic = $this->input->post('basic');

            $data = $this->payscales->data_calculation($basic, $grade);
            $this->payscales->create_payscale($data);

			redirect('payscale/view_payscale');
			}
		}else{

			redirect(base_url(''));
		}
	}


	function check_email($email)
	{
		$result = $this->payscales->get_email($email);
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

			if($this->form_validation->run() == FALSE){

			$data["position"] = $this->payscales->fetch_position();
	  		$data["records"]= $this->payscales->profile($id);
	  		$this->load->view('CP/my_profile',$data);

			}else{
				$empid=$this->input->post('did');

				$data = array('F_name' => $this->input->post('fname'),
						  'M_name' => $this->input->post('mname'),
						  'L_name' => $this->input->post('lname'),
						  'MS' => $this->input->post('MS'),
						  'email' => $this->input->post('email'),
						  'Contacts' => $this->input->post('contact'),
						  		);
				$this->payscales->update_employee($empid,$data);
				redirect('payroll/edit/'.$empid);
	  	}
		}else{
			redirect(base_url(''));
		}
	}

	public function edit_payscale($grade)
	{
		if ($this->session->userdata('logged_in')) {
	  		$data["payscale"]= $this->payscales->fetch_payscale($grade);
	  	   	$this->load->view('payroll/payscale/edit',$data);
		}else{
			redirect(base_url(''));
		}
	}

    public function edit_process()
	{
        $basic = $this->input->post('basic');
        $gid=$this->input->post('gid');

        $data = $this->payscales->data_calculation($basic,$gid);
        $this->payscales->update_payscale($gid,$data);
        redirect('payscale/edit_payscale/'.$gid);
	}

    public function del_payscale($grade)
    {
        if ($this->session->userdata('logged_in')) {
            $data["payscale"]= $this->payscales->fetch_payscale($grade);
            $this->db->where('grade', $grade);
            $this->db->delete('pay_scale_14');

            redirect(base_url('payscale/view_payscale'))  ;
        }else{
            redirect(base_url(''));
        }
    }

    public function edit_percentage($item)
    {
        if ($this->session->userdata('logged_in')) {
            $data["percentage"]= $this->payscales->fetch_percentage($item);
            $this->load->view('payroll/payscale/edit_percentage',$data);
        }else{
            redirect(base_url(''));
        }
    }

    public function edit_process_percentage()
	{
        $per_item = $this->input->post('per_item');
        $percent = $this->input->post('percent');
        $column_data = $this->payscales->update_percentage($per_item,$percent);
        redirect('payscale/edit_percentage/'.$per_item);
	}
	public function view_payscale()
	{
		 if($this->session->userdata('logged_in'))
        {
        $config = array();
        $config["base_url"] = base_url() . "payscale/view_payscale";
        $config["total_rows"] = $this->payscales->grade_count();  // counting grade from modal

        include APPPATH.'config/pagination.php';
        $this->pagination->initialize($config);
        //$config["per_page"]=null;
        //$page=null;
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["results"] = $this->payscales->get_payscales($config["per_page"], $page);   // get baic datas from tables:&nbsp;No need;
        $data["links"] = $this->pagination->create_links();
        $this->load->view("payroll/payscale/view", $data);
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
				redirect('payscale/view_payscale');
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
		redirect('payscale/edit/'.$id);

		}else{
				redirect(base_url(''));
			}
	}
}