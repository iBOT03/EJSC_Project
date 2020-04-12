<?php
if($_SERVER['REQUEST_METHOD']=='POST') {
    include 'config.php';
    $con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);

    $nik = $_POST['NIK'];
    $nama = $_POST['NAMA_LENGKAP'];
    $email = $_POST['EMAIL'];
//    $id_komunitas = $_POST['ID_KOMUNITAS'];
    $no_telepon = $_POST['NO_TELEPON'];
    $alamat = $_POST['ALAMAT'];
//    $foto_ktp = $_POST['FOTO_KTP'];
    $password = $_POST['PASSWORD'];

    $CheckSQL = "SELECT * FROM akun WHERE NIK = '$nik'";
    $check = mysqli_fetch_array(mysqli_query($con,$CheckSQL));

    if(isset($check)) {
        echo 'Akun Telah Terdaftar dengan NIK ' . $nik;
    } else {
        $Sql_Query = "INSERT INTO akun (NIK,NAMA_LENGKAP,EMAIL,NO_TELEPON,ALAMAT,PASSWORD)
        values ('$nik', '$nama', '$email', '$no_telepon', '$alamat', '$password')";

        if(mysqli_query($con,$Sql_Query)) {
            echo 'Pendaftaran Akun Berhasil';
        } else {
            echo "Terjadi kesalahan saat melakukan registrasi";
        }
    }
    mysqli_close($con);
} else {
    echo "Mohon Isi Semua Data";
}
?>
