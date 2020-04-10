<?php

class Tentang extends CI_Controller {
    public function __construct() {
		parent::__construct();
		belumlogin();
	}

	public function index() {
        $this->load->view("admin/tentang");
	}
	

	public function ubah() {
		$this->load->view("admin/ubahtentang");
	}	
}
?>