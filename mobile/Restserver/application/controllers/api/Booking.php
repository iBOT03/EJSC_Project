<?php defined('BASEPATH') OR exit('No direct script access allowed');

use Restserver\Libraries\REST_Controller;

require APPPATH . '/libraries/REST_Controller.php';

class Booking extends \Restserver\Libraries\Rest_Controller {

    public function __construct() {
        parent::__construct();
    }

    /**
     * Tambah Booking
     * ------------------------------
     * @method: POST
     */
    public function tambahBooking_post() {
        header("Access-Control-Allow-Origin: *");

        // Load Authorization Library
        $this->load->library('Authorization_Token');

        /**
         * User Token Validation
         */
        $is_valid_token = $this->authorization_token->validateToken();
        if (!empty($is_valid_token) AND $is_valid_token['status'] === TRUE) {
            
            // Tambah Booking Baru

            # XSS Filtering
            $_POST = $this->security->xss_clean($_POST);
        
            # Form Validation
            //$this->form_validation->set_rules('nik', 'NIK', 'trim|required|max_length[16]');
            $this->form_validation->set_rules('nama', 'Nama', 'trim|required|max_length[150]');
            $this->form_validation->set_rules('nomor_telepon', 'No Telepon', 'trim|required|max_length[13]');
            $this->form_validation->set_rules('id_komunitas', 'ID Komunitas', 'trim|required|max_length[200]');
            $this->form_validation->set_rules('id_ruangan', 'ID Ruangan', 'trim|required|max_length[50]');
            $this->form_validation->set_rules('jumlah_orang', 'Jumlah Orang', 'trim|required|max_length[3]');
            $this->form_validation->set_rules('deskripsi_kegiatan', 'Deskripsi Kegiatan', 'trim|required');
            $this->form_validation->set_rules('tujuan', 'Tujuan', 'trim|required');
            $this->form_validation->set_rules('tanggal_mulai', 'Tanggal Mulai', 'trim|required');
            $this->form_validation->set_rules('durasi', 'Durasi', 'trim|required');
            $this->form_validation->set_rules('jam_mulai', 'Jam Mulai', 'trim|required');
            $this->form_validation->set_rules('jam_selesai', 'Jam Selesai', 'trim|required');
            $this->form_validation->set_rules('status', 'Status', 'trim|required|max_length[1]');
            if ($this->form_validation->run() == FALSE) {
                // Form Validation
                $message = array(
                    'status' => false,
                    'error' => $this->form_validation->error_array(),
                    'message' => validation_errors()
                );
                $this->response($message, REST_Controller::HTTP_NOT_FOUND);
            } else {
                // Load Booking Model
                $this->load->model('booking_model', 'BookingModel');

                $insert_data = [
                    'NIK' => $is_valid_token['data']->id,
                    'NAMA' => $this->input->post('nama', TRUE),
                    'NOMOR_TELEPON' => $this->input->post('nomor_telepon', TRUE),
                    'ID_KOMUNITAS' => $this->input->post('id_komunitas', TRUE),
                    'ID_RUANGAN' => $this->input->post('id_ruangan', TRUE),
                    'JUMLAH_ORANG' => $this->input->post('jumlah_orang', TRUE),
                    'DESKRIPSI_KEGIATAN' => $this->input->post('deskripsi_kegiatan', TRUE),
                    'TUJUAN' => $this->input->post('tujuan', TRUE),
                    'TANGGAL_MULAI' => $this->input->post('tanggal_mulai', TRUE),
                    'DURASI' => $this->input->post('durasi', TRUE),
                    'JAM_MULAI' => $this->input->post('jam_mulai', TRUE),
                    'JAM_SELESAI' => $this->input->post('jam_selesai', TRUE),
                    'STATUS' => $this->input->post('status', TRUE)
                ];

                // Insert Booking
                $output = $this->BookingModel->tambah_booking($insert_data);

                if($output == !empty($output)) {
                    // Success
                    $message = [
                        'status' => TRUE,
                        'message' => "Proses Booking Berhasil"
                    ];
                    $this->response($message, REST_Controller::HTTP_OK);
                } else {
                    //Error
                    $message = [
                        'status' => FALSE,
                        'message' => "Proses Booking Gagal"
                    ];
                    $this->response($message, REST_Controller::HTTP_NOT_FOUND);
                }
            }
        } else {
            $this->response(['status' => FALSE, 'message' => $is_valid_token['message'] ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    /**
     * Delete Booking
     * ------------------------------
     * @method: DELETE
     */
    public function deleteBooking_delete($id) {
        header("Access-Control-Allow-Origin: *");

        // Load Authorization Library
        $this->load->library('Authorization_Token');

        /**
         * User Token Validation
         */
        $is_valid_token = $this->authorization_token->validateToken();
        if (!empty($is_valid_token) AND $is_valid_token['status'] === TRUE) {
            
            // Delete Booking

            # XSS Filtering
            $id = $this->security->xss_clean($id);
        
            if (empty($id) AND !is_numeric($id)) {
                $this->response(['status' => FALSE, 'message' => 'Invalid Booking ID'], REST_Controller::HTTP_NOT_FOUND);
            } else {
                // Load Booking Model
                $this->load->model('booking_model', 'BookingModel');

                $delete_booking = [
                    'id_booking' => $id,
                    'nik' => $is_valid_token['data']->id,
                ];

                // Delete Booking
                $output = $this->BookingModel->delete_booking($delete_booking);

                if($output > 0 AND !empty($output)) {
                    // Success
                    $message = [
                        'status' => TRUE,
                        'message' => "Delete Booking Berhasil"
                    ];
                    $this->response($message, REST_Controller::HTTP_OK);
                } else {
                    //Error
                    $message = [
                        'status' => FALSE,
                        'message' => "Delete Booking Gagal"
                    ];
                    $this->response($message, REST_Controller::HTTP_NOT_FOUND);
                }
            }
        } else {
            $this->response(['status' => FALSE, 'message' => $is_valid_token['message'] ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    /**
     * Update Booking
     * ------------------------------
     * @method: PUT
     */
    public function updateBooking_put() {
        header("Access-Control-Allow-Origin: *");

        // Load Authorization Library
        $this->load->library('Authorization_Token');

        /**
         * User Token Validation
         */
        $is_valid_token = $this->authorization_token->validateToken();
        if (!empty($is_valid_token) AND $is_valid_token['status'] === TRUE) {
            
            // Update Booking Baru

            # XSS Filtering
            $_POST = json_decode($this->security->xss_clean(file_get_contents("php://input")), TRUE);

            $this->form_validation->set_data([
                'ID_BOOKING' => $this->input->post('id_booking', TRUE),
                'NAMA' => $this->input->post('nama', TRUE),
                'NOMOR_TELEPON' => $this->input->post('nomor_telepon', TRUE),
                'ID_KOMUNITAS' => $this->input->post('id_komunitas', TRUE),
                'ID_RUANGAN' => $this->input->post('id_ruangan', TRUE),
                'JUMLAH_ORANG' => $this->input->post('jumlah_orang', TRUE),
                'DESKRIPSI_KEGIATAN' => $this->input->post('deskripsi_kegiatan', TRUE),
                'TUJUAN' => $this->input->post('tujuan', TRUE),
                'TANGGAL_MULAI' => $this->input->post('tanggal_mulai', TRUE),
                'DURASI' => $this->input->post('durasi', TRUE),
                'JAM_MULAI' => $this->input->post('jam_mulai', TRUE),
                'JAM_SELESAI' => $this->input->post('jam_selesai', TRUE),
                'STATUS' => $this->input->post('status', TRUE),
            ]);
        
            # Form Validation
            $this->form_validation->set_rules('id_booking', 'ID Booking', 'trim|required|numeric');
            $this->form_validation->set_rules('nama', 'Nama', 'trim|required|max_length[150]');
            $this->form_validation->set_rules('nomor_telepon', 'No Telepon', 'trim|required|max_length[13]');
            $this->form_validation->set_rules('id_komunitas', 'ID Komunitas', 'trim|required|max_length[200]');
            $this->form_validation->set_rules('id_ruangan', 'ID Ruangan', 'trim|required|max_length[50]');
            $this->form_validation->set_rules('jumlah_orang', 'Jumlah Orang', 'trim|required|max_length[3]');
            $this->form_validation->set_rules('deskripsi_kegiatan', 'Deskripsi Kegiatan', 'trim|required');
            $this->form_validation->set_rules('tujuan', 'Tujuan', 'trim|required');
            $this->form_validation->set_rules('tanggal_mulai', 'Tanggal Mulai', 'trim|required');
            $this->form_validation->set_rules('durasi', 'Durasi', 'trim|required');
            $this->form_validation->set_rules('jam_mulai', 'Jam Mulai', 'trim|required');
            $this->form_validation->set_rules('jam_selesai', 'Jam Selesai', 'trim|required');
            $this->form_validation->set_rules('status', 'Status', 'trim|required|max_length[1]');
            if ($this->form_validation->run() == FALSE) {
                // Form Validation
                $message = array(
                    'status' => false,
                    'error' => $this->form_validation->error_array(),
                    'message' => validation_errors()
                );
                $this->response($message, REST_Controller::HTTP_NOT_FOUND);
            } else {
                // Load Booking Model
                $this->load->model('booking_model', 'BookingModel');

                $update_data = [
                    'NIK' => $is_valid_token['data']->id,
                    'ID_BOOKING' => $this->input->post('id_booking', TRUE),
                    'NAMA' => $this->input->post('nama', TRUE),
                    'NOMOR_TELEPON' => $this->input->post('nomor_telepon', TRUE),
                    'ID_KOMUNITAS' => $this->input->post('id_komunitas', TRUE),
                    'ID_RUANGAN' => $this->input->post('id_ruangan', TRUE),
                    'JUMLAH_ORANG' => $this->input->post('jumlah_orang', TRUE),
                    'DESKRIPSI_KEGIATAN' => $this->input->post('deskripsi_kegiatan', TRUE),
                    'TUJUAN' => $this->input->post('tujuan', TRUE),
                    'TANGGAL_MULAI' => $this->input->post('tanggal_mulai', TRUE),
                    'DURASI' => $this->input->post('durasi', TRUE),
                    'JAM_MULAI' => $this->input->post('jam_mulai', TRUE),
                    'JAM_SELESAI' => $this->input->post('jam_selesai', TRUE),
                    'STATUS' => $this->input->post('status', TRUE)
                ];

                // Update Booking
                $output = $this->BookingModel->update_booking($update_data);

                if($output == !empty($output)) {
                    // Success
                    $message = [
                        'status' => TRUE,
                        'message' => "Update Data Booking Berhasil"
                    ];
                    $this->response($message, REST_Controller::HTTP_OK);
                } else {
                    //Error
                    $message = [
                        'status' => FALSE,
                        'message' => "Update Data Booking Gagal"
                    ];
                    $this->response($message, REST_Controller::HTTP_NOT_FOUND);
                }
            }
        } else {
            $this->response(['status' => FALSE, 'message' => $is_valid_token['message'] ], REST_Controller::HTTP_NOT_FOUND);
        }
    }
}
?>