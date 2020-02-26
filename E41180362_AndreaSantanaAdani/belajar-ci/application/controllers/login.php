<?php
class Home extends CI_Controller { //mengextends CI_Controller
    public function index () {
        //cek apakah method = post
        if ($this->input->method() == "post"){
            //tampilkan data
            echo "nama : " . $this->input->post("nama") . '<br>';
            echo "email : " . $this->input->post("email");
        }
        $this->load->view("LoginView");
    }
}
?>