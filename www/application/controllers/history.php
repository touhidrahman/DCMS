<?php

class History extends MY_Controller {
               
	function __construct()
	{
 		parent::__construct();
		$this->load->library('form_validation');
		$this->load->database();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('history_model');
	}	
	function index()
	{			
		$this->form_validation->set_rules('patient_id', 'Patient ID', 'required|trim|xss_clean|is_numeric|max_length[11]');			
			
		$this->form_validation->set_error_delimiters('<br /><span class="label label-danger">', '</span>');
	
		if ($this->form_validation->run() == FALSE) // validation hasn't been passed
		{
		    // load diseases using disease_model
		    /* $this->load->model('disease_model');
		    $data['disease'] = $this->disease_model->get_all();
		     */
		    $this->db->select();
		    $this->db->order_by('disease_name');
		    $data['disease'] = $this->db->get('diseases');
			$this->load->view('addHistory_view', $data);
		}
		else // passed validation proceed to post success logic
		{
		 	// build array for the model
		 	$ck_array = array();
		 	$counter = 0;
		 	foreach ($this->input->post('disease') as $d)
		 	{
		 	    $form_data = array(
		 	            'dt' => date('Y-m-d'),
		 	            'patient_id' => set_value('patient_id'),
		 	            'disease_id' => $d,
		 	    );
		 	    
		 	    if ($this->history_model->SaveForm($form_data) == TRUE)
		 	    {
		 	        $ck_array[$counter] = TRUE;
		 	    } else {
		 	        $ck_array[$counter] = FALSE;
		 	    }
		 	    $counter+=1;
		 	}
			
					
			if (!in_array(FALSE, $ck_array)) 
			{
				$this->session->set_flashdata('notification', "Patient History saved!");
			    redirect('view/patient/'.$this->input->post('patient_id'));
			}
			else
			{
			     $data['error'] = "An error occurred. Please try again later.";
	           $this->load->view('add_patient_view', $data);
			     // Or whatever error handling is necessary
			// Or whatever error handling is necessary
			}
		}
	}

}
?>