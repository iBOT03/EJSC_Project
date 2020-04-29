<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Event_Model extends CI_Model {
    protected $event_table = 'event';

    /*
    * Registrasi Akun
    *------------------------------
    * @param: {array} Akun Data
    */
    public function detail_event($id) {
        $query = $this->db->SELECT('*')->FROM('event')->where('ID_EVENT',$id)->get();
        return $query->result();
    }
}