<?php defined('BASEPATH') OR exit('No direct script access allowed');

use Restserver\Libraries\REST_Controller;

require APPPATH . '/libraries/REST_Controller.php';

class Event extends \Restserver\Libraries\Rest_Controller {

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
    * @link : api/event/event
    */
    // Get Data Event
    function index_get() {
        header("Access-Control-Allow-Origin: *");

        // Load Authorization Library
//        $this->load->library('Authorization_Token');

        /**
         * User Token Validation
         */
        $id = $this->get('ID_EVENT');
//        $is_valid_token = $this->authorization_token->validateToken();
//        if (!empty($is_valid_token) AND $is_valid_token['status'] === TRUE) {
            
            // GET Data Event
            if ($id === null) {
                $event = $this->EventModel->getEvent();
            } else {
                $event = $this->EventModel->getEvent($id);
            }
            
            if ($event) {
                $this->response([
                    //Get Data Event Success
                    'data_event' => $event,
                    'status' => TRUE,
                    'message' => "Berhasil Get Data Event",
                ],  REST_Controller::HTTP_OK);
            } else {
                //Error Get Data Event
                $this->response([
                    'status' => FALSE,
                    'message' => "ID Tidak Ditemukan"
                ], REST_Controller::HTTP_NOT_FOUND);
            }
//        } else {
//            $this->response(['status' => FALSE, 'message' => $is_valid_token['message'] ], REST_Controller::HTTP_NOT_FOUND);
//        }
    }
}
?>