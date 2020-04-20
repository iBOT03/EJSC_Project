<?php

class Event extends CI_Controller 
{
	public function __construct() 
	{
		parent::__construct();
		$this->load->model('EjscModel');
		$this->load->library('form_validation');
	}

	public function index() 
	{
		$data = array ("event" => $this->EjscModel->getevent());

	
        $this->load->view("admin/acara/event", $data);
	}

	
	public function tambah()
	{
		$this->form_validation->set_rules('judul', 'Judul', 'required');
		$this->form_validation->set_rules('penyelenggara', 'Penyelenggara', 'required');
		// $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
		if($this->form_validation->run() == false) {
			$data ['ruangan'] = $this->EjscModel->pilihruangan();
			$data['alat'] = $this->EjscModel->pilihAlat();
			$this->load->view("admin/acara/tambahevent", $data);
		} else {
			$foto = $_FILES['foto']['name'];
			$config['allowed_types'] = 'jpg|png|gif|svg|pdf';
			$config['max_size'] = '2048';
			$config['upload_path'] = './uploads';
	
			$this->load->library('upload', $config);
	
			if ($this->upload->do_upload('foto')) {
				$datapost = array(
					'ID_EVENT' => '',
					'JUDUL' => $this->input->post("judulevent"),
					'FOTO' => $foto,
					'PENYELENGGARA' => $this->input->post("penyelenggara"),
					'WAKTU' => $this->input->post("tanggal"),
					'KETERANGAN' => $this->input->post("keterangan"),
					'ID_RUANGAN' =>$this->input->post('ID_RUANGAN'),
					'STATUS' => $this->input->post("status")
				);
				if ($this->EjscModel->tambahevent($datapost)) {
				// 	$this->session->set_flashdata('Pesan', '<div class="alert alert-success" role="alert">
				// 	Berhasil Menambahkan Event!
				//   </div>');
				// 	redirect('admin/event');
				print_r($datapost);
				die();
				} else {
					$this->session->set_flashdata('Pesan', '<div class="alert alert-danger" role="alert">
					Gagal Menambahkan Event!
					</div>');
					redirect('admin/event');
				}
			} else {
				// $this->session->set_flashdata('Pesan', '<div class="alert alert-danger" role="alert">'
				// 	. $this->upload->display_errors() .
				// 	'</div>');
				// redirect('admin/event');
				
			}
		}
	}

	
	
	
	// {
	// 	if($this->input->method() == "post") {
	// 		$insert = $this->EjscModel->tambahevent(array(
	// 			"ID_EVENT" => '',
	// 			'JUDUL' => $this->input->post("judulevent"),
	// 			'FOTO' => $this->input->post("posterevent"),
	// 			'PENYELENGGARA' => $this->input->post("penyelenggara"),
	// 			'WAKTU' => $this->input->post("tanggal"),
	// 			'KETERANGAN' => $this->input->post("keterangan"),
	// 			'STATUS' => $this->input->post("status")							
	// 		));
	// 		if($insert){
	// 			$this->session->set_flashdata('Pesan', '<div class="alert alert-success" role="alert">
	// 			Berhasil Menambahkan Event!
	// 		  </div>'); 
	// 		  redirect('admin/event');
				
	// 		} else {
	// 			$this->session->set_flashdata('Pesan', '<div class="alert alert-danger" role="alert">
	// 			Gagal Menambahkan Event!
	// 		  </div>'); 
	// 		  redirect('admin/event');
	// 		}
	// 	}
	// 	$this->load->view("admin/acara/tambahevent");
	// }
	
	public function edit($id)
	{
		$this->form_validation->set_rules('judul', 'Judul', 'required');
		$this->form_validation->set_rules('penyelenggara', 'Penyelenggara', 'required');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required');
	
	
	if ($this->form_validation->run() == false) {
		$data ['ruangan'] = $this->EjscModel->pilihruangan();
		$data['event'] = $this->EjscModel->getevent();
		$this->load->view("admin/acara/editevent", $data);
	} else {
		$foto = $_FILES['foto']['name'];
		$config['allowed_types'] = 'jpg|png|gif|svg|pdf';
		$config['max_size'] = '2048';
		$config['upload_path'] = './uploads';

		$this->load->library('upload', $config);

		if ($this->upload->do_upload('foto')) {

			$update = $this->EjscModel->ubahevent(array(
				'ID_EVENT' => '',
				'JUDUL' => $this->input->post("judulevent"),
				'FOTO' => $foto,
				'PENYELENGGARA' => $this->input->post("penyelenggara"),
				'WAKTU' => $this->input->post("tanggal"),
				'KETERANGAN' => $this->input->post("keterangan"),
				'STATUS' => $this->input->post("status")
			), $id);
			if ($update) {
				$this->session->set_flashdata('Pesan', '<div class="alert alert-success" role="alert">
				Berhasil Mengubah Event!
			  </div>');
				redirect('admin/event');
			} else {
				$this->session->set_flashdata('Pesan', '<div class="alert alert-danger" role="alert">
				Gagal Mengubah Event!
				</div>');
				redirect('admin/event');
			}
		} else {
			$this->session->set_flashdata('Pesan', '<div class="alert alert-danger" role="alert">'
				. $this->upload->display_errors() .
				'</div>');
			redirect('admin/event');
		}
	}
}
	// public function edit($id) {
	// 	$data["event"] = $this->EjscModel->detail_event($id);
	// 	$this->load->view("admin/acara/editevent", $data);
	// 	if($this->input->method() == "post") {
	// 		$update = $this->EjscModel->ubahevent(array(
	// 			'JUDUL' => $this->input->post("Judul"),
	// 			'FOTO' => $this->input->post("Poster"),
	// 			'PENYELENGGARA' => $this->input->post("Penyelenggara"),
	// 			'WAKTU' => $this->input->post("Tanggal"),
	// 			'KETERANGAN' => $this->input->post("Keterangan"),
	// 			'STATUS' => $this->input->post("Status")							
	// 		), $id);
	// 		if($update){
	// 			$this->session->set_flashdata('Pesan', '<div class="alert alert-success" role="alert">
	// 			Berhasil Mengubah Akun!
	// 		  </div>'); 
	// 		  redirect('admin/acara/event');
	// 		}else {
	// 			$this->session->set_flashdata('Pesan', '<div class="alert alert-danger" role="alert">
	// 			Gagal Mengubah Akun!
	// 		  </div>'); 
	// 		  redirect('admin/acara/event');
	// 		}
	// 	}
	// }

	public function detail() {
		$data['event'] = $this->EjscModel->getevent();
		$data['alat'] = $this->EjscModel->pilihAlat();
		$this->load->view("admin/acara/detailevent",$data);
	}

	public function hapus($id) 
	{
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