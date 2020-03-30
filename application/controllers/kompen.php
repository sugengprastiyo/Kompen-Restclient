<?php
defined('BASEPATH') or exit('No direct script access allowed');

class kompen extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('kompen_model');
        $this->load->model('cetak_model');
        // $this->load->model('user_model');

        if ($this->session->userdata('level') == "user" and $this->session->userdata('status') == "Tidak Aktif") {
            $this->session->sess_destroy();
            $data['pesan'] = "Maaf Anda Belum Aktif, Tolong Hubungi Admin";
            $data['title'] = 'Login User';
            $this->load->view('auth/template/header', $data);
            $this->load->view('auth/login', $data);
        } elseif ($this->session->userdata('level') != "user" and $this->session->userdata('level') != "admin") {
            redirect('auth', 'refresh');
        }
    }

    public function index()
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'http://inventarisjti.tugas-ti-2b.com/api/barang');
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl);
        $data['barang'] = json_decode($result, TRUE);
        curl_close($curl);
        $data['title'] = 'Data Kompen';
        $data['kompen'] = $this->kompen_model->getAllKompen();
        $status_login = $this->session->userdata('level');
        if ($status_login == 'admin') {
            $this->load->view('admin/template/header', $data);
            $this->load->view('kompen/index', $data);
            $this->load->view('template/footer');
        } elseif ($status_login == 'user') {
            $this->load->view('user/header', $data);
            $this->load->view('kompen/index', $data);
            $this->load->view('template/footer');
        } else {
            redirect('auth', 'refresh');
        }
    }

    public function tambah()
    {
        $status_login = $this->session->userdata('level');
        if ($status_login == 'user') {
            redirect('kompen', 'refresh');
        } elseif ($status_login == 'admin') {
            $data['title'] = 'Form Menambahkan Data Kompen';
            $this->load->library('form_validation');
            $this->form_validation->set_rules('dosen', 'Dosen', 'trim|required');
            $this->form_validation->set_rules('jam_kompen', 'Jam_kompen', 'trim|required');
            $this->form_validation->set_rules('no_tugas', 'No_tugas', 'trim|required');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('admin/template/header', $data);
                $this->load->view('kompen/tambah', $data);
                $this->load->view('template/footer');
            } else {
                $this->kompen_model->tambahDataKompen();
                $this->session->set_flashdata('flash-data', 'ditambahkan');
                redirect('kompen', 'refresh');
            }
        } else {
            redirect('auth', 'refresh');
        }
    }

    public function hapus($id)
    {
        $status_login = $this->session->userdata('level');
        if ($status_login == 'user') {
            redirect('kompen', 'refresh');
        } elseif ($status_login == 'admin') {
            $this->kompen_model->hapusDataKompen($id);
            $this->session->flashdata('flash-data-hapus', 'Dihapus');
            redirect('kompen', 'refresh');
        } else {
            redirect('auth', 'refresh');
        }
    }

    public function detail($id)
    {
        $data['title'] = 'Detail Kompen';
        $data['kompen'] = $this->kompen_model->getKompenById($id);
        $this->load->view('template/header', $data);
        $this->load->view('kompen/detail', $data);
        $this->load->view('template/footer');
    }

    public function edit($id)
    {
        $status_login = $this->session->userdata('level');
        if ($status_login == 'user') {
            redirect('kompen', 'refresh');
        } elseif ($status_login == 'admin') {
            $data['title'] = 'Form Edit Kompen';
            $data['kompen'] = $this->kompen_model->getKompenById($id);
            $this->load->library('form_validation');
            $this->form_validation->set_rules('dosen', 'Dosen', 'trim|required');
            $this->form_validation->set_rules('jam_kompen', 'Jam_kompen', 'trim|required');
            $this->form_validation->set_rules('no_tugas', 'No_tugas', 'trim|required');

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('template/header', $data);
                $this->load->view('kompen/edit', $data);
                $this->load->view('template/footer');
            } else {
                $this->kompen_model->ubahDataKompen();
                $this->session->set_flashdata('flash-data', 'diedit');
                redirect('kompen', 'refresh');
            }
        } else {
            redirect('auth', 'refresh');
        }
    }

    public function cetakLaporan()
    {
        $data['title'] = 'Laporan Kompen';
        $data['kompen'] = $this->cetak_model->viewKompen();
        $this->load->library('pdf');

        $this->pdf->setPaper('A4', 'potrait');
        $this->pdf->filename = "laporan_kompen.pdf";
        $this->pdf->load_view('kompen/laporan', $data);
    }
}
