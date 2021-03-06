<?php
class home extends CI_Controller { //extends controller

    public function __construct(){
        parent::__construct();
        $this->load->model("ArtikelModel");
    }

    public function index() {
        $data = array("artikel" => $this->ArtikelModel->get());
        $this->load->view("HomeView", $data);
    }

    public function detail($id){
        $data = array("artikel" => $this->ArtikelModel->detail($id));
        $this->load->view("DetailView", $data);
    }

    public function tambah() {
        $autoReload = base_url();
        if($this->input->method() == "post") {
            $insert = $this->ArtikelModel->tambah(array(
                'judul' => $this->input->post("judul"),
                'penulis' => $this->input->post("penulis"),
                'isi' => $this->input->post("isi"),
                'tanggal' => date("Y-m-d H:i:s")
            ));
            if($insert) {
                echo "Berhasil Menambah Artikel";
                redirect($autoReload);
            } else {
                echo "Gagal Menambah Artikel";
            }
        }
        $this->load->view("TambahView");
    }

    public function update($id) {
        $autoReload = base_url();
        $data["artikel"] = $this->ArtikelModel->detail($id);        
        if($this->input->method() == "post"){
            $update = $this->ArtikelModel->update(array(
                'judul' => $this->input->post("judul"),
                'penulis' => $this->input->post("penulis"),
                'isi' => $this->input->post("isi"),
                'tanggal' => date("Y-m-d H:i:s")
            ), $id);
            if($update){
                echo "Data Berhasil di Update";
                redirect($autoReload);
            } else {
                echo "Data Gagal di Update";
            }
        }
        $this->load->view("UpdateView", $data);
    }

    public function hapus($id) {
        $autoReload = base_url();
        $hapus = $this->ArtikelModel->hapus($id);
        if($hapus) {
            echo "Hapus Artikel Berhasil";
        }
    }
}


        // $this->load->model("DataModel");
        // $hapus = $this->DataModel->hapus(3);
        // if($hapus) {
        //     echo "Hapus Data Berhasil";
        // }


        // $this->load->model("DataModel");
        // $ubah = $this->DataModel->ubah(array(
        //     'nama' => 'yu', //data yg diubah
        //     'email' => 'yu',
        //     'alamat' => 'jember'
        // ));
        // if($ubah) {
        //     echo "Ubah Data Berhasil";
        // }


        // $this->load->model("DataModel"); //memanggil DataModel
        // $tambah = $this->DataModel->tambah(array(
        //     //data yg akan ditambah
        //     'nama' => 'Octavian',
        //     'email' => 'octavian',
        //     'alamat' => 'perumnas'
        // ));
        // if($tambah) {
        //     echo "Tambah Data Berhasil";
        // }


        // $this->load->model("DataModel"); //memanggil DataModel
        // echo '<pre>';
        // print_r($this->DataModel->get());
        // echo '<pre>';


        // $this->load->library('table'); //memanggil library tabel
        // $template = array(
        //     "table_open"=>"<table_border=1 cellpadding=3>"
        // );
        // //set table template
        // $this->table->set_template($template);
        // $this->table->set_caption(
        //     "<h1>Menampilkan Tabel dengan HTML Table Class</h1>" //caption
        // );
        // $data = array( //data yg akan dimasukkan ke tabel
        //     array('Nama', 'Email', 'Jenis Kelamin'),
        //     array('Octavian Yudha Mahendra', 'yudhaoctavian01@gmail.com', 'Laki-laki')
        // );
        // echo $this->table->generate($data); //tampilkan tabel


        // //memanggil library session
        // $this->load->library("session");
        // //set session
        // $this->session->set_userdata("nama", "Politeknik");
        // //show session
        // echo 'Nama Anda : ' . $this->session->userdata("nama");
        // echo '<br>Session dihapus<br>';
        // //hapus session nama
        // $this->session->unset_userdata("nama");
        // echo 'Nama Anda : ' . $this->session->userdata("nama");


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
//    }
//}
?>