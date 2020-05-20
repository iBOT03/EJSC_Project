<?php 
 
    class Model_event extends CI_Model{
 
        public function getindex(){
            $this->load->database();
            return $this->db->get('event')->result();
        }
       
        //GET DETAIL EVENT
        public function detail_event($id){
            $this->load->database();
            // $this->db->where('ID_EVENT', $id);
            // return $this->db->get("event")->result_array();
            $query = $this->db->query("SELECT * FROM event , ruangan WHERE event.ID_RUANGAN = ruangan.ID_RUANGAN AND ID_EVENT = '$id'")->result_array();
            return $query;
        }
 
        public function detail($id)
        {
        $this->load->database();
        $this->db->where('ID_EVENT', $id);
        return $this->db->get("event")->result();
        }
        public function hapusdata($id){
            $this->db->where('ID_EVENT' , $id);
            return $this->db->delete('event');
            
        }
        public function detaildalem($id){
            $this->db->where('ID_EVENT' , $id);
            return $this->db->delete('detail_event');
            
        }
        public function ambildata(){
            return $this->db->get('detail_alat')->result();
        }
        public function getruangan(){
            return $this->db->get('ruangan')->result();
        }
        public function getalat(){
            return $this->db->get('alat')->result();
        }
        public function update($data = array() , $id){
            return $this->db->update("event" ,$data, [
                "ID_EVENT" => $id
            ]);
        }
        public function download($id){
            $query = $this->db->get_where('event',['ID_EVENT'=>$id]);
            return $query->row_array();
           }
        public function relasi2($kode){
            $input = $this->input->post('id_event');
            $query = $this->db->query("SELECT * FROM alat, detail_event WHERE alat.ID_ALAT = detail_event.ID_ALAT AND  detail_event.ID_EVENT = '$kode' ")->result();
		    return $query;
        }
        public function relasi($id){
            $query = $this->db->query("SELECT * FROM alat, event, detail_event  WHERE alat.ID_ALAT = detail_event.ID_ALAT AND event.ID_EVENT = detail_event.ID_EVENT  AND event.ID_EVENT = '$id'")->result();
		    return $query;
        }
        public function ambildatakomunitas($id){
            $this->db->select('*');
            $this->db->from('event');
            $this->db->join('ruangan' , 'event.ID_RUANGAN = ruangan.ID_RUANGAN','left');
            $this->db->where(['event.ID_RUANGAN' => $id]);
            return $this->db->get()->result();
        }
        public function cekkodebarang()
        {
            $query = $this->db->query("SELECT MAX(ID_EVENT) as kode from event");
            $hasil = $query->row();
            return $hasil->kode;
        }
        public function buat_kode(){
            $this->db->select('RIGHT(event.ID_EVENT,3) as kode',FALSE);
            $this->db->order_by('ID_EVENT', 'DESC');
            $this->db->limit(1);
 
            $query=$this->db->get('event');
 
            if ($query->num_rows()<>0) {
                $data=$query->row();
                $kode=intval($data->kode)+1;
            }else{
                $kode=1;
            }
            $kode_max=str_pad($kode,3,"0",STR_PAD_LEFT);
            $kode_jadi="E".$kode_max;
            return $kode_jadi;
        }
        public function tambah($data,$table){
            return $this->db->insert($table,$data);
        }
        public function hapus($where,$table){
            $this->db->where($where);
            $this->db->delete($table);
        }
        public function insert($data = array()){
            $this->load->database();
            return $this->db->insert('event' , $data);
        }
        public function ubah_status_setuju($id)
        {
            $this->db->where('ID_EVENT', $id);
            $this->db->update('event', ['STATUS' => '1']);
        }
        
        public function ubah_status_tolak($id)
        {
            $this->db->where('ID_EVENT', $id);
            $this->db->update('event', ['STATUS' => '4']);
        }
    }