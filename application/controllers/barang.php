<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{
    public function index()
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'http://inventarisjti.tugas-ti-2b.com/api/barang');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl);
        $data['barang'] = json_decode($result, TRUE);
        curl_close($curl);
        $data['title'] = 'Kompen JTI';
        if ($this->session->userdata('level') == "admin") {
            $this->load->view('admin/template/header', $data);
            $this->load->view('barang/index', $data);
            $this->load->view('template/footer');
        } else {
            $this->load->view('user/header', $data);
            $this->load->view('barang/index', $data);
            $this->load->view('template/footer');
        }
    }
}
