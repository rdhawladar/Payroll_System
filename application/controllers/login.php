<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{

		parent::__construct();
   $this->load->model('accounts','',TRUE);
	}

	public function index()
	{
		   $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean');
		   $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');

		   if($this->form_validation->run() == FALSE)
		   {
		     //Field validation failed.  User redirected to login page
            $this->load->view('modals/fpass_modal');

		   	$this->load->view('Login');

		   }
		   else{
		   	redirect('account');
		   }
	}

	function check_database($password)
{
   //Field validation succeeded.  Validate against database
   $email = $this->input->post('email');
 
   //query the database
   $result = $this->accounts->get_user($email, $password);

   if($result)
   {
       foreach($result as $row)
     {
      $sess_array = array('eid' => $row->eid,
                     	'email'=>$row->email,
                     	'status'=>$row->status,
                     	'position'=>$row->position);

        $this->session->set_userdata('logged_in', $sess_array);
                }
     return TRUE;
   }
   else
   {
    $this->form_validation->set_message('check_database', 'Invalid username or Password');
     return FALSE;
   }
}	


    function forgot_password()
    {
      $this->form_validation->set_rules('emailpass', 'emailpass', 'trim|required|xss_clean|callback_check_email');
     
       if($this->form_validation->run() == FALSE)
       {

        $this->load->view('modals/fpass_modal');

        $this->load->view('Login');
        

       }else{
      $password =random_string('alpha', 8);
      $data = array('password'=>md5($password));
      $this->db->where('email',$this->input->post('emailpass'));

      $this->db->update('account',$data);
      $this->session->set_flashdata('message','here is your new password: <mark>'.$password.'</mark><br> please login now and change the given password');
      redirect(base_url(''));
      }
    }
    function check_email($password)
{
   //Field validation succeeded.  Validate against database
   $email = $this->input->post('emailpass');
 
   //query the database
   $result = $this->accounts->get_email($email);
 
   if($result)
   {
      
     return TRUE;
   }
   else
   {
    $this->form_validation->set_message('check_email', 'That Email is not on the database');
     return FALSE;
   }
} 
}
