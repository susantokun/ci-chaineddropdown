<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Province extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Province_model');
    }

    public function index()
    {
        $data['data'] = $this->Province_model->get_province();
        $this->load->view('v_province', $data);
    }

    public function get_city()
    {
        $id = $this->input->post('id');
        $data = $this->Province_model->get_city($id);
        echo json_encode($data);
    }
}

/* End of file Province.php */
