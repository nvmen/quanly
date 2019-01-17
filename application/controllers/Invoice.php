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

		}

		public function index()
		{


			$this->session->set_flashdata('active_left_menu', 'invoice');
			$this->load->view("layouts/main.php", [
		            'main_view' => 'invoice/list',
		             'search_url'=> base_url().'invoice',
		             
		            ]);

		}
		public function add()
		{

				$this->load->view("layouts/main.php", [
	        				   'main_view' => 'invoice/add',
	        				   'services' => $this->service_model->get_services()	

	            ]);
		}

		public function delete()
		{

		}
}
?>		