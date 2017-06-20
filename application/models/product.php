<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Model {

	public function __construct()
	{

		parent::__construct();
		$this->load->database();

	}

	function add()
	{
		$data =array('product_name'=>$this->input->post('product_name'),
					 'category_id'=>$this->input->post('category'),
					 'brand_id'=>$this->input->post('brand'),
					 'Quantity'=>$this->input->post('stock'),
					 'price'=>$this->input->post('price'),
					 'status'=>$this->input->post('status'));
		$this->db->insert('product',$data);

	}

	function product_count()
	{
		return $this->db->count_all('product');
	}

	function get_products($limit, $start)
	{
	   $this->db->limit($limit, $start);
	   $this->db->select('*,product.id as pid,product.status as pstats,category.id as cid');
	   $this->db->from('product');
	   $this->db->join('brand','brand.id=product.brand_id','left');
	   $this->db->join('category','category.id=product.category_id','left');
	   $this->db->order_by('product.id');
	   $query = $this->db->get();
	   if ($query->num_rows() > 0) {
		foreach ($query->result() as $row) {
		$data[] = $row;
		}

		return $data;
		}
		return false;
	}

	function edit($id,$data)
	{
		$this->db->where('id',$id);
		$this->db->update('product',$data);
	}

	function fetch_product($id)
	{
	   $this->db->select('*,product.id as pid,product.status as pstats,category.id as cid,brand.id as bid');
	   $this->db->from('product');
	   $this->db->join('brand','brand.id=product.brand_id','left');
	   $this->db->join('category','category.id=product.category_id','left');
	   $this->db->where('product.id',$id);
	   $query = $this->db->get();

		if($query->num_rows()==1)
		{
			return $query->result();
		}else{
			return FALSE;
		}
	}

}