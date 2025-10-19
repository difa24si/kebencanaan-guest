<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Pelanggan_model');
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    // --- Menampilkan data pelanggan ---
    public function index() {
        $data['pelanggan'] = $this->Pelanggan_model->get_all();
        $this->load->view('layouts/header');
        $this->load->view('pelanggan/index', $data);
        $this->load->view('layouts/footer');
    }

    // --- Menampilkan form tambah data ---
    public function create() {
        $this->load->view('layouts/header');
        $this->load->view('pelanggan/create');
        $this->load->view('layouts/footer');
    }

    // --- ✅ KODE SIMPAN DATA ADA DI SINI ---
    public function store() {
        $this->form_validation->set_rules('first_name', 'Nama Depan', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        if ($this->form_validation->run() == FALSE) {
            // Jika validasi gagal, tampilkan form lagi
            $this->load->view('layouts/header');
            $this->load->view('pelanggan/create');
            $this->load->view('layouts/footer');
        } else {
            // Jika validasi lolos, simpan ke database
            $data = [
                'first_name' => $this->input->post('first_name', TRUE),
                'last_name'  => $this->input->post('last_name', TRUE),
                'birthday'   => $this->input->post('birthday', TRUE),
                'gender'     => $this->input->post('gender', TRUE),
                'email'      => $this->input->post('email', TRUE),
                'phone'      => $this->input->post('phone', TRUE)
            ];

            $this->Pelanggan_model->insert($data);
            $this->session->set_flashdata('success', 'Data pelanggan berhasil disimpan!');
            redirect('pelanggan');
        }
    }
}


