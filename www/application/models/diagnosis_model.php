<?php
class Diagnosis_model extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
        $_table = 'diagnosis';
    }
    
    public function get_diag_names()
    {
        $sql = 'SELECT * FROM diagnosis ORDER BY for_children ASC, diag_name ASC';
        $result = $this->db->query($sql);
        return $result->result();
    }
    
    public function delete($id)
    {
        $sql = 'DELETE FROM diagnosis WHERE id = ' . $id;
        $result = $this->db->query($sql);
        return TRUE;
    }
    
    
    function SaveForm($form_data)
    {
        $this->db->insert('diagnosis', $form_data);
    
        if ($this->db->affected_rows() == '1')
        {
            return $this->db->insert_id();
        }
    
        return FALSE;
    }
    
    
}