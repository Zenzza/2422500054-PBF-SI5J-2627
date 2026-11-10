<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Krs extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('model_krs');
    }

    public function index()
    {
        $data['data_krs']=$this->model_krs->view_data_krs();
        $this->load->view('template/header');
        //$this->load->view('template/sidebar');
        $this->load->view('krs',$data);
        $this->load->view('template/footer');

        if(isset($_POST['submit']))
        { $this->_inputdata();}
    }

    public function hapus($kd_krs)
    {
        $this->model_krs->hapus_krs($kd_krs);
        $this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Data Berhasil Dihapus</div>');
        redirect('krs');
    }

    public function tambahkrs()
    {
        $this->db->select_max('kd_krs');
        $datakode = $this->db->get('krs')->row_array();

        if ($datakode['kd_krs'] != null) {
            $nilaikode = substr($datakode['kd_krs'], 2);
            $kode = (int)$nilaikode;
            $kode += 1;
            $hasilkode = "KS" . str_pad($kode, 3, '0', STR_PAD_LEFT);
        } else {
            $hasilkode = "KS001";
        }

        $data = [ 'kd_krs' => $hasilkode ];

        if ($this->input->post("thn_ajaran")) {
            $this->_inputdata($hasilkode);
            die;
        }

        $this->load->view('template/header');
        $this->load->view('tambahkrs', $data);
        $this->load->view('template/footer');
    }

    private function _inputdata($kd_krs){
        
        $thn_ajaran = $this->input->post('thn_ajaran');        
        $semester = $this->input->post('semester');
        $keterangan = $this->input->post('keterangan');


        $data = [
            'kd_krs' => $kd_krs,
            'thn_ajaran' => $thn_ajaran,
            'semester' => $semester,
            'keterangan' => $keterangan,    
        ];

        $this->model_krs->input_data_krs($data);
        $this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Data KRS Berhasil Ditambahkan</div>');
        redirect('krs');
    }

    private function _rules()
    {
        $this->form_validation->set_rules('kd_krs', 'kd_krs', 'required|trim|xss_clean'
        );
        $this->form_validation->set_rules('thn_ajaran', 'thn_ajaran', 'required|trim|xss_clean'
        );
    }

    public function editkrs($kd_krs=0){
        if(isset($_POST['submit']))
        { 
            $this->_prosesedit();
            return;
        }

        $data['edit'] = $this->model_krs->get_data_krs($kd_krs);
        $this->load->view('template/header');
        //$this->load->view('template/sidebar');
        $this->load->view('editkrs',$data);
        $this->load->view('template/footer');
    }

    private function _prosesedit(){
        $kd_krs = $this->input->post('kd_krs');
        $thn_ajaran = $this->input->post('thn_ajaran');
        $semester = $this->input->post('semester');  
        $keterangan = $this->input->post('keterangan');

        $data = array(
            'kd_krs' => $kd_krs,
            'thn_ajaran' => $thn_ajaran,
            'semester' => $semester,
            'keterangan' => $keterangan,    

        );

        $where = array('kd_krs' => $kd_krs);
        $this->model_krs->edit_data_krs($where, $data);
        $this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">Data Berhasil DiUbah</div>');
        redirect('krs');
    }
}
?>