<?php

    class Model_ruangan extends CI_Model{
        public function index(){
            $this->load->database();
            return $this->db->get("ruangan")->result();
        }
        public function hapusdata($id){
            $this->db->where('ID_RUANGAN',$id);
            return $this->db->delete('ruangan');
        }
        public function insertdata($data = array()){
            $this->load->database();
            return $this->db->insert("ruangan" , $data);
        }
        public function ubahdata($data = array() , $id){
            $this->load->database();
            $this->db->where('ID_RUANGAN' , $id);
            return $this->db->update("ruangan", $data);
        }
        public function detail($id){
            $this->load->database();
            $this->db->where('ID_RUANGAN', $id);
            return $this->db->get("ruangan")->result();
        }
    }
    ?>