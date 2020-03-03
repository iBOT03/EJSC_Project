<?php
class Home extends CI_Controller { //mengextends CI_Controller
    public function index () {
        //menampilkan table database
        $this->load->model("ArtikelModel");
        $data = array("artikel" => $this->ArtikelModel->get());
        $this->load->view("HomeView", $data);
    }

    public function detail($id){
        $this->load->model("ArtikelModel");
        $data = array("artikel" => $this->ArtikelModel->detail($id));
        $this->load->view("DetailView", $data);
    }

    public function tambah(){
        $this->load->model("ArtikelModel");
        if($this->input->method() == "post") {
            $insert = $this->ArtikelModel->tambah(array(
                'JUDUL' => $this->input->post("judul"),
                'PENULIS' => $this->input->post("penulis"),
                'TANGGAL' => date("Y-m-d H:i:s"),
                'ISI' => $this->input->post("isi")
            ));
            if($insert){
                echo "Berhasil Menambahkan Artikel";
            } else {
                echo "Gagal Menambahkan Artikel";
            }            
        }
        $this->load->view("FormView");
    }
}
        //---------------------------------------- POWER POINT KE - 2 ----------------------------------------------//

        // $this->load->model("UserModel"); //memanggil UserModel
        // echo '<pre>';
        // print_r($this->UserModel->get());
        // echo '</pre>';

        // $this->load->model("UserModel");
        // $hapus = $this->UserModel->hapus (2);
        // if($hapus) {
        //     echo "Hapus data Berhasil";
        // }

        // $ubah = $this->UserModel->ubah (array(
        //     //data yang akan diubah
        //     'NAMA' => 'Indra Firmansyah',
        //     'EMAIL' => 'indrafirmansyah@gmail.com',
        //     'ALAMAT' => 'Jl. Sagitarius No.34 Satelit Permai Sumenep'
        // ), 3);
        // if($ubah){
        //     echo "Ubah Data Berhasil";
        // }

        // $this->load->model("UserModel"); //memanggil UserModel
        // $tambah = $this->UserModel->tambah(array(
        //     //data yang akan ditambahkan
        //     'NAMA' => 'Raditya Dinantara Yudha',
        //     'EMAIL' => 'radityayudha@gmail.com',
        //     'ALAMAT' => 'Jl. Sagitarius No.34 Satelit Permai Sumenep'
        // ));
        // if($tambah){
        //     echo "Insert Data Berhasil";
        // }

        // $this->load->library('table'); //memanggil library table
        // $template = array ("table_open"=>"<table border=1 cellpadding=3>");
        // //set table template
        // $this->table->set_template($template);
        // $this->table->set_caption("<h1>Menampilkan Table dengan HTML Table Class</h1>"); //caption
        // $data = array ( //data yang akan dimasukkan ke table
        //         array ('Nama', 'Email', 'Jenis Kelamin'),
        //         array ('Andrea', 'jonathansterben@gmail.com', 'Laki-Laki'),
        //         array ('Qori', 'qoriningtias@gmail.com', 'Perempuan')
        // );
        // echo $this->table->generate ($data); //tampilkan table

       //---------------------------------------- POWER POINT KE - 1 ----------------------------------------------//

        //memanggil library session
        // $this->load->library("session");
        // //set session
        // $this->session->set_userdata("nama", "Politeknik");
        // //show session
        // echo 'Nama Anda : '. $this->session->userdata("nama");
        // echo '<br>Session di Hapus<br>';
        // //hapus session nama
        // $this->session->unset_userdata("nama");
        // echo 'Nama Anda : ' . $this->session->userdata("nama");

        // $error = "";
        // $data = "";

        // function__construct(){
        //     parent::__construct();
        // }

        // if($this->input->method() == "post"){
        //     //config
        //     $config ['upload_path'] = './gambar/';
        //     $config ['allowed_types'] = 'gif|jpg|png';
        //     $config ['max_size'] = 1024;
        //     $config ['max_width'] = 1024;
        //     $config ['max_height'] = 768;

        //     //panggil library
        //     $this->load->library('upload', $config);

        //     //status upload
        //     if(!$this->upload->do_upload('gambar')){
        //         $error = $this->upload->display_errors();
        //     } else {
        //         $data = $this->upload->data();  
        //     }
        // }
        // $this->load->view("HomeView", array('error' => $error, 'data' => $data));

        //cek apakah method = post
        // if ($this->input->method() == "post"){
        //     //tampilkan data
        //     echo "nama : " . $this->input->post("nama") . '<br>';
        //     echo "email : " . $this->input->post("email");
        // }
        // $this->load->view("LoginView");

        // $this->load->helper ("belajar"); //memanggil helper belajar
        // tampilkanTebal("Politeknik Negeri Jember <br>");
        // tampilkanMiring("Jurusan Teknologi Informasi <br>");
        // tampilkanBergaris("2020 <br>"); 

        // $this->load->helper ("form"); //memanggil helper form
        // echo form_open('/'); //membuka form
        // echo form_label('Nama : ') . '<br>'; //membuat label
        // echo form_input('nama') . '<br>'; //membuat textbox
        // echo form_label('Alamat : ') . '<br>'; //membuat label
        // echo form_input('alamat') . '<br>'; //membuat textbox
        // echo form_submit('submit' , 'Kirim Data'); //membuat button
        // echo form_close(); //menutup form

        // $this->load->helper ("url"); //memanggil helper url
        // echo site_url() . '<br>'; //lokasi website
        // echo base_url() . '<br>'; //folder website
        // echo current_url() . '<br>'; //url yg sedang dibuka
        // echo anchor('http://google.com', 'google.com') . '<br>'; //membuat url
        // echo anchor('http://polije.ac.id', 'polije.ac.id') . '<br>';

        // $this->load->helper ("number"); //memanggil helper number
        // echo 'Ukuran GB: ' . byte_format(4512244422) . '<br>';
        // echo 'Ukuran MB: ' . byte_format(52245023) . '<br>';
        // echo 'Ukuran KB: ' . byte_format(145023) . '<br>';

        // $this->load->helper ("html"); //memanggil helper html
        // echo heading('Selamat Datang! (Percobaaan HTML helper [ul&ol]', 1);
        // echo ul (array( //ul
        //     'kesatu',
        //     'kedua',
        //     'ketiga'
        // ));
        // echo ol (array(
        //     'kesatu',
        //     'kedua',
        //     'ketiga'
        // ));
        
        // $this->load->model ("DataModel"); //memanggil data model
        // $dataArr = $this->DataModel->getData(); //menampung fungsi getData()
        //     // echo "nama: " . $dataArr["nama"] . '<br>';
        //     // echo "status: " . $dataArr["status"] . '<br>';
        //     // echo "website: " . $dataArr["website"] . '<br>';
        // $this->load->view ("HomeView"), array("data" =>$dataArr)); //memanggil HomeView dan data array
    

?>