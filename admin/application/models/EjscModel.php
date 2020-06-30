<?php
class EjscModel extends CI_Model
{
    public function detail($nik)
    {
        $this->load->database();
        $this->db->where('NIK', $nik);
        return $this->db->get("akun")->result();
    }
    //GET ADMIN DATA
    public function getadmin()
    {
        $this->load->database();
        return $this->db->get_where("akun", ['level' => 1])->result();
    }
    //INSERT ADMIN DATA
    public function tambahadmin($data = array())
    {
        $this->load->database();
        return $this->db->insert("akun", $data);
    }
    //INSERT USER DATA
    public function tambahpengguna($data = array())
    {
        $this->load->database();
        return $this->db->insert("akun", $data);
    }
    //GET USER DATA
    public function getuser()
    {
        $this->load->database();
        // $this->db->query("SELECT NAMA FROM komunitas JOIN akun ON akun.KOMUNITAS = komunitas.ID_KOMUNITAS");
        return $this->db->get_where("akun", ['level' => 2])->result();
        // $this->db->select('komunitas.nama, akun.*');
        // $this->db->from('komunitas');
        // $this->db->join('akun','akun.komunitas=komunitas.id_komunitas');
        // $this->db->where('level' == '2');
        // $query = $this->db->get();
        // return $query->result_array();
    }
    //DELETE ADMIN DATA
    public function hapusadmin($nik)
    {
        $this->load->database();
        $this->db->where('NIK', $nik);
        return $this->db->delete("akun");
    }
    //DELETE USER DATA
    public function hapususer($nik)
    {
        $this->load->database();
        $this->db->where('NIK', $nik);
        return $this->db->delete("akun");
    }
    //UPDATE ADMIN DATA
    public function ubahadmin($data = array(), $nik)
    {
        $this->load->database();
        $this->db->where('NIK', $nik);
        return $this->db->update("akun", $data);
    }


    //UPDATE USER DATA
    public function ubahuser($data = array(), $nik)
    {
        $this->load->database();
        $this->db->where('NIK', $nik);
        return $this->db->update("akun", $data);
    }
    public function getdetail($nik){
        // return $this->db->get_where("booking",['ID_BOOKING' => $id] )->result();
        $query = $this->db->query("SELECT * FROM akun, komunitas WHERE akun.ID_KOMUNITAS = komunitas.ID_KOMUNITAS AND akun.NIK = '$nik'")->result();
        return $query;
   }
    public function index()
    {
        $this->load->database();
        // return $this->db->get('booking')->result();
        $query = $this->db->query("SELECT * FROM komunitas , akun WHERE komunitas.ID_KOMUNITAS = akun.ID_KOMUNITAS")->result();
        return $query;
    }

    //GET JENIS KOMUNITAS
    public  function getkomunitas()
    {
        $query = $this->db->get('komunitas');
        return $query->result_array();
    }
    //GET KATEGORI KOMUNITAS
    public function kategori()
    {
        $this->load->database();
        return $this->db->get("kategori_komunitas")->result();
    }
    //GET DATA BOOKING
    public function getBooking()
    {
        // $this->load->database();
        // return $this->db->get("booking")->result();        
        $query = $this->db->query("SELECT * FROM booking 
                 WHERE TANGGAL_MULAI >= '" . $_POST["tanggalMulai"] . "' 
                 AND TANGGAL_MULAI <= '" . $_POST["sampaiDengan"] . "' 
                 ORDER BY TANGGAL_MULAI DESC");
        return $query->result();
    }
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
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $data) {
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
}
