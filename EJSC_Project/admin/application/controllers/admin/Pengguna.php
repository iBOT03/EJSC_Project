<?php

class Pengguna extends CI_Controller {
    public function __construct() {
		parent::__construct();
		$this->load->model('EjscModel');
	}

	public function index() {
		$data = array ("akun" => $this->EjscModel->getuser());

        $this->load->view("admin/pengguna/pengguna", $data);
	}

	public function tambah(){
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|max_length[16]|matches[password2]');
		$this->form_validation->set_rules('password2', 'Kofirmasi Password', 'required|trim|matches[password1]');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[akun.EMAIL]');
		$this->form_validation->set_rules('nik', 'NIK', 'required|trim|max_length[16]|is_unique[akun.NIK]');
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim|max_length[100]');
		$this->form_validation->set_rules('no_telpon', 'No Telepon ', 'required|trim|max_length[13]|numeric');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
		$kategori['KATEGORI'] = $this->EjscModel->kategori();
		if($this->input->method() == "post") {
			$insert = $this->EjscModel->tambahpengguna(array(
				'NIK' => $this->input->post("nik"),
				'LEVEL' => '3',
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
				$this->session->set_flashdata('Pesan', '<div class="alert alert-success" role="alert">
				Berhasil Menambahkan Akun!
			  </div>'); 
			  redirect('admin/pengguna/pengguna');
				
			} else {
				$this->session->set_flashdata('Pesan', '<div class="alert alert-danger" role="alert">
				Gagal Menambahkan Akun!
			  </div>'); 
			  redirect('admin/pengguna/pengguna');
			}
		}
		$this->load->view("admin/pengguna/tambahpengguna", $kategori);
	}

	public function edit($nik) {
		$data["akun"] = $this->EjscModel->detail($nik);
		$this->load->view("admin/pengguna/editpengguna", $data);
		if($this->input->method() == "post") {
			$update = $this->EjscModel->ubahuser(array(
				'NIK' => $this->input->post("nik"),
				'LEVEL' => '3',
				'FOTO_USER' => $this->input->post("foto"),
				'NAMA_LENGKAP' => $this->input->post("nama"),
				'EMAIL' => $this->input->post("email"),
				'NO_TELEPON' => $this->input->post("no_telpon"),
				'ALAMAT' => $this->input->post("alamat"),
				'KOMUNITAS' => $this->input->post("komunitas"),
				'KATEGORI_KOMUNITAS' => $this->input->post("kategori_komunitas"),
				'PASSWORD' => $this->input->post("password")							
			), $nik);
			if($update){
				$this->session->set_flashdata('Pesan', '<div class="alert alert-success" role="alert">
				Berhasil Mengubah Akun!
			  </div>'); 
			  redirect('admin/pengguna/pengguna');
			}else {
				$this->session->set_flashdata('Pesan', '<div class="alert alert-danger" role="alert">
				Gagal Mengubah Akun!
			  </div>'); 
			  redirect('admin/pengguna/pengguna');
			}
		}
	}

	public function hapus($nik) {
        $hapus = $this->EjscModel->hapususer($nik);
        if ($hapus) {
            $this->session->set_flashdata('Pesan', '<div class="alert alert-success" role="alert">
				Berhasil Menghapus Akun!
			  </div>'); 
			  redirect('admin/pengguna/pengguna');
        } else {
			$this->session->set_flashdata('Pesan', '<div class="alert alert-danger" role="alert">
			Gagal Menghapus Akun!
		  </div>'); 
		  redirect('admin/pengguna/pengguna');
		}
	}
}

?>