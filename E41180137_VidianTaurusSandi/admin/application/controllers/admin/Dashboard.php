<?php
 
class Dashboard extends CI_Controller {
    public function __construct() {
		parent::__construct();
		$this->load->model('dashboard_model');
	}
 
	public function index() {
		$data['total_pengguna'] = $this->dashboard_model->pengguna();
		$data['total_boking'] = $this->dashboard_model->boking();
		$data['total_event'] = $this->dashboard_model->event();
		$data['total_komunitas'] = $this->dashboard_model->totkomunitas();
		// $data['getBooking'] = $this->dashboard_model->getBooking();
		// print_r($data);
		//$data['data'] = $this->dashboard_model->grafik();
		$this->load->view("admin/dashboard", $data);
	}
 
	public function export_excel(){
		$data['getBooking'] = $this->dashboard_model->getBooking();
 
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
		$objPHPExcel->getActiveSheet()->setCellValue('B1', 'NAMA');
		$objPHPExcel->getActiveSheet()->setCellValue('C1', 'NOMOR TELEPON');
		$objPHPExcel->getActiveSheet()->setCellValue('D1', 'ID KOMUNITAS');
		$objPHPExcel->getActiveSheet()->setCellValue('E1', 'ID RUANGAN');
		$objPHPExcel->getActiveSheet()->setCellValue('F1', 'JUMLAH ORANG');
		$objPHPExcel->getActiveSheet()->setCellValue('G1', 'DESKRIPSI KEGIATAN');
		$objPHPExcel->getActiveSheet()->setCellValue('H1', 'TUJUAN');
		$objPHPExcel->getActiveSheet()->setCellValue('I1', 'TANGGAL MULAI');
		$objPHPExcel->getActiveSheet()->setCellValue('J1', 'DURASI');
		$objPHPExcel->getActiveSheet()->setCellValue('K1', 'JAM MULAI');
		$objPHPExcel->getActiveSheet()->setCellValue('L1', 'JAM SELESAI');
		$objPHPExcel->getActiveSheet()->setCellValue('M1', 'STATUS');
 
		$baris=2;
 
		foreach($data['getBooking'] as $data){
			$objPHPExcel->getActiveSheet()->setCellValue('A'.$baris, $data->ID_BOOKING);	
			$objPHPExcel->getActiveSheet()->setCellValue('B'.$baris, $data->NAMA);	
			$objPHPExcel->getActiveSheet()->setCellValue('C'.$baris, $data->NOMOR_TELEPON);	
			$objPHPExcel->getActiveSheet()->setCellValue('D'.$baris, $data->ID_KOMUNITAS);	
			$objPHPExcel->getActiveSheet()->setCellValue('E'.$baris, $data->ID_RUANGAN);	
			$objPHPExcel->getActiveSheet()->setCellValue('F'.$baris, $data->JUMLAH_ORANG);	
			$objPHPExcel->getActiveSheet()->setCellValue('G'.$baris, $data->DESKRIPSI_KEGIATAN);	
			$objPHPExcel->getActiveSheet()->setCellValue('H'.$baris, $data->TUJUAN);	
			$objPHPExcel->getActiveSheet()->setCellValue('I'.$baris, $data->TANGGAL_MULAI);	
			$objPHPExcel->getActiveSheet()->setCellValue('J'.$baris, $data->DURASI);	
			$objPHPExcel->getActiveSheet()->setCellValue('K'.$baris, $data->JAM_MULAI);	
			$objPHPExcel->getActiveSheet()->setCellValue('L'.$baris, $data->JAM_SELESAI);	
			$objPHPExcel->getActiveSheet()->setCellValue('M'.$baris, $data->STATUS);	
 
			$baris++;
		}
 
		$filename="Data-Booking".date("d-m-Y-H-i-s").'.xlsx';
		$objPHPExcel->getActiveSheet()->setTitle("Data Booking");
 
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="'.$filename.'"');
		header('Cache-Control: max-age=0');
 
		$writer=PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
		$writer->save('php://output');
 
		exit;
	}
}
 
?>