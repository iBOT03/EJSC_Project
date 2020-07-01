<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Ruangan_Model extends CI_Model {
    protected $ruangan_table = 'ruangan';

    /*
    * GET Ruangan
    *------------------------------
    * @param: {array} Detail Ruangan Data
    */
    public function getRuangan($id = null) {
        if ($id === null) {
        return $this->db->get('ruangan')->result_array();
        } else {
            return 
        }$this->db->get_where('ruangan', ['ID_RUANGAN' => $id])->result_array();
    }
}
?>