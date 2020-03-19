<?php

class Seminar extends CI_Controller {
    public function __construct() {
		parent::__construct();
	}

	public function index() {
        $this->load->view("admin/seminar/seminar");
	}

	public function edit() {
        $this->load->view("admin/seminar/editseminar");
	}

	public function tambah() {
        $this->load->view("admin/seminar/tambahseminar");
	}
}

?>