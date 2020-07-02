<?php 
class Model_alat extends CI_Model {
    public function detail($id){
        $this->load->database();
        $this->db->where('ID_ALAT', $id);
        return $this->db->get("alat")->result();
    }
    //GET ALAT DATA
    public function getalat() {
        $this->load->database();
        return $this->db->get("alat")->result();
    }
    //INSERT ALAT DATA
    public function tambahalat($data = array()) {
        $this->load->database();
        return $this->db->insert("alat", $data);
    }
    //DELETE ALAT DATA
    public function hapusalat($id) {
        $this->load->database();
        $this->db->where('ID_ALAT', $id);
        return $this->db->delete("alat");
    }
    //UPDATE ALAT DATA
    public function ubahalat($data = array(), $id) {
        $this->load->database();
        $this->db->where('ID_ALAT', $id);
        return $this->db->update("alat", $data);
    }
}
?>