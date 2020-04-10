<?php

function belumlogin(){
    $check = get_instance();
    if(!$check->session->userdata('NAMA_LENGKAP')){
        redirect("admin/login");
    }
}

?>