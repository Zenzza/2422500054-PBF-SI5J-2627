<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_kwitansi extends CI_Model {

    public function view_data_kwitansi()
    {   $this->db->select('
            kwitansi.*,kwitansi.total_bayar AS totalbayar,peserta.nmpeserta,pendaftaran.*,program_kursus.nmprogramkursus');
        $this->db->from('kwitansi');
        $this->db->join('pendaftaran','pendaftaran.nopendaftaran = kwitansi.nopendaftaran');
        $this->db->join('peserta','peserta.nopeserta = pendaftaran.nopeserta');
        $this->db->join('program_kursus','program_kursus.idprogramkursus =
            pendaftaran.idprogramkursus');
        return $this->db->get()->result_array();
    }

    public function hapus_kwitansi($nokwitansi)
    {
        $this->db->where('nokwitansi',$nokwitansi);
        $this->db->delete('kwitansi');
    }

    public function insert_data($data)
    {
        $this->db->insert('kwitansi',$data);
    }

    public function get_kwitansi_by_nokwitansi($nokwitansi)
    {
        $this->db->select('
            kwitansi.*,kwitansi.total_bayar AS totalbayar,peserta.nmpeserta,pendaftaran.*,program_kursus.nmprogramkursus');
        $this->db->from('kwitansi');
        $this->db->join('pendaftaran','pendaftaran.nopendaftaran = kwitansi.nopendaftaran');
        //$this->db->from('pendaftaran');
        $this->db->join('peserta','peserta.nopeserta = pendaftaran.nopeserta');
        $this->db->join('program_kursus','program_kursus.idprogramkursus =
            pendaftaran.idprogramkursus');
        $this->db->where('nokwitansi', $nokwitansi);
        return $this->db->get()->row_array();
    }
}
?>