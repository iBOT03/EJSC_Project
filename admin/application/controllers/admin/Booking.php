<?php

class Booking extends CI_Controller {
    public function __construct() {
		parent::__construct();
		$this->load->model('model_booking');
		//belumlogin();
	}

	public function index() {
		$data["booking"] = $this->model_booking->index();
		$data["jam"] = $this->model_booking->getselesai();
		$data["ruangan"] = $this->model_booking->getruangan();	
		// $data = $this->_status();	
		$this->load->view("admin/booking/booking" , $data);
		
	}
	public function gantistatus(){
		$tz_object = new DateTimeZone('Asia/Jakarta');
		$datetime = new DateTime();
		$datetime->setTimezone($tz_object);
		// $gettgl = $datetime->format('Y-m-d H:i');
		$gettgl = $datetime->format('H:i');
		$query = $this->db->query("UPDATE booking set `STATUS`=3 where `STATUS`= 1 and JAM_SELESAI like '%$gettgl%'");
		echo $query;
	}
	public function data_awal(){
	    $query = $this->db->query("SELECT * FROM komunitas , booking WHERE komunitas.ID_KOMUNITAS = booking.ID_KOMUNITAS")->result();
		echo json_encode($query);
            
	}
	public function getdataruangan($id){
		$data["booking"] = $this->model_booking->index();
		$data["ruangan"] = $this->model_booking->getruangan();
        $this->load->view("admin/booking/booking" , $data);
	}
	public function tambah() {
		$this->form_validation->set_rules('singleDatePicker' , 'Tanggal Mulai' , 'required');
		$this->form_validation->set_rules('start' , 'Jam Mulai' , 'required');
		$this->form_validation->set_rules('durasi' , 'Durasi Waktu' , 'required');
		$this->form_validation->set_rules('nik', 'NIK', 'required|trim|numeric|max_length[16]');
		$this->form_validation->set_rules('nama' , 'Nama Penanggung Jawab' , 'required');
		$this->form_validation->set_rules('jumlahpeserta' , 'Jumlah Peserta' , 'required');
		$this->form_validation->set_rules('no_telp' , 'Nomor Telepon' , 'required');
		$this->form_validation->set_rules('tujuan' , 'Tujuan' , 'required');

		$data['komunitas'] = $this->model_booking->getkomunitas();
		$data['ruangan'] = $this->model_booking->getruangan();

		if ($this->form_validation->run() == false) {
			$this->load->view("admin/booking/tambahbooking" , $data);
		} else {
			date_default_timezone_set('GMT');
			$tgl = $this->input->post('singleDatePicker');
			$jammulai = $this->input->post('start');
			$durasi = $this->input->post('durasi');
		
			$tgldanwaktu= date('Y-m-d H:i',strtotime($jammulai,strtotime($tgl)));
			
			$done= date('Y-m-d H:i',strtotime("+{$durasi}hours",strtotime($tgldanwaktu)));
			
			$tambah = $this->model_booking->insert(array(
					'NIK' => $this->input->post('nik'),
					'NAMA' => $this->input->post('nama'),
					'NOMOR_TELEPON' => $this->input->post('no_telp'),
					'ID_KOMUNITAS' => $this->input->post('komunitas'),
					'ID_RUANGAN' => $this->input->post('ruangan'),
					'JUMLAH_ORANG' => $this->input->post('jumlahpeserta'),
					'DESKRIPSI_KEGIATAN' => $this->input->post('deskripsi'),
					'TUJUAN' => $this->input->post('tujuan'),
					'TANGGAL_MULAI' => $this->input->post('singleDatePicker'),
					'DURASI' => $this->input->post('durasi'),
					'JAM_MULAI' => $this->input->post('start'),
					'JAM_SELESAI' => $done,
					'STATUS' => '1',
				));
				if($tambah){
					$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
						Berhasil Menambahkan Booking!
					</div>');
						redirect('admin/booking');
					} else {
						$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
							Gagal Menambahkan Booking!
						</div>');
						redirect('admin/booking');		
			}
			}
		
		
	}


