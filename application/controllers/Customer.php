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

			//echo $this->input->post('submit'); exit(0);
         $page = $this->uri->segment(3);
       
			$search_text = "";			
		   if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		    
		      $search_text = $this->input->post('search_text');
		      $this->session->set_userdata(array("search_text"=>$search_text));
		    }else{

		      if($this->session->userdata('search_text') != NULL){
		        $search_text = $this->session->userdata('search_text');
		      }
		    }
	    
		    
			$config['base_url'] = base_url().'customer/index';

			$config['total_rows'] = 50;

			$config['per_page'] = 10;

			$config['num_links'] = 5;

			$config['use_page_numbers'] = TRUE;
			$config["uri_segment"] = 3;		

			$config['full_tag_open'] = "<ul class='pagination justify-content-center'>";
			$config['full_tag_close'] ="</ul>";
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
			$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
			$config['next_tag_open'] = "<li>";
			$config['next_tagl_close'] = "</li>";
			$config['prev_tag_open'] = "<li>";
			$config['prev_tagl_close'] = "</li>";
			$config['first_tag_open'] = "<li>";
			$config['first_tagl_close'] = "</li>";
			$config['last_tag_open'] = "<li>";
			$config['last_tagl_close'] = "</li>";

			$this->pagination->initialize($config);
			 				
				  $this->load->view("layouts/main.php", [
		            'main_view' => 'customer/list',
		             'search_url'=> base_url().'customer',
		             'pagination' =>  $this->pagination,
		             'search_text' =>  $search_text
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
					$this->session->unset_userdata(['error_msg']);	
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