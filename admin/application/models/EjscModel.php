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
        return $this->db->get_where("akun", ['level' => 2])->result();
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
    public  function jeniskomunitas()
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

    //GET EVENT DATA
    public function getevent()
    {
        $this->load->database();
        return $this->db->get("event")->result();
    }

    //GET DETAIL EVENT
    public function detail_event($id)
    {
        $this->load->database();
        $this->db->where('ID_EVENT', $id);
        return $this->db->get("event")->result();
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