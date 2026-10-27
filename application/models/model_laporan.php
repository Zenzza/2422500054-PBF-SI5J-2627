<?php
class model_laporan extends CI_Model {

    function __construct() {
        $this->load->database();
    }

    public function view_data_laporan() {
        $this->db->select('kwitansi.*, peserta.nmpeserta, pendaftaran.*, program_kursus.nmprogramkursus');
        $this->db->from('kwitansi');
        $this->db->join('pendaftaran', 'pendaftaran.nopendaftaran = kwitansi.nopendaftaran');
        $this->db->join('peserta', 'peserta.nopeserta = pendaftaran.nopeserta');
        $this->db->join('program_kursus', 'program_kursus.idprogramkursus = pendaftaran.idprogramkursus');
        return $this->db->get()->result_array();
    }

    public function laporan_kursus($tanggal_mulai, $tanggal_selesai) {
        $this->db->select('kwitansi.*, peserta.nmpeserta, pendaftaran.*, program_kursus.nmprogramkursus');
        $this->db->from('kwitansi');
        $this->db->join('pendaftaran', 'pendaftaran.nopendaftaran = kwitansi.nopendaftaran');
        $this->db->join('peserta', 'peserta.nopeserta = pendaftaran.nopeserta');
        $this->db->join('program_kursus', 'program_kursus.idprogramkursus = pendaftaran.idprogramkursus');
        $this->db->where('kwitansi.tglkwitansi >=', $tanggal_mulai);
        $this->db->where('kwitansi.tglkwitansi <=', $tanggal_selesai);
        $data = $this->db->get()->result_array();

        $total_seluruh_laporan = 0;
        foreach ($data as $value) {
            $total_seluruh_laporan += (int)$value['total_bayar'];
        }

        return [
            'data' => $data,
            'total_seluruh_laporan' => $total_seluruh_laporan,
        ];
    }
}
?>