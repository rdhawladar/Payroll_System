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

        public function payment(){                //oct 1
         if($this->session->userdata('logged_in'))
        {
            $data["results"] = $this->payrolls->get_employee();
       		//$this->load->view('payment',$data);

            $medval['results'] = $this->db->get('account')->result_array();
            $medval['rr'] = $this->db->get('percentage')->result_array();
            $this->load->view('payment', $medval);
            //$this->load->view('payment', $data);
              /*foreach($medval as $row12):
                  $med_per = $row12['percent'];
              endforeach;*/
            //exit();
/*            $this->db->where('item','medical');
            $medval = $this->db->get('percentage')->result_array();
              foreach($medval as $row12):
                  $med_per = $row12['percent'];
                  $med_item = $row12['item'];
              endforeach;*/
        }

		else{
			  redirect(base_url(''));
		}
    }

	public function search()
	{
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
            $data["results"] = $this->payrolls->get_emp_payscale($id);
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

    }
}