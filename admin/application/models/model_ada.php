<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_ada extends CI_Model
{
    public function insert_data($data)
    {
        $this->db->insert('ada', $data);
    }

    public function hapus_ada($nokwitansi)
    {
        $this->db->where('nokwitansi', $nokwitansi);
        $this->db->delete('ada');
    }

    public function get_ada_by_nokwitansi($nokwitansi)
    {
        $this->db->from('ada');
        $this->db->join('rincian_biaya', 'rincian_biaya.idrincian = ada.idrincian');
        $this->db->where('nokwitansi', $nokwitansi);
        return $this->db->get()->result_array();
    }
}
?>