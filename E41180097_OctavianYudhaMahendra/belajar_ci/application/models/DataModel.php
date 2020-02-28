<?php
    class DataModel extends CI_Model { //extends CI_Model
        public function hapus($id) {
            $this->load->database();
            $this->db->where('id', $id); //where id nya bila sesuai
            return $this->db->delete('pegawai'); //hapus data


        // public function ubah($data = array(), $id) {
        //     $this->load->database();
        //     $this->db->where('id', $id); //where id nya bila sesuai
        //     return $this->db->update('pegawai', $data); //update data


        // public function get() {
        //     $this->load->database(); //memanggil database
        //     //select data
        //     $this->db->select("*");
        //     //memberikan basis data yg diambil berdasarkan  where
        //     $this->db->where("id", 1);
        //     //ambil data tabel pegawai
        //     $query = $this->db->get('pegawai');
        //     return $query->result(); //untuk menampilkan hasil


            // $this->load->database(); //memanggil database
            // //select data
            // $this->db->select("*");
            // //memberikan basis data yg diambil berdasarkan group
            // $this->db->group_by("alamat");
            // //ambil data tabel pegawai
            // $query = $this->db->get('pegawai');
            // return $query->result(); //untuk menampilkan hasil


            // $this->load->database(); //memanggil database
            // //select data
            // $this->db->select("*");
            // //memberikan basis data yg diambil
            // $this->db->limit(1,0);
            // //ambil data tabel pegawai
            // $query = $this->db->get('pegawai');
            // return $query->result(); //untuk menampilkan hasil


            // $this->load->database(); //memanggil database
            // //select data
            // $this->db->select("*");
            // //diurutkan berdasarkan descending
            // $this->db->order_by("id", "DESC");
            // //ambil data tabel pegawai
            // $query = $this->db->get('pegawai');
            // return $query->result(); //untuk menampilkan hasil


            // $this->load->database(); //memanggil database
            // //select data menggunakan query
            // $query = $this->db->query("SELECT*FROM pegawai");
            // return $query->result();


            // $this->load->database(); //memanggil database
            // //select data, apabila semua data ditulis *
            // $this->db->select("*");
            // //ambil data tabel pegawai
            // $query = $this->result(); //untuk menampilkan hasil


        // public function getData() {
        //     $Data = array(
        //         'nama' => 'Yudha',
        //         'status' => 'Mahasiswa',
        //         'website' => 'bimatech.co.id'
        //     );
        //     return $Data;
        }
    }
?>