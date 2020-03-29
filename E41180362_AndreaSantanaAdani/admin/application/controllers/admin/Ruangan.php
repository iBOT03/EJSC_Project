<?php

class Ruangan extends CI_Controller {
    public function __construct() {
		parent::__construct();
		belumlogin();
	}

	public function index() {
        $this->load->view("admin/ruangan/ruangan");
	}

	public function edit() {
		$this->load->view("admin/ruangan/editruangan");
	}
	
	public function hapus(){
	}

	public function tambah(){
		$this->load->view("admin/ruangan/tambahruangan");
	}
}
?>