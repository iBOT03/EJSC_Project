<h1>Tambah Artikel</h1>
<form method="post">
    <div>
        <label for="judul">Judul :</label><br>
        <input type="text" id="judul" name="judul">
    </div>
    <div>
        <label for="penulis">Penulis :</label><br>
        <input type="text" id="penulis" name="penulis">
    </div>
    <div>
        <label for="isi">Isi</label><br>
        <textarea name="isi" cols="50" row="8" id="isi"></textarea>
    </div>
    <button type="submit">Tambah</button>
    <button type="reset">Reset</button>
    <a href="<?= base_url()?>"><button type="button">Kembali</button></a>
</form>