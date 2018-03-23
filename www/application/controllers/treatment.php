<?php
class Treatment extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->database();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->model('treatment_model');
    }
    
    public function index()
    {
        $this->load->model('treatment_model');
        $data['treat_names'] = $this->treatment_model->get_treat_names();
        $this->load->view('treatment_view', $data);
        
    }
    
    public function patient()
    {
        //add redirect to report
        $data['patient_id'] = $this->uri->segment(3);
        $this->load->model('treatment_model');
        $data['treat_names'] = $this->treatment_model->get_treat_names();
        $this->load->view('treatment_view', $data);
        
    }
    
    public function add()
    {
        $this->load->model('patient_treat_model');
        $this->patient_treat_model->save_treatment();
        $patient_id = $this->input->post('patient_id');
        redirect('view/patient/'.$patient_id);
    }
    
    
    public function deleteTreatment($del_id)
    {
        $del_id = $this->uri->segment(3);
        $this->load->model('treatment_model');
        $this->treatment_model->delete($del_id);
        $this->addItem();
    }
    
    public function addItem()
    {
    
        $this->form_validation->set_rules('treat_name', 'Treatment Name', 'trim|xss_clean');
        $this->form_validation->set_rules('treat_cost', 'Treatment Cost', 'trim|xss_clean|is_numeric');
        $this->form_validation->set_rules('for_children', 'For Children', 'trim');
         
        $this->form_validation->set_error_delimiters('<br /><span class="label label-danger">', '</span>');
    
        if ($this->form_validation->run() == FALSE) // validation hasn't been passed
        {
            $this->load->model('treatment_model');
            $data['treat_names'] = $this->treatment_model->get_treat_names();
            $this->load->view('treatment_items_view', $data);
        }
        else // passed validation proceed to post success logic
        {
            // build array for the model
             
            $form_data = array(
                    'treat_name' => set_value('treat_name'),
                    'treat_cost' => set_value('treat_cost'),
                    'for_children' => set_value('for_children'),
            );
             
            // run insert model to write data to db
    
            if ($this->treatment_model->SaveForm($form_data) == TRUE) // the information has therefore been successfully saved in the db
            {
                $this->session->set_flashdata('notification', "New Treatment Item Saved.");
                $data['treat_names'] = $this->treatment_model->get_treat_names();
                $this->load->view('treatment_items_view', $data);
            }
            else
            {
                $data['error'] = "An error occurred. Please try again later.";
                $this->load->view('treatment_items_view', $data);
                // Or whatever error handling is necessary
            }
        }
    
    }

}