<?php
class Treatment_model extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
        $_table = 'treatment';
    }
    
    public function get_treat_names()
    {
        $sql = 'SELECT * FROM treatment ORDER BY for_children ASC, treat_name ASC';
        $result = $this->db->query($sql);
        return $result->result();
    }
    
    public function delete($id)
    {
        $sql = 'DELETE FROM treatment WHERE id = ' . $id;
        $result = $this->db->query($sql);
        return TRUE;
    }
    
    
    function SaveForm($form_data)
    {
        $this->db->insert('treatment', $form_data);
    
        if ($this->db->affected_rows() == '1')
        {
            return $this->db->insert_id();
        }
    
        return FALSE;
    }
    
    
}