<?php
class ViewDiseases extends MY_Controller
{
	/* (non-PHPdoc)
	 * @see MY_Controller::__construct()
	 */
	public function __construct() {
        parent::__construct();
	}

	public function by($a)
	{
	    $a = $this->uri->segment(3);
	    $this->load->model('disease_model');
	    $data['disease_names'] = $this->disease_model->get_rows_starting_by($a);
	    $this->load->view('view_diseases_view', $data);
	}

	public function index()
	{
	    $this->load->view('view_diseases_view');
	}

	
}