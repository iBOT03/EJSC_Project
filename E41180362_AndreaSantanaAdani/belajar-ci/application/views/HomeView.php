<h1>CRUD dengan CodeIgniter</h1>
<h3><a href="index.php/home/tambah">+ Tambah Artikel</a></h3>
<table border="1" cellpadding="5">
    <tr>
        <th>Judul</th>
        <th>Penulis</th>
        <th>Tanggal</th>
        <th>Isi</th>
        <th>Aksi</th>
    </tr>
    <?php
        foreach($artikel as $row) {
            ?>
            <tr>
                <td><?php echo $row->JUDUL; ?></td>
                <td><?php echo $row->PENULIS; ?></td>
                <td><?php echo $row->TANGGAL; ?></td>
                <td><?php echo substr($row->ISI, 0, 70); ?>...</td>
                <td>
                    <a href="<?php echo "index.php/home/detail/". $row->ID; ?>">Detail</a>
                    <a href="<?php echo "index.php/home/ubah/". $row->ID; ?>">Ubah</a>
                    <a href="<?php echo "index.php/home/hapus/". $row->ID; ?>">Hapus</a>
                </td>
            </tr>
            <?php
        }
    ?>
</table>

<!-- <h1>Selamat Datang di Website CI Pertama Saya (Percobaan HomeView)</h1>
<p>Berikut ini Mahasiswa Yang Membuat: </p> -->

<!-- Nama : <?php //echo $data["nama"]; ?> <br>
Status : <?php //echo $data["status"]; ?> <br>
Website : <?php //echo $data["website"]; ?> <br> -->

<!-- <h1>Upload Gambar</h1>
<?php
    //echo $error;
    //if($data) {
        ?>
        <h3>Gambar Berhasil Di Upload</h3>
        <img src="<?//=base_url()?>gambar/<?php //echo $data["file_name"]; ?>" width="250">
        <?php
    //}
?>

<form method="post" enctype="multipart/form-data">
    <input type="file" name="gambar" id="gambar">
    <button type="submit">Upload</button>
</form> -->

