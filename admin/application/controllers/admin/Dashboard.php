<?php

class Dashboard extends CI_Controller {
    public function __construct() {
		parent::__construct();
		$this->load->model('EjscModel');
		belumlogin();
	}

	public function index() {
		$data['total_pengguna'] = $this->EjscModel->pengguna();
		$data['total_boking'] = $this->EjscModel->boking();
		$data['total_event'] = $this->EjscModel->event();
		$data['total_komunitas'] = $this->EjscModel->totkomunitas();
        $this->load->view("admin/dashboard", $data);
	}
}

?>