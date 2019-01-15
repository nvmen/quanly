<?php
class Customer_model extends CI_model{
public function add_customer($customer){
	$this->db->insert('customer', $customer);
	}
}
?>