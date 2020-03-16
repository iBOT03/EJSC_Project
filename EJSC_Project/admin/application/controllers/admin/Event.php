<?php

class Event extends CI_Controller {
    public function __construct() {
		parent::__construct();
		$this->load->model('EjscModel');
	}

	public function index() {
		$data = array ("event" => $this->EjscModel->getevent());

        $this->load->view("admin/event", $data);
	}

	public function tambahevent(){
		if($this->input->method() == "post") {
			$insert = $this->EjscModel->tambahevent(array(
				"ID_EVENT" => '',
				'JUDUL' => $this->input->post("judulevent"),
				'FOTO' => $this->input->post("posterevent"),
				'PENYELENGGARA' => $this->input->post("penyelenggara"),
				'WAKTU' => $this->input->post("tanggal"),
				'KETERANGAN' => $this->input->post("keterangan"),
				'STATUS' => $this->input->post("status")							
			));
			if($insert){
				$this->session->set_flashdata('Pesan', '<div class="alert alert-success" role="alert">
				Berhasil Menambahkan Event!
			  </div>'); 
			  redirect('admin/event');
				
			} else {
				$this->session->set_flashdata('Pesan', '<div class="alert alert-danger" role="alert">
				Gagal Menambahkan Event!
			  </div>'); 
			  redirect('admin/event');
			}
		}
		$this->load->view("admin/tambahevent");
	}

	public function ubahevent($id) {
		$data["event"] = $this->EjscModel->detail($id);
		$this->load->view("admin/editevent", $data);
		if($this->input->method() == "post") {
			$update = $this->EjscModel->ubahevent(array(
				'JUDUL' => $this->input->post("Judul"),
				'FOTO' => $this->input->post("Poster"),
				'PENYELENGGARA' => $this->input->post("Penyelenggara"),
				'WAKTU' => $this->input->post("Tanggal"),
				'KETERANGAN' => $this->input->post("Keterangan"),
				'STATUS' => $this->input->post("Status"),							
			), $id);
			if($update){
				$this->session->set_flashdata('Pesan', '<div class="alert alert-success" role="alert">
				Berhasil Mengubah Akun!
			  </div>'); 
			  redirect('admin/event');
			}else {
				$this->session->set_flashdata('Pesan', '<div class="alert alert-danger" role="alert">
				Gagal Mengubah Akun!
			  </div>'); 
			  redirect('admin/event');
			}
		}
	}

	public function hapusevent($id) {
        $hapus = $this->EjscModel->hapusevent($id);
        if ($hapus) {
            $this->session->set_flashdata('Pesan', '<div class="alert alert-success" role="alert">
				Berhasil Menghapus Akun!
			  </div>'); 
			  redirect('admin/event');
        } else {
			$this->session->set_flashdata('Pesan', '<div class="alert alert-danger" role="alert">
			Gagal Menghapus Akun!
		  </div>'); 
		  redirect('admin/event');
		}
	}
}


?>