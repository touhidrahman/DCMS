<?php

class Patient_diag_model extends MY_Model
{

    public function __construct ()
    {
        parent::__construct();
        $_table = 'patient_diag';
    }

    public function save_diagnosis ()
    {
        $patient_id = $this->input->post('patient_id');
        $posts = $this->input->post(NULL, TRUE);
        foreach ($posts as $key => $val) {
            if (($key != 'patient_id') && ($key != 'submit')) {
                if (! empty($val)) {
                    $data = array(
                            'patient_id' => $patient_id,
                            'diag_id' => $key,
                            'diag_text' => $val,
                            'diag_dt' => date('Y-m-d')
                    );
                    $this->db->insert('patient_diag', $data);
                }
            }
        }
    }

    public function this_patient_diags ($id)
    {
        $sql = 'SELECT a.diag_id, a.diag_dt, a.diag_text, b.diag_name FROM patient_diag a
                LEFT JOIN diagnosis b ON b.id=a.diag_id
                WHERE a.patient_id=' . $id;
        $q = $this->db->query($sql);
        return $q->result();
    }
}
?>