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

		$this->db->select('*');
		$this->db->from('customer');
		if($search_string){
			$this->db->or_like('fullname', $search_string);
			$this->db->or_like('address', $search_string);
			$this->db->or_like('phone', $search_string);
			$this->db->or_like('email', $search_string);
		}
 		$this->db->where('deleted',0);
		$query = $this->db->get();
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

		$this->db->select('customer.id');
		$this->db->select('customer.fullname');
		$this->db->select('customer.address');
		$this->db->select('customer.phone');
		$this->db->select('customer.email');
		$this->db->select('customer.created_at');
		$this->db->from('customer');
	    $this->db->where('deleted',0);
		if($search_string){			

			$this->db->or_like('fullname', $search_string);
			$this->db->or_like('address', $search_string);
			$this->db->or_like('phone', $search_string);
			$this->db->or_like('email', $search_string);
		}
		   
		$this->db->order_by('created_at','DESC');
		$this->db->limit($limit_start, $limit_end);
		$this->db->where('deleted',0);
		$query = $this->db->get();
		
		
		return $query->result_array(); 	
	}
}
?>