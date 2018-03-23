<?php
class Diagnosis extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->model('diagnosis_model');
    }
    
    public function index()
    {
        $this->load->model('diagnosis_model');
        $data['diag_names'] = $this->diagnosis_model->get_diag_names();
        $this->load->view('diagnosis_view', $data);
        
    }
    
    public function patient()
    {
        $data['patient_id'] = $this->uri->segment(3);
        $this->load->model('diagnosis_model');
        $data['diag_names'] = $this->diagnosis_model->get_diag_names();
        $this->load->view('diagnosis_view', $data);
        
    }
    
    public function add()
    {
        
        $this->load->model('patient_diag_model');
        $this->patient_diag_model->save_diagnosis();
        
        redirect('treatment/patient/'.$this->input->post('patient_id'));
    }
    
    
    public function deleteDiagnosis($del_id)
    {
        $del_id = $this->uri->segment(3);
        $this->load->model('diagnosis_model');
        $this->diagnosis_model->delete($del_id);
        $this->addItem();
    }
    
    public function addItem()
    {
    
        $this->form_validation->set_rules('diag_name', 'Diagnosis Name', 'trim|xss_clean');
        $this->form_validation->set_rules('for_children', 'For Children', 'trim');
         
        $this->form_validation->set_error_delimiters('<br /><span class="label label-danger">', '</span>');
    
        if ($this->form_validation->run() == FALSE) // validation hasn't been passed
        {
            $this->load->model('diagnosis_model');
            $data['diag_names'] = $this->diagnosis_model->get_diag_names();
            $this->load->view('add_diagnosis_items_view', $data);
        }
        else // passed validation proceed to post success logic
        {
            // build array for the model
             
            $form_data = array(
                    'diag_name' => set_value('diag_name'),
                    'for_children' => set_value('for_children'),
            );
             
            // run insert model to write data to db
    
            if ($this->diagnosis_model->SaveForm($form_data) == TRUE) // the information has therefore been successfully saved in the db
            {
                $this->session->set_flashdata('notification', "New Diagnosis Item Saved.");
                $data['diag_names'] = $this->diagnosis_model->get_diag_names();
                $this->load->view('add_diagnosis_items_view', $data);
            }
            else
            {
                $data['error'] = "An error occurred. Please try again later.";
                $this->load->view('add_diagnosis_items_view', $data);
                // Or whatever error handling is necessary
            }
        }
    
    }

}