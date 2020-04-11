<?php
require 'setting_server.php';

$query = "SELECT * FROM akun";
$sql = mysqli_query($con, $query);
$array = array();

while($row = mysqli_fetch_array($sql)) {
    array_push($array, array(
        "nik" => $row ['NIK'],
        "level" => $row ['LEVEL'],
        "foto_ktp" => $row ['FOTO_KTP'],
        "nama_lengkap" => $row ['NAMA_LENGKAP'],
        "email" => $row ['EMAIL'],
        "no_telepon" => $row ['NO_TELEPON'],
        "alamat" => $row ['ALAMAT'],
        "id_komunitas" => $row ['ID_KOMUNITAS'],
        "password" => $row ['PASSWORD']
    ));
}

echo json_encode($array);

mysqli_close($con);
?>