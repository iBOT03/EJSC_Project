<?php defined('BASEPATH') OR exit('No direct script access allowed');

use Restserver\Libraries\REST_Controller;

require APPPATH . '/libraries/REST_Controller.php';

class Kontak extends \Restserver\Libraries\Rest_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Kontak_Model', 'KontakModel');
    }

    /**
    * Get Kontak Kami dengan API
    *------------------------------
    * @param: email
    * @param: no_telepon
    * @param: whatsapp
    * @param: facebook
    * @param: instagram
    * @param: alamat
    *------------------------------
    * @method : GET
    * @link : api/kontak/kontak
    */
    // Get Data Kontak Kami
    function index_get() {
        $kontak = $this->KontakModel->getKontak();
        
        if ($kontak) {
            $this->response([
                //Get Data Kontak Kami Success
                'data_kontak' => $kontak,
                'status' => TRUE,
                'message' => "Berhasil Get Data Kontak Kami",
            ],  REST_Controller::HTTP_OK);
        } else {
            //Error Get Data Kontak Kami
            $this->response([
                'status' => FALSE,
                'message' => "Data Tidak Ditemukan"
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
}
?>