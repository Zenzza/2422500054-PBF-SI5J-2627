<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Laporan_peserta extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('model_peserta');
    }

    public function index()
    {
        $data['data_laporan']=$this->model_peserta->view_data_peserta();
        $this->load->view('template/header');
        $this->load->view('cetak_laporan_peserta',$data);
        $this->load->view('template/footer');
    }

    public function cetak_laporan_peserta() {
        $tanggal_mulai = $this->input->post('tanggal_mulai');
        $tanggal_selesai = $this->input->post('tanggal_selesai');

    $data['data'] = $this->model_peserta->laporan_peserta($tanggal_mulai, $tanggal_selesai);
        $data['tanggal_mulai'] = $tanggal_mulai;
        $data['tanggal_selesai'] = $tanggal_selesai;

        $this->load->view('laporan_peserta', $data);

    }
}
?>