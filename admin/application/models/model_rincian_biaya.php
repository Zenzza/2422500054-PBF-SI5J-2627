<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_rincian_biaya extends CI_Model {

    public function view_data_rincian_biaya()
    {
        $query = $this->db->get('rincian_biaya');
        return $query->result_array();
    }

    public function hapus_rincian_biaya($idrincian)
    {
        $this->db->where('idrincian',$idrincian);
        $this->db->delete('rincian_biaya');
    }

    public function input_data_rincian_biaya($data)
    {
        $this->db->insert('rincian_biaya',$data);
    }

    public function get_data_rincian_biaya($idrincian)
    {
        $this->db->where('idrincian',$idrincian);
        $query = $this->db->get('rincian_biaya');
        return $query->row_array();
    }

    public function edit_data_rincian_biaya($where, $data)
    {
        $this->db->where($where);
        $this->db->update('rincian_biaya', $data);
    }
} ?>