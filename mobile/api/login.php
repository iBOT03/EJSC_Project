<?php
if($_SERVER['REQUEST_METHOD']=='POST'){
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $sql = "SELECT * FROM akun WHERE EMAIL = '$email' AND PASSWORD = '$password'";

    //Import File Koneksi database
    require_once('koneksi.php');

    //Eksekusi Query database
    if(mysqli_query($con,$sql)){
        echo 'Selamat Datang di EJSC';
    }else{
        echo 'Email atau Password Anda Salah';
    }
    
    mysqli_close($con);
}
