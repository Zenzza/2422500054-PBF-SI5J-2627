<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftaran extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('model_peserta');
        $this->load->model('model_pendaftaran');
        $this->load->model('model_program_kursus');
    }

    public function index()
    {
        $data['data_pendaftaran']=$this->model_pendaftaran->view_data_pendaftaran();
        $this->load->view('template/header');
        //$this->load->view('template/sidebar');
        $this->load->view('lihat_pendaftaran',$data);
        $this->load->view('template/footer');

        if(isset($_POST['submit']))
        { $this->_inputdata();}
    }

    public function hapus($nopendaftaran)
    {
        $this->model_pendaftaran->hapus_pendaftaran($nopendaftaran);
        $this->session->set_flashdata('pesan','<div class="alert alert-success" roel="alert">Data Berhasil Dihapus</div>');
        redirect('pendaftaran');
    }
}
?>