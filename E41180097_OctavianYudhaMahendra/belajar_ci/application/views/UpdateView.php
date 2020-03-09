<h1>Update Artikel</h1>
<form method="post">
    <div>
        <label for="penulis">Penulis :</label><br>
        <input type="text" id="penulis" name="penulis" value="<?php echo $artikel[0]->penulis; ?>"><br>
    </div>
    <div>
        <label for="judul">Judul :</label><br>
        <input type="text" id="judul" name="judul" value="<?php echo $artikel[0]->judul; ?>"><br>
    </div>    
    <div>
        <label for="isi">Isi</label><br>
        <textarea name="isi" id="isi" cols="50" rows="8"><?php echo $artikel[0]->isi; ?></textarea><br>
    </div>
    <button type="submit">Update</button>
    <button type="reset">Reset</button>
    <a href="<?= base_url()?>"><button type="button">Kembali</button></a>
</form>
