<?php

class Complain_model extends MY_Model {

	function __construct()
	{
		parent::__construct();
		$_table = "complains";
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
		$this->db->insert('complains', $form_data);
		
		if ($this->db->affected_rows() == '1')
		{
			return $this->db->insert_id();
		}
		
		return FALSE;
	}
	/*
	public function view_by_id($id)
	{
	    $sql = 'SELECT p.id AS patient_id, p.name, p.age, p.sex,
	            p.phone, p.address, p.email, p.contact_person_info,
	            p.entry_dt, h.id, h.history, h.dt, d.disease_name
	            FROM histories h
	            LEFT JOIN patients p
	            ON p.id=h.patient_id
                LEFT JOIN diseases d ON d.id=h.disease_id
                WHERE h.patient_id ='.$id.'
	            ORDER BY h.dt';
	    
	    $q = $this->db->query($sql);
	    return $q->result_array();
	}
	*/
}
?>