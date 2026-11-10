<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_krs extends CI_Model {

    public function view_data_krs()
    {
        $query = $this->db->get('krs');
        return $query->result_array();
    }

    public function hapus_krs($kd_krs)
    {
        $this->db->where('kd_krs',$kd_krs);
        $this->db->delete('krs');
    }

    public function input_data_krs($data)
    {
        $this->db->insert('krs',$data);
    }

    public function get_data_krs($kd_krs)
    {
        $this->db->where('kd_krs',$kd_krs);
        $query = $this->db->get('krs');
        return $query->row_array();
    }

    public function edit_data_krs($where, $data)
    {
        $this->db->where($where);
        $this->db->update('krs', $data);
    }
} ?>