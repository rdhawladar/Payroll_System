<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payrolls extends CI_Model {

	public function __construct(){
		parent::__construct();
		$this->load->database();
	}
    public function get_search($limit, $start,$search_term){
	   $this->db->limit($limit, $start);
	   $this ->db->select('*');
	   $this ->db->from('account');
	   $this->db->where('id',$search_term );
	   $query = $this->db->get();
	   if ($query->num_rows() > 0) {
		    foreach ($query->result() as $row) {
		        $data[] = $row;
		    }
		    return $data;
		}
		return false;
	}

	public function search_count($search_term){
			   $this->db->from('account');
			   $this->db->like('L_name',$search_term);
			   $this->db->or_like('F_name',$search_term);
	   		return $this->db->count_all_results();
	}

	public function save($pay_record){
		$this->db->insert('payroll',$pay_record);
	}
	public function pay_history($id){
		$this->db->select('*');
		$this->db->from('account');
        $this->db->join('payroll','payroll.account_id=account.id','inner');
        $this->db->join('pay_scale_14','pay_scale_14.grade=account.grade','inner');
		$this->db->where('account_id',$id);
		$this->db->order_by('date');
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
		    foreach ($query->result() as $row) {
		        $data[] = $row;
		    }
		    return $data;
		}
		return false;
	}
	public function salary_sheet()
	{
        $month = $this->input->post('month');
        $year = $this->input->post('year');

		$this->db->select('*');
		$this->db->from('account');
        $this->db->join('payroll','payroll.account_id=account.id','inner');
        $this->db->join('pay_scale_14','pay_scale_14.grade=account.grade','inner');
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
		    foreach ($query->result() as $row) {
		        $data[] = $row;
		    }
		    return $data;
		}
		return false;
	}

    function get_emp_payment($id)
	{
	   $this ->db->select('*,pay_scale_14.grade as gid');
	   $this ->db->from('pay_scale_14');
	   $this->db->join('account','account.grade=pay_scale_14.grade','inner');
       $this->db->where('account.id',$id);
	   $query = $this->db->get();
	   if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
		}
		return false;
	}

    function get_employee()
	{
        $this ->db->select('*,pay_scale_14.grade as gid');
        $this ->db->from('pay_scale_14');
        $this->db->join('account','account.grade=pay_scale_14.grade','inner');
	    $query = $this->db->get();
	    if ($query->num_rows() > 0) {
		    foreach ($query->result() as $row) {
		        $data[] = $row;
		    }
            return $data;
		}
		return false;
	}
    function get_employee_with_leave()
	{
        $month = $this->input->post('month');
        $year = $this->input->post('year');
        $this ->db->select('*,pay_scale_14.grade as gid');
        $this ->db->from('pay_scale_14');
        $this->db->join('account','account.grade=pay_scale_14.grade','inner');
        $this->db->join('ded_day','account.id=ded_day.account_id','inner');
        $this->db->where('ded_day.month',$month);
        $this->db->where('ded_day.year',$year);

	    $query = $this->db->get();
	    if ($query->num_rows() > 0) {
		    foreach ($query->result() as $row) {
		        $data[] = $row;
		    }
            return $data;
		}
		return false;
	}

}