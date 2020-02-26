<?php
class home extends CI_Controller { //extends controller
    public function index() {
        //memanggil library session
        $this->load->library("session");
        //set session
        $this->session->set_userdata("nama", "Politeknik");
        //show session
        echo 'Nama Anda : ' . $this->session->userdata("nama");
        echo '<br>Session dihapus<br>';
        //hapus session nama
        $this->session->unset_userdata("nama");
        echo 'Nama Anda : ' . $this->session->userdata("nama");


        // $error = "";
        // $data = "";

        // if($this->input->method() == "post") {
        //     //konfigurasi
        //     $config['upload_path'] = './gambar/';
        //     $config['allowed_types'] = 'gif|jpg|png';
        //     $config['max_size'] = 1024;
        //     $config['max_width'] = 1024;
        //     $config['max_height'] = 768;

        //     //panggil library
        //     $this->load->library('upload', $config);

        //     //cek apakah gagal upload
        //     if(!$this->upload->do_upload('gambar')) {
        //         $error = $this->upload->display_errors();
        //     } else { //jika berhasil di upload
        //         $data = $this->upload->data();
        //     }
        // }

        // $this->load->view("HomeView", array(
        //     'error' => $error,
        //     'data' => $data
        // ));


        //cek apakah method post
        // if ($this->input->method() == "post") {
        //     //tampilkan data
        //     echo "nama : " . $this->input->post("nama"). '<br>';
        //     echo "email : " . $this->input->post("email");
        // }
        // $this->load->view("HomeView");


        // $this->load->helper("belajar"); //memanggil helper belajar
        // tampilkanTebal("Politeknik Negeri Jember <br>");
        // tampilkanMiring("Jurusan Teknologi Informasi <br>");
        // tampilkanBergaris("2020 <br>");


        // $this->load->helper("form"); //memanggil helper form
        // echo form_open('/'); //membuka form
        // echo form_label('Nama : ') . '<br>'; //membuat label
        // echo form_input('nama') . '<br>'; //membuat textbox
        // echo form_label('Alamat : ') . '<br>'; //membuat label
        // echo form_textarea('alamat') . '<br>'; //membuat textbox
        // echo form_submit('submit', 'Kirim Data'); //membuat tombol
        // echo form_close(); //menutup form


        // $this->load->helper("url"); //memanggil helper url
        // echo site_url() . '<br>'; //lokasi website
        // echo base_url() . '<br>'; //folder lokasi website
        // echo current_url() . '<br>'; //url yg sedang dibuka
        // echo anchor('http://google.com', 'google.com') . '<br>'; //membuat url
        // echo anchor('http://polije.ac.id', 'polije.ac.id');


        // $this->load->helper("number"); //memanggil helper number
        // echo 'Ukuran GB : ' . byte_format (4512244422) . '<br>';
        // echo 'Ukuran MB : ' . byte_format (52245023) . '<br>';
        // echo 'Ukuran KB : ' . byte_format (145023);


        // $this->load->helper ("html"); //memanggil helper html
        // echo heading ('Selamat Sore', 1); //heading
        // echo ul (array (
        //     'kesatu',
        //     'kedua',
        //     'ketiga'
        // ));

        // echo ol (array (
        //     'kesatu',
        //     'kedua',
        //     'ketiga'
        // ));

        
        // $this->load->model("DataModel"); //memanggil DataModel
        // $dataArr = $this->DataModel->getData(); //menampung funsgi getData
        // echo "Hello World";
        // echo "nama : " . $dataArr["nama"] . '<br>';
        // echo "status : " . $dataArr["status"] . '<br>';
        // echo "website : " . $dataArr["website"] . '<br>';

        // $this->load->view("HomeView", array("data"=>$dataArr)); //memanggil HomeView
    }
}
?>