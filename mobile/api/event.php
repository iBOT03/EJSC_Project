<?php
	include_once('koneksi.php'); //koneksi database
 
    $query = "SELECT * FROM event"; //select table in database
    $sql = mysqli_query($con, $query);
    $result = array();
    while ($row = mysqli_fetch_array($sql)) {
//		$result[] = $row;
		array_push($result,array(
			"id_event"=>$row['ID_EVENT'],
			"judul"=>$row['JUDUL'],
			"foto"=>$row['FOTO'],
			"id_event"=>$row['ID_EVENT'],
			"penyelenggara"=>$row['PENYELENGGARA'],
			"nama_pengisi_acara"=>$row['NAMA_PENGISI_ACARA'],
			"tanggal_mulai"=>$row['TANGGAL_MULAI'],
			"tanggal_selesai"=>$row['TANGGAL_SELESAI'],
			"waktu"=>$row['WAKTU'],
			"id_ruangan"=>$row['ID_RUANGAN'],
			"asal_peserta"=>$row['ASAL_PESERTA'],
			"jumlah_peserta"=>$row['JUMLAH_PESERTA'],
			"keterangan"=>$row['KETERANGAN'],
			"status"=>$row['STATUS']
	 	));
    }
 
    echo json_encode($result);
?>