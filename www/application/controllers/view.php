<?php
class View extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('view_view');
    }
    
    public function patient($id=null)
    {
        $this->load->model('history_model');
        
        if ($id == null) {
            if ($this->input->post('view'))
            {
                $id = $this->input->post('view');
            } else {
                $id = $this->uri->segment(3);
            }
        }
                
        $data['result'] = $this->history_model->view_by_id($id);
        $this->load->model('patient_diag_model');
        $data['this_patient_diags'] = $this->patient_diag_model->this_patient_diags($id);
        $this->load->model('patient_treat_model');
        $data['this_patient_treats'] = $this->patient_treat_model->this_patient_treats($id);
        $this->load->view('view_view', $data);
    }
    
    public function historyDelete()
    {
        $patient_id = $this->uri->segment(5);
        $del_id = $this->uri->segment(3);
        $this->load->model('history_model');
        $this->history_model->delete($del_id);
        //deleting a date should delete all from other tables
        
        $this->patient($patient_id);
    }
}