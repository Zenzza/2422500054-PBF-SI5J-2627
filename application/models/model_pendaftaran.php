<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_pendaftaran extends CI_Model {

    public function view_data_pendaftaran()
    {
        $this->db->select('pendaftaran.*, peserta.nmpeserta, program_kursus.nmprogramkursus');
        $this->db->from('pendaftaran');
        $this->db->join('peserta', 'peserta.nopeserta = pendaftaran.nopeserta');
        $this->db->join('program_kursus', 'program_kursus.idprogramkursus = pendaftaran.idprogramkursus');
        return $this->db->get()->result_array();
    }

    public function hapus_pendaftaran($nopendaftaran)
    {
        $this->db->where('nopendaftaran', $nopendaftaran);
        $this->db->delete('pendaftaran');
    }
}
?>