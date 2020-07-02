<?php

class Dashboard extends CI_Controller {
    public function __construct() {
		parent::__construct();
		$this->load->model('EjscModel');
		$this->load->helper(array('url','html','form'));
		belumlogin();
	}

	public function index() {
		$data['total_pengguna'] = $this->EjscModel->pengguna();
		$data['total_boking'] = $this->EjscModel->boking();
		$data['total_event'] = $this->EjscModel->event();
		$data['total_komunitas'] = $this->EjscModel->totkomunitas();

		//  $this->bar_chart();
		$query =  $this->db->query("SELECT COUNT(ID_BOOKING) as count,MONTHNAME(TANGGAL_MULAI) as month_name FROM booking WHERE YEAR(TANGGAL_MULAI) = '" . date('Y') . "'
		GROUP BY YEAR(TANGGAL_MULAI),MONTH(TANGGAL_MULAI)")->result(); 
		 
		foreach($query as $row) {
			$data['label'][] = $row->month_name;
			$data['data'][] = (int) $row->count;
		}
		$data['chart_data'] = json_encode($data);
		$this->load->view("admin/dashboard", $data);
  		
	}
	
    public function bar_chart() {
		$query =  $this->db->query("SELECT COUNT(ID_BOOKING) as count,MONTHNAME(TANGGAL_MULAI) as month_name FROM booking WHERE YEAR(TANGGAL_MULAI) = '" . date('Y') . "'
		GROUP BY YEAR(TANGGAL_MULAI),MONTH(TANGGAL_MULAI)")->result(); 
   
		$data = [];
   
		foreach($query as $row) {
			  $data['label'][] = $row->month_name;
			  $data['data'][] = (int) $row->count;
		}
		$data['chart_data'] = json_encode($data);
		$this->load->view('admin/dashboard',$data);
	  }

	public function export_excel(){
		$from = $_POST['tanggalMulai'];
		$to = $_POST['sampaiDengan'];
		$data = $this->db->query("SELECT * FROM booking WHERE TANGGAL_MULAI BETWEEN '$from' AND '$to' ")->result();

		require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel.php');
		require(APPPATH. 'PHPExcel-1.8/Classes/PHPExcel/Writer/Excel2007.php');

		$objPHPExcel = new PHPExcel();

		$objPHPExcel->getProperties()->setCreator("EJSC");
		$objPHPExcel->getProperties()->setLastModifiedBy("EJSC");
		$objPHPExcel->getProperties()->setTitle("Data Booking");
		$objPHPExcel->getProperties()->setSubject("");
		$objPHPExcel->getProperties()->setDescription("");
		
		$objPHPExcel->setActiveSheetIndex(0);

		$objPHPExcel->getActiveSheet()->setCellValue('A1', 'ID BOOKING');
		$objPHPExcel->getActiveSheet()->setCellValue('B1', 'NIK');
		$objPHPExcel->getActiveSheet()->setCellValue('C1', 'NAMA');
		$objPHPExcel->getActiveSheet()->setCellValue('D1', 'NOMOR TELEPON');
		$objPHPExcel->getActiveSheet()->setCellValue('E1', 'ID KOMUNITAS');
		$objPHPExcel->getActiveSheet()->setCellValue('F1', 'ID RUANGAN');
		$objPHPExcel->getActiveSheet()->setCellValue('G1', 'JUMLAH ORANG');
		$objPHPExcel->getActiveSheet()->setCellValue('H1', 'DESKRIPSI KEGIATAN');
		$objPHPExcel->getActiveSheet()->setCellValue('I1', 'TUJUAN');
		$objPHPExcel->getActiveSheet()->setCellValue('J1', 'TANGGAL MULAI');
		$objPHPExcel->getActiveSheet()->setCellValue('K1', 'DURASI');
		$objPHPExcel->getActiveSheet()->setCellValue('L1', 'JAM MULAI');
		$objPHPExcel->getActiveSheet()->setCellValue('M1', 'JAM SELESAI');
		$objPHPExcel->getActiveSheet()->setCellValue('N1', 'STATUS');

		$baris=2;

		foreach($data as $data){
			$objPHPExcel->getActiveSheet()->setCellValue('A'.$baris, $data->ID_BOOKING);	
			$objPHPExcel->getActiveSheet()->setCellValue('B'.$baris, $data->NIK);	
			$objPHPExcel->getActiveSheet()->setCellValue('C'.$baris, $data->NAMA);	
			$objPHPExcel->getActiveSheet()->setCellValue('D'.$baris, $data->NOMOR_TELEPON);	
			$objPHPExcel->getActiveSheet()->setCellValue('E'.$baris, $data->ID_KOMUNITAS);	
			$objPHPExcel->getActiveSheet()->setCellValue('F'.$baris, $data->ID_RUANGAN);	
			$objPHPExcel->getActiveSheet()->setCellValue('G'.$baris, $data->JUMLAH_ORANG);	
			$objPHPExcel->getActiveSheet()->setCellValue('H'.$baris, $data->DESKRIPSI_KEGIATAN);	
			$objPHPExcel->getActiveSheet()->setCellValue('I'.$baris, $data->TUJUAN);	
			$objPHPExcel->getActiveSheet()->setCellValue('J'.$baris, $data->TANGGAL_MULAI);	
			$objPHPExcel->getActiveSheet()->setCellValue('K'.$baris, $data->DURASI);	
			$objPHPExcel->getActiveSheet()->setCellValue('L'.$baris, $data->JAM_MULAI);	
			$objPHPExcel->getActiveSheet()->setCellValue('M'.$baris, $data->JAM_SELESAI);	
			$objPHPExcel->getActiveSheet()->setCellValue('N'.$baris, $data->STATUS);	

			$baris++;
		}

		$filename="Data-Booking ".date("d-m-Y-H-i-s").'.xlsx';
		$objPHPExcel->getActiveSheet()->setTitle("Data Booking");

		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="'.$filename.'"');
		header('Cache-Control: max-age=0');

		$writer=PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$writer->save('php://output');

		exit;
	}
}
