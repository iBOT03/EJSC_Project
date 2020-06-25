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

    public function forgotpassword()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');

        if ($this->form_validation->run() == false) {
            $this->load->view('admin/forgotpassword');
        } else {
            $data = [
                'email' => htmlspecialchars($this->input->post('email', true))
            ];

            $this->_sendEmail();
        }
    }

    private function _sendEmail()
    {
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_user' => 'ejscjember.dev@gmail.com',
            'smtp_pass' => 'ejsc123#',
            'smtp_port' => 587,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        ];

        $this->load->library('email', $config);
        $this->email->initialize($config);

        $this->email->from('ejscjember.dev@gmail.com', 'Admin EJSC Jember');
        $this->email->to('yudhaoctavian01@gmail.com');
        $this->email->subject('Testing FP');
        $this->email->message('Hello Dev');

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }
}
