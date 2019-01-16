<?php
class Service_model extends CI_model{
    public function __construct()
    {
        $this->load->database();
    }
    public function add_service($service){
	   $this->db->insert('service', $service);
	}
}
?>