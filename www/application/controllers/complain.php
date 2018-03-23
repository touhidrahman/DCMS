<?php
class Complain extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->model('complain_model');
    }
    
    public function index() {			
		$this->form_validation->set_rules('patient_id', 'Patient ID', 'required|trim|xss_clean|is_numeric|max_length[11]');			
		$this->form_validation->set_rules('complain', 'Complain', 'trim|xss_clean');
		$this->form_validation->set_rules('complain_dt', 'Date', 'trim|xss_clean');
			
		$this->form_validation->set_error_delimiters('<br /><span class="label label-danger">', '</span>');
	
		if ($this->form_validation->run() == FALSE) // validation hasn't been passed
		{
		    /* TODO */
			$this->load->view('complain_view');
		}
		else // passed validation proceed to post success logic
		{
		 	    $form_data = array(
		 	            'complain_dt' => set_value('complain_dt'),
		 	            'patient_id' => set_value('patient_id'),
		 	            'complain' => set_value('complain'),
		 	    );
		 	    
		 	if ($this->complain_model->SaveForm($form_data) == TRUE)
			{
			    $this->session->set_flashdata('patient_id', $this->input->post('patient_id'));
				$this->session->set_flashdata('notification', "Patient Complain Saved!");
			    redirect('history');
			}
			else
			{
			   $data['error'] = "An error occurred. Please try again later.";
	           $this->load->view('complain_view', $data);
			}
		}
	}
}