<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Ruangan_Model extends CI_Model {
    protected $ruangan_table = 'ruangan';

    /*
    * GET Ruangan
    *------------------------------
    * @param: {array} Ruangan Data
    */
    public function getRuangan() {
        return $this->db->get('ruangan')->result_array();
    }
}
?>