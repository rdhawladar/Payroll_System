<?php

	class MY_Controller extends CI_Controller
	{

		public $data = array();

		public function __Construct()
		{


			parent::__Construct();


		 $session_data = $this->session->userdata('logged_in');

         $data['eid'] = $session_data['eid'];
  		 $data['email'] = $session_data['email'];
  		 $data['status'] = $session_data['status'];
  		 $data['position'] = $session_data['position'];

         

		$this->load->view('layout/header',$data);
		$this->load->view("layout/footer");
		}



	}




?>