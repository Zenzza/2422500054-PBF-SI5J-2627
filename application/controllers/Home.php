<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{
    function __construct(){
        parent::__construct();
        $this->load->model('General_model');
    }

    public function index(){
        $data = array(
            'title' => 'Halaman Dashboard Administrator - E-commerce',
            'isi'   => 'home/home_view'
        );
        $this->load->view('layout/Wrapper', $data);
    }
}
?>
