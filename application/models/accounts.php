<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Accounts extends CI_Model {

	public function __construct()
	{

		parent::__construct();
		$this->load->database();

	}


	public function get_user($email, $password)
	{

		$this->db->select('*,account.id as eid,position.id as postid');
		$this->db->from('account');
		$this->db->join('position','position.id=account.position_id');
		$this->db->where('email',$email);
		$this->db->where('password',md5($password));
		$this->db->where('status','Active');
	   $this ->db-> limit(1);
	 
	   $query = $this ->db-> get();
	 
	   if($query -> num_rows() == 1)
	   { 
	     return $query->result();
	   }
	   else
	   {
	     return false;
	   }

	}

	public function get_email($email)
	{
		$this->db->select('*');
		$this->db->from('account');
		$this->db->where('email',$email);
		 $this ->db-> limit(1);
	 
	   $query = $this ->db-> get();
	 
	   if($query -> num_rows() == 1)
	   {
	     return $query->result();
	   }
	   else
	   {
	     return false;
	   }
	}

	public function registered()
	{
			$DOB = $this->input->post('year').'-'.$this->input->post('month').'-'.$this->input->post('day');
			$reg =date('Y-m-d');
			$data = array('F_name' => $this->input->post('fname'),
						  'M_name' => $this->input->post('mname'),
						  'L_name' => $this->input->post('lname'),
						  'gender' => $this->input->post('gender'),
						  'DOB' => $DOB,
						  'MS' => $this->input->post('MS'),
						  'email' => $this->input->post('email'),
						  'password' => md5('temppass'),
						  'Contacts' => $this->input->post('contact'),
						  'grade' => $this->input->post('grade'),
						  'status' => 'In-active',
						  'position_id' => 3,
						  'date_applied' => $reg
									);

		$this->db->insert('account',$data);
	}


	function update_employee($empid,$data)
	{
		$this->db->where('id',$empid);
		$this->db->update('account',$data);
		
		return $empid;
	}

	function fetch_position()
	{
 		$query = $this->db->get('position');
	   if ($query->num_rows() > 0) {
		foreach ($query->result() as $row) {
		$data[] = $row;
		}

		return $data;
		}
		return false;



	}

	function get_employees($limit,$start)
	{
	   $this->db->limit($limit, $start);
	   $this ->db->select('*,account.id as empid');
	   $this ->db->from('account');
	   $this->db->join('position','position.id=account.position_id','left');
	   $this->db->order_by('position_id');
	   $query = $this->db->get();
	   if ($query->num_rows() > 0) {
		foreach ($query->result() as $row) {
		$data[] = $row;
		}

		return $data;
		}
		return false;
	}

	function employee_count()
	{
		return $this->db->count_all('account');
	}

	function fetch_employee($id)
	{
	   $this ->db->select('*,account.id as empid,position.id as posid');
	   $this ->db->from('account');
	   $this->db->join('position','position.id=account.position_id','left');
	   $this->db->where('account.id',$id);
	   $query = $this->db->get();

		if($query->num_rows()==1)
		{
			return $query->result();
		}else{
			return FALSE;
		}
	}

	function profile($id)
	{
	   $this ->db->select('*,account.id as empid,position.id as posid');
	   $this ->db->from('account');
	   $this->db->join('position','position.id=account.position_id','left');
	   $this->db->where('account.id',$id);
	   $query = $this->db->get();

		if($query->num_rows()==1)
		{
			return $query->result();
		}else{
			return FALSE;
		}
	}

	public function find($data)
	{
		
		$this->db->where('id',$data);
		$query = $this->db->get('account');
		if($query->num_rows()==1)
		{
			return $query->result();
		}else{
			return FALSE;
		}

	}
}

