<?php
    class Home extends CI_Controller { //mengextends CI_Controller
        public function index () { 
            $this->load->helper ("url"); //memanggil helper url
            echo site_url () . '<br>'; //lokasi website
            echo base_url () . '<br>'; //folder lokasi websie
            echo current_url() . '<br>'; //url yg sedang dibuka
            echo anchor ('htpp://google.com', 'google.com') . '<br>'; //membuat url
            echo anchor ('http://polije.ac.id', 'polije.ac.id');

            //echo 'ukuran GB : '. byte_format (4512244422) . '<br>';
            //echo 'ukuran MB : '. byte_format (52245023) . '<br>';
            //echo 'ukuran KB : '. byte_format (145023);

           // echo heading ('Selamat Datang!', 1); //heading
            //echo ul (array ( //ul)
                //'kesatu',
                //'kedua',
                //'ketiga'
            //));
            //echo ol (array ( //ol
                //'kesatu',
                //'kedua',
                //'ketiga'
            //));
            //$dataArr = $this->DataModel->getData (); 
            //menampung fungsi getData()

        //echo "nama : " . $dataArr["nama"] . '<br>';
        //echo "status : " . $dataArr["status"] . '<br>';
        //echo "website : " . $dataArr["website"] . '<br>';

        //$this->load->view ("HomeView", array("data" => $dataArr));
         //memanggil HomeView

        }
    }
?>