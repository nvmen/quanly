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
        	$this->session->set_flashdata('active_left_menu', 'customer');
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


			

			$page = $this->uri->segment(3);
       	 	$limit_end = ($page * $config['per_page']) - $config['per_page'];
        	if ($limit_end < 0){
            	$limit_end = 0;
        	} 

        	$list_cust = $this->customer_model->get_customers( $search_text,$config['per_page'],$limit_end);
			$list_cust_count = $this->customer_model->count_customers( $search_text);
        	$config['total_rows'] = $list_cust_count;
        	$this->pagination->initialize($config);

        	//var_dump($list_cust_count);exit(0);
			 				
				  $this->load->view("layouts/main.php", [
		            'main_view' => 'customer/list',
		             'search_url'=> base_url().'customer',
		             'pagination' =>  $this->pagination,
		             'search_text' =>  $search_text,
		             'customers'=> $list_cust
		            ]);

		}

		public function update(){

			$this->session->set_flashdata('active_left_menu', 'customer');
			if ($this->input->server('REQUEST_METHOD') == 'POST'){
				//echo "update customer";

				 $id = $this->input->post('id');
				 $data = array(
		    		  'fullname'=>$this->input->post('fullname'),
		    		  'address'=>$this->input->post('address'),
	   			      'phone'=>$this->input->post('phone'),
		     		  'email'=>$this->input->post('email'),
		             
		        ); 
				 if(!empty($data['fullname'])){
				 		$status = $this->customer_model->update_customer($id,$data);	
						if($status){
								$this->session->unset_userdata('error_msg'); 
								$this->session->set_flashdata('success_msg', 'Cập nhật khách hàng thành công.'); 
						}else{
							 $this->session->unset_userdata('success_msg');
							 $this->session->set_flashdata('error_msg', 'Họ tên không được để trống.');
						}
				 }else{
				 	 $this->session->unset_userdata('success_msg');
				 	 $this->session->set_flashdata('error_msg', 'Họ tên không được để trống.');
				 }
		       // var_dump( $customer) ;exit(0);
				
			}

			$id = $this->uri->segment(3);			
			$customers = $this->customer_model->get_customer_id($id);
			$customer_info = null;
			if(count($customers) > 0) {
				$customer_info = $customers[0];
            }
			$this->load->view("layouts/main.php", [
	        				   'main_view' => 'customer/edit',
	        				   'customer'=> $customer_info

	            ]);

		}

		public function delete(){
			$this->session->set_flashdata('active_left_menu', 'customer');
			$url_redirect = 'customer/index';
			if ($this->input->server('REQUEST_METHOD') == 'POST'){
				//echo "update customer";
				 $id = $this->input->post('id');
				 $url = $this->input->post('current_url');
				 $url_redirect = $url;
				$this->customer_model-> delete_customer($id);
			}else{

			}
			redirect($url_redirect);


		}

		public function ajax(){

			$customers = array();
 			if ($_SERVER['REQUEST_METHOD'] === 'POST') {
 				$search =$_POST['search'];
 				$customers = $this->customer_model->ajax_search($search);
			}

			
			 header('Content-Type: application/json');
    		 echo json_encode( $customers );
		}
		public function ajaxcust(){

			$customer_info = null;
 			if ($_SERVER['REQUEST_METHOD'] === 'POST') {
 			$id =$_POST['id'];
 			$customers = $this->customer_model->get_customer_id($id);
			
				if(count($customers) > 0) {
					$customer_info = $customers[0];
	            }
			}

			
			 header('Content-Type: application/json');
    		 echo json_encode( $customer_info );
		}

		public function add()
		{
			$this->session->set_flashdata('active_left_menu', 'customer');
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