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
}
?>