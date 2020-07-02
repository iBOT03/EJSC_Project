<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Event_Model extends CI_Model {
    protected $event_table = 'event';

    /*
    * GET Event
    *------------------------------
    * @param: {array} Detail Event Data
    */
    public function getEvent($id = null) {
        if ($id === null) {
        // return $this->db->get('event')->result_array();
        $query = $this->db->query("SELECT * FROM event ORDER BY TANGGAL_MULAI DESC")->result_array();
        return $query;
        } else {
            return $this->db->get_where('event', ['ID_EVENT' => $id])->result_array();
        }
    }

    /*
    * GET Event Beranda
    *------------------------------
    * @param: {array} Detail Event Data
    */
    public function getEventBeranda($id = null) {
        if ($id === null) {
        $query = $this->db->query("SELECT * FROM event ORDER BY TANGGAL_MULAI DESC LIMIT 5")->result_array();
        return $query;
        } else {
            return $this->db->get_where('event', ['ID_EVENT' => $id], 5)->result_array();
        }
    }
}
?>