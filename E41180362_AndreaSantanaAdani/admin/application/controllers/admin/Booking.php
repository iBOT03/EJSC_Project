<?php

class Booking extends CI_Controller {
    public function __construct() {
		parent::__construct();
		belumlogin();
	}

	public function index() {
        $this->load->view("admin/booking/booking");
	}

	public function detail() {
        $this->load->view("admin/booking/detailbooking");
	}

	public function edit() {
        $this->load->view("admin/booking/editbooking");
	}

	public function tambah() {
        $this->load->view("admin/booking/tambahbooking");
	}
}

?>