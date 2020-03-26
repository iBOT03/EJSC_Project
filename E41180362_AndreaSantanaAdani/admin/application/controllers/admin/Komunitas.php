<?php

class Komunitas extends CI_Controller {
    public function __construct() {
		parent::__construct();
	}

	public function index() {
		$this->load->view("admin/komunitas/komunitas");
	
	}
	public function tambah() {
		$this->load->view("admin/komunitas/tambahkomunitas");
	}

	public function hapus() {
	}

	public function hapuskategori() {
	}

	public function kategori() {
		$this->load->view("admin/komunitas/kategorikomunitas");
	}

	public function ubahdata() {
		$this->load->view("admin/komunitas/editkomunitas");
	}

	public function editkategori() {
		$this->load->view("admin/komunitas/editkategorikomunitas");
	}

	public function tambahkategori() {
		$this->load->view("admin/komunitas/tambahkategorikomunitas");
	}

	public function tambahdata() {
		$this->load->view("admin/komunitas/tambahkomunitas");
	}

	public function detail() {
		$this->load->view("admin/komunitas/detailkomunitas");
	}

	public function anggota() {
		$this->load->view("admin/komunitas/anggotakomunitas");
	}
}
?>