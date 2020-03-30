<?php

defined('BASEPATH') or exit('No direct script access allowed');

class kompen_model extends CI_Model
{
    public function getAllKompen()
    {
        $query = $this->db->query("select * from kompen");
        return $query->result_array();
    }

    public function datatabels()
    {
        $query = $this->db->order_by('id_kompen', 'DESC')->get('kompen');
        return $query->result();
    }

    public function tambahDataKompen()
    {
        $data = [
            "dosen" => $this->input->post('dosen', true),
            "jam_kompen" => $this->input->post('jam_kompen', true),
            "no_tugas" => $this->input->post('no_tugas', true)
        ];

        $this->db->insert('kompen', $data);
    }

    public function hapusDataKompen($id)
    {
        $this->db->where('id_kompen', $id);
        $this->db->delete('kompen');
    }

    public function getKompenById($id)
    {
        return $this->db->get_where('kompen', ['id_kompen' => $id])->row();
    }

    public function ubahDataKompen()
    {
        $data = [
            "dosen" => $this->input->post('dosen', true),
            "jam_kompen" => $this->input->post('jam_kompen', true),
            "no_tugas" => $this->input->post('no_tugas', true)
        ];

        $this->db->where('id_kompen', $this->input->post('id_kompen', true));
        $this->db->update('kompen', $data);
    }

    public function cariDataKompen()
    {
        $keyword = $this->input->post('keyword');
        $this->db->like('dosen', $keyword);
        $this->db->or_like('jam_kompen', $keyword);
        return $this->db->get('kompen')->result_array();
    }
}
