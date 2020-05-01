<?php defined('BASEPATH') OR exit('No direct script access allowed');

use Restserver\Libraries\REST_Controller;

require APPPATH . '/libraries/REST_Controller.php';

class DetailEvent extends \Restserver\Libraries\Rest_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Event_Model', 'EventModel');
    }

    /**
    * Get Event dengan API
    *------------------------------
    * @param: id_event
    * @param: judul
    * @param: foto
    * @param: penyelenggara
    * @param: no_telepon
    * @param: nama_pengisi_acara
    * @param: tanggal_mulai
    * @param: tanggal_selesai
    * @param: waktu
    * @param: id_ruangan
    * @param: asal_peserta
    * @param: jumlah_peserta
    * @param: keterangan
    * @param: status
    *------------------------------
    * @method : GET
    * @link : api/event/detail
    */
    // Get Detail Event
    function detail_get() {
        $id_event = $this->get('ID_EVENT');
        if ($id_event === null) {
            $event = $this->db->get('event')->result();

            // Error Get Data Event
            $message = [
                'status' => FALSE,
                'message' => "Gagal Get Data Detail Event"
            ];
            $this->response($message, REST_Controller::HTTP_NOT_FOUND);
        } else {
            $this->db->where('ID_EVENT', $id_event);
            $event = $this->db->get('event')->result();
        }
        // Get Data Event Success
        $message = [
            'status' => TRUE,
            'datadetailevent' => $event,
            'message' => "Berhasil Get Data Detail Event"
        ];
        $this->response($message, REST_Controller::HTTP_OK);
    }
}
?>