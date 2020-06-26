<?php defined('BASEPATH') or exit('No direct script access allowed');

use Restserver\Libraries\REST_Controller;

require APPPATH . '/libraries/REST_Controller.php';

class Lupapassword extends \Restserver\Libraries\Rest_Controller
{
    function lupa_post()
    {
        $email = $this->input->post('email');
        if ($email) {
            $cek = $this->db->get_where('akun', ['email' => $email])->row_array();
            if ($cek) {
                $cektoken = $this->db->get_where('token', ['email' => $email, 'tipe' => 'lupapassword']);

                //menyiapkan token
                $token = base64_encode(random_bytes(32));
                $data = [
                    'email' => $email,
                    'token' => $token,
                    'tipe'  => 'lupapassword',
                    'waktu' => time()
                ];
                if ($cektoken == null) {
                    $this->db->insert('token', $data);

                    //kirim email
                    $this->kirim($token, 'lupapassword');

                    //respon API
                    $result['success'] = 1;
                    $result['message'] = 'Silahkan cek email anda';
                    echo json_encode($result);
                } else {
                    //menghapus token yang sudah ada sebelumnya
                    $this->db->delete('token', ['email' => $email]);

                    //insert token ke db
                    $this->db->insert('token', $data);

                    //kirim email
                    $this->kirim($token, 'lupapassword');

                    //respon API
                    $result['success'] = 1;
                    $result['message'] = 'Silahkan cek email anda untuk mereset password.';
                    echo json_encode($result);
                }
            } else {
                $result['success'] = 0;
                $result['message'] = 'Email belum terdaftar';
                echo json_encode($result);
            }
        } else {
            $result['success'] = 0;
            $result['message'] = 'Key dan value wajib di isi';
            echo json_encode($result);
        }
    }

    function kirim($token, $type) {
        $config = [
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'ejcsjember.dev@gmail.com',
            'smtp_pass' => 'ejsc123#',
            'smtp_port' => 465,
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'newline'   => "\r\n"
        ];

        $this->load->library('email', $config);
        $this->email->initialize($config);

        $this->email->from('ejcsjember.dev@gmail.com', 'Admin EJSC Jember');
        $this->email->to($this->input->post('email'));
        if ($type == 'lupapassword') {
            $this->email->subject('Reset Password');
            $this->email->message('Reset password anda
            <a href="' . base_url() . 'admin/forgotpassword?email=' . $this->input->post('email') . '&token=' .urlencode($token) . '">disini</a>');
        }

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
        }
    }
}
