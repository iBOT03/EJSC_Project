<?php
class EjscModel extends CI_Model {
    //GET DATA
    public function get(){
        $this->load->database();
        return $this->db->get("akun")->result();
    }

    public function tambah($data = array()){
        $this->load->database();
        return $this->db->insert("akun", $data);
    }
}
?>