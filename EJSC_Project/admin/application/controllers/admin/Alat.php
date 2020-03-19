<?php

class Alat extends CI_Controller {
    public function __construct() {
		parent::__construct();
	}

	public function index() {
        $this->load->view("admin/alat/alat");
	}

	public function edit() {
        $this->load->view("admin/alat/editalat");
	}

	public function tambah() {
        $this->load->view("admin/alat/tambahalat");
	}
}

?>