<?php
class UserModel extends CI_Model {
    public function get(){
        $this->load->database(); //memanggil database
        //select data, menggunakan query
        $query = $this->db->query('select*from pegawai');
        return $query->result(); //untuk menampilkan hasil
    }
}
?>