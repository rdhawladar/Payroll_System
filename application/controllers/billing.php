<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Billing extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('product','brand','category','billings'),'',TRUE);
	}


	public function index()
	{
		if($this->session->userdata('logged_in'))
		{	
				$config = array();
		        $config["base_url"] = base_url() . 'billing/index';
		        $config["total_rows"] = $this->billings->product_count();
		        
		        include APPPATH.'config/pagination.php';
		        $this->pagination->initialize($config);
		 
		        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
				$data['products'] = $this->billings->get_all($config["per_page"], $page);
				$data["links"] = $this->pagination->create_links();
		 
					
				$this->load->view('order/order',$data);
		}else{
			redirect(base_url());
		}
	}

	function add()
	{
	// Set array for send data.
	if($this->session->userdata('logged_in')){
		$insert_data = array(
		'id' => $this->input->post('id'),
		'name' => $this->input->post('name'),
		'price' => $this->input->post('price'),
		'qty' => 1
		);
	
		// This function add items into cart.
		$this->cart->insert($insert_data);
	
		// This will show insert data in cart.
		redirect('billing');
	}
	}
	function update_cart()
	{
		if($this->session->userdata('logged_in'))
		{	
				$cart_info = $_POST['cart'] ;
				foreach( $cart_info as $id => $cart)
				{
				$rowid = $cart['rowid'];
				$price = $cart['price'];
				$amount = $price * $cart['qty'];
				$qty = $cart['qty'];
		
				$data = array(
				'rowid' => $rowid,
				'price' => $price,
				'amount' => $amount,
				'qty' => $qty
				);
		
				$this->cart->update($data);
				}
				redirect('billing');
		}else{
			redirect(base_url(''));
		}		
	}
		
	function remove($rowid) 
	{
					// Check rowid value.
					if ($rowid==="all"){
					// Destroy data which store in session.
					$this->cart->destroy();
					}else{
					// Destroy selected rowid in session.
					$data = array(
					'rowid' => $rowid,
					'qty' => 0
					);
					// Update cart data, after cancel.
					$this->cart->update($data);
					}
		
					// This will show cancel data in cart.
					redirect('billing');


	}

	

				
		public function reciept()
		{
			if($this->session->userdata('logged_in'))
			{	
								$this->load->view('order/billing');
			}else{
				redirect(base_url(''));
			}		
		}

		public function save_order()
			{
				if($this->session->userdata('logged_in'))
				{
			// This will store all values which inserted from user.
					$customer = array(
					'customer_name' => $this->input->post('name'),
					'customer_address' => $this->input->post('address'),
					'customer_contact' => $this->input->post('contact')
					);
					// And store user information in database.
					$cust_id = $this->billings->insert_customer($customer);

					$order = array(
					'date' => date('Y-m-d'),
					'customer_id' => $cust_id,
					'account_id'=>$this->input->post('did'),
					'payment'=>$this->input->post('payment')
					);

					$ord_id = $this->billings->insert_order($order);

					if ($cart = $this->cart->contents()):
					foreach ($cart as $item):
						$order_detail = array(
						'order_id' => $ord_id,
						'product_id' => $item['id'],
						'qty' => $item['qty'],
						'price' => $item['price']
						);

					// Insert product imformation with order detail, store in cart also store in database.

					$cust_id = $this->billings->final_order_detail($order_detail);
					endforeach;
					endif;

					if ($cart = $this->cart->contents()):
					foreach ($cart as $item):
					$this->db->set('Quantity','Quantity -'.$item['qty'],FALSE);
					$this->db->where('id',$item['id']);
					$this->db->update('product');

					endforeach;
					endif;
					$this->session->set_flashdata('message','Transaction is Finished');
					redirect('account');
				}else{
				redirect(base_url(''));
			}	
			}

	public function view()
	{
		if($this->session->userdata('logged_in')){

		$config = array();
        $config["base_url"] = base_url() . 'billing/view';
        $config["total_rows"] = $this->billings->details_count();
        
        include APPPATH.'config/pagination.php';
        $this->pagination->initialize($config);
 
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["results"] = $this->billings->
            get_details($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
 
				$this->load->view('order/view',$data);
			
		}else{
			redirect(base_url(''));
		}
	
	}
	public function view_id($oid)
		{
			if($this->session->userdata('logged_in')){

			$data['qty'] = $this->billings->get_qty($oid);
			$data['sum'] = $this->billings->get_sum($oid);
			$data['results'] = $this->billings->fetch_order_details($oid);
			$data['customer'] = $this->billings->fetch_customer_details($oid);
			$this->load->view('order/order_details',$data);

			}else{
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
		        $config['first_url'] = base_url() . 'billing/search?keyword=' . $delimiters['keyword'];
		        $config["base_url"] = base_url() . 'billing/search';
       			$config['suffix']      = '?keyword=' . $delimiters['keyword'];
				$config["total_rows"] = $this->billings->search_count($delimiters['keyword']);
				        

				include APPPATH.'config/pagination.php';
		       
		        $this->pagination->initialize($config);
		 
		        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
				$data['products'] = $this->billings->get_search($config["per_page"], $page,$delimiters['keyword']);
				$data["links"] = $this->pagination->create_links();
		 
					
				
		}else{
			$data['products'] = array();
			$data['links'] = NULL;
			
		}

		$this->load->view('order/search',$data);

		}else{
				redirect(base_url(''));
			}	
	}

	
}