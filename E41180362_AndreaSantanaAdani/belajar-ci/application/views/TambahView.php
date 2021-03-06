<!-- <h1>Tambah Artikel</h1>
<form method="post">
    <div>
        <label for="penulis">Penulis :</label><br>
        <input type="text" id="penulis" name="penulis"><br>
    </div>
    <div>
        <label for="judul">Judul :</label><br>
        <input type="text" id="judul" name="judul"><br>
    </div>    
    <div>
        <label for="isi">Isi</label><br>
        <textarea name="isi" id="isi" cols="50" rows="8"></textarea><br>
    </div>
    <button type="submit">Insert</button>
    <button type="reset">Reset</button>
    <a href="//base_url()"><button type="button">Kembali</button></a>
</form> -->
<!DOCTYPE html>
<html>

<head>
    <title>Preview</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <script>
        function tampilkanPreview(gambar, idpreview) {
            //                membuat objek gambar
            var gb = gambar.files;
            //                loop untuk merender gambar
            for (var i = 0; i < gb.length; i++) {
                //                    bikin variabel
                var gbPreview = gb[i];
                var imageType = /image.*/;
                var preview = document.getElementById(idpreview);
                var reader = new FileReader();
                if (gbPreview.type.match(imageType)) {
                    //                        jika tipe data sesuai
                    preview.file = gbPreview;
                    reader.onload = (function(element) {
                        return function(e) {
                            element.src = e.target.result;
                        };
                    })(preview);
                    //                    membaca data URL gambar
                    reader.readAsDataURL(gbPreview);
                } else {
                    //                        jika tipe data tidak sesuai
                    alert("Type file tidak sesuai. Khusus image.");
                }
            }
        }
    </script>
</head>

<body>
    <form id="myForm" action="" method="get">
        <!--'preview' di bawah ini adalah id element img-->
        <input type="file" accept="image/*" onchange="tampilkanPreview(this,'preview')" />
        <input type="submit" value="Upload" /><br />
        <!--element image untuk menampilkan preview-->
        <img id="preview" src="" alt="" width="320px" />
    </form>
</body>

</html>