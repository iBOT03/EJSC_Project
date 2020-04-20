<?php

class Booking extends CI_Controller {
    public function __construct() {
		parent::__construct();
		$this->load->model('EjscModel');
	}

	public function index() {
		$data = array ("booking" => $this->EjscModel->getbooking());

        $this->load->view("admin/booking/booking", $data);
	}

	public function tambah(){
		if($this->input->method() == "post") {
			$insert = $this->EjscModel->tambahbooking(array(
				"ID_BOOKING" => '',
				'NAMA' => $this->input->post("nama"),
				'NOMOR_TELEPON' => $this->input->post("nomortelepon"),
				'KOMUNITAS' => $this->input->post("komunitas"),
				'RUANGAN' => $this->input->post("ruangan"),
				'JUMLAH_ORANG' => $this->input->post("jumlahorang"),
				'TEMA_KEGIATAN' => $this->input->post("temakegiatan"),
				'DURASI' => $this->input->post("durasi"),
				'TANGGAL' => $this->input->post("tanggal"),							
				'TANGGAL_KEMBALI' => $this->input->post("tanggalkembali"),
				'PEMINJAMAN_ALAT' => $this->input->post("peminjamanalat"),
				'JUMLAH_PEMINJAMAN_ALAT' => $this->input->post("jumlahpeminjamanalat"),
				'SURAT_PENGAJUAN' => $this->input->post("suratpengajuan"),
				'STATUS' => $this->input->post("status")
			));
			if($insert){
				$this->session->set_flashdata('Pesan', '<div class="alert alert-success" role="alert">
				Berhasil Menambahkan Booking!
			  </div>'); 
			  redirect('admin/booking/booking');
				
			} else {
				$this->session->set_flashdata('Pesan', '<div class="alert alert-danger" role="alert">
				Gagal Menambahkan Booking!
			  </div>'); 
			  redirect('admin/booking/booking');
			}
		}
		$this->load->view("admin/booking/tambahbooking");
	}

	public function edit($id) {
		$data["booking"] = $this->EjscModel->detail($id);
		$this->load->view("admin/booking/editbooking", $data);
		if($this->input->method() == "post") {
			$update = $this->EjscModel->ubahbooking(array(
				'NAMA' => $this->input->post("nama"),
				'NOMOR_TELEPON' => $this->input->post("nomortelepon"),
				'KOMUNITAS' => $this->input->post("komunitas"),
				'RUANGAN' => $this->input->post("ruangan"),
				'JUMLAH_ORANG' => $this->input->post("jumlahorang"),
				'TEMA_KEGIATAN' => $this->input->post("temakegiatan"),
				'DURASI' => $this->input->post("durasi"),
				'TANGGAL' => $this->input->post("tanggal"),							
				'TANGGAL_KEMBALI' => $this->input->post("tanggalkembali"),
				'PEMINJAMAN_ALAT' => $this->input->post("peminjamanalat"),
				'JUMLAH_PEMINJAMAN_ALAT' => $this->input->post("jumlahpeminjamanalat"),
				'SURAT_PENGAJUAN' => $this->input->post("suratpengajuan"),
				'STATUS' => $this->input->post("status")							
			), $id);
			if($update){
				$this->session->set_flashdata('Pesan', '<div class="alert alert-success" role="alert">
				Berhasil Mengubah booking!
			  </div>'); 
			  redirect('admin/booking/editbooking');
			}else {
				$this->session->set_flashdata('Pesan', '<div class="alert alert-danger" role="alert">
				Gagal Mengubah Akun!
			  </div>'); 
			  redirect('admin/booking/editbooking');
			}
		}
	}

	public function detail() {
		$this->load->view("admin/booking/detailbooking");
	}

	public function hapus($id) {
        $hapus = $this->EjscModel->hapusbooking($id);
        if ($hapus) {
            $this->session->set_flashdata('Pesan', '<div class="alert alert-success" role="alert">
				Berhasil Menghapus Akun!
			  </div>'); 
			  redirect('admin/booking/booking');
        } else {
			$this->session->set_flashdata('Pesan', '<div class="alert alert-danger" role="alert">
			Gagal Menghapus Akun!
		  </div>'); 
		  redirect('admin/booking/booking');
		}
	}
}


?>