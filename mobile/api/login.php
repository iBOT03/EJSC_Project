<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    include 'config.php';
    $con = mysqli_connect($HostName,$HostUser,$HostPass,$DatabaseName);
    $email = $_POST['EMAIL'];
    $password = $_POST['PASSWORD'];
    $Sql_Query = "SELECT * FROM akun WHERE EMAIL = '$email' AND PASSWORD = '$password'";
    $check = mysqli_fetch_array(mysqli_query($con,$Sql_Query));
    if(isset($check)){
        echo "Selamat Datang di EJSC";
    } else {
        echo "Email atau Password salah, mohon coba lagi";
    }
    mysqli_close($con);
} else {
    echo "Mohon Isi Email dan Kata Sandi Anda";
}
?>
