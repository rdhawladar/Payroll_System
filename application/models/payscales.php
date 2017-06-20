<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payscales extends CI_Model {

	public function __construct()
	{

		parent::__construct();
		$this->load->database();

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

	public function get_user($email, $password)
	{
        $this->db->select('*,pay_scale_14.id as eid,position.id as postid');
		$this->db->from('pay_scale_14');
		$this->db->join('position','position.id=pay_scale_14.grade');
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
		$this->db->from('pay_scale_14');
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

	public function create_payscale($data)
	{
		$this->db->insert('pay_scale_14',$data);
	}

	function update_payscale($gid,$data)
	{
		$this->db->where('grade',$gid);
		$this->db->update('pay_scale_14',$data);
		return $gid;
	}

   	function update_percentage($per_item,$percent)
	{
	    $percent_update = array('percent' => $this->input->post('percent'));
        $this->db->where('item',$per_item);
		$this->db->update('percentage',$percent_update);
        $this->db->select('*');
        $column_data= $this->db->get('pay_scale_14')->result_object();
        echo $per_item."<br>";
        foreach($column_data as $data)
        {
            $basic = $data->basic;
            echo $ex_column = $data->$per_item;
            echo "___";
            echo $ex_net_pay = $data->net_pay;
            echo "___";
            $grade = $data->grade;
            $new_column = $basic*$percent/100;
            echo "___";
            if($new_column>=$ex_column)
                echo $net_pay=$ex_net_pay +$new_column-$ex_column;
            else echo $net_pay = $ex_net_pay - ($ex_column - $new_column);

            echo "___<br>";
            $result = array($per_item=>$new_column,'net_pay'=>$net_pay);
           $this->db->where('grade',$grade);
           $this->db->update('pay_scale_14',$result);
        }
	}

   	function get_percentage()
	{
        //$query = $this ->db-> get('percentage')->result_object();
        	   $query = $this->db->get('percentage');
		foreach ($query->result() as $row)
		    $data[] = $row;
        return $data;
       // return $query;
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
    function data_calculation($basic, $grade)
    {
        $this->db->where('item','medical');
                    $medval = $this->db->get('percentage')->result_array();
                    foreach($medval as $row12):
                    $med_per = $row12['percent'];
                    $med_item = $row12['item'];
                    endforeach;

        $this->db->where('item','conveyance');
                    $conval = $this->db->get('percentage')->result_array();
                    foreach($conval as $row12):
                    $con_per = $row12['percent'];
                    $con_item = $row12['item'];
                    endforeach;
        $this->db->where('item','cpf');
                    $conval = $this->db->get('percentage')->result_array();
                    foreach($conval as $row12):
                    $cpf_per = $row12['percent'];
                    $cpf_item = $row12['item'];
                    endforeach;
        $this->db->where('item','gia');
                    $conval = $this->db->get('percentage')->result_array();
                    foreach($conval as $row12):
                    $gia_per = $row12['percent'];
                    $gia_item = $row12['item'];
                    endforeach;
        $this->db->where('item','bf');
                    $conval = $this->db->get('percentage')->result_array();
                    foreach($conval as $row12):
                    $bf_per = $row12['percent'];
                    $bf_item = $row12['item'];
                    endforeach;

        $ded_cpf_tmss = 20;
        $ded_cpf_self = 20;
        $ded_gia_tmss = 20;
        $ded_gia_self = 20;
        $ded_bf_tmss = 20;
        $ded_bf_self = 20;
        // Caculating data based on basic
        //hr calculation
              if($grade==1)
                $hr=$basic*.95;
              else if($grade==2)
                $hr=$basic*.90;
              else if($grade==3)
                $hr=$basic*.85;
              else if($grade>=4 & $grade<=7)
                $hr=$basic*.80;
              else if($grade>=8 & $grade<=100)
                $hr=$basic*.50;
              else echo "Error fatching...";
         // hr calculations END
        $medical = $basic*$med_per/100;
        $conveyance = $basic *$con_per/100;
        $cpf = $basic *$cpf_per/100;
        $gia = $basic *$gia_per/100;
        $bf = $basic *$bf_per/100;
        $gross_total = $basic + $hr + $medical +$conveyance+$cpf+$gia+$bf;
        /*deduction*/
        $ded_cpf_tmss = $basic*.1;
        $ded_cpf_self = $basic *.05;
        $ded_cpf_total = $ded_cpf_tmss+ $ded_cpf_self;
        $ded_gia_tmss = $basic *.01;
        $ded_gia_self = $basic *.005;
        $ded_gia_total = $ded_gia_tmss+$ded_gia_self;

        $ded_bf_tmss = $basic *.01;
        $ded_bf_self = $basic *.005;
        $ded_bf_total = $ded_bf_tmss+$ded_bf_self;
        $ded_total = $ded_cpf_total+$ded_gia_total+$ded_bf_total;
        $net_pay = $gross_total-$ded_total;

      // Getting data of payscale in array and inserting
        $data = array('grade' => $grade,
						  'designation' => $this->input->post('designation'),
						  'pay_scale' => $this->input->post('pay_scale'),
						  'basic' => $basic,
						  'medical' => $medical,
						  'hr' => $hr,
                          'conveyance' => $conveyance,
                          'cpf' => $cpf,
                          'gia' => $gia,
                          'bf' => $bf,
                          'gross_total' => $gross_total,
                          'ded_cpf_tmss' => $ded_cpf_tmss,
                          'ded_cpf_self' => $ded_cpf_self,
                          'ded_cpf_total' => $ded_cpf_total,
                          'ded_gia_tmss' => $ded_gia_tmss,
                          'ded_gia_self' => $ded_gia_self,
                          'ded_gia_total' => $ded_gia_total,
                          'ded_bf_tmss' => $ded_bf_tmss,
                          'ded_bf_self' => $ded_bf_self,
                          'ded_bf_total' => $ded_bf_total,
                          'ded_total' => $ded_total,
                          'net_pay' => $net_pay
                          );
        return $data;
    }
	function get_payscales($limit,$start)
	{
	   $this->db->limit($limit, $start);
	   $this ->db->select('*,pay_scale_14.grade as gid');
	   $this ->db->from('pay_scale_14');
	   $this->db->join('position','position.id=pay_scale_14.grade','left');
	   $this->db->order_by('grade');
	   $query = $this->db->get();
	   if ($query->num_rows() > 0) {
		foreach ($query->result() as $row) {
		$data[] = $row;
		}

		return $data;
		}
		return false;
	}
	function grade_count()
	{
		return $this->db->count_all('pay_scale_14');
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
    function fetch_payscale($grade)
	{
	   $this ->db->select('*,pay_scale_14.grade as gid');
	   $this ->db->from('pay_scale_14');
	   $this->db->where('pay_scale_14.grade',$grade);
	   $query = $this->db->get();

		if($query->num_rows()==1)
		{
			return $query->result();
		}else{
			return FALSE;
		}
	}
    function fetch_percentage($item)
	{
	   $this ->db->select('*,percentage.item as perid');
	   $this ->db->from('percentage');
	   $this->db->where('percentage.item',$item);
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
	   $this ->db->select('*,pay_scale_14.grade as empid,position.id as posid');
	   $this ->db->from('pay_scale_14');
	   $this->db->join('position','position.id=pay_scale_14.grade','left');
	   $this->db->where('pay_scale_14.id',$id);
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
		$query = $this->db->get('pay_scale_14');
		if($query->num_rows()==1)
		{
			return $query->result();
		}else{
			return FALSE;
		}
	}
}