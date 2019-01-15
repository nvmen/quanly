<?php

class Customer extends CI_Controller {
		public function __construct(){
		        parent::__construct();
		  			$this->load->helper('url');
		  	 		$this->load->model('user_model');
		  	 		$this->load->model('customer_model');
		  	 		$this->load->library('pagination');
		        $this->load->library('session');

		}
		public function index()
		{		
			
 				
				  $this->load->view("layouts/main.php", [
		            'main_view' => 'customer/list',
		             'search_url'=> base_url().'customer',
		             
		            ]);

		}
		public function add()
		{
			if ($this->input->server('REQUEST_METHOD') == 'POST'){

				 $customer = array(
		    		  'fullname'=>$this->input->post('fullname'),
		    		  'address'=>$this->input->post('address'),
	   			      'phone'=>$this->input->post('phone'),
		     		  'email'=>$this->input->post('email'),
		              'created_at'=>date('Y-m-d H:i:s')
		        );  
				 $check = true;
				 if( $customer['fullname'] ==''){
				 	 $this->session->set_flashdata('error_msg', 'Họ tên không được để trống.');
				 	 $check = false;
				 }
				 if($check){
				 	try{
					$this->customer_model->add_customer($customer);				 
					$this->session->set_flashdata('success_msg', 'Thêm khách hàng thành công.'); 	
				 }catch(Exception $e){
				 	 $this->session->set_flashdata('error_msg', 'Thêm khách hàng thất bại.');
				 }
				 }
				 
				
			}

			$this->load->view("layouts/main.php", [
	        				   'main_view' => 'customer/add'

	            ]);

		}
}
?>