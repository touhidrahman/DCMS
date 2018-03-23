<?php
class Report_model extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
    }
    
    public function get_med_histories($id, $dt)
    {
        $sql = 'SELECT disease_name FROM diseases
            LEFT JOIN histories
            ON histories.disease_id=diseases.id
            WHERE histories.patient_id='.$id.' AND histories.dt="'.$dt.'" ORDER BY disease_name';
        $q = $this->db->query($sql);
        
        return $q->result();
    }
    
    public function get_patient_info($id)
    {
        $sql = 'SELECT * FROM patients
            WHERE id='.$id.' LIMIT 1';
        $q = $this->db->query($sql);
        
        return $q->row_array();
    }
    
    public function get_complaints($id, $dt)
    {
        $sql = 'SELECT * FROM patients
            WHERE id='.$id.' LIMIT 1';
        $q = $this->db->query($sql);
        
        return $q->row_array();
    }
}