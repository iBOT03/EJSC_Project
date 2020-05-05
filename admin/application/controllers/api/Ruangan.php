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
        $ruangan = $this->RuanganModel->getRuangan();
        
        if ($ruangan) {
            $this->response([
                //Get Data Ruangan Success
                'data_ruangan' => $ruangan,
                'status' => TRUE,
                'message' => "Berhasil Get Data Ruangan",
            ],  REST_Controller::HTTP_OK);
        } else {
            //Error Get Data Ruangan 
            $this->response([
                'status' => FALSE,
                'message' => "Data Tidak Ditemukan"
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
}
?>