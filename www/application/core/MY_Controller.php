<?php 
class MY_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('db_config_model');
        
        if (!$this->db_config_model->is_premium() && $this->db_config_model->inspected_valid())
        {
            $error = "<h1>CRITICAL ERROR!</h1>
                    <p>You might have payment due or or any other problem! Please contact software provider for more info.</p>";
            $this->session->set_flashdata('error', $error);
            $this->session->set_userdata('validated', FALSE);
        }
        
        $data['clinic'] = $this->db_config_model->get_clinic();
        
        $validated = (bool) $this->session->userdata('validated');
        if ($validated != TRUE)
        {
            redirect('login');
        }
    }

}
?>