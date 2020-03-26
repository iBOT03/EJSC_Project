<?php

class Pengguna extends CI_Controller {
    public function __construct() {
		parent::__construct();
	}

	public function index() {
        $this->load->view("admin/pengguna/pengguna");
	}

	public function tambah(){
		$this->load->view("admin/pengguna/tambahpengguna");
	}
	
	public function edit() {
		$this->load->view("admin/pengguna/editpengguna");
	}

	public function hapus() {
	}
}