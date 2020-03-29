<?php
    class Model_tentang extends CI_Model {
        public function index() {
            return $this->db->get('kontak_kami')->result();
        }
        
        public function getdetail($id) {
            return $this->db->get_where("kontak_kami", ['ID' => $id])->result();
        }
        
        public function ubahdata($data = array(), $id) {
            $this->load->database();
            $this->db->where('ID', $id);
            return $this->db->update("kontak_kami", $data);
        }
    }
?>