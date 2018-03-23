<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {


    function __construct()
    {
        parent::__construct();
    }
    
    
    function index()
	{
	    $this->load->model('patient_model');
	    $data['patients'] = $this->patient_model->recent_patients();
	    $this->load->view('home_view', $data);
	    
	}
	
}

/* End of file home.php */
/* Location: ./application/controllers/welcome.php */