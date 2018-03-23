<?php

class AddPatient extends MY_Controller {
               
	function __construct()
	{
 		parent::__construct();
		$this->load->library('form_validation');
		$this->load->database();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('patient_model');
	}	
	function index()
	{			
		$this->form_validation->set_rules('name', 'Name', 'trim|xss_clean|max_length[128]');			
		$this->form_validation->set_rules('age', 'Age', 'trim|xss_clean|is_numeric|max_length[2]');			
		$this->form_validation->set_rules('sex', 'Sex', 'trim|xss_clean');			
		$this->form_validation->set_rules('phone', 'Phone', 'trim|xss_clean|is_numeric|max_length[20]');			
		$this->form_validation->set_rules('address', 'Address', 'xss_clean');			
		$this->form_validation->set_rules('email', 'Email', 'trim|xss_clean|valid_email|max_length[50]');			
		$this->form_validation->set_rules('contact_person_info', 'Contact Person Info', 'trim|xss_clean');
			
		$this->form_validation->set_error_delimiters('<br /><span class="label label-danger">', '</span>');
	
		if ($this->form_validation->run() == FALSE) // validation hasn't been passed
		{
			$this->load->view('add_patient_view');
		}
		else // passed validation proceed to post success logic
		{
		 	// build array for the model
			
			$form_data = array(
					       	'name' => set_value('name'),
					       	'age' => set_value('age'),
					       	'sex' => set_value('sex'),
					       	'phone' => set_value('phone'),
					       	'address' => set_value('address'),
					       	'email' => set_value('email'),
					       	'contact_person_info' => set_value('contact_person_info'),
			                'entry_dt' => date('Y-m-d'),
						);
					
			// run insert model to write data to db
		
			if ($insert_id = $this->patient_model->SaveForm($form_data)) // the information has therefore been successfully saved in the db
			{
			    $this->session->set_flashdata('patient_id', $insert_id);
			    $this->session->set_flashdata('notification', "New patient data saved. <strong>Patient ID: ". $insert_id."</strong>");

			    redirect('complain');
			}
			else
			{
			     $data['error'] = "An error occurred. Please try again later.";
	           $this->load->view('add_patient_view', $data);
			     // Or whatever error handling is necessary
			}
		}
	}
	
    public function del($id)
    {
        $id = $this->uri->segment(3);
        $this->load->model('patient_model');
        $this->patient_model->delete($id);
        /* delete all entries from other tables too having same id */
    }

}
?>