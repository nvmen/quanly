<?php

class Service extends CI_Controller {
    public function __construct(){
		        parent::__construct();
		  			$this->load->helper('url');
		  	 		$this->load->model('user_model');
		  	 		$this->load->model('service_model');		  	 		
		            $this->load->library('session');

	}
	public function add() {

			if ($this->input->server('REQUEST_METHOD') == 'POST'){


				
				 $service = array(
		    		  'name'=> $_POST['name'],
		    		  'price'=>$_POST['price'],
	   			      'type'=>$_POST['type'],
		     		  'status'=>1
		             
		        );  
				var_dump($_POST);  exit(0);
				 $check = true;
				 if( $service['name'] ==''){
				 	 $this->session->set_flashdata('error_msg', 'Tên dịch vụ không được để trống.');
				 	 $check = false;
				 }
				 if($check){
				 	try{
					$this->service_model->add_service($service);				 
					$this->session->set_flashdata('success_msg', 'Thêm dịch vụ thành công.'); 
					$this->session->unset_userdata(['error_msg']);	
				 }catch(Exception $e){
				 	 $this->session->set_flashdata('error_msg', 'Thêm dịch vụ thất bại.');
				 }
				 }
				 
				
			}

		$this->load->view("layouts/main.php", [
	        			   'main_view' => 'service/add'

	            ]);
	}


}
?>