<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Akun_Model extends CI_Model {
    protected $akun_table = 'akun';

    /*
    * Registrasi Akun
    *------------------------------
    * @param: {array} Akun Data
    */
    public function insert_akun(array $data) {
        $this->db->insert($this->akun_table, $data);
        return $this->db->insert_id();
    }

    /*
    * Login Akun
    *------------------------------
    * @param: email
    * @param: password
    */
    public function akun_login($email, $password) {
        $this->db->where('EMAIL', $email);
        $q = $this->db->get($this->akun_table);

        if($q->num_rows()) {
            $akun_pass = $q->row('PASSWORD');
            if(md5($password) === $akun_pass) {
                return $q->row();
            }
            return FALSE;
        } else {
            return FALSE;
        }
    }

    /*
    * Update Akun
    *------------------------------
    * @param: {array} Booking Data
    */
    public function update_akun(array $data) {
        // Cek Akun Exists dengan NIK
        $query = $this->db->get_where($this->akun_table, [
            'NIK' => $data['nik'],
            'LEVEL' => $data['level'],
            'FOTO_KTP' => $data['foto_ktp'],
            'NAMA_LENGKAP' => $data['nama_lengkap'],
            'EMAIL' => $data['email'],
            'NO_TELEPON' => $data['no_telepon'],
            'ALAMAT' => $data['alamat'],
            'ID_KOMUNITAS' => $data['id_komunitas'],
            'PASSWORD' => $data['password'],
            ]);
            if ($this->db->affected_rows() > 0) {
                // Update Akun
                $update_data = [
                    'NIK' => $data['nik'],
                    'LEVEL' => $data['level'],
                    'FOTO_KTP' => $data['foto_ktp'],
                    'NAMA_LENGKAP' => $data['nama_lengkap'],
                    'EMAIL' => $data['email'],
                    'NO_TELEPON' => $data['no_telepon'],
                    'ALAMAT' => $data['alamat'],
                    'ID_KOMUNITAS' => $data['id_komunitas'],
                    'PASSWORD' => $data['password'],
            ];
            return $this->db->update($this->akun_table, $update_data, ['nik' => $query->row('NIK')]);
        }
        return false;
    }
}
?>