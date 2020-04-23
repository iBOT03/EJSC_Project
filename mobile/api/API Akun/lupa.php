<?php
error_reporting(0);
include'koneksi.php';
$emel = mysqli_real_escape_string($db,$_POST["email"]);
$kode = mysqli_real_escape_string($db,$_POST["kode"]);
$pw   = mysqli_real_escape_string($db,$_POST["pass"]);
$type = $_POST['type'];
if($type == "lupa"){
  $cek = mysqli_query($db,"SELECT * FROM akun where EMAIL='$emel'") or die(mysqli_error());
  $cari = mysqli_fetch_array($cek);
  $getnohp = $cari[5];
  $nohp = substr($getnohp,1,12);
  if (mysqli_num_rows($cek) > 0){
    $randcode = (rand(10,1000000));
    $simpan ="UPDATE akun SET `KOD_RES_PW` ='$randcode' WHERE `EMAIL`='$emel'";
    if($db->query($simpan) === true){
      include ( "NexmoLib.php" );
      $nexmo_sms = new NexmoMessage('b1139bd3', 'PChxA8wFEtwgaUIb');
      $info = $nexmo_sms->sendText( '+62'.$nohp.'', 'gen z', 'Kode Reset password : '.$randcode.'' );
      $response["Hasil"] = array();
      $hasil = array();
      $hasil["code_otp"] = $randcode;
      $hasil["email"] = $emel;
      array_push($response["Hasil"],$hasil);
      $response["success"] = 1;
      echo json_encode($response);
    } else {
      $response["Hasil"] = array();
      $hasil = array();
      $hasil["pesan"] = $db->error;
      array_push($response["Hasil"],$hasil);
      $response["success"] = 2;
      echo json_encode($response);
    }
  } else {
    $response["Hasil"] = array();
    $hasil = array();
    $hasil["pesan"] = "Email $emel tidak terdaftar";
    array_push($response["Hasil"],$hasil);
    $response["success"] = 0;
    echo json_encode($response);
  }
} else if($type == "verifkode"){
  $cekkode = mysqli_query($db,"SELECT * FROM akun WHERE EMAIL='$emel'") or die(mysqli_error());
  $cari = mysqli_fetch_array($cekkode);
  $kodenya = $cari[9];
  if($kode == $kodenya){
    $response["Hasil"] = array();
    $hasil = array();
    $hasil["pesan"] = "Kode benar !";
    $hasil["email"] = $emel;
    array_push($response["Hasil"],$hasil);
    $response["success"] = 1;
    echo json_encode($response);
  } else {
    $response["Hasil"] = array();
    $hasil = array();
    $hasil["pesan"] = "Kode Salah !";
    array_push($response["Hasil"],$hasil);
    $response["success"] = 0;
    echo json_encode($response);
  }
} else if($type == "respass"){
  $cekusr = mysqli_query($db,"SELECT * FROM akun WHERE EMAIL='$emel'")or die(mysqli_error());
  if(mysqli_num_rows($cekusr) >0){
    $updatepw ="UPDATE akun SET `PASSWORD` ='$pw' WHERE `EMAIL`='$emel'";
    if($db->query($updatepw) === true){
      $response["Hasil"] = array();
      $hasil = array();
      $hasil["pesan"] = "Berhasil mengganti password";
      array_push($response["Hasil"],$hasil);
      $response["success"] = 1;
      echo json_encode($response);
    } else {
      $response["Hasil"] = array();
      $hasil = array();
      $hasil["pesan"] = $db->error;
      array_push($response["Hasil"],$hasil);
      $response["success"] = 2;
      echo json_encode($response);
    }
  } else {
    $response["Hasil"] = array();
    $hasil = array();
    $hasil["pesan"] = "Gagal mengganti password !";
    array_push($response["Hasil"],$hasil);
    $response["success"] = 0;
    echo json_encode($response);
  }
} else {
  $response["Hasil"] = array();
  $hasil = array();
  $hasil["pesan"] = "Invalid type parameter !";
  array_push($response["Hasil"],$hasil);
  $response["success"] = 0;
  echo json_encode($response);
}
?>
