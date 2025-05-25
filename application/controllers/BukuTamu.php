<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property CI_Input           $input
 * @property CI_Session         $session
 * @property CI_Form_validation $form_validation
 * @property Tamu_model         $tamu_model
 */
class BukuTamu extends CI_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('Tamu_model', 'tamu_model');

        $this->load->library(['form_validation', 'session']);

        $this->load->helper(['form','url','download']);
    }

    /** 
     * Tampilkan form buku tamu 
     */
    public function index()
    {
        $data['title'] = 'Buku Tamu - Selamat Datang';
        $this->load->view('templates/header', $data);
        $this->load->view('buku_tamu/form_tamu'); 
        $this->load->view('templates/footer');
    }

    /**
     * Proses simpan data setelah validasi
     */
    public function simpan()
    {
        $this->form_validation->set_rules('nama',  'Nama',  'required|min_length[3]|max_length[100]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|max_length[100]');
        $this->form_validation->set_rules('pesan', 'Pesan', 'required|min_length[10]|max_length[500]');

        $this->form_validation->set_message('required',    '{field} wajib diisi');
        $this->form_validation->set_message('min_length',  '{field} minimal {param} karakter');
        $this->form_validation->set_message('max_length',  '{field} maksimal {param} karakter');
        $this->form_validation->set_message('valid_email', 'Format email tidak valid');

        if ($this->form_validation->run() === FALSE) {
            $data['title'] = 'Buku Tamu - Selamat Datang';
            $this->load->view('templates/header', $data);
            $this->load->view('buku_tamu/form_tamu');
            $this->load->view('templates/footer');
        } else {
            $data_tamu = [
                'nama'           => $this->input->post('nama', true),
                'email'          => $this->input->post('email', true),
                'pesan'          => $this->input->post('pesan', true),
                'tanggal_dibuat' => date('Y-m-d H:i:s'),
            ];

            if ($this->tamu_model->simpan_tamu($data_tamu)) {
                $this->session->set_flashdata('success', 'Terima kasih! Pesan Anda telah berhasil disimpan.');
            } else {
                $this->session->set_flashdata('error', 'Maaf, terjadi kesalahan. Silakan coba lagi.');
            }

            redirect('BukuTamu');
        }
    }
}