	public function load(){
		$id_ruangan = $_GET['dataruang'];
		$query = $this->db->query("SELECT * FROM booking , komunitas , ruangan WHERE booking.ID_KOMUNITAS = komunitas.ID_KOMUNITAS AND booking.ID_RUANGAN = ruangan.ID_RUANGAN AND ruangan.ID_RUANGAN = '$id_ruangan'")->result();
		// $data = $this->db->get_where('booking , komunitas' , ['ID_RUANGAN' => $id_ruangan])->result();
		echo json_encode($query);
              
	}
	public function gettgl(){
		$tgl = $_GET['filtertanggal'];
		$query = $this->db->query("SELECT * FROM booking , komunitas , ruangan WHERE booking.ID_KOMUNITAS = komunitas.ID_KOMUNITAS AND booking.ID_RUANGAN = ruangan.ID_RUANGAN AND booking.TANGGAL_MULAI = '$tgl'")->result();
		echo json_encode($query);
	}
	public function detail($id) {
		$data["booking"] = $this->model_booking->getdetail($id);
        $this->load->view("admin/booking/detailbooking" , $data);
	}

	public function edit($id) {
		$this->form_validation->set_rules('nama' , 'Nama Penanggung Jawab' , 'required');
		
		$data['booking'] = $this->model_booking->getdetail($id);
		$data['ruang'] = $this->model_booking->getruangan($id);
		$data['komunitas'] = $this->model_booking->getkomunitas($id);


		if ($this->form_validation->run() == false) {
			$this->load->view("admin/booking/editbooking" ,$data);
		}else {

			date_default_timezone_set('GMT');
			$tgl = $this->input->post('singleDatePicker');
			$jammulai = $this->input->post('start');
			$durasi = $this->input->post('durasi');
		
			$tgldanwaktu= date('Y-m-d H:i',strtotime($jammulai,strtotime($tgl)));
			
			$done= date('Y-m-d H:i',strtotime("+{$durasi}hours",strtotime($tgldanwaktu)));

			$update = $this->model_booking->updatedata(array(
					'NIK' => $this->input->post('nik'),
					'NAMA' => $this->input->post('nama'),
					'NOMOR_TELEPON' => $this->input->post('no_telp'),
					'ID_KOMUNITAS' => $this->input->post('komunitas'),
					'ID_RUANGAN' => $this->input->post('ruangan'),
					'JUMLAH_ORANG' => $this->input->post('jumlahpeserta'),
					'DESKRIPSI_KEGIATAN' => $this->input->post('deskripsi'),
					'TUJUAN' => $this->input->post('tujuan'),
					'TANGGAL_MULAI' => $this->input->post('singleDatePicker'),
					'DURASI' => $this->input->post('durasi'),
					'JAM_MULAI' => $this->input->post('start'),
					'JAM_SELESAI' => $done
			) , $id);

			if ($update) {
					$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
					Berhasil Mengubah Data!
					</div>');
					redirect('admin/booking');
			}else{
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
					Gagal Mengubah Data!
					</div>');
					redirect('admin/booking');
		// echo "owi";
			}
		}
		
	}
	public function hapusdata($id){
		// $id=$this->input->post('ID_BOOKING');
		$where = array('ID_BOOKING'=>$id);
		$data = $this->model_booking->hapusdata($where , 'booking');

		if ($data) {
			$this->session->set_flashdata('pesan','<div class="alert alert-danger" role="alert">
			Data Gagal Dihapus
			</div>');
			redirect('admin/booking');
		} else {
			$this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">
						
						Data Berhasil Dihapus
			</div>');
			redirect('admin/booking');
		}
	}
	public function hapus($id){
		$data = $this->model_booking->hapusdata($id);

		if ($data) {
			$this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">
						Data Berhasil Dihapus
			</div>');
			redirect('admin/booking');
		} else {
			$this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">
						Data Gagal Dihapus
			</div>');
			redirect('admin/booking');
		}
	}
	


}
