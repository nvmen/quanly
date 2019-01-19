<?php

class Invoice extends CI_Controller {
		public function __construct(){
		        parent::__construct();
		  			$this->load->helper('url');
		  	 		$this->load->model('user_model');
		  	 		$this->load->model('customer_model');
		  	 		$this->load->library('pagination');
		            $this->load->library('session');
		            $this->load->model('service_model');
		            $this->load->model('invoice_model');	
		            
 				if(!$this->session->userdata('is_logged_in')){
         			    	redirect('user/index');
     			   }
		}

		public function index()
		{


        	$this->session->set_flashdata('active_left_menu', 'invoice');
			$search_text = "";			
		   if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		    
		      $search_text = $this->input->post('search_text');
		      $this->session->set_userdata(array("search_text"=>$search_text));
		    }else{

		      if($this->session->userdata('search_text') != NULL){
		        $search_text = $this->session->userdata('search_text');
		      }
		    }
	    
		    
			$config['base_url'] = base_url().'invoice/index';

			

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

        	$list_cust = $this->invoice_model->get_invoices( $search_text,$config['per_page'],$limit_end);
			$list_cust_count = $this->invoice_model->count_invoices( $search_text);
        	$config['total_rows'] = $list_cust_count;
        	$this->pagination->initialize($config);

        	//var_dump($list_cust_count);exit(0);
			 				
				  $this->load->view("layouts/main.php", [
		            'main_view' => 'invoice/list',
		             'search_url'=> base_url().'invoice',
		             'pagination' =>  $this->pagination,
		             'search_text' =>  $search_text,
		             'invoices'=> $list_cust
		            ]);

		
		}
		public function add()
		{

				$this->load->view("layouts/main.php", [
	        				   'main_view' => 'invoice/add',
	        				   'services' => $this->service_model->get_services()	

	            ]);
		}


		public function makeinvoice(){

		if ($this->input->server('REQUEST_METHOD') == 'POST'){
			$customer_info = $_POST['customer'];
			$services_list = $_POST['services'];
			$total = $_POST['total'];
			$invoice_info = array(
		    		  'fullname'=>$customer_info['fullname'],
		    		  'address'=>$customer_info['address'],
	   			      'phone'=>$customer_info['phone'],
		     		  'email'=>$customer_info['email'],
		              'create_date'=>date('Y-m-d H:i:s'),
		              'total'=>$total
		        );

		    $invoice_id = $this->invoice_model->add_invoice($invoice_info);      
		
		    foreach ($services_list as $service) {			 
			  	$invoice_detail = array(
		    		  'invoice_id'=>$invoice_id,
		    		  'service_id'=>$service['id'],
	   			      'price'=>$service['price'],
		     		  'qty'=>$service['qty'],
		              'total'=>$service['total'],
		              'service'=>$service['name']
		        );
		        $this->invoice_model->add_invoice_detail($invoice_detail);
			}

			      $url_redirect =  base_url().'invoice/view/'. $invoice_id;
					redirect($url_redirect);

		}
			

		//	var_dump($services_list);
		}
		public function delete()
		{
			$this->session->set_flashdata('active_left_menu', 'invoice');
			$url_redirect = 'invoice/index';
			if ($this->input->server('REQUEST_METHOD') == 'POST'){
				//echo "update customer";
				 $id = $this->input->post('id');
				 $url = $this->input->post('current_url');
				 $url_redirect = $url;
				$this->invoice_model-> delete_invoice($id);
			}else{

			}
			redirect($url_redirect);


		}
		public function view()
		{
			$invoice_id = $this->uri->segment(3);
			
			//$invoice_id =8;
			$invoice_info = $this->invoice_model->get_invoice($invoice_id);
			if($invoice_info ==null){
				  $url_redirect = 'invoice/index';
					redirect($url_redirect);
			}
			$invoice_details = $this->invoice_model->get_invoice_details($invoice_id);		
			$this->load->view("layouts/invoice.php", [
	        				   'main_view' => 'invoice/view',	
	        				   'invoice_info'=> $invoice_info,  
	        				   'invoice_details' =>$invoice_details    				  	

	            ]);
		}

}
?>		