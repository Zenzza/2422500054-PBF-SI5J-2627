<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kwitansi extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('model_peserta');
        $this->load->model('model_pendaftaran');
        $this->load->model('model_program_kursus');
        $this->load->model('model_kwitansi');
        $this->load->model('model_rincian_biaya');
        $this->load->model('model_ada');
    }

    public function index()
    {
        $data['data_kwitansi']=$this->model_kwitansi->view_data_kwitansi();
        $this->load->view('template/header');
        //$this->load->view('template/sidebar');
        $this->load->view('kwitansi',$data);
        $this->load->view('template/footer');

        if(isset($_POST['submit']))
        { $this->_inputdata();}
    }

    public function hapus($nokwitansi)
    {
        $this->model_ada->hapus_ada($nokwitansi);
        $this->model_kwitansi->hapus_kwitansi($nokwitansi);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Data Berhasil Dihapus</div>');
        redirect('kwitansi');
    }

    public function tambahkwitansi()
    {
        $this->db->select_max('nokwitansi');
        $datakode = $this->db->get('kwitansi')->row_array();
        if ($datakode['nokwitansi'] != null) {
            $nilaikode = substr($datakode['nokwitansi'], 2);
            $kode = (int) $nilaikode;
            $kode += 1;
            $hasilkode = "KW" . str_pad($kode, 3, "0", STR_PAD_LEFT);
        } else {
            $hasilkode = "KW001";
        }

        $data = [
            'menu' => 'Tambah Peserta',
            'username' => $this->session->userdata('username'),
            'user_role' => $this->session->userdata('user_role'),
            'get_peserta' => $this->model_peserta->view_data_peserta(),
            'get_rincianbiaya' => $this->model_rincian_biaya->view_data_rincian_biaya(),
            'get_programkursus' => $this->model_program_kursus->view_data_program_kursus(),
            'get_pendaftaran' => $this->model_pendaftaran->view_data_pendaftaran(),
            'nokwitansi' => $hasilkode,
        ];

        if ($this->input->post("nokwitansi")) {
            $this->__process_tambah($hasilkode);
            die;
        }

        $this->load->view('template/header', $data);
        $this->load->view('tambah_kwitansi', $data);
        $this->load->view('template/footer');
    }

    private function _rules()
    {
        $this->form_validation->set_rules('nokwitansi', 'nokwitansi', 'required|trim|xss_clean');
        $this->form_validation->set_rules('tglkwitansi', 'tglkwitansi', 'required|trim|xss_clean');
        $this->form_validation->set_rules('keterangan', 'keterangan', 'required|trim|xss_clean');
        $this->form_validation->set_rules('totalbayar', 'totalbayar', 'required|trim|xss_clean');
        $this->form_validation->set_rules('nopendaftaran', 'nopendaftaran', 'required|trim|xss_clean');
    }

    public function __process_tambah()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->tambahkwitansi();
        } else {
            $nokwitansi       = $this->input->post('nokwitansi');
            $tglkwitansi      = $this->input->post('tglkwitansi');
            $keterangan       = $this->input->post('keterangan');
            $totalbayar       = $this->input->post('totalbayar');
            $nopendaftaran    = $this->input->post('nopendaftaran');

            $data = array(
                'nokwitansi'        => $nokwitansi,
                'tglkwitansi'       => $tglkwitansi,
                'keterangan'        => $keterangan,
                'total_bayar'       => $totalbayar,
                'nopendaftaran'     => $nopendaftaran
            );

            $this->model_kwitansi->insert_data($data, 'kwitansi');

            //tambahan untuk masuk ke tabel hasil
            $idrincian = $this->input->post('idrincian', true);
            $jml_biaya = $this->input->post('jml_biaya', true);

            if (!empty($idrincian) && is_array($idrincian)) {
                foreach ($idrincian as $key => $value) {
                    if (!empty($value)) {
                        $data_ada = array(
                            'nokwitansi'        => $nokwitansi,
                            'idrincian'         => $value,
                            'jml_biaya'         => isset($jml_biaya[$key]) ? $jml_biaya[$key] : 0
                        );

                        $this->model_ada->insert_data($data_ada);
                    }
                }
            }

            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Data Berhasil Disimpan!!!.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('kwitansi');
        }
    }

    public function cetak($nokwitansi = 0)
    {
        $get_kwitansi = $this->model_kwitansi->get_kwitansi_by_nokwitansi($nokwitansi);
        if(!$get_kwitansi) {
            redirect('kwitansi');
        }
        $get_ada = $this->model_ada->get_ada_by_nokwitansi($nokwitansi);
        $data = [
            'kwitansi' => $get_kwitansi,
            'get_ada' => $get_ada,
        ];
        $this->load->view('cetak_kwitansi', $data);
    }

}
?>