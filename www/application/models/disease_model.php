<?php

class Disease_model extends MY_Model {

	function __construct()
	{
		parent::__construct();
	}
	
	// --------------------------------------------------------------------

      /** 
       * function SaveForm()
       *
       * insert form data
       * @param $form_data - array
       * @return Bool - TRUE or FALSE
       */

	function SaveForm($form_data)
	{
		$this->db->insert('diseases', $form_data);
		
		if ($this->db->affected_rows() == '1')
		{
			return TRUE;
		}
		
		return FALSE;
	}
	
	function get_rows_starting_by($a)
	{
	    $sql = 'SELECT disease_name, id FROM diseases WHERE disease_name LIKE '.$a.'% ORDER BY disease_name ASC';
	    
	    $query = $this->db->query($sql);
	    return $query->result();
	}
	
	function get_all_diseases()
	{
	    $sql = 'SELECT * FROM diseases ORDER BY disease_name ASC';
	    
	    $query = $this->db->query($sql);
	    return $query->result();
	}
	
	function delete_others($id)
	{
	    $sql = "UPDATE histories SET disease_id=0 WHERE disease_id=".$id;
	    if ($this->db->query($sql))
	    {
	        return TRUE;
	    }
	    return FALSE;
	}
}
?>