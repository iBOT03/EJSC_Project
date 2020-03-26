<?php

class Administrator extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index() {
		$this->load->view("admin/administrator/administrator", $data);
	}

	public function tambah() {
		$this->load->view("admin/administrator/tambahadministrator");
	}


	public function hapus() {
	}

	public function edit() {
		$this->load->view("admin/administrator/editadministrator");
	}
}