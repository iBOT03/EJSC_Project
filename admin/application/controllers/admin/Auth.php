<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->view('admin/login');
    }


    public function _sendEmail($token, $type)
    {
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'ejscjember.dev@gmail.com',
            'smtp_pass' => 'ejsc123#',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n",
        ];

        $this->load->library('email', $config);
        $this->email->initialize($config);

        $this->email->from('ejscjember.dev@gmail.com', 'Admin EJSC Jember');
        $this->email->to($this->input->post('email')); //ditujukann
        if ($type == 'forgot') {
            $this->email->subject('Forgot Password');
            $this->email->message('Click this link to reset your password : <a href="' . base_url() . 'admin/auth/resetPassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');
        }
        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function forgotpassword()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/forgotpassword');
        } else {
            $email = $this->input->post('email');
            $user = $this->db->get_where('akun', ['EMAIL' => $email])->row_array();

            if ($user) {
                $token = base64_encode(random_bytes(32));

                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => time()
                ];

                $this->db->insert('token', $user_token);
                $this->_sendEmail($token, 'forgot');

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Link reset kata sandi telah terkirim, mohon cek email Anda!
                </div>');
                redirect('admin/auth/forgotpassword');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Email Anda belum terdaftar
                </div>');
                redirect('admin/auth/forgotpassword');
            }
        }
    }

    public function resetPassword()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('akun', ['EMAIL' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('token', ['token' => $token])->row_array();

            if ($user_token) {

                $this->session->set_userdata('reset_email', $email);
                $this->changePassword();
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    Reset Password Failed ! Wrong Token
                    </div>');
                //note :routing ngasal sekan , jane melbu ng login
                redirect('admin/login');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Reset Password Failed ! Wrong Email
                </div>');
            redirect('admin/login');
        }
    }

    public function changePassword()
    {
        if (!$this->session->userdata('reset_email')) {
            redirect('Auth');
        }
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Kata sandi sarus sama!',
            'min_length' => 'Kata sandi terlalu pendek'
        ]);
        $this->form_validation->set_rules('password2', 'Repeat Password', 'required|trim|matches[password1]');
        if ($this->form_validation->run() == false) {
            $this->load->view('admin/resetPassword');
        } else {
            $password = md5($this->input->post('password1'));
            $email = $this->session->userdata('reset_email');

            $this->db->set('PASSWORD', $password);
            $this->db->where('EMAIL', $email);
            $this->db->update('akun');

            $this->session->unset_userdata('reset_email');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Berhasil mengubah kata sandi!
                </div>');
            redirect('admin/login');
        }
    }
}
