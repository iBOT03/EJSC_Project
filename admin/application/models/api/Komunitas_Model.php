<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Komunitas_Model extends CI_Model {
    protected $komunitas_table = 'komunitas';

    /*
    * GET Komunitas
    *------------------------------
    * @param: {array} Komunitas Data
    */
    public function getKomunitas($id = null) {
        if ($id === null) {
        return $this->db->get('komunitas')->result_array();
        } else {
            return $this->db->get_where('komunitas', ['ID_KOMUNITAS' => $id])->result_array();
        }
    }
}
?>