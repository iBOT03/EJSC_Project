<?php defined('BASEPATH') OR exit('No direct script access allowed');

use Restserver\Libraries\REST_Controller;

require APPPATH . '/libraries/REST_Controller.php';

class Akun extends \Restserver\Libraries\Rest_Controller {

    public function __construct() {
        parent::__construct();
        // Load Akun Model
        $this->load->model('api/Akun_Model', 'AkunModel');
    }
    
    /**
    * Register Akun
    *------------------------------
    * @param: nik
    * @param: nama_lengkap
    * @param: email
    * @param: id_komunitas
    * @param: no_telepon
    * @param: alamat
    * @param: foto_ktp
    * @param: password
    *------------------------------
    * @method : POST
    * @link : api/akun/register
    */
    public function register_post(){
        header("Access-Control-Allow-Origin: *");
        
        # XSS Filtering
        $_POST = $this->security->xss_clean($_POST);
        
        # Form Validation
        $this->form_validation->set_rules('nik', 'NIK', 'trim|required|max_length[16]|is_unique[akun.NIK]',
            array('is_unique' => '%s Telah Terdaftar')
        );
        $this->form_validation->set_rules('level', 'Level', 'trim|required|max_length[1]');
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'trim|required|max_length[150]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|max_length[100]|is_unique[akun.EMAIL]',
            array('is_unique' => '%s Telah Terdaftar')
        );
        $this->form_validation->set_rules('id_komunitas', 'ID Komunitas', 'trim|required');
        $this->form_validation->set_rules('no_telepon', 'No Telepon', 'trim|required|max_length[13]');
        $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
        // $this->form_validation->set_rules('foto_ktp', 'Foto KTP', 'trim|required');
        if (empty($_FILES['foto_ktp']['name'])) {
            $this->form_validation->set_rules('foto_ktp', 'Foto KTP', 'required');
        }
        $this->form_validation->set_rules('password', 'Password', 'trim|required|max_length[16]');
        if ($this->form_validation->run() == FALSE) {
            // Form Validation
            $message = array(
                'status' => false,
                'message' => validation_errors(),
                'error' => $this->form_validation->error_array()
            );
            $this->response($message, REST_Controller::HTTP_NOT_FOUND);
        } else {
            $insert_data = [
                'NIK' => $this->input->post('nik', TRUE),
                'LEVEL' => $this->input->post('level', TRUE),
                'NAMA_LENGKAP' => $this->input->post('nama_lengkap', TRUE),
                'EMAIL' => $this->input->post('email', TRUE),
                'ID_KOMUNITAS' => $this->input->post('id_komunitas', TRUE),
                'NO_TELEPON' => $this->input->post('no_telepon', TRUE),
                'ALAMAT' => $this->input->post('alamat', TRUE),
                'FOTO_KTP' => $this->input->post('foto_ktp', TRUE),
                'PASSWORD' => md5($this->input->post('password', TRUE))
            ];

            // $nik = $this->input->post('nik');
            // $level = $this->input->post('level');
            // $nama_lengkap = $this->input->post('nama_lengkap');
            // $email = $this->input->post('email');
            // $id_komunitas = $this->input->post('id_komunitas');
            // $no_telepon = $this->input->post('no_telepon');
            // $alamat = $this->input->post('alamat');
            // $password = md5($this->input->post('password'));

            // $foto_ktp = $_FILES['foto_ktp']['name'];
            // $config['allowed_types'] = 'jpg|png|gif|jpeg';
            // $config['max_size'] = '5000';
            // $config['upload_path'] = '././uploads/';
        
            // $this->load->library('upload', $config);

            // if ($this->upload->do_upload('foto_ktp')) {
            //     $insert_data = [
            //         'nik' => $nik,
            //         'level' => $level,
            //         'nama_lengkap' => $nama_lengkap,
            //         'email' => $email,
            //         'id_komunitas' => $id_komunitas,
            //         'no_telepon' => $no_telepon,
            //         'alamat' => $alamat,
            //         'password' => $password,
            //         'foto_ktp' => $foto_ktp
            //     ];
                // Memasukkan Data Akun ke Database
                $output = $this->AkunModel->insert_akun($insert_data);
                if($output == !empty($output)) {
                    // Success 200 Code Send
                    $message = [
                        'status' => TRUE,
                        'message' => "Registrasi Akun Berhasil"
                    ];
                    $this->response($message, REST_Controller::HTTP_OK);
                } else {
                    //Error
                    $message = [
                        'status' => FALSE,
                        'message' => "Registrasi Akun Gagal"
                    ];
                    $this->response($message, REST_Controller::HTTP_NOT_FOUND);
                }
            // }
        }
    }

    /**
    * Login Akun
    *------------------------------
    * @param: email
    * @param: password
    *------------------------------
    * @method : POST
    * @link : api/akun/login
    */
    public function login_post() {
        header("Access-Control-Allow-Origin: *");
        
        # XSS Filtering
        $_POST = $this->security->xss_clean($_POST);
        
        # Form Validation
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required|max_length[16]');
        if ($this->form_validation->run() == FALSE) {
            // Form Validation
            $message = array(
                'status' => false,
                'message' => validation_errors(),
                'error' => $this->form_validation->error_array()
            );
            $this->response($message, REST_Controller::HTTP_NOT_FOUND);
        } else {
            // Load Login Function
            $output = $this->AkunModel->akun_login($this->input->post('email'), $this->input->post('password'));
            if(!empty($output) AND $output != FALSE) {

                // Load Authorization Token Library
                $this->load->library('Authorization_Token');

                // Generate Token
                $token_data['id'] = $output->NIK;
                $token_data['level'] = $output->LEVEL;
                $token_data['foto_ktp'] = $output->FOTO_KTP;
                $token_data['nama_lengkap'] = $output->NAMA_LENGKAP;
                $token_data['email'] = $output->EMAIL;
                $token_data['no_telepon'] = $output->NO_TELEPON;
                $token_data['alamat'] = $output->ALAMAT;
                $token_data['id_komunitas'] = $output->NIK;
                $token_data['password'] = $output->ID_KOMUNITAS;
                $token_data['time'] = time();

                $akun_token = $this->authorization_token->generateToken($token_data);

                $return_data = [
                    'nik' => $output->NIK,
                    'level' => $output->LEVEL,
                    'foto_ktp' => $output->FOTO_KTP,
                    'nama_lengkap' => $output->NAMA_LENGKAP,
                    'email' => $output->EMAIL,
                    'no_telepon' => $output->NO_TELEPON,
                    'alamat' => $output->ALAMAT,
                    'id_komunitas' => $output->ID_KOMUNITAS,
                    'password' => $output->PASSWORD,
                    'token' => $akun_token
                ];

                // Login Success
                $message = [
                    'status' => TRUE,
                    'message' => "Selamat Datang di EJSC BAKORWIL V Jember",
                    'data' => [$return_data]
                ];
                $this->response($message, REST_Controller::HTTP_OK);
            } else {
                // LoginError
                $message = [
                    'status' => FALSE,
                    'message' => "Email atau Password Salah"
                ];
                $this->response($message, REST_Controller::HTTP_NOT_FOUND);
            }
        }
    }

     /**
     * Update Akun
     * @method: PUT
     * 
     */
    public function updateAkun_put(){
        header("Access-Control-Allow-Origin: *");

        // Load Authorization Library
        $this->load->library('Authorization_Token');

                // Load Akun Model
                $this->load->model('api/akun_model', 'AkunModel');
                $id = $this->put('NIK');
                $update_data = array(
                    'NIK' => $this->put('NIK'),
                    'LEVEL' => $this->put('LEVEL'),
                    'FOTO_KTP' => $this->put('FOTO_KTP'),
                    'NAMA_LENGKAP' => $this->put('NAMA_LENGKAP'),
                    'EMAIL' => $this->put('EMAIL'),
                    'NO_TELEPON' => $this->put('NO_TELEPON'),
                    'ALAMAT' => $this->put('ALAMAT'),
                    'ID_KOMUNITAS' => $this->put('ID_KOMUNITAS'),
                    'PASSWORD' => md5($this->put('PASSWORD'))
                     );

                // Update Akun
                $this->db->where('NIK', $id);
                $output = $this->db->update('akun', $update_data);

                if($output == !empty($output)) {
                    // Success
                    $message = [
                        'status' => TRUE,
                        'message' => "Update Akun Berhasil"
                    ];
                    $this->response($message, REST_Controller::HTTP_OK);
                } else {
                    //Error
                    $message = [
                        'status' => FALSE,
                        'message' => "Update Akun Gagal"
                    ];
                    $this->response($message, REST_Controller::HTTP_NOT_FOUND);
                }
           
    }

    /**
    * Logout Akun
    *------------------------------
    * @method : POST
    * @link : api/akun/logout
    */
    public function logout_post() {
        // Delete all session
        session_destroy();
        if (session_destroy()) {
            // Logout success
            $message = [
                'status' => TRUE,
                'message' => "Berhasil Logout"
            ];
            $this->response($message, REST_Controller::HTTP_OK);
        } else {
            // Logout Error
                $message = [
                    'status' => FALSE,
                    'message' => "Gagal Logout"
                ];
                $this->response($message, REST_Controller::HTTP_NOT_FOUND);
        }
        
    }
}
