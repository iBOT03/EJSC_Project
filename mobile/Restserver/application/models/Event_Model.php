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
        return $this->db->get('event')->result_array();
        } else {
            return $this->db->get_where('event', ['ID_EVENT' => $id])->result_array();
        }
    }

    /*
    * Detail Event
    *------------------------------
    * @param: {array} Detail Event Data
    */
    // public function getDetailEvent($id = null) {
    //     if ($id === null) {
    //         return $this->db->get('event')->result_array();
    //     } else {
    //         return $this->db->get_where('event', ['ID_EVENT' => $id])->result_array();
    //     }
    // }
}
?>