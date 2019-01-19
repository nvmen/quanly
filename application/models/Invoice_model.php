<?php
class Invoice_model extends CI_model{
    public function __construct()
    {
        $this->load->database();
    }
    function add_invoice($invoice){
	   $this->db->insert('invoice', $invoice);
	   $insert_id = $this->db->insert_id();

	   return  $insert_id;
	}
	function add_invoice_detail($detail){
	   $this->db->insert('invoice_details', $detail);
	 
	}
	function get_invoice($id){

		$this->db->select('*');
		
		$this->db->from('invoice');
		$this->db->where('id',$id);
		$query = $this->db->get();
		$result = $query->result_array();
		$data = null;
		if(count($result) > 0) {
					$data = $result[0];
	            }
		return $data; 
	}
	function get_invoice_details($id){
		$this->db->select('*');		
		$this->db->from('invoice_details');
		$this->db->where('invoice_id',$id);
		$query = $this->db->get();
		$result = $query->result_array();
		return $result;
	}
	public function delete_invoice($id){
		$this->db->where('id', $id);
		 $data = array(
		    		  'deleted'=>1		    		  
		        );  
		$status = $this->db->update('invoice', $data);
		return $status;
	}
	public function count_invoices($search_string = null){

		$search_string = addslashes($search_string) ;
		$sql ="select * from invoice where deleted =0 and (id like '%$search_string%' or fullname like '%$search_string%' or address like '%$search_string%' or phone like '%$search_string%' or email like '%$search_string%')";
		$query = $this->db->query($sql); 
		return $query->num_rows();   	

		
	}

	public function get_invoices($search_string = null, $limit_start, $limit_end){

       $search_string = addslashes($search_string) ;
		$sql ="select * from invoice where deleted =0 and (fullname like '%$search_string%' or address like '%$search_string%' or phone like '%$search_string%' or email like '%$search_string%') ORDER BY create_date DESC  
		     LIMIT $limit_end, $limit_start";
				
		$query = $this->db->query($sql); 
		return $query->result_array(); 	
	}
}
?>    