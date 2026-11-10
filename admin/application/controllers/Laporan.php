<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Laporan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('model_laporan');
    }

    public function index()
    {
        $data['data_laporan']=$this->model_laporan->view_data_laporan();
        $this->load->view('template/header');
        $this->load->view('cetak_laporan_kursus',$data);
        $this->load->view('template/footer');

        if(isset($_POST['submit']))
        { $this->_inputdata();}

    }

    public function cetak_laporan_kursus() {
        $tanggal_mulai = $this->input->post('tanggal_mulai');
        $tanggal_selesai = $this->input->post('tanggal_selesai');

    $data['data'] = $this->model_laporan->laporan_kursus($tanggal_mulai, $tanggal_selesai);
        $data['tanggal_mulai'] = $tanggal_mulai;
        $data['tanggal_selesai'] = $tanggal_selesai;

        $this->load->view('laporan_kursus', $data);

    }
}
?>