<?php
class Customer_model extends CI_model{
    public function __construct()
    {
        $this->load->database();
    }

    public function add_customer($customer){
	   $this->db->insert('customer', $customer);
	}

	public function count_customers($search_string = null){



		$search_string = addslashes($search_string) ;
		$sql ="select * from customer where deleted =0 and (fullname like '%$search_string%' or address like '%$search_string%' or phone like '%$search_string%' or email like '%$search_string%')";
		$query = $this->db->query($sql); 
		return $query->num_rows();   
		

		
	}
	public function delete_customer($id){
		$this->db->where('id', $id);
		 $data = array(
		    		  'deleted'=>1		    		  
		        );  
		$status = $this->db->update('customer', $data);
		return $status;
	}
	public function update_customer($id,$data){
		$this->db->where('id', $id);
		$status = $this->db->update('customer', $data);
		
		
		if($status){
			return true;
		}else{
			return false;
		}
	}
	public function get_customer_id($id){

		$this->db->select('customer.id');
		$this->db->select('customer.fullname');
		$this->db->select('customer.address');
		$this->db->select('customer.phone');
		$this->db->select('customer.email');
		$this->db->select('customer.created_at');
		$this->db->from('customer');
		$this->db->where('id',$id);
		$query = $this->db->get();
		return $query->result_array(); 

	}
	public function get_customers($search_string = null, $limit_start, $limit_end){

       $search_string = addslashes($search_string) ;
		$sql ="select * from customer where deleted =0 and (fullname like '%$search_string%' or address like '%$search_string%' or phone like '%$search_string%' or email like '%$search_string%') 
		     LIMIT $limit_end, $limit_start";
				
		$query = $this->db->query($sql); 
		return $query->result_array(); 	
	}
}
?>