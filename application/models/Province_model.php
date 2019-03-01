<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Province_model extends CI_Model
{
    public function get_province()
    {
        $this->db->from('province');
        $query = $this->db->get();

        return $query;
    }

    public function get_city($id)
    {
        $this->db->from('city');
        $this->db->where('city_province_id', $id);
        $query = $this->db->get();

        return $query->result();
    }
}

/* End of file Province_model.php */
