<?php
class Dashboard_model extends CI_model{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_report($month){
    	$query ="SELECT CAST(create_date AS DATE) as date, count(*) as total  FROM invoice WHERE deleted =0 and MONTH(create_date) = ".$month." and  YEAR(create_date) = YEAR(CURDATE())  group by  CAST(create_date AS DATE)";
    	$query = $this->db->query($query); 
		return $query->result_array(); 	
    }
}
?>

