<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Model {

	public function __construct()
	{

		parent::__construct();
		$this->load->database();

	}

	function add()
	{
		$data =array('category_name'=>$this->input->post('category_name'),
					 'status'=>$this->input->post('status'));
		$this->db->insert('category',$data);

	}

	function category_count()
	{
		return $this->db->count_all('category');
	}

	function get_category($limit, $start)
	{
	   $this->db->limit($limit, $start);
	   $this->db->select('*');
	   $this->db->from('category');
	   $query = $this->db->get();
	   if ($query->num_rows() > 0) {
		foreach ($query->result() as $row) {
		$data[] = $row;
		}

		return $data;
		}
		return false;
	}

	function load_category()
	{

		$query = $this->db->get('category');
	   if ($query->num_rows() > 0) {
		foreach ($query->result() as $row) {
		$data[] = $row;
		}

		return $data;
		}
		return false;
	}

	function fetch_category($id)
	{
		$this ->db->select('*');
	   $this ->db->from('category');
	   $this->db->where('id',$id);
	   $query = $this->db->get();

		if($query->num_rows()==1)
		{
			return $query->result();
		}else{
			return FALSE;
		}
	}

	function check_category($category_name)
	{
		$this->db->select('*');
		$this->db->from('category');
		$this->db->where('category_name',$category_name);

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
}