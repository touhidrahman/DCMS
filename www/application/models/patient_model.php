<?php

class Patient_model extends MY_Model {

	function __construct()
	{
		parent::__construct();
		$_table = "patients";
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
		$this->db->insert('patients', $form_data);
		
		if ($this->db->affected_rows() == '1')
		{
			return $this->db->insert_id();
		}
		
		return FALSE;
	}

	public function get_result($term)
	{
	    $this->db->select('id, name');
	    $this->db->from('patients');
	    $this->db->like('id', $term);
	    $this->db->or_like('name', $term);
	    $this->db->order_by('name', 'asc');
	    $result = $this->db->get();
	    
	    return $result->result();
	}
	
	public function recent_patients()
	{
	    //incomplete 
	    $sql = 'SELECT DISTINCT id, name, entry_dt FROM (
                SELECT patients.id, patients.name, patients.entry_dt, diseases.disease_name, histories.dt
	           FROM histories
	           INNER JOIN patients
	           ON histories.patient_id=patients.id
	           LEFT JOIN diseases ON diseases.id=histories.disease_id
	           ORDER BY patients.id DESC)
	            LIMIT 50';
	    
	    $q = $this->db->query($sql);
	    return $q->result();
	}
	
	
}
?>