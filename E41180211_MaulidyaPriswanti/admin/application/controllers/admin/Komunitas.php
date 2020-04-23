<?php

class Komunitas extends CI_Controller {
    public function __construct() {
		parent::__construct();
		$this->load->model('model_komunitas');
		//belumlogin();
	}

	public function index() {
		$data['komunitas'] = $this->model_komunitas->index();
		$this->load->view("admin/komunitas/komunitas" , $data);
	
	}
	public function tambah() {
		$data['komunitas'] = $this->model_komunitas->index();
		$this->load->view("admin/komunitas/tambahkomunitas" , $data);
	
	}
	public function tambahdataku(){
		$this->form_validation->set_rules('nama_komunitas', 'Nama Komunitas', 'required');
		$this->form_validation->set_rules('email_komunitas', 'Email Komunitas', 'required|valid_email|is_unique[komunitas.EMAIL]|trim');
		$this->form_validation->set_rules('ketua_komunitas', 'Ketua Komunitas', 'required');
		$this->form_validation->set_rules('kategori_komunitas', 'Kategori Komunitas', 'required');
		$this->form_validation->set_rules('alamat_komunitas', 'Alamat Komunitas', 'required');
		$this->form_validation->set_rules('deskripsi_komunitas', 'Deskripsi Komunitas', 'required');
		$this->form_validation->set_rules('no_komunitas', 'No Komunitas', 'required');
		// $this->form_validation->set_rules('foto', 'Foto Komunitas', 'required');

		
		if ($this->form_validation->run() == false) { //jika data tidak lolos == isi full
			$kategori['komunitas'] = $this->model_komunitas->jeniskomunitas();
			$this->load->view("admin/komunitas/tambahkomunitas",$kategori);
		} else {
			$foto = $_FILES['foto']['name'];

			$config['allowed_types'] = 'jpg|png|gif|jpeg';
			$config['max_size'] = '2048';
			$config['upload_path'] = './uploads';
	
			$this->load->library('upload' , $config);
	
			if ($this->upload->do_upload('foto')) {
				$dataPost = array(
					'NAMA_KOMUNITAS' => $this->input->post('nama_komunitas'),
					'EMAIL' => $this->input->post('email_komunitas'),
					'NAMA_KETUA' => $this->input->post('ketua_komunitas'),
					'ID_KATEGORI' => $this->input->post('kategori_komunitas'),
					'ALAMAT' => $this->input->post('alamat_komunitas'),
					'DESKRIPSI_KOMUNITAS' => $this->input->post('deskripsi_komunitas'),
					'NO_TELEPON' => $this->input->post('no_komunitas'),
					'TWITTER' => $this->input->post('twitter_komunitas'),
					'FACEBOOK' => $this->input->post('facebook_komunitas'),
					'INSTAGRAM' => $this->input->post('ig_komunitas'),
					'LOGO' => $foto 
					
				);
				if ($this->model_komunitas->insert($dataPost)) {
					$this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">
					Data Berhasil Ditambahkan
					</div>');
					redirect('admin/komunitas');
				}else{
					$this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">GAGAL</div>');
					redirect('admin/komunitas');
				}					
			}
			else{
				$this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">'
					. $this->upload->display_errors() .
					'</div>');
					redirect('admin/komunitas');
			}
		}
	}

	public function hapus($id){
		$hapus = $this->model_komunitas->hapus($id);
		if($hapus){
			$this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">
						Data Berhasil Dihapus
			</div>');
			redirect('admin/komunitas');
		} else {
			$this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">
						Data Gagal Dihapus
			</div>');
			redirect('admin/komunitas');
		}
	}
	public function hapuskategori($id){
		$hapus = $this->model_komunitas->hapuskategori($id);
		if($hapus){
			$this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">
						Data Berhasil Dihapus
			</div>');
			redirect('admin/komunitas/kategori');
		} else {
			$this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">
						Data Gagal Dihapus
			</div>');
			redirect('admin/komunitas/kategori');
		}
	}
	public function kategori(){
		$data['kategori_komunitas'] = $this->model_komunitas->list();
		$this->load->view("admin/komunitas/kategorikomunitas" , $data);
	}


	public function ubahdata($id){
		$this->form_validation->set_rules('nama_komunitas', 'Nama Komunitas', 'required');
		$this->form_validation->set_rules('email_komunitas', 'Email Komunitas', 'required|valid_email|trim');
		$this->form_validation->set_rules('ketua_komunitas', 'Ketua Komunitas', 'required');
		$this->form_validation->set_rules('kategori_komunitas', 'Kategori Komunitas', 'required');
		$this->form_validation->set_rules('alamat_komunitas', 'Alamat Komunitas', 'required');
		$this->form_validation->set_rules('deskripsi_komunitas', 'Deskripsi Komunitas', 'required');
		$this->form_validation->set_rules('no_komunitas', 'No Komunitas', 'required');
		$kategori['jeniskomunitas'] = $this->model_komunitas->jeniskomunitas();
		$kategori['komunitas'] = $this->model_komunitas->relasi($id);
		$kategori['data'] = $this->model_komunitas->getdetail($id);
		if($this->form_validation->run() == false){
			$this->load->view("admin/komunitas/editkomunitas" ,$kategori);
		}else{
			$update = $this->model_komunitas->updatedata(array(
			'NAMA_KOMUNITAS' => $this->input->post('nama_komunitas'),
			'EMAIL' => $this->input->post('email_komunitas'),
				'NAMA_KETUA' => $this->input->post('ketua_komunitas'),
				'ID_KATEGORI' => $this->input->post('kategori_komunitas'),
				'ALAMAT' => $this->input->post('alamat_komunitas'),
				'DESKRIPSI_KOMUNITAS' => $this->input->post('deskripsi_komunitas'),
				'NO_TELEPON' => $this->input->post('no_komunitas'),
				'TWITTER' => $this->input->post('twitter_komunitas'),
				'FACEBOOK' => $this->input->post('facebook_komunitas'),
				'INSTAGRAM' => $this->input->post('ig_komunitas'),
			), $id);

		if($update){
			$ubahfoto = $_FILES['foto']['name'];

			if ($ubahfoto) {
				$config['allowed_types'] = 'jpg|png|gif';
				$config['max_size'] = '2048';
				$config['upload_path'] = './uploads/';

				$this->load->library('upload', $config);

				if ($this->upload->do_upload('foto')) {
					$user = $this->db->get_where('KOMUNITAS', ['ID_KOMUNITAS'=>$id])->row_array();
					$fotolama = $user['LOGO'];
					if ($fotolama) {
						unlink(FCPATH . '/uploads/' . $fotolama);
					}
					$fotobaru = $this->upload->data('file_name');
					$this->db->set('LOGO', $fotobaru);
					$this->db->where('ID_KOMUNITAS', $id);
					$this->db->update('komunitas');
				} else {
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">'
					. $this->upload->display_errors() .
					'</div>');
					redirect('user/editprofile');
				}
			}
			$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
			Berhasil Mengubah Data!
			</div>');
			redirect('admin/komunitas');
		}else{
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
			Gagal Mengubah Data!
			</div>');
			redirect('admin/komunitas');
		}		
	}
}

	public function editkategori($id){
		
		$data ['kat'] = $this->model_komunitas->getdetailkat($id);
		
		$this->form_validation->set_rules('namaalat' , 'Kategori Komunitas' , 'required');
		if($this->form_validation->run() == false){
			$this->load->view("admin/komunitas/editkategorikomunitas" ,$data);
		} else {
			$update = $this->model_komunitas->update(array(
				'KATEGORI' => $this->input->post('namaalat')
			),$id);
			if($update){
				$this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">
			Data Berhasil Diubah
		  </div>');
		  redirect('admin/komunitas/kategori');
			} else {
				$this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">
			Data Gagal Di Ubah
		  </div>');
		  redirect('admin/komunitas/kategori');
			}
	
		}
	
	}
	public function tambahkategori(){
		$this->form_validation->set_rules('kategori', 'Kategori Komunitas', 'required');
		if ($this->form_validation->run() == false) { //jika data tidak lolos == isi full
			$this->load->view("admin/komunitas/tambahkategorikomunitas");
		} else {
			$datainsert = array(
			'KATEGORI' => $this->input->post('kategori')
			);

			if ($this->model_komunitas->insertkategori($datainsert)) {
			$this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">
			Data Berhasil Ditambahkan
		  	</div>');
		  	redirect('admin/komunitas/kategori');
			}else{
				$this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">GAGAL</div>');
			redirect('admin/komunitas/kategori');
			}		
		}
	}
	public function tambahdata(){
		$this->load->view("admin/komunitas/tambahkomunitas");
	}
	public function detail($id){
		$kategori['jeniskomunitas'] = $this->model_komunitas->jeniskomunitas();
		$kategori['komunitas'] = $this->model_komunitas->relasi($id);
		$this->load->view("admin/komunitas/detailkomunitas",$kategori);
	}

	public function anggota($id){
		$data['anggota'] = $this->model_komunitas->data_anggota($id);
		// $data = array("akun" => $this->model_komunitas->getanggota());
		$this->load->view("admin/komunitas/anggotakomunitas", $data);
	}
}
?>