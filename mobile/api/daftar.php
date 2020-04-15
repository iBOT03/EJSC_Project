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
    
    //Pembuatan Syntax SQL
    $sql = "INSERT INTO akun (NIK,NAMA_LENGKAP,EMAIL,NO_TELEPON,ALAMAT,PASSWORD)
    VALUES ('$nik', '$nama', '$email', '$no_telepon', '$alamat', '$password')";
    
    //Import File Koneksi database
    require_once('koneksi.php');
    
    //Eksekusi Query database
    if(mysqli_query($con,$sql)){
        echo 'Berhasil Menambahkan Pegawai';
    }else{
        echo 'Gagal Menambahkan Pegawai';
    }
    
    mysqli_close($con);
}
?>
