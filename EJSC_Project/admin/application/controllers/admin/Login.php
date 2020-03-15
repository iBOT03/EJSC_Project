<?php

class Login extends CI_Controller {
    public function __construct() {
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index() {
		$this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]|max_length[20]');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		
		if($this->form_validation->run() == false){
			$this->load->view("admin/login");			
		} else {
			echo "Sukses";
		}
	}
}

?>