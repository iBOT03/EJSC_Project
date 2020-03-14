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

    public function getuser(){
        $this->load->database();
        return $this->db->get_where("akun", ['level' => 3])->result();
    }

    

}
?>