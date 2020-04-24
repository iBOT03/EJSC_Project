<?php 

    class Model_komunitas extends CI_Model{
        public function index(){
            $this->load->database();
            return $this->db->get("komunitas")->result();
        }
        public  function jeniskomunitas(){
            $query = $this->db->get('kategori_komunitas');
            return $query->result_array();
        }
        public function insert($data = array()){
            $this->load->database();
            return $this->db->insert("komunitas",$data);
        }
        public function data_anggota($id){
            $query = $this->db->query("SELECT * FROM komunitas , akun WHERE komunitas.ID_KOMUNITAS = akun.ID_KOMUNITAS AND komunitas.ID_KOMUNITAS = '$id'")->result();
            return $query;
        }
        public function updatedata($data = array() , $id){
            $this->load->database();
            return $this->db->update("komunitas",$data , ["ID_KOMUNITAS"=>$id]);
        }
        public function relasi($id){
            $this->db->select('*');
            $this->db->from('komunitas');
            $this->db->join('kategori_komunitas' , 'komunitas.ID_KATEGORI = kategori_komunitas.ID_KATEGORI','left');
            $this->db->where(['komunitas.ID_KOMUNITAS' => $id]);
            return $this->db->get()->result();
        }
        public function getdetail($id){
             return $this->db->get_where("komunitas",['ID_KOMUNITAS' => $id] )->result();
        }
         public function getdetailkat($id){
            return $this->db->get_where("kategori_komunitas", ['ID_KATEGORI' => $id])->result();
        }
       public function update($data= array(),$id){
            $this->load->database();
            return $this->db->update("kategori_komunitas",$data , ["ID_KATEGORI"=>$id]);
         }
       public function hapus($id){
           $this->db->where('ID_KOMUNITAS' , $id);
           return $this->db->delete('komunitas');
       }
       public function hapuskategori($id){
        $this->db->where('ID_KATEGORI' , $id);
        return $this->db->delete('kategori_komunitas');
    }
       public function list(){
           $this->load->database();
           return $this->db->get("kategori_komunitas")->result();
       }
       public function insertkategori($data = array()){
           $this->load->database();
           return $this->db->insert("kategori_komunitas" , $data);
       }
       
        public function getanggota() {
            $this->load->database();
            return $this->db->get_where("akun", ['komunitas' => 1])->result();
        }
    }
    ?>