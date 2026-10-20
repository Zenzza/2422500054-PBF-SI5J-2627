<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_program_kursus extends CI_Model {

    public function view_data_program_kursus()
    {
        $query = $this->db->get('program_kursus');
        return $query->result_array();
    }

    public function hapus_program_kursus($idprogramkursus)
    {
        $this->db->where('idprogramkursus',$idprogramkursus);
        $this->db->delete('program_kursus');
    }

    public function input_data_program_kursus($data)
    {
        $this->db->insert('program_kursus',$data);
    }

    public function get_data_program_kursus($idprogramkursus)
    {
        $this->db->where('idprogramkursus',$idprogramkursus);
        $query = $this->db->get('program_kursus');
        return $query->row_array();
    }

    public function edit_data_program_kursus($where, $data)
    {
        $this->db->where($where);
        $this->db->update('program_kursus', $data);
    }
} ?>