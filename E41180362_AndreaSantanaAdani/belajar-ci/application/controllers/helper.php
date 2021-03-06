<?php
class Home extends CI_Controller { //mengextends CI_Controller
    public function index () {
        $this->load->helper ("belajar"); //memanggil helper belajar
        tampilkanTebal("Politeknik Negeri Jember <br>");
        tampilkanMiring("Jurusan Teknologi Informasi <br>");
        tampilkanBergaris("2020 <br>"); 

        $this->load->helper ("form"); //memanggil helper form
        echo form_open('/'); //membuka form
        echo form_label('Nama : ') . '<br>'; //membuat label
        echo form_input('nama') . '<br>'; //membuat textbox
        echo form_label('Alamat : ') . '<br>'; //membuat label
        echo form_input('alamat') . '<br>'; //membuat textbox
        echo form_submit('submit' , 'Kirim Data'); //membuat button
        echo form_close(); //menutup form

        $this->load->helper ("url"); //memanggil helper url
        echo site_url() . '<br>'; //lokasi website
        echo base_url() . '<br>'; //folder website
        echo current_url() . '<br>'; //url yg sedang dibuka
        echo anchor('http://google.com', 'google.com') . '<br>'; //membuat url
        echo anchor('http://polije.ac.id', 'polije.ac.id') . '<br>';

        $this->load->helper ("number"); //memanggil helper number
        echo 'Ukuran GB: ' . byte_format(4512244422) . '<br>';
        echo 'Ukuran MB: ' . byte_format(52245023) . '<br>';
        echo 'Ukuran KB: ' . byte_format(145023) . '<br>';

        $this->load->helper ("html"); //memanggil helper html
        echo heading('Selamat Datang! (Percobaaan HTML helper [ul&ol]', 1);
        echo ul (array( //ul
            'kesatu',
            'kedua',
            'ketiga'
        ));
        echo ol (array(
            'kesatu',
            'kedua',
            'ketiga'
        ));
        $this->load->view("HomeView");
    }
}
?>