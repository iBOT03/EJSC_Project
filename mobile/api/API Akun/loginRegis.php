<?php
include'koneksi.php';
error_reporting(0);
if($_SERVER['REQUEST_METHOD']=='GET'){
  $email     	= mysqli_real_escape_string($db,$_GET["username"]);
  $pass 	= mysqli_real_escape_string($db,$_GET['password']);
  $type = $_GET["type"];
  if($type == "login"){
    $result 	= mysqli_query($db,"SELECT * FROM akun where EMAIL='$email' and PASSWORD='$pass'") or die(mysqli_error());
    $response["Hasil"] = array();
    if (mysqli_num_rows($result) > 0){
      $response["Hasil"] = array();
      $cari = mysqli_fetch_array($result);
      $hasil = array();
      $hasil["EMAIL"] = $cari[4];
      $hasil["NAMA_LENGKAP"] = $cari[3];
      array_push($response["Hasil"],$hasil);
      $response["success"] = 1;
      echo json_encode($response);
    }else{
      $response["success"] = 0;
      echo json_encode($response);
    }
  } else if($type == "reg"){
    //get variable
    $nik = $_GET['nik'];
    $nama = $_GET['nama_lengkap'];
    $email = $_GET['email'];
    $id_komunitas = $_GET['id_komunitas'];
    $no_telepon = $_GET['no_telepon'];
    $alamat = $_GET['alamat'];
    $foto_ktp = $_GET['foto_ktp'];
    $password = $_GET['password'];
    //gambar
    $namaimage =  rand(1, 10000);
    $tanggal = date("Y-m-d");
    $ImageName ="$namaimage$tanggal.jpg";
    $ImagePath = "foto_ktp/$namaimage$tanggal.jpg";
    $ServerURL = "$ImagePath";
    if($foto_ktp== ""){
      $hasil = array();
      $hasil["pesan"] = "Gambar kosong";
      array_push($response["Hasil"],$hasil);
      $response["success"] = 2;
      echo json_encode($response);
    } else {
      $regis ="INSERT INTO akun(`NIK`, `LEVEL`, `FOTO_KTP`, `NAMA_LENGKAP`, `EMAIL`, `NO_TELEPON`, `ALAMAT`, `ID_KOMUNITAS`, `PASSWORD`, `KOD_RES_PW`)
      VALUES ('$nik', '2', '$ImageName', '$nama', '$email', '$no_telepon', '$alamat', '$id_komunitas', '$password', '0')";
      if($db->query($regis) === true){
        file_put_contents($ImagePath,base64_decode($foto_ktp));
        $hasil = array();
        $hasil["pesan"] = "Berhasil register";
        array_push($response["Hasil"],$hasil);
        $response["success"] = 1;
        echo json_encode($response);
      } else {
        $hasil = array();
        $hasil["pesan"] = "gagal register hubungi admin";
        array_push($response["Hasil"],$hasil);
        $response["success"] = 0;
        echo json_encode($response);
      }
    }
  } else {
    $hasil = array();
    $hasil["pesan"] = "invalid type parameter";
    array_push($response["Hasil"],$hasil);
    $response["success"] = 0;
    echo json_encode($response);
  }

}

?>
