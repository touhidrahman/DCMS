<?php
class Visit_model extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
        $_table = 'visits';
    }
    
    public function create_visit_id(){
        $patient_id = $this->input->post('patient_id');
        $visit_dt = date('Y-m-d');
        $data = array(
        	'patient_id' => $patient_id,
        	'visit_dt' => $visit_dt,
        );
        $this->db->insert('visits', $data);
        return $this->db->insert_id();
    }
    
}
?>