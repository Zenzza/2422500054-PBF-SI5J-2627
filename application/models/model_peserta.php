<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_peserta extends CI_Model {

    public function view_data_peserta()
    {
        $query = $this->db->get('peserta');
        return $query->result_array();
    }

    public function hapus_peserta($nopeserta)
    {
        $this->db->where('nopeserta',$nopeserta);
        $this->db->delete('peserta');
    }
}
?>