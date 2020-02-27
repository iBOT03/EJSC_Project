<?php
    class Home extends CI_Controller{ //mengextends CI_Controller
        public function index(){
            $this->load->helper ("url"); //memanggil helper url
            echo site_url () . '<br>'; // lokasi website
            echo base_url () . '<br>'; // folder lokasi website
            echo current_url () . '<br>'; // url yang sedang dibuka
            echo anchor ('http://google.com', 'google.com') . '<br>';
            // membuat URL
            echo anchor ('http://polije.ac.id', 'polije.ac.id');
    }
}
?>