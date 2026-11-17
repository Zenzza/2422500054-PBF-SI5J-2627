<?php
class Login extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('General_model');
        $this->load->model('Login_model');
    }

    public function index() {
        $data = array(
            'isi' => 'Login/Login_view');
        $this->load->view('Layout/Wrapper', $data);
    }

    public function authentication() {
        $email = $this->input->post("email");
        $password = $this->input->post("password");
        $cek = $this->Login_model->get_data_peserta($email, $password);
        if ($cek) {
            $peserta = is_array($cek) ? $cek[0] : $cek;
            $session = array(
                'user'      => "peserta",
                'email'     => $email,
                'username'  => !empty($peserta->nmpeserta) ? $peserta->nmpeserta : $peserta->nopeserta,
                'nama'      => !empty($peserta->nmpeserta) ? $peserta->nmpeserta : '',
                'nopeserta' => isset($peserta->nopeserta) ? $peserta->nopeserta : ''
            );
            $this->session->set_userdata($session);
            redirect('home');
        } else {
            $data = array(
                'error' => 'Email atau Password Anda Salah',
                'isi' => 'login/login_view'
            );
            $this->load->view('Layout/Wrapper', $data);
        }
    }
        
    public function logout() {
        $this->session->sess_destroy();
        redirect('home');
    }

    public function registrasi() {
        $data = array('isi' => 'login/registrasi_view');
        $this->load->view('Layout/Wrapper', $data);
    }

    public function simpan_registrasi() {
        $this->form_validation->set_rules('nmpeserta', 'Nama Peserta', 'required');
        $this->form_validation->set_rules('jenkel', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('notelpon', 'Nomor Telepon', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('kota', 'Kota', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() === FALSE) {
            $data = array('isi' => 'login/registrasi_view');
            $this->load->view('Layout/Wrapper', $data);
        } else {
            $data = array(
                'nmpeserta' => $this->input->post('nmpeserta'),
                'alamat'    => $this->input->post('alamat'),
                'kota'      => $this->input->post('kota'),
                'email'     => $this->input->post('email'),
                'notelpon'  => $this->input->post('notelpon'),
                'password'  => $this->input->post('password'),
                'jenkel'    => $this->input->post('jenkel')
            );
            $this->General_model->add_new('peserta', $data);
            $this->session->set_flashdata('sukses', 'Registrasi berhasil! Silakan login dengan email dan password Anda.');
            redirect('login');
        }
    }
}
