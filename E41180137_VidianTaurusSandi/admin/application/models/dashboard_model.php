<?php
class dashboard_model extends CI_Model
{
//GET TOTAL PENGGUNA
    public function pengguna()
    {
        $query = $this->db->get_where("akun", ['level' => 2]);
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
    //GET TOTAL BOKING
    public function boking()
    {
        $query = $this->db->get("booking");
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
    public function grafik()
    {
        $this->load->database();
        $query = $this->db->query("SELECT DATE_FORMAT(TANGGAL_MULAI, '%M') AS Month, COUNT(*) FROM booking GROUP BY DATE_FORMAT(TANGGAL_MULAI, '%M') ORDER BY TANGGAL_MULAI ASC");
        if($query->num_rows()>0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
        }
        return $hasil;
    }
    //GET TOTAL EVENT
    public function event()
    {
        $query = $this->db->get("event");
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
    //GET TOTAL KOMUNITAS
    public function totkomunitas()
    {
        $query = $this->db->get("komunitas");
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
//GET DATA BOOKING
public function getBooking()
{
    $this->load->database();
    return $this->db->get("booking")->result();
}
}