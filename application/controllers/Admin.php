<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @property CI_Input    $input
 * @property CI_Session  $session
 * @property Tamu_model  $Tamu_model
 */

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Tamu_model');
        $this->load->library('session'); 
        $this->load->helper(array('form', 'url', 'download'));
    }

    public function index() {
        $filter_tanggal = $this->input->get('tanggal');
        
        $data['title'] = 'Admin - Daftar Pesan Tamu';
        $data['tamu_list'] = $this->Tamu_model->get_all_tamu($filter_tanggal);
        $data['total_tamu'] = $this->Tamu_model->count_tamu();
        $data['filter_tanggal'] = $filter_tanggal;
        
        $this->load->view('templates/header', $data);
        $this->load->view('admin/daftar_tamu', $data);
        $this->load->view('templates/footer');
    }

    public function hapus($id) {
        if ($this->Tamu_model->hapus_tamu($id)) {
            $this->session->set_flashdata('success', 'Data tamu berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus data tamu.');
        }
        redirect('admin');
    }

    public function export_csv() {
        $filter_tanggal = $this->input->get('tanggal');
        $data_tamu = $this->Tamu_model->get_all_tamu($filter_tanggal);

        $filename = 'data_tamu_' . date('Y-m-d_H-i-s') . '.csv';
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="' . $filename . '"');

        $output = fopen('php://output', 'w');
        
        fputcsv($output, array('No', 'Nama', 'Email', 'Pesan', 'Tanggal'));

        $no = 1;
        foreach ($data_tamu as $tamu) {
            fputcsv($output, array(
                $no++,
                $tamu->nama,
                $tamu->email,
                $tamu->pesan,
                date('d-m-Y H:i:s', strtotime($tamu->tanggal_dibuat))
            ));
        }

        fclose($output);
    }

    public function detail($id) {
        $data['title'] = 'Detail Pesan Tamu';
        $data['tamu'] = $this->Tamu_model->get_tamu_by_id($id);
        
        if (!$data['tamu']) {
            show_404();
        }
        
        $this->load->view('templates/header', $data);
        $this->load->view('admin/detail_tamu', $data);
        $this->load->view('templates/footer');
    }
}