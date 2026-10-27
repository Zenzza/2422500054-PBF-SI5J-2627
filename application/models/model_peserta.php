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

    public function laporan_peserta($tanggal_mulai, $tanggal_selesai)
    {
        $this->db->select('peserta.*, peserta.notelpon AS notelepon, pendaftaran.tglregistrasi, program_kursus.idprogramkursus, program_kursus.nmprogramkursus');
        $this->db->from('peserta');
        $this->db->join('pendaftaran', 'pendaftaran.nopeserta = peserta.nopeserta');
        $this->db->join('program_kursus', 'program_kursus.idprogramkursus = pendaftaran.idprogramkursus');
        $this->db->where('pendaftaran.tglregistrasi >=', $tanggal_mulai);
        $this->db->where('pendaftaran.tglregistrasi <=', $tanggal_selesai);
        $data = $this->db->get()->result_array();

        return [
            'data' => $data
        ];
    }
}
?>