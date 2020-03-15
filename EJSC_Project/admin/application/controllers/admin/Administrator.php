<?php

class Administrator extends CI_Controller {
    public function __construct() {
		parent::__construct();
		$this->load->model("EjscModel");
	}

	public function index() {
		$data = array ("akun" => $this->EjscModel->getadmin());

        $this->load->view("admin/administrator", $data);
	}

	// public function detail($nik)
    // {
    //     $data = array("akun" => $this->EjscModel->detail($nik));
    //     $this->load->view("detailview", $data);
    // }

	public function tambahadministrator() {
		if($this->input->method() == "post") {
			$insert = $this->EjscModel->tambahadmin(array(
				'NIK' => $this->input->post("nik"),
				'LEVEL' => '2',
				'FOTO_USER' => $this->input->post("foto"),
				'NAMA_LENGKAP' => $this->input->post("nama"),
				'EMAIL' => $this->input->post("email"),
				'NO_TELEPON' => $this->input->post("no_telpon"),
				'ALAMAT' => $this->input->post("alamat"),
				'KOMUNITAS' => '',
				'KATEGORI_KOMUNITAS' => '',
				'PASSWORD' => $this->input->post("password")							
			));
			if($insert){
				$this->session->set_flashdata('Pesan', '<div class="alert alert-success" role="alert">
				Berhasil Menambahkan Akun!
			  </div>'); 
			  redirect('admin/administrator');
				
			} else {
				$this->session->set_flashdata('Pesan', '<div class="alert alert-danger" role="alert">
				Gagal Menambahkan Akun!
			  </div>'); 
			  redirect('admin/administrator');
			}
		}
		$this->load->view("admin/tambahadministrator");
	}

	public function hapusadmin($nik) {
        $autoReload = base_url("admin/administrator");
        $hapus = $this->EjscModel->hapusadmin($nik);
        if ($hapus) {
            $this->session->set_flashdata('Pesan', '<div class="alert alert-success" role="alert">
				Berhasil Menghapus Akun!
			  </div>'); 
			  redirect('admin/administrator');
        } else {
			$this->session->set_flashdata('Pesan', '<div class="alert alert-danger" role="alert">
			Gagal Menghapus Akun!
		  </div>'); 
		  redirect('admin/administrator');
		}
	}
	
	public function ubahadmin($nik) {
		$data["akun"] = $this->EjscModel->detail($nik);
		if($this->input->method() == "post") {
			$update = $this->EjscModel->ubahadmin(array(
				'NIK' => $this->input->post("nik"),
				'LEVEL' => '2',
				'FOTO_USER' => $this->input->post("foto"),
				'NAMA_LENGKAP' => $this->input->post("nama"),
				'EMAIL' => $this->input->post("email"),
				'NO_TELEPON' => $this->input->post("no_telpon"),
				'ALAMAT' => $this->input->post("alamat"),
				'KOMUNITAS' => '',
				'KATEGORI_KOMUNITAS' => '',
				'PASSWORD' => $this->input->post("password")							
			), $nik);
			if($update){
				$this->session->set_flashdata('Pesan', '<div class="alert alert-success" role="alert">
				Berhasil Mengubah Akun!
			  </div>'); 
			  redirect('admin/administrator');
			}else {
				$this->session->set_flashdata('Pesan', '<div class="alert alert-danger" role="alert">
				Gagal Mengubah Akun!
			  </div>'); 
			  redirect('admin/administrator');
			}
		}
		$this->load->view("admin/editadministrator", $data);
	}
}
