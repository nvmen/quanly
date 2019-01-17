<?php

class Service extends CI_Controller {
    public function __construct(){
		        parent::__construct();
		  			$this->load->helper('url');
		  	 		$this->load->model('user_model');
		  	 		$this->load->model('service_model');		  	 		
		            $this->load->library('session');

	}
	public function index() {
		 	$this->session->set_flashdata('active_left_menu', 'service');
 			$this->load->view("layouts/main.php", [
		            'main_view' => 'service/list',
		            'services' => $this->service_model->get_services()	            
		            ]);
	}

	public function update(){

			$this->session->set_flashdata('active_left_menu', 'service');

			if ($this->input->server('REQUEST_METHOD') == 'POST'){
				//echo "update customer";

				 $id = $this->input->post('id');
				  $data = array(
		    		 'name'=> $_POST['name'],
		    		 'price'=>str_replace(",","",$_POST['price']),
	   			     'type'=>$_POST['type'],		             
		        ); 
				// var_dump($data);exit(0); 
			   if(!empty($data['name'])){
			 		$status = $this->service_model->update_service($id,$data);	
					if($status){
							$this->session->unset_userdata('error_msg'); 
							$this->session->set_flashdata('success_msg', 'Cập nhật dịch vụ thành công.'); 
					}else{
						 $this->session->unset_userdata('success_msg');
						 $this->session->set_flashdata('error_msg', 'Tên dịch vụ không được để trống.');
					}
			 }else{
			 	 $this->session->unset_userdata('success_msg');
			 	 $this->session->set_flashdata('error_msg', 'Tên dịch vụ không được để trống.');
			 }

			}
			$id = $this->uri->segment(3);			
			$list = $this->service_model->get_service($id);
			$info = null;
			if(count($list) > 0) {
				$info = $list[0];
            }
			$this->load->view("layouts/main.php", [
	        				   'main_view' => 'service/edit',
	        				   'info'=> $info

	            ]);	
	} 


	public function delete(){
		$this->session->set_flashdata('active_left_menu', 'service');
		$url_redirect = 'service/index';
			if ($this->input->server('REQUEST_METHOD') == 'POST'){
				//echo "update customer";
				 $id = $this->input->post('id');
				 $url = $this->input->post('current_url');
				 $url_redirect = $url;
				$this->service_model-> delete_service($id);
			}else{

			}
			redirect($url_redirect);
	}
	public function add() {
			$this->session->set_flashdata('active_left_menu', 'service');
			if ($this->input->server('REQUEST_METHOD') == 'POST'){


				
				 $service = array(
		    		  'name'=> $_POST['name'],
		    		  'price'=>str_replace(",","",$_POST['price']),
	   			      'type'=>$_POST['type'],
		     		  'status'=>1
		             
		        );  
				//var_dump($service);  exit(0);
				 $check = true;
				 if( $service['name'] ==''){
				 	$this->session->unset_userdata(['success_msg']);	
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