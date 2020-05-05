<?php 

    class Model_booking extends CI_Model
    {
        public function index(){
            $this->load->database();
            // return $this->db->get('booking')->result();
            $query = $this->db->query("SELECT * FROM komunitas , booking WHERE komunitas.ID_KOMUNITAS = booking.ID_KOMUNITAS")->result();
            return $query;
        }
        public function getselesai(){
            $query = $this->db->get('booking');
            return $query->result_array();
        }
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
        public function hapusdata($where,$table){
            $this->db->where($where);
            $this->db->delete($table);
        }
        // public function hapusdata($id){
        //     $this->db->where('ID_BOOKING' , $id);
        //     return $this->db->delete('booking');
        // }
        // public function hapusdata($id){
        //     $this->db->where('ID_BOOKING' , $id);
        //     return $this->db->delete('booking');
        // }
        public function getdetail($id){
            // return $this->db->get_where("booking",['ID_BOOKING' => $id] )->result();
            $query = $this->db->query("SELECT * FROM booking , komunitas , ruangan WHERE booking.ID_KOMUNITAS = komunitas.ID_KOMUNITAS AND booking.ID_RUANGAN = ruangan.ID_RUANGAN AND ID_BOOKING = '$id'")->result();
            return $query;
       }
       public function updatedata($data = array() , $id){
           return $this->db->update("booking" , $data ,["ID_BOOKING" => $id]);
       }
       
    }
    

?>