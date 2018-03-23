<?php

class Patient_treat_model extends MY_Model
{

    public function __construct ()
    {
        parent::__construct();
        $_table = 'patient_diag';
    }

    public function save_treatment ()
    {
        $patient_id = $this->input->post('patient_id');
        $posts = $this->input->post(NULL, TRUE); // pass all post items through
                                                 // xss filter
        foreach ($posts as $key => $val) {
            if (($key != 'patient_id') && ($key != 'submit')) {
                if (!empty($val[1])) {
                    $data = array(
                            'patient_id' => $patient_id,
                            'treat_id' => $key,
                            'unit' => $val[1],
                            'treat_description' => $val[0],
                            'treat_dt' => date('Y-m-d')
                    );
                    $this->db->insert('patient_treat', $data);
                } else {
                    continue;
                }
            }
        }
    }

    public function this_patient_treats ($id)
    {
        $sql = 'SELECT pt.treat_id, pt.treat_dt, pt.treat_description, t.treat_name, t.treat_cost, pt.unit FROM patient_treat pt
                LEFT JOIN treatment t ON t.id=pt.treat_id
                WHERE pt.patient_id=' . $id;
        $q = $this->db->query($sql);
        return $q->result();
    }
}
?>