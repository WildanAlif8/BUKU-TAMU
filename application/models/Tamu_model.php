<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tamu_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function simpan_tamu($data) {
        return $this->db->insert('tamu', $data);
    }

    public function get_all_tamu($filter_tanggal = null) {
        $this->db->select('*');
        $this->db->from('tamu');
        
        if ($filter_tanggal) {
            $this->db->where('DATE(tanggal_dibuat)', $filter_tanggal);
        }
        
        $this->db->order_by('tanggal_dibuat', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function count_tamu() {
        return $this->db->count_all('tamu');
    }

    public function hapus_tamu($id) {
        $this->db->where('id', $id);
        return $this->db->delete('tamu');
    }

    public function get_tamu_by_id($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('tamu');
        return $query->row();
    }
}