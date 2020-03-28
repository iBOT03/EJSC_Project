<?php

class Login extends CI_Controller {
    public function __construct() {
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index() {
		$this->form_validation->set_rules('password', 'Password', 'required|trim');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		
		if($this->form_validation->run() == false){
			$this->load->view("admin/login");			
		} else {
			$this->_login();
		}
	}
	
	private function _login(){
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$user = $this->db->get_where('akun', ['email' => $email]) ->row_array();
		if($user){
			if($user['LEVEL'] == 1){
				if($password == $user['PASSWORD']){
					$data = [
						'NAMA_LENGKAP' => $user['NAMA_LENGKAP']
	
					];
	
					$this->session->set_userdata($data);
					redirect('admin/Dashboard');
				} else {
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Password Salah!</div>');
			redirect('admin/login');
				}
			} else {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Halaman Ini Khusus Admin!</div>');
			redirect('admin/login');
			}
		} else {			
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Email belum terdaftar!</div>');
			redirect('admin/login');
		}
	}

	public function logout(){
		$this->session->unset_userdata('NAMA_LENGKAP');
		redirect('admin/login');
	}
}