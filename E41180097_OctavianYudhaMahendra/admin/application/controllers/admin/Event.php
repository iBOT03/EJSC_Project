<?php

class Event extends CI_Controller {
    public function __construct() {
		parent::__construct();
	}

	public function index() {
        $this->load->view("admin/acara/event");
	}

	public function tambah() {
		$this->load->view("admin/acara/tambahevent");
	}

	public function edit() {
		$this->load->view("admin/acara/editevent");
	}

	public function detail() {
		$this->load->view("admin/acara/detailevent");
	}

	public function hapus() {
	}
}
?>