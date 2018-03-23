<?php

class AddDisease extends MY_Controller {
               
	function __construct()
	{
 		parent::__construct();
		$this->load->library('form_validation');
		$this->load->database();
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->model('disease_model');
	}	
	function index()
	{			
		$this->form_validation->set_rules('disease', 'Disease', 'trim|xss_clean|max_length[128]');			
		$this->form_validation->set_rules('description', 'Description', 'xss_clean');
			
		$this->form_validation->set_error_delimiters('<br /><span class="label label-danger">', '</span>');
	
		if ($this->form_validation->run() == FALSE) // validation hasn't been passed
		{
		    $data['result'] = $this->disease_model->get_all_diseases();
			$this->load->view('add_disease_view', $data);
		}
		else 
		{
		 	// build array for the model
			
			$form_data = array(
					       	'disease_name' => set_value('disease'),
					       	'description' => set_value('description')
						);
					
			// run insert model to write data to db
		
			if ($this->disease_model->SaveForm($form_data) == TRUE) // the information has therefore been successfully saved in the db
			{
			    $this->session->set_flashdata('notification', "New disease name and description saved.");
			    $data['result'] = $this->disease_model->get_all_diseases();
			    $this->load->view('add_disease_view', $data);
			}
			else
			{
			     $data['error'] = "An error occurred. Please try again later.";
	             $this->load->view('add_disease_view', $data);
			     // Or whatever error handling is necessary
			}
		}
	}
	
	public function delete($id)
	{
	    $id = $this->uri->segment(3);
	    $this->load->model('disease_model');
	    $this->disease_model->delete($id);
	    $this->disease_model->delete_others($id);
	    $this->index();
	    
	}
	
}
?>