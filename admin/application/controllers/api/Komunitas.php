<?php defined('BASEPATH') OR exit('No direct script access allowed');

use Restserver\Libraries\REST_Controller;

require APPPATH . '/libraries/REST_Controller.php';

class Komunitas extends \Restserver\Libraries\Rest_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('api/Komunitas_Model', 'KomunitasModel');
    }

    /**
    * Get Komunitas dengan API
    *------------------------------
    * @param: id_komunitas
    * @param: logo_komunitas
    * @param: nama_komunitas
    *------------------------------
    * @method : GET
    * @link : api/komunitas/komunitas
    */
    // Get Data Komunitas
    function index_get() {
        $komunitas = $this->KomunitasModel->getKomunitas();
        
        if ($komunitas) {
            $this->response([
                //Get Data Komunitas Success
                'status' => TRUE,
                'message' => "Berhasil Get Data Komunitas",
                'data_komunitas' => $komunitas
            ],  REST_Controller::HTTP_OK);
        } else {
            //Error Get Data Komunitas 
            $this->response([
                'status' => FALSE,
                'message' => "Data Tidak Ditemukan"
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
}
?>