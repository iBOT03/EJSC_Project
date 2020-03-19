<?php

class Komunitas extends CI_Controller {
    public function __construct() {
		parent::__construct();
	}

	public function index() {
        $this->load->view("admin/komunitas/komunitas");
	}

	public function edit() {
        $this->load->view("admin/komunitas/editkomunitas");
	}

	public function tambah() {
        $this->load->view("admin/komunitas/tambahkomunitas");
	}

	public function detail($id){
		$this->load->view("admin/komunitas/detailkomunitas");
	}

	public function kategori(){
		$this->load->view("admin/komunitas/kategorikomunitas");
	}

	public function editkategori(){
		$this->load->view("admin/komunitas/editkategorikomunitas");
	}

	public function tambahkategori(){
		$this->load->view("admin/komunitas/tambahkategorikomunitas");
	}
}

?>