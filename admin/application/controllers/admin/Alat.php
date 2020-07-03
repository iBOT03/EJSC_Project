<?php

class Alat extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("model_alat");
		$this->load->library('form_validation');
		belumlogin();
	}

	public function index()
	{
		$data['alat'] = $this->model_alat->getalat();
		$this->load->view("admin/alat/alat", $data);
	}

	public function tambah()
	{
		$this->form_validation->set_rules('jumlah', 'Jumlah', 'required|trim|numeric');
		$this->form_validation->set_rules('nama', 'Nama Alat', 'required|trim');
		if ($this->form_validation->run() == false) {
			$this->load->view("admin/alat/tambahalat");
		} else {
			if ($this->input->method() == "post") {
				$insert = $this->model_alat->tambahalat(array(
					'ID_ALAT' => '',
					'NAMA_ALAT' => $this->input->post("nama"),
					'JUMLAH_ALAT' => $this->input->post("jumlah")
				));
				if ($insert) {
					$this->session->set_flashdata('Pesan', '<div class="alert alert-success" role="alert">
			Berhasil Menambahkan Alat!
		  </div>');
					redirect('admin/alat');
				} else {
					$this->session->set_flashdata('Pesan', '<div class="alert alert-danger" role="alert">
			Gagal Menambahkan Alat!
		  </div>');
					redirect('admin/alat');
				}
			}
			$this->load->view("admin/alat/tambahalat");
		}
	}

	public function hapus($id)
	{
		$hapus = $this->model_alat->hapusalat($id);
		if ($hapus) {
			$this->session->set_flashdata('Pesan', '<div class="alert alert-success" role="alert">
				Berhasil Menghapus Alat!
			  </div>');
			redirect('admin/alat');
		} else {
			$this->session->set_flashdata('Pesan', '<div class="alert alert-danger" role="alert">
			Gagal Menghapus Alat!
		  </div>');
			redirect('admin/alat');
		}
	}

	public function edit($id)
	{
		$data["alat"] = $this->model_alat->detail($id);
		$this->form_validation->set_rules('nama', 'Nama Alat', 'required|trim');
		$this->form_validation->set_rules('jumlah', 'Jumlah', 'required|trim|numeric');
		if ($this->form_validation->run() == false) {
			$this->load->view("admin/alat/editalat", $data);
		} else {
			if ($this->input->method() == "post") {
				$update = $this->model_alat->ubahalat(array(
					'NAMA_ALAT' => $this->input->post("nama"),
					'JUMLAH_ALAT' => $this->input->post("jumlah")
				), $id);
				if ($update) {
					$this->session->set_flashdata('Pesan', '<div class="alert alert-success" role="alert">
				Berhasil Mengubah Alat!
			  </div>');
					redirect('admin/alat');
				} else {
					$this->session->set_flashdata('Pesan', '<div class="alert alert-danger" role="alert">
				Gagal Mengubah Alat!
			  </div>');
					redirect('admin/alat');
				}
			}			
		}
	}
}