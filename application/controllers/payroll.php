<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Payroll extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('accounts','payrolls'),'',TRUE);
    }

	public function index()
	{
		if($this->session->userdata('logged_in'))
		{
			$this->load->view('CP/payroll_home');
 		}else{
			redirect(base_url(''));
		}
	}
	public function leave_count($check){

		if($this->session->userdata('logged_in')){

            $data["results"] = $this->payrolls->get_employee();
            if($check==1) {
                $this->load->view('leave',$data);
            }
            if ($check==2){
                foreach ($data["results"] as $x) {

                    $days =  $this->input->post($x->id);
                    $month = $this->input->post('month');
                    $year = $this->input->post('year');
                    $submit = $this->input->post('submit');
                    $update = $this->input->post('update');

                    $this ->db->select('*');
                    $this ->db->from('ded_day');
                    $this->db->where('account_id',$x->id);
                    $this->db->where('month',$month);
                    $this->db->where('year',$year);
                    $query = $this->db->get();
                    if ($query->num_rows() > 0 && $submit) {
                        $this->load->view('leave_exist',$data);
                        return ;
                        }
                        else {
                            $joining_date = DateTime::createFromFormat('Y-m-d', $x->date_applied);
                            $month_range = cal_days_in_month(CAL_GREGORIAN, $month, $year);

                            if ($month == $joining_date->format('n') && $year == $joining_date->format('Y'))
                                $days = $days + $joining_date->format('d') - 1;

                            $ded_amount = $x->gross_total * $days / $month_range;
                            $insert = array('day' => $days, 'account_id' => $x->id, 'month' => $month, 'year' => $year, 'ded_amount' => $ded_amount);
                            if ($submit)
                                $this->db->insert('ded_day', $insert);
                            if ($update){
                                $this->db->where('account_id',$x->id);
                                $this->db->where('month',$month);
                                $this->db->where('year',$year);
                                $this->db->update('ded_day', $insert);
                            }


                        }
                }

                redirect(base_url('account'));
            }
        }
        else{
            redirect(base_url(''));
        }

    }

    public function payment(){

         if($this->session->userdata('logged_in')) {
            $data["results"] = $this->payrolls->get_employee_with_leave();
            $data['month'] = $this->input->post('month');
            $data['year'] = $this->input->post('year');
       		$this->load->view('payment',$data);
		}
		else{
			  redirect(base_url(''));
		}
    }

    function payment_confirm(){

       	if($this->session->userdata('logged_in')){
            $check_id = $this->input->post('check_id');

            for($i = 0; $i < sizeof($check_id); $i++){
                    $data = array('account_id'=> $check_id[$i],
                            'date'=> date("Y-m-d")
                    );
                    $this->db->insert('payroll',$data);
            }
            redirect(base_url('account'));
        }
        else{
		    redirect(base_url(''));
		}
    }

	public function search(){

		if($this->session->userdata('logged_in')){

		 $delimiters['keyword'] = $this->input->get('keyword');


		if($delimiters['keyword']!=null){
			$config = array();
		    $delimiters['keyword'] = $this->input->get('keyword');
		    $config['first_url'] = base_url() . 'payroll/search?keyword=' . $delimiters['keyword'];
		    $config["base_url"] = base_url() . 'payroll/search';
       		$config['suffix']      = '?keyword=' . $delimiters['keyword'];
			$config["total_rows"] = $this->payrolls->search_count($delimiters['keyword']);
            include APPPATH.'config/pagination.php';
            $this->pagination->initialize($config);
	        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
			$data['accounts'] = $this->payrolls->get_search($config["per_page"], $page,$delimiters['keyword']);
			$data["links"] = $this->pagination->create_links();
		}else{
			$data['accounts'] = array();
			$data['links'] = NULL;

		}

		$this->load->view('payroll/search',$data);

		}else{
				redirect(base_url(''));
			}
	}

	public function view($id)
	{

        if($this->session->userdata('logged_in'))
        {
            $data["results"] = $this->payrolls->get_emp_payment($id);
            $data["records"] = $this->accounts->profile($id);
    		$data["payrolls"] = $this->payrolls->pay_history($id);
    		$this->load->view('payroll/view',$data);
		}
		else{
			  redirect(base_url(''));
		}
	}

	function upload()
	{
		$config['upload_path']   = './assets/imports/';
		$config['allowed_types'] = 'xlsx|xls';
		$config['file_name']     = date('Y - M');
		$config['overwrite']     = FALSE;
		$config['max_size']      = 100;

		$this->load->library('upload', $config);
			if ($this->upload->do_upload())
		{

			      //here i used microsoft excel 2007
				  $this->load->library('excel');
			      $objReader = PHPExcel_IOFactory::createReader('Excel2007');

			      //set to read only

			      $objReader->setReadDataOnly(true);

			      //load excel file
			      $objPHPExcel = $objReader->load($this->upload->data()['full_path']);

			      $objWorksheet = $objPHPExcel->setActiveSheetIndex(0);

			      //loop from first data until last data
			      for($i=2; $i<=77; $i++){
			       $check_id = $this->accounts->find($objWorksheet->getCellByColumnAndRow(0,$i)->getValue());
			       if($check_id){
			              $id = $objWorksheet->getCellByColumnAndRow(0,$i)->getValue();
			              $date = $objWorksheet->getCellByColumnAndRow(1,$i)->getValue();
			              $dayswork = $objWorksheet->getCellByColumnAndRow(2,$i)->getValue();
			              $basic = $objWorksheet->getCellByColumnAndRow(3,$i)->getValue();
			              $hr = $objWorksheet->getCellByColumnAndRow(4,$i)->getValue();
			              $medical = $objWorksheet->getCellByColumnAndRow(5,$i)->getValue();
			              $conveyance = $objWorksheet->getCellByColumnAndRow(6,$i)->getValue();
			              $cpf = $objWorksheet->getCellByColumnAndRow(7,$i)->getValue();
			              $gia = $objWorksheet->getCellByColumnAndRow(11,$i)->getValue();
			              $bf = $objWorksheet->getCellByColumnAndRow(11,$i)->getValue();
			              $gross_total = $objWorksheet->getCellByColumnAndRow(28,$i)->getValue();
			              $ded_cpf_tmss = $objWorksheet->getCellByColumnAndRow(27,$i)->getValue();
			              $ded_cpf_self = $objWorksheet->getCellByColumnAndRow(27,$i)->getValue();
			              $ded_cpf_total = $objWorksheet->getCellByColumnAndRow(27,$i)->getValue();
			              $ded_gia_tmss = $objWorksheet->getCellByColumnAndRow(7,$i)->getValue();
			              $ded_gia_self = $objWorksheet->getCellByColumnAndRow(7,$i)->getValue();
			              $ded_gia_total = $objWorksheet->getCellByColumnAndRow(28,$i)->getValue();
			              $ded_bf_tmss = $objWorksheet->getCellByColumnAndRow(7,$i)->getValue();
			              $ded_bf_self = $objWorksheet->getCellByColumnAndRow(7,$i)->getValue();
			              $ded_bf_total = $objWorksheet->getCellByColumnAndRow(7,$i)->getValue();
			              $ded_total = $objWorksheet->getCellByColumnAndRow(21,$i)->getValue();
			              $net_pay = $objWorksheet->getCellByColumnAndRow(7,$i)->getValue();

			              $data_user = array(
			               "account_id" => $id,
			               "date" => $date,
			               "dayswork" => $dayswork,
			               "basic" => $basic,
			               "hr" => $hr,
			               "medical" => $medical,
			               "conveyance" => $conveyance,
			               "cpf" => $cpf,

			               );
			              $this->payrolls->save($data_user);

			          }
				}
					$this->session->set_flashdata('message','Payroll upload is done! you can view them by searching an employee');
					redirect(base_url('payroll'));

        	}

        }
    public function pay(){
        	$this->session->set_flashdata('message','Payroll upload is done! you can view them by searching an employee');      
                redirect(base_url('account'));
    }
}