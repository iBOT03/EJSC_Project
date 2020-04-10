<?php
class EjscModel extends CI_Model {
    // public function detail($nik){
    //     $this->load->database();
    //     $this->db->where('NIK', $nik);
    //     return $this->db->get("akun")->result();
    // }
    // //GET ADMIN DATA
    // public function getadmin() {
    //     $this->load->database();
    //     return $this->db->get_where("akun", ['level' => 1])->result();
    // }
    // //INSERT ADMIN DATA
    // public function tambahadmin($data = array()) {
    //     $this->load->database();
    //     return $this->db->insert("akun", $data);
    // }
    // //INSERT USER DATA
    // public function tambahpengguna($data = array()){
    //     $this->load->database();
    //     return $this->db->insert("akun", $data);
    // }
    // //GET USER DATA
    // public function getuser() {
    //     $this->load->database();
    //     return $this->db->get_where("akun", ['level' => 2])->result();
    // }
    // //DELETE ADMIN DATA
    // public function hapusadmin($nik) {
    //     $this->load->database();
    //     $this->db->where('NIK', $nik);
    //     return $this->db->delete("akun");
    // }
    // //DELETE USER DATA
    // public function hapususer($nik) {
    //     $this->load->database();
    //     $this->db->where('NIK', $nik);
    //     return $this->db->delete("akun");
    // }
    // //UPDATE ADMIN DATA
    // public function ubahadmin($data = array(), $nik) {
    //     $this->load->database();
    //     $this->db->where('NIK', $nik);
    //     return $this->db->update("akun", $data);
    // }
    // //UPDATE USER DATA
    // public function ubahuser($data = array(), $nik) {
    //     $this->load->database();
    //     $this->db->where('NIK', $nik);
    //     return $this->db->update("akun", $data);
    // }
    // //GET KATEGORI KOMUNITAS
    // public function kategori(){
    //     $this->load->database();
    //     return $this->db->get("kategori_komunitas")->result();
    // }

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

    //INSERT DATA EVENT
    public function tambahevent($id = array()){
        $this->load->database();
        return $this->db->insert("event", $id);
    }

    //UPDATE USER EVENT
    public function ubahevent($data = array(), $id) {
        $this->load->database();
        $this->db->where('ID_EVENT', $id);
        return $this->db->update("event", $data);
    }

    // HAPUS DATA EVENT
    public function hapusevent($id){
        $this->db->where('ID_EVENT' , $id);
        return $this->db->delete('event');
    }

    //GET DETAIL BOOKING
    public function detail_booking($id){
        $this->load->database();
        $this->db->where('ID_BOOKING', $id);
        return $this->db->get("booking")->result();
    }

    //INSERT DATA BOOKING
    public function tambahbooking($id = array()){
        $this->load->database();
        return $this->db->insert("booking", $id);
    }

    public function getbooking() {
        $this->load->database();
        return $this->db->get("booking")->result();
    }

    public function index() {
		$data["booking"] = $this->booking->index();
		$data["ruangan"] = $this->booking->getruangan();
		// $data["komunitas"] = $this->model_booking->relasi();
        $this->load->view("admin/booking/booking" , $data);
	}
 
	// public function getdataruangan($id){
	// 	$data["booking"] = $this->booking->index();
	// 	$data["ruangan"] = $this->booking->getruangan();
    //     $this->load->view("admin/booking/booking" , $data);
    // }
    
    // public function index(){
    //     $this->load->database();
    //     return $this->db->get('booking')->result();
    // }
    
    public function getkomunitas(){
        $query = $this->db->get('komunitas');
        return $query->result_array();
    }

    public function getruangan(){
        $query = $this->db->get('ruangan');
        return $query->result_array();
    }

    public function insert($data = array()){
        $this->load->database();
        return $this->db->insert("booking" , $data);
    }

    public function dataruang($id){
        return $this->db->get_where("komunitas",['ID_RUANGAN' => $id] )->result();

    }
    public function hapusdata($id){
        $this->db->where('ID_BOOKING' , $id);
        return $this->db->delete('booking');
    }

    public function getdetail($id){
        return $this->db->get_where("booking",['ID_BOOKING' => $id] )->result();
    }

}
