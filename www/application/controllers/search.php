<?php

class Search extends MY_Controller
{
    /*
     * (non-PHPdoc) @see MY_Controller::__construct()
     */
    public function __construct ()
    {
        // TODO: Auto-generated method stub
        parent::__construct();
    }

    public function index ($search_result = null)
    {
        $data['search'] = $search_result;
        $this->load->view('search_view', $data);
    }

    public function result ()
    {
        $term = $this->input->post('term');
        $this->load->model('patient_model');
        $search_result = $this->patient_model->get_result($term);
        $this->index($search_result);

    }
}
