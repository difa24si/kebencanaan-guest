<?php
class Pelanggan_model extends CI_Model {

    public function get_all() {
        return $this->db->get('pelanggan')->result();
    }

    public function insert($data) {
        return $this->db->insert('pelanggan', $data);
    }
}

