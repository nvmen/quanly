<?php

class Dashboard extends CI_Controller {
		public function __construct(){
		        parent::__construct();
		  			$this->load->helper('url');
		  	 		$this->load->model('user_model');
		  	 		$this->load->model('customer_model');
		  	 		$this->load->model('dashboard_model');
		            $this->load->library('session');
		             if(!$this->session->userdata('is_logged_in')){
         			    	redirect('user/index');
     			   }

		}
		public function index()
		{
			$month = date('m');		
			$this->session->set_flashdata('active_left_menu', 'dashboard');
			$list_report = $this->dashboard_model->get_report($month);			
			  $this->load->view("layouts/main.php", [
		            'main_view' => 'Dashboard/index',
		            'reports'=>$list_report,
		            'month'	=>$month	           
		       ]);

		}

}
?>