<?php

class Customer extends CI_Controller {
		public function __construct(){
		        parent::__construct();
		  			$this->load->helper('url');
		  	 		$this->load->model('user_model');
		        $this->load->library('session');

		}
		public function index()
		{
				  $this->load->view("layouts/main.php", [
		            'main_view' => 'customer/list',
		            ]);

		}
		public function add()
		{
				  $this->load->view("layouts/main.php", [
		            'main_view' => 'customer/add',
		            ]);

		}
}
?>