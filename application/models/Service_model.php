<?php
class Service_model extends CI_model{
    public function __construct()
    {
        $this->load->database();
    }
    public function add_service($service){
	   $this->db->insert('service', $service);
	}
	public function get_services(){
		
  		
  		$this->db->select('*');
  		$this->db->from('service');
  		$this->db->where('deleted', 0);
  		$query= $this->db->get();
  		return $query->result_array(); 	
	}
	public function get_service($id){
		$this->db->select('*');
		$this->db->from('service');
		$this->db->where('id',$id);
		$query = $this->db->get();
		return $query->result_array(); 
	}

	public function delete_service($id){
		$this->db->where('id', $id);
		 $data = array(
		    		  'deleted'=>1		    		  
		        );  
		$status = $this->db->update('service', $data);
		return $status;
	}

	public function update_service($id,$data){
		$this->db->where('id', $id);
		$status = $this->db->update('service', $data);	
		
		if($status){
			return true;
		}else{
			return false;
		}
	}
}
?>