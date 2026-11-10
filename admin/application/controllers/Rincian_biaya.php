<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class rincian_biaya extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('model_rincian_biaya');
    }

    public function index()
    {
        $data['data_rincian_biaya']=$this->model_rincian_biaya->view_data_rincian_biaya();
        $this->load->view('template/header');
        //$this->load->view('template/sidebar');
        $this->load->view('rincian_biaya',$data);
        $this->load->view('template/footer');

        if(isset($_POST['submit']))
        { $this->_inputdata();}
    }

    public function hapus($idrincian)
    {
        $this->model_rincian_biaya->hapus_rincian_biaya($idrincian);
        $this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Data Berhasil Dihapus</div>');
        redirect('rincian_biaya');
    }

    public function tambahrincian_biaya()
    {
        $this->db->select_max('idrincian');
        $datakode = $this->db->get('rincian_biaya')->row_array();

        if ($datakode['idrincian'] != null) {
            $nilaikode = substr($datakode['idrincian'], 2);
            $kode = (int)$nilaikode;
            $kode += 1;
            $hasilkode = "RB" . str_pad($kode, 3, '0', STR_PAD_LEFT);
        } else {
            $hasilkode = "RB001";
        }

        $data = [ 'idrincian' => $hasilkode ];

        if ($this->input->post("nmrincian")) {
            $this->_inputdata($hasilkode);
            die;
        }

        $this->load->view('template/header');
        $this->load->view('tambahrincian_biaya', $data);
        $this->load->view('template/footer');
    }

    private function _inputdata($idrincian){
        
        $nmrincian = $this->input->post('nmrincian');

        $data = [
            'idrincian' => $idrincian,
            'nmrincian' => $nmrincian,
        ];

        $this->model_rincian_biaya->input_data_rincian_biaya($data);
        $this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Data Rincian Biaya Berhasil Ditambahkan</div>');
        redirect('rincian_biaya');
    }

    private function _rules()
    {
        $this->form_validation->set_rules('idrincian', 'idrincian', 'required|trim|xss_clean'
        );
        $this->form_validation->set_rules('nmrincian', 'nmrincian', 'required|trim|xss_clean'
        );
    }

    public function editrincian_biaya($idrincian=0){
        if(isset($_POST['submit']))
        { 
            $this->_prosesedit();
            return;
        }

        $data['edit'] = $this->model_rincian_biaya->get_data_rincian_biaya($idrincian);
        $this->load->view('template/header');
        //$this->load->view('template/sidebar');
        $this->load->view('editrincian_biaya',$data);
        $this->load->view('template/footer');
    }

    private function _prosesedit(){
        $idrincian = $this->input->post('idrincian');
        $nmrincian = $this->input->post('nmrincian');

        $data = array(
            'idrincian' => $idrincian,
            'nmrincian' => $nmrincian
        );

        $where = array('idrincian' => $idrincian);
        $this->model_rincian_biaya->edit_data_rincian_biaya($where, $data);
        $this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Data Berhasil DiUbah</div>');
        redirect('rincian_biaya');
    }
}
?>