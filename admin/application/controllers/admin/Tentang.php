<?php

class Tentang extends CI_Controller {
    public function __construct() {
		parent::__construct();
		$this->load->model('model_tentang');
		belumlogin();
	}

	public function index() {
		$data['tentang']= $this->model_tentang->index();
        $this->load->view("admin/tentang", $data);
	}
	
	public function ubah($id) {
		$data ['tentang'] = $this->model_tentang->getdetail($id);
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('no', 'Nomor', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		if($this->form_validation->run() == false) {
			$this->load->view("admin/ubahtentang" ,$data);
		} else {
			if ($this->input->method() == "post") {
				$update = $this->model_tentang->ubahdata(array(
					'EMAIL' => $this->input->post("email"),
					'NOMOR_TELEPON' => $this->input->post("no"),
					'WHATSAPP' => $this->input->post("wa"),
					'FACEBOOK' => $this->input->post("fb"),
					'INSTAGRAM' => $this->input->post("ig"),
					'ALAMAT' => $this->input->post("alamat")
				), $id);
				
				if ($update) {
					$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
						Berhasil Mengubah Data!
					</div>');
					redirect('admin/tentang');
				} else {
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
						Gagal Mengubah Akun!
					</div>');
					redirect('admin/tentang');
				}
			}
		}
	}	
}
?>