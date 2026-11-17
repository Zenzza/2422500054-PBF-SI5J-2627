<?php
class Login_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_data_peserta($email, $password) {
        $query = $this->db->get_where('peserta', array(
            'email' => $email,
            'password' => $password
        ));
        if ($query->num_rows() > 0) {
            return $query->result();
        }
        return false;
    }
}
?>