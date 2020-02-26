<!-- <h1>Selamat Datang di Website CI Pertama Saya (Percobaan HomeView)</h1>
<p>Berikut ini Mahasiswa Yang Membuat: </p> -->

<!-- Nama : <?php //echo $data["nama"]; ?> <br>
Status : <?php //echo $data["status"]; ?> <br>
Website : <?php //echo $data["website"]; ?> <br> -->

<h1>Upload Gambar</h1>
<?php
    echo $error;
    if($data) {
        ?>
        <h3>Gambar Berhasil Di Upload</h3>
        <img src="<?=base_url()?>gambar/<?php echo $data["file_name"]; ?>" width="250">
        <?php
    }
?>

<form method="post" enctype="multipart/form-data">
    <input type="file" name="gambar" id="gambar">
    <button type="submit">Upload</button>
</form>

