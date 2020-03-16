<?php
class EjscModel extends CI_Model {
    public function detail($nik){
        $this->load->database();
        $this->db->where('NIK', $nik);
        return $this->db->get("akun")->result();
    }
    //GET ADMIN DATA
    public function getadmin() {
        $this->load->database();
        return $this->db->get_where("akun", ['level' => 2])->result();
    }
    //INSERT ADMIN DATA
    public function tambahadmin($data = array()) {
        $this->load->database();
        return $this->db->insert("akun", $data);
    }
    //INSERT USER DATA
    public function tambahpengguna($data = array()){
        $this->load->database();
        return $this->db->insert("akun", $data);
    }
    //GET USER DATA
    public function getuser() {
        $this->load->database();
        return $this->db->get_where("akun", ['level' => 3])->result();
    }
    //DELETE ADMIN DATA
    public function hapusadmin($nik) {
        $this->load->database();
        $this->db->where('NIK', $nik);
        return $this->db->delete("akun");
    }
    //DELETE USER DATA
    public function hapususer($nik) {
        $this->load->database();
        $this->db->where('NIK', $nik);
        return $this->db->delete("akun");
    }
    //UPDATE ADMIN DATA
    public function ubahadmin($data = array(), $nik) {
        $this->load->database();
        $this->db->where('NIK', $nik);
        return $this->db->update("akun", $data);
    }
    //UPDATE USER DATA
    public function ubahuser($data = array(), $nik) {
        $this->load->database();
        $this->db->where('NIK', $nik);
        return $this->db->update("akun", $data);
    }
    //GET KATEGORI KOMUNITAS
    public function kategori(){
        $this->load->database();
        return $this->db->get("kategori_komunitas")->result();
    }

    //GET EVENT DATA
    public function getevent() {
        $this->load->database();
        return $this->db->get("event")->result();
    }

    //GET DETAIL EVENT
    public function detail_event($id){
        $this->load->database();
        $this->db->where('ID_EVENT', $id);
        return $this->db->get("event")->result();
    }

}
