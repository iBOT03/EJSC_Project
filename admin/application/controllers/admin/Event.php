<?php

class Event extends CI_Controller {
    public function __construct() {
		parent::__construct();
		$this->load->model('Model_Event');
        belumlogin();
        $this->load->helper(array('url','download')); 
	}

	public function index() {
        $data['event'] = $this->Model_Event->getindex();
      
        $this->load->view("admin/acara/event", $data);
    }
    public function gantistatus(){
		$tz_object = new DateTimeZone('Asia/Jakarta');
		$datetime = new DateTime();
		$datetime->setTimezone($tz_object);
		// $gettgl = $datetime->format('Y-m-d H:i');
		$gettgl = $datetime->format('Y-m-d');
		$query = $this->db->query("UPDATE event set `STATUS`=3 where `STATUS`= 1 and TANGGAL_SELESAI like '%$gettgl%'");
		echo $query;
	}
        //ajax

	public function ambildata($id){
		// $id = $this->input->post('id_event');
		$data = $this->Model_Event->relasi2($id);
		echo json_encode($data);
	}
		//ajax
	public function hapusdata(){
        $id=$this->input->post('ID_DETAIL_EVENT');
		$where = array('ID_DETAIL_EVENT'=>$id);
		$this->Model_Event->hapus($where , 'detail_event');
	}
	//ajax
	public function tambahdata(){
		$id_event = $this->input->post('id_event');
		$id_alat = $this->input->post('peminjamanalat');
		$jumlah = $this->input->post('jumlahalat');

		if($jumlah==''){
			$result['pesan'] = "Pilih Jumlah Terlebih dahulu";
		} elseif ($id_alat=='') {
			$result['pesan'] = "Alat Harus diisi";
		}else {
			$result['pesan'] = '';

			$data=array(
				'ID_EVENT' => $id_event,
				'ID_ALAT' => $id_alat,
				'JUMLAH' => $jumlah
			);

			$this->Model_Event->tambah($data , 'detail_event');
		}
		echo json_encode($result);
	}
	public function tambah()
    {
        $this->form_validation->set_rules('judulevent','Judul Event','required');
        $this->form_validation->set_rules('penyelenggara','Penyelenggara','required');
        $this->form_validation->set_rules('nama_pj','Penanggung Jawab','required');
        $this->form_validation->set_rules('tanggalmulai','Tanggal Mulai','required');
        $this->form_validation->set_rules('tanggalselesai','Tanggal Selesai','required');
        $this->form_validation->set_rules('waktu','Waktu','required');
        $this->form_validation->set_rules('pengisiacara','Pengisi Acara','required');
        $this->form_validation->set_rules('asalpeserta','Asal Peserta','required');
        $this->form_validation->set_rules('jumlahpeserta', 'Jumlah Peserta', 'required');
        $this->form_validation->set_rules('suratperijinan', 'Surat', 'trim');
        $this->form_validation->set_rules('foto', 'Foto', 'trim');

        $data['kode'] = $this->Model_Event->buat_kode();
        $data['alat'] = $this->Model_Event->getalat();
        $data['ajax'] = $this->Model_Event->relasi2($data['kode']);
        $data['ruangan'] = $this->Model_Event->getruangan();
        if ($this->form_validation->run() == false) {
            $this->load->view("admin/acara/tambahevent", $data);
        } else {
            $config['allowed_types'] = 'jpg|png|gif|jpeg|pdf|doc|docx|xlsx';
            $config['max_size'] = '2048';
            $config['upload_path'] = './uploads/event/';
		    $foto = str_replace(' ', '_', $_FILES['foto']['name']);			
		    $pdf = str_replace(' ', '_', $_FILES['suratperijinan']['name']);			
			$this->load->library('upload', $config);

            if ($this->upload->do_upload('foto') && $this->upload->do_upload('suratperijinan')) {
                $data = array(
                    'ID_EVENT' => $this->input->post('id_event'),
                    'JUDUL' => $this->input->post('judulevent'),
                    'FOTO' => $foto,
                    'SURAT_PENGAJUAN' => $pdf,
                    'PENYELENGGARA' => $this->input->post('penyelenggara'),
                    'NAMA_PJ' => $this->input->post('nama_pj'),
                    'NAMA_PENGISI_ACARA' => $this->input->post('pengisiacara'),
                    'TANGGAL_MULAI' => $this->input->post('tanggalmulai'),
                    'TANGGAL_SELESAI' => $this->input->post('tanggalselesai'),
                    'WAKTU' => $this->input->post('waktu'),
                    'ID_RUANGAN' => $this->input->post('ruangan'),
                    'ASAL_PESERTA' => $this->input->post('asalpeserta'),
                    'JUMLAH_PESERTA' => $this->input->post('jumlahpeserta'),
                    'KETERANGAN' => $this->input->post('keterangan'),
                    'STATUS' => '2'
                );
                if ($this->Model_Event->insert($data)) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
					Data Berhasil Ditambahkan
                    </div>');
                    redirect('admin/event');
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">GAGAL</div>');
                    redirect('admin/event');
                }
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">'
                    . $this->upload->display_errors() .
                    '</div>');
                redirect('admin/event');
            }
        }
    }
    public function ambil($id){
        $query = $this->db->query("SELECT * FROM alat, detail_event  WHERE alat.ID_ALAT = detail_event.ID_ALAT AND detail_event.ID_EVENT = '$id'")->result();
		echo json_encode($query);
    }
   	public function edit($id) {
        $this->form_validation->set_rules('judulevent' , 'Judul Event' , 'required');
        if ($this->form_validation->run() == false) {
            $data['data'] = $this->Model_Event->relasi($id);
            
            $data['event'] = $this->Model_Event->detail_event($id);
            $data['alat'] = $this->Model_Event->getalat();
            $data['get'] = $this->Model_Event->getruangan($id);
            $data['detail'] = $this->Model_Event->detail($id);
            $this->load->view("admin/acara/editevent" , $data);
        }else{
            $update = $this->Model_Event->update(array(
                'JUDUL' => $this->input->post('judulevent'),
                'PENYELENGGARA' => $this->input->post('penyelenggara'),
                'NAMA_PJ' => $this->input->post('nama_pj'),
                'NAMA_PENGISI_ACARA' => $this->input->post('pengisiacara'),
                'TANGGAL_MULAI' => $this->input->post('tanggalmulai'),
                'TANGGAL_SELESAI' => $this->input->post('tanggalselesai'),
                'WAKTU' => $this->input->post('waktu'),
                'ID_RUANGAN' => $this->input->post('ruangan'),
                'ASAL_PESERTA' => $this->input->post('asalpeserta'),
                'JUMLAH_PESERTA' => $this->input->post('jumlahpeserta'),
                'KETERANGAN' => $this->input->post('keterangan')
            ),$id); 

            if($update) {
               	$ubahfoto = $_FILES['foto']['name'];
               	$ubahpdf = $_FILES['suratperijinan']['name'];
                if ($ubahfoto) {
                    $config['allowed_types'] = 'jpg|png|gif|jpeg|pdf';
                    $config['max_size'] = '2048';
                    $config['upload_path'] = './uploads/event/';
    
                    $this->load->library('upload', $config);
    
                    if ($this->upload->do_upload('foto')) {
                        $user = $this->db->get_where('EVENT', ['ID_EVENT'=>$id])->row_array();
                        $fotolama = $user['FOTO'];
                        if ($fotolama) {
                            unlink(FCPATH . '/uploads/event/' . $fotolama);
                        }
                        $fotobaru = $this->upload->data('file_name');
                        $this->db->set('FOTO', $fotobaru);
                        $this->db->where('ID_EVENT', $id);
                        $this->db->update('event');
                    } else {
                        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">'
                        . $this->upload->display_errors() .
                        '</div>');
                        redirect('admin/event');
                    }
                }else if ($ubahpdf) {
                    $config['allowed_types'] = 'jpg|png|gif|jpeg|pdf';
                    $config['max_size'] = '2048';
                    $config['upload_path'] = './uploads/event/';
    
                    $this->load->library('upload', $config);
    
                    if ($this->upload->do_upload('suratperijinan')) {
                        $user = $this->db->get_where('EVENT', ['ID_EVENT'=>$id])->row_array();
                        $fotolama = $user['SURAT_PENGAJUAN'];
                        if ($fotolama) {
                            unlink(FCPATH . '/uploads/event/' . $fotolama);
                        }
                        $fotobaru = $this->upload->data('file_name');
                        $this->db->set('SURAT_PENGAJUAN', $fotobaru);
                        $this->db->where('ID_EVENT', $id);
                        $this->db->update('event');
                    } else {
                        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">'
                        . $this->upload->display_errors() .
                        '</div>');
                        redirect('admin/event');
                    }
                }
                $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                Data Berhasil Diubah
                </div>');
                redirect('admin/event');
            }else {
				$this->session->set_flashdata('pesan','<div class="alert alert-success" role="alert">
                Data Gagal Di Ubah
                </div>');
                redirect('admin/event');
        }
      
    }
}

	public function detail($id){
		$data['data'] = $this->Model_Event->relasi($id);
		$data['event'] = $this->Model_Event->detail_event($id);
	

		if(isset($_POST['setuju']))
        {
            $this->Model_Event->ubah_status_setuju($id);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                Persetujuan Event Diterima !
            </div>');
            redirect('admin/event');
        }
        else if(isset($_POST['tolak']))
        {
            $this->Model_Event->ubah_status_tolak($id);
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                        Persetujuan Event Ditolak !
                        </div>');
            redirect('admin/event');
        }
        else if(isset($_POST['selesai']))
        {
            $this->Model_Event->ubah_status_selesai($id);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
                        Persetujuan Event Selesai !
                        </div>');
            redirect('admin/event');
        }
		$this->load->view("admin/acara/detailevent",$data);
    }

	public function hapus($id) {
        $hapus = $this->Model_Event->hapusdata($id);
        $hapus = $this->Model_Event->detaildalem($id);
        if ($hapus) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
				Berhasil Menghapus Event!
			  </div>'); 
			  redirect('admin/event');
        } else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
			Gagal Menghapus Event!
		  </div>'); 
		  redirect('admin/event');
		}
	}
	
	public function export_excel(){
		$from = $_POST['tanggalMulai'];
		$to = $_POST['sampaiDengan'];
		$data = $this->db->query("SELECT * FROM event WHERE TANGGAL_SELESAI BETWEEN '$from' AND '$to' ")->result();

		require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel.php');
		require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

		$objPHPExcel = new PHPExcel();

		$objPHPExcel->getProperties()->setCreator("EJSC");
		$objPHPExcel->getProperties()->setLastModifiedBy("EJSC");
		$objPHPExcel->getProperties()->setTitle("Data Event");
		$objPHPExcel->getProperties()->setSubject("");
		$objPHPExcel->getProperties()->setDescription("");
		
		$objPHPExcel->setActiveSheetIndex(0);

		$objPHPExcel->getActiveSheet()->setCellValue('A1', 'ID EVENT');
		$objPHPExcel->getActiveSheet()->setCellValue('B1', 'JUDUL');
		$objPHPExcel->getActiveSheet()->setCellValue('C1', 'PENYELENGGARA');
		$objPHPExcel->getActiveSheet()->setCellValue('D1', 'PENANGGUNGJAWAB');
		$objPHPExcel->getActiveSheet()->setCellValue('E1', 'PENGISI ACARA');
		$objPHPExcel->getActiveSheet()->setCellValue('F1', 'TANGGAL MULAI');
		$objPHPExcel->getActiveSheet()->setCellValue('G1', 'TANGGAL SELESAI');
		$objPHPExcel->getActiveSheet()->setCellValue('H1', 'WAKTU');
		$objPHPExcel->getActiveSheet()->setCellValue('I1', 'ID RUANGAN');
		$objPHPExcel->getActiveSheet()->setCellValue('J1', 'ASAL PESERTA');
		$objPHPExcel->getActiveSheet()->setCellValue('K1', 'JUMLAH PESERTA');
		$objPHPExcel->getActiveSheet()->setCellValue('L1', 'KETERANGAN');
		$objPHPExcel->getActiveSheet()->setCellValue('M1', 'STATUS');

		$baris=2;

		foreach($data as $data){
			$objPHPExcel->getActiveSheet()->setCellValue('A'.$baris, $data->ID_EVENT);	
			$objPHPExcel->getActiveSheet()->setCellValue('B'.$baris, $data->JUDUL);	
			$objPHPExcel->getActiveSheet()->setCellValue('C'.$baris, $data->PENYELENGGARA);	
			$objPHPExcel->getActiveSheet()->setCellValue('D'.$baris, $data->NAMA_PJ);	
			$objPHPExcel->getActiveSheet()->setCellValue('E'.$baris, $data->NAMA_PENGISI_ACARA);	
			$objPHPExcel->getActiveSheet()->setCellValue('F'.$baris, $data->TANGGAL_MULAI);	
			$objPHPExcel->getActiveSheet()->setCellValue('G'.$baris, $data->TANGGAL_SELESAI);	
			$objPHPExcel->getActiveSheet()->setCellValue('H'.$baris, $data->WAKTU);	
			$objPHPExcel->getActiveSheet()->setCellValue('I'.$baris, $data->ID_RUANGAN);	
			$objPHPExcel->getActiveSheet()->setCellValue('J'.$baris, $data->ASAL_PESERTA);	
			$objPHPExcel->getActiveSheet()->setCellValue('K'.$baris, $data->JUMLAH_PESERTA);	
			$objPHPExcel->getActiveSheet()->setCellValue('L'.$baris, $data->KETERANGAN);	
			$objPHPExcel->getActiveSheet()->setCellValue('M'.$baris, $data->STATUS);	

			$baris++;
		}

		$filename="Data-Event ".date("d-m-Y-H-i-s").'.xlsx';
		$objPHPExcel->getActiveSheet()->setTitle("Data Event");

		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="'.$filename.'"');
		header('Cache-Control: max-age=0');

		$writer=PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$writer->save('php://output');

		exit;
	}

}


?>