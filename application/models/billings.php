<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Billings extends CI_Model {

	public function __construct()
	{

		parent::__construct();
		$this->load->database();

	}

	public function get_all($limit, $start)
	{
		$this->db->limit($limit, $start);
	   $this->db->where('status','Active');
	   $query = $this->db->get('product');
	   return $query->result_array();
	}

	function product_count()
	{
			   $this->db->where('status','Active');
			   $this->db->from('product');
		return $this->db->count_all_results();
	}
	public function insert_customer($data)
	{
		$this->db->insert('customer', $data);
		$id = $this->db->insert_id();
		return (isset($id)) ? $id : FALSE;
	}

	// Insert order date with customer id in "orders" table in database.
	public function insert_order($data)
	{
		$this->db->insert('order', $data);
		$id = $this->db->insert_id();
		return (isset($id)) ? $id : FALSE;
	}

	// Insert ordered product detail in "order_detail" table in database.
	public function final_order_detail($data)
	{
		$this->db->insert('order_details', $data);
	}


	public function details_count()
	{
		return $this->db->count_all('order');
	}

	public function get_details($limit, $start)
	{
		$this->db->limit($limit, $start);
	   $this ->db->select('*,customer.id as cusid,order.id as oid');
	   $this ->db->from('order');
	   $this->db->join('customer','customer.id=order.customer_id');
	   $this->db->order_by('order.date','desc');
	   $query = $this->db->get();
	   if ($query->num_rows() > 0) {
		foreach ($query->result() as $row) {
		$data[] = $row;
		}

		return $data;
		}
		return false;
	}

	public function fetch_customer_details($oid)
	{
		$this->db->select('*,order.id as oid');
		$this->db->from('order');
		$this->db->join('customer','customer.id=order.customer_id');
		$this->db->where('order.id',$oid);
		 $query = $this->db->get();

		if($query->num_rows()==1)
		{
			return $query->result();
		}else{
			return FALSE;
		}
	}

	public function fetch_order_details($oid)
	{
		$this->db->select('*,account.id as aid');
		$this->db->from('order_details');
		$this->db->join('order','order.id=order_details.order_id');
		$this->db->join('product','product.id=order_details.product_id');
		$this->db->join('account','account.id=order.account_id');
		$this->db->where('order_details.order_id',$oid);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
		foreach ($query->result() as $row) {
		$data[] = $row;
		}

		return $data;
		}
		return false;
	}

	public function get_sum($oid)
	{
		
		$this->db->select_sum('price')
				 ->where('order_id',$oid);
		$query = $this->db->get('order_details');

		return $query->result();
	}

	public function get_qty($oid)
	{
		
		$this->db->select_sum('qty')
				 ->where('order_id',$oid);
		$query = $this->db->get('order_details');

		return $query->result();
	}

	public function get_search($limit, $start,$search_term)
	{
	   $this->db->limit($limit, $start);
	   $this ->db->select('*,customer.id as cusid,order.id as oid');
	   $this ->db->from('order');
	   $this->db->join('customer','customer.id=order.customer_id','right');
	   $this->db->like('customer.customer_name',$search_term);
	   $this->db->order_by('order.date','desc');
	   $query = $this->db->get();
	   if ($query->num_rows() > 0) {
		foreach ($query->result() as $row) {
		$data[] = $row;
		}

		return $data;
		}
		return false;
	}

	public function search_count($search_term)
	{					
			
			  
			   $this->db->like('customer_name',$search_term); 
			   $this->db->from('customer');
		return $this->db->count_all_results();
	}
}