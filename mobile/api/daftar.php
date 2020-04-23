<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
		
    //Mendapatkan Nilai Variable
    $nik = $_POST['nik'];
    $nama = $_POST['nama_lengkap'];
    $email = $_POST['email'];
//    $id_komunitas = $_POST['id_komunitas'];
    $no_telepon = $_POST['no_telepon'];
    $alamat = $_POST['alamat'];
//    $foto_ktp = $_POST['foto_ktp'];
    $password = $_POST['password'];

    //Import File Koneksi database
    require_once('koneksi.php');

    $checkSQL = "SELECT * FROM akun WHERE EMAIL = '$email'";
    $check = mysqli_fetch_array(mysqli_query($con, $checkSQL));
    
    if(isset($check)){
	echo 'Email sudah terdaftar, gunakan email lain.';
    } else {
	$sql = "INSERT INTO akun (NIK,NAMA_LENGKAP,EMAIL,NO_TELEPON,ALAMAT,PASSWORD)
                VALUES ('$nik', '$nama', '$email', '$no_telepon', '$alamat', '$password')";
	if(mysqli_query($con, $sql)) {
		echo 'Pendaftaran Berhasil!';
	} else {
		echo 'Pendaftaran Gagal!';
	}
    }


    //Pembuatan Syntax SQL
    //$sql = "INSERT INTO akun (NIK,NAMA_LENGKAP,EMAIL,NO_TELEPON,ALAMAT,PASSWORD)
    //VALUES ('$nik', '$nama', '$email', '$no_telepon', '$alamat', '$password')";    
    
    //Eksekusi Query database
    //if(mysqli_query($con,$sql)){
        //echo 'Berhasil Menambahkan Pegawai';
    //}else{
        //echo 'Gagal Menambahkan Pegawai';
    //}
    
    mysqli_close($con);
}
?>
