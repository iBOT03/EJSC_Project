<?php

class Administrator extends CI_Controller {
    public function __construct() {
		parent::__construct();
	}

	public function index() {
		$this->load->model("EjscModel");
		$data = array ("akun" => $this->EjscModel->get());

        $this->load->view("admin/administrator", $data);
	}

	public function tambah(){
		$autoReload = base_url();
		if($this->input->method == "post") {
			$insert = $this->EjscModel->tambah(array(
				'LEVEL' => $this->input->post("level"),
				'FOTO_USER' => $this->input->post("foto"),
				'NAMA_LENGKAP' => $this->input->post("nama"),
				'EMAIL' => $this->input->post("email"),
				'NO_TELEPON' => $this->input->post("no_telpon"),
				'ALAMAT' => $this->input->post("alamat"),
				'KOMUNITAS' => $this->input->post("komunitas"),
				'KATEGORI_KOMUNITAS' => $this->input->post("kategori_komunitas"),
				'PASSWORD' => $this->input->post("password")							
			));
			if($insert){
				echo "Berhasil Menambahkan Akun";
				redirect($autoReload);
			} else {
				echo "Gagal Menambahkan Akun";
			}
		}
		$this->load->view("admin/TambahAdministrator");
	}
}

?>