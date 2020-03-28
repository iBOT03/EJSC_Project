<?php

class Administrator extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("EjscModel");
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data = array("akun" => $this->EjscModel->getadmin());

		$this->load->view("admin/administrator/administrator", $data);
	}

	public function tambah()
	{
		$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|max_length[16]|matches[password2]');
		$this->form_validation->set_rules('password2', 'Kofirmasi Password', 'required|trim|matches[password1]');
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[akun.EMAIL]');
		$this->form_validation->set_rules('nik', 'NIK', 'required|trim|numeric|max_length[16]|is_unique[akun.NIK]');
		$this->form_validation->set_rules('nama', 'Nama', 'required|trim|max_length[100]');
		$this->form_validation->set_rules('no_telpon', 'No Telepon ', 'required|trim|max_length[13]|numeric');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');

		if ($this->form_validation->run() == false) {
			$this->load->view("admin/administrator/tambahadministrator");
		} else {
			$foto = $_FILES['foto']['name'];
			$config['allowed_types'] = 'jpg|png|gif|svg|pdf';
			$config['max_size'] = '2048';
			$config['upload_path'] = './uploads';

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
					'KOMUNITAS' => '',
					'PASSWORD' => $this->input->post("password1")

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

		// if ($this->form_validation->run() == false) {
		// 	$this->load->view("admin/administrator/tambahadministrator");

		// } else {
		// 	if ($this->input->method() == "post") {
		// 		$insert = $this->EjscModel->tambahadmin(array(
		// 			'NIK' => $this->input->post("nik"),
		// 			'LEVEL' => '1',
		// 			'FOTO_KTP' => $this->input->post("foto"),
		// 			'NAMA_LENGKAP' => $this->input->post("nama"),
		// 			'EMAIL' => $this->input->post("email"),
		// 			'NO_TELEPON' => $this->input->post("no_telpon"),
		// 			'ALAMAT' => $this->input->post("alamat"),
		// 			'KOMUNITAS' => '',
		// 			'PASSWORD' => $this->input->post("password1")
		// 		));
		// 		if ($insert) {
		// 			$this->session->set_flashdata('Pesan', '<div class="alert alert-success" role="alert">
		// 		Berhasil Menambahkan Akun!
		// 	  </div>');
		// 			redirect('admin/administrator');
		// 		} else {
		// 			$this->session->set_flashdata('Pesan', '<div class="alert alert-danger" role="alert">
		// 		Gagal Menambahkan Akun!
		// 	  </div>');
		// 			redirect('admin/administrator');
		// 		}
		// 	}
		// }
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
        $data["akun"] = $this->EjscModel->detail($nik);
        if ($this->form_validation->run() == false) {
            $this->load->view("admin/administrator/editadministrator", $data);
        } else {
            $foto = $_FILES['foto']['name'];
            $config['allowed_types'] = 'jpg|png|gif|pdf';
            $config['max_size'] = '2048';
            $config['upload_path'] = './uploads';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto')) {

                $data = $this->EjscModel->ubahadmin(array(
                    'NIK' => $this->input->post("nik"),
                    'LEVEL' => '1',
                    'FOTO_KTP' => $foto,
                    'NAMA_LENGKAP' => $this->input->post("nama"),
                    'EMAIL' => $this->input->post("email"),
                    'NO_TELEPON' => $this->input->post("no_telpon"),
                    'ALAMAT' => $this->input->post("alamat"),
                    'KOMUNITAS' => '',
                    'PASSWORD' => $this->input->post("password1")
                ), $nik);
                if ($data) {
                    $this->session->set_flashdata('Pesan', '<div class="alert alert-success" role="alert">
					Berhasil Mengubah Akun!
				  </div>');
                    redirect('admin/administrator');
                } else {
                    $this->session->set_flashdata('Pesan', '<div class="alert alert-danger" role="alert">
					Gagal Mengubah Akun!
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

	// public function edit($nik)
	// {
	// 	$data["akun"] = $this->EjscModel->detail($nik);
	// 	if ($this->input->method() == "post") {
	// 		$update = $this->EjscModel->ubahadmin(array(
	// 			'NIK' => $this->input->post("nik"),
	// 			'LEVEL' => '1',
	// 			'FOTO_KTP' => $this->input->post("foto"),
	// 			'NAMA_LENGKAP' => $this->input->post("nama"),
	// 			'EMAIL' => $this->input->post("email"),
	// 			'NO_TELEPON' => $this->input->post("no_telpon"),
	// 			'ALAMAT' => $this->input->post("alamat"),
	// 			'KOMUNITAS' => '',
	// 			'PASSWORD' => $this->input->post("password1")
	// 		), $nik);
	// 		if ($update) {
	// 			$this->session->set_flashdata('Pesan', '<div class="alert alert-success" role="alert">
	// 			Berhasil Mengubah Akun!
	// 		  </div>');
	// 			redirect('admin/administrator');
	// 		} else {
	// 			$this->session->set_flashdata('Pesan', '<div class="alert alert-danger" role="alert">
	// 			Gagal Mengubah Akun!
	// 		  </div>');
	// 			redirect('admin/administrator');
	// 		}
	// 	}
	// 	$this->load->view("admin/administrator/editadministrator", $data);
	// }
}