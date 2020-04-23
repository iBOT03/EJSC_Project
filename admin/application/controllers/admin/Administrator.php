<?php

class Administrator extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("EjscModel");
		$this->load->library('form_validation');
		belumlogin();
	}

	public function index()
	{
		$data = array("akun" => $this->EjscModel->getadmin());

		$this->load->view("admin/administrator/administrator", $data);
	}

	public function tambah()
	{
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|max_length[100]|matches[password2]');
		$this->form_validation->set_rules('password2', 'Kofirmasi Password', 'required|trim|matches[password1]');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[akun.EMAIL]');
		$this->form_validation->set_rules('nik', 'NIK', 'required|trim|numeric|max_length[16]|is_unique[akun.NIK]');
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim|max_length[100]');
		$this->form_validation->set_rules('no_telpon', 'No Telepon ', 'required|trim|max_length[13]|numeric');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
		$this->form_validation->set_rules('foto', 'Foto', 'trim');

		if ($this->form_validation->run() == false) {
			$this->load->view("admin/administrator/tambahadministrator");
		} else {
			$foto = str_replace(' ', '_', $_FILES['foto']['name']);
			$config['allowed_types'] = 'jpg|png|gif|svg|pdf|jpeg';
			$config['max_size'] = '2048';
			$config['upload_path'] = './uploads';
			$config['file_name'] = $foto;

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('foto')) {
				$dataPost = array(
					'NIK' => $this->input->post("nik"),
					'LEVEL' => '1',
					'FOTO_KTP' => $foto,
					'NAMA_LENGKAP' => $this->input->post("nama"),
					'EMAIL' => $this->input->post("email"),
					'NO_TELEPON' => $this->input->post("no_telpon"),
					'ALAMAT' => $this->input->post("alamat"),
					'ID_KOMUNITAS' => '',
					'PASSWORD' => password_hash($this->input->post("password1"), PASSWORD_DEFAULT)

				);
				if ($this->EjscModel->tambahadmin($dataPost)) {
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
			} else {
				$this->session->set_flashdata('Pesan', '<div class="alert alert-danger" role="alert">'
					. $this->upload->display_errors() .
					'</div>');
				redirect('admin/administrator');
			}
		}
	}

	public function hapus($nik)
	{
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

	public function edit($nik)
	{
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|max_length[16]|matches[password2]');
		$this->form_validation->set_rules('password2', 'Kofirmasi Password', 'required|trim|matches[password1]');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('nik', 'NIK', 'required|trim|numeric|max_length[16]');
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim|max_length[100]');
		$this->form_validation->set_rules('no_telpon', 'No Telepon ', 'required|trim|max_length[13]|numeric');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
		$this->form_validation->set_rules('foto', 'Foto', 'trim');
		if ($this->form_validation->run() == false) {
			// $data["akun"] = $this->EjscModel->getdetail($nik);
			$data["akun"] = $this->EjscModel->detail($nik);
			// $data["komunitas"] = $this->EjscModel->getkomunitas($nik);
			$this->load->view("admin/administrator/editadministrator", $data);
		} else {
			$update = $this->EjscModel->ubahadmin(array(
				'NIK' => $this->input->post("nik"),
				'LEVEL' => '1',
				'NAMA_LENGKAP' => $this->input->post("nama"),
				'EMAIL' => $this->input->post("email"),
				'NO_TELEPON' => $this->input->post("no_telpon"),
				'ALAMAT' => $this->input->post("alamat"),
				'ID_KOMUNITAS' => '',
				'PASSWORD' => password_hash($this->input->post("password1"), PASSWORD_DEFAULT)
			), $nik);

			if ($update) {
				$ubahfoto = $_FILES['foto']['name'];
				
				if ($ubahfoto) {
					$config['allowed_types'] = 'jpg|png|gif|jpeg|pdf';
					$config['max_size'] = '2048';
					$config['upload_path'] = './uploads/KTP/';

					$this->load->library('upload', $config);

					if ($this->upload->do_upload('foto')) {
						$user = $this->db->get_where('akun', ['NIK' => $nik])->row_array();
						$fotolama = $user['FOTO_KTP'];
						if ($fotolama) {
							unlink(FCPATH . '/uploads/KTP/' . $fotolama);
						}
						$fotobaru = $this->upload->data('file_name');
						$this->db->set('FOTO_KTP', $fotobaru);
						$this->db->where('NIK', $nik);
						$this->db->update('akun');
					} else {
						$this->session->set_flashdata('Pesan', '<div class="alert alert-danger" role="alert">'
							. $this->upload->display_errors() .
							'</div>');
						redirect('admin/administrator');
					}
				} 
				$this->session->set_flashdata('Pesan', '<div class="alert alert-success" role="alert">
				Data Berhasil Diubah
				</div>');
				redirect('admin/administrator');
			} else {
				$this->session->set_flashdata('Pesan', '<div class="alert alert-success" role="alert">
                Data Gagal Di Ubah
                </div>');
				redirect('admin/administrator');
			}
		}
	}
	// public function edit($nik)
    // {
	// 	$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|max_length[16]|matches[password2]');
	// 	$this->form_validation->set_rules('password2', 'Kofirmasi Password', 'required|trim|matches[password1]');
	// 	$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
	// 	$this->form_validation->set_rules('nik', 'NIK', 'required|trim|numeric|max_length[16]');
	// 	$this->form_validation->set_rules('nama', 'Nama', 'required|trim|max_length[100]');
	// 	$this->form_validation->set_rules('no_telpon', 'No Telepon ', 'required|trim|max_length[13]|numeric');
	// 	$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
    //     $data["akun"] = $this->EjscModel->detail($nik);
    //     if ($this->form_validation->run() == false) {
    //         $this->load->view("admin/administrator/editadministrator", $data);
    //     } else {
    //         $foto = $_FILES['foto']['name'];
    //         $config['allowed_types'] = 'jpg|png|gif|pdf';
    //         $config['max_size'] = '2048';
    //         $config['upload_path'] = './uploads';

    //         $this->load->library('upload', $config);

    //         if ($this->upload->do_upload('foto')) {

    //             $data = $this->EjscModel->ubahadmin(array(
    //                 'NIK' => $this->input->post("nik"),
    //                 'LEVEL' => '1',
    //                 'FOTO_KTP' => $foto,
    //                 'NAMA_LENGKAP' => $this->input->post("nama"),
    //                 'EMAIL' => $this->input->post("email"),
    //                 'NO_TELEPON' => $this->input->post("no_telpon"),
    //                 'ALAMAT' => $this->input->post("alamat"),
    //                 'ID_KOMUNITAS' => '',
    //                 'PASSWORD' => password_hash($this->input->post("password1"), PASSWORD_DEFAULT)
    //             ), $nik);
    //             if ($data) {
    //                 $this->session->set_flashdata('Pesan', '<div class="alert alert-success" role="alert">
	// 				Berhasil Mengubah Akun!
	// 			  </div>');
    //                 redirect('admin/administrator');
    //             } else {
    //                 $this->session->set_flashdata('Pesan', '<div class="alert alert-danger" role="alert">
	// 				Gagal Mengubah Akun!
	// 				</div>');
    //                 redirect('admin/administrator');
    //             }
    //         } else {
    //             $this->session->set_flashdata('Pesan', '<div class="alert alert-danger" role="alert">'
    //                 . $this->upload->display_errors() .
    //                 '</div>');
    //             redirect('admin/administrator');
    //         }
    //     }
    // }
}