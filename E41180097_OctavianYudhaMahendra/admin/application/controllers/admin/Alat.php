<?php

class Alat extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index() {
		$this->load->view("admin/alat/alat", $data);
	}

	public function tambah() {
		$this->load->view("admin/alat/tambahalat");
	}

	public function hapus() {
	}

	public function edit() {
		$this->load->view("admin/alat/editalat");
	}
}