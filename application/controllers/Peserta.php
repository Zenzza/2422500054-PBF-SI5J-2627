<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peserta extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('model_peserta');
    }

    public function index()
    {
        $data['data_peserta']=$this->model_peserta->view_data_peserta();
        $this->load->view('template/header');
        //$this->load->view('template/sidebar');
        $this->load->view('lihat_peserta',$data);
        $this->load->view('template/footer');

        if(isset($_POST['submit']))
        { $this->_inputdata();}
    }

    public function hapus($nopeserta)
    {
        $this->model_peserta->hapus_peserta($nopeserta);
        $this->session->set_flashdata('pesan','<div class="alert alert-success" roel="alert">Data Berhasil Dihapus</div>');
        redirect('peserta');
    }
}
?>