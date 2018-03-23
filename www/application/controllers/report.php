<?php
if (! defined('BASEPATH'))
    exit('No direct script access allowed');

class Report extends MY_Controller
{

    function __construct ()
    {
        parent::__construct();
    }

    function index ()
    {}

    function create ($id = NULL)
    {
        $this->load->helper('pdf_helper');
        
        if ($id == null) {
            if ($this->input->post('view')) {
                $id = $this->input->post('view');
            } else {
                $id = $this->uri->segment(3);
            }
        }
        $dt = $this->uri->segment(4);
        $data['id'] = $id;
        $data['dt'] = $dt;
        
        $this->load->model('report_model');
        $data['med_histories'] = $this->report_model->get_med_histories($id, $dt);
        $data['basic_info'] = $this->report_model->get_patient_info($id);
        $this->load->model('history_model');
        $data['result'] = $this->history_model->view_by_id($id);
        $this->load->model('patient_diag_model');
        $data['this_patient_diags'] = $this->patient_diag_model->this_patient_diags($id);
        $this->load->model('patient_treat_model');
        $data['this_patient_treats'] = $this->patient_treat_model->this_patient_treats($id);
        $this->load->view('pdfreport', $data);
    }
}
 
/* End of file report.php */
/* Location: ./application/controllers/c_test.php */