<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak_Model extends CI_Model {
    protected $kontak_table = 'kontak_kami';

    /*
    * GET Kontak Kami
    *------------------------------
    * @param: {array} Kontak Kami Data
    */
    public function getKontak() {
        return $this->db->get('kontak_kami')->result_array();
    }
}
?>