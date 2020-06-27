<?php defined('BASEPATH') OR exit('No direct script access allowed');

use Restserver\Libraries\REST_Controller;

require APPPATH . '/libraries/REST_Controller.php';

class Ruangan extends \Restserver\Libraries\Rest_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('api/Ruangan_Model', 'RuanganModel');
    }

    /**
    * Get Ruangan dengan API
    *------------------------------
    * @param: id_ruangan
    * @param: foto_ruangan
    * @param: nama_ruangan
    * @param: kapasitas
    *------------------------------
    * @method : GET
    * @link : api/ruangan/ruangan
    */
    // Get Data Ruangan
    function index_get() {
        header("Access-Control-Allow-Origin: *");

        // Load Authorization Library
//        $this->load->library('Authorization_Token');

        /**
         * User Token Validation
         */
        $id = $this->get('ID_RUANGAN');
//        $is_valid_token = $this->authorization_token->validateToken();
//        if (!empty($is_valid_token) AND $is_valid_token['status'] === TRUE) {
            
            // GET Data Ruang
            if ($id === null) {
                $ruangan = $this->RuanganModel->getRuangan();
            } else {
                $ruangan = $this->RuanganModel->getRuangan($id);
            }
            
            if ($ruangan) {
                $this->response([
                    //Get Data Ruangan Success
                    'status' => TRUE,
                    'message' => "Berhasil Get Data Ruangan",
                    'data_ruangan' => $ruangan
                ],  REST_Controller::HTTP_OK);
            } else {
                //Error Get Data Ruangan
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