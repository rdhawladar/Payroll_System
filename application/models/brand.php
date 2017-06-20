<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Brand extends CI_Model {

	public function __construct()
	{

		parent::__construct();
		$this->load->database();

	}

	function add()
	{
		$data =array('brand_name'=>$this->input->post('brand_name'),
					 'status'=>$this->input->post('status'));
		$this->db->insert('brand',$data);

	}

	function brand_count()
	{
		return $this->db->count_all('brand');
	}

	function get_brands($limit, $start)
	{
		$this->db->limit($limit, $start);
	   $this ->db->select('*');
	   $this ->db->from('brand');
	   $query = $this->db->get();
	   if ($query->num_rows() > 0) {
		foreach ($query->result() as $row) {
		$data[] = $row;
		}

		return $data;
		}
		return false;
	}

	function fetch_brand($id)
	{
		$this ->db->select('*');
	   $this ->db->from('brand');
	   $this->db->where('id',$id);
	   $query = $this->db->get();

		if($query->num_rows()==1)
		{
			return $query->result();
		}else{
			return FALSE;
		}
	}
	function edit($id,$data)
	{
		$this->db->where('id',$id);
		$this->db->update('brand',$data);

	}

	function load_brand()
	{
		
		$query = $this->db->get('brand');
	   if ($query->num_rows() > 0) {
		foreach ($query->result() as $row) {
		$data[] = $row;
		}

		return $data;
		}
		return false;
	}

	function check_brand($brand_name)
	{
		$this->db->select('*');
		$this->db->from('brand');
		$this->db->where('brand_name',$brand_name);

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