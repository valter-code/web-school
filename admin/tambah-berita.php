<?php
    require("../koneksi.php");
    
    if(isset($_POST["tambah"])){
        $judul_berita = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["judul_berita"]));
        $isi_berita = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["isi_berita"]));
        $penulis = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["penulis"]));

        //query insert
        $query = "INSERT INTO berita VALUES ('', '$judul_berita', '$isi_berita', '$penulis', '')";
        $result = mysqli_query($koneksi, $query);
        if(mysqli_affected_rows($koneksi) > 0){
            echo "Berhasil tambah berita";
        }else{
            echo "Gagal tambah berita";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Berita</title>
</head>
<body>
    <h2>tambah Berita</h2>
    <form action="" method="post">
        <ul>
            <li>
                <label for="judul_berita">Judul Berita</label>
                <input type="text" name="judul_berita" id="judul_berita">
            </li>
            <li>
                <label for="isi_berita">isi berita</label>
                <textarea id="comment" name="isi_berita" placeholder=""></textarea>
            </li>
            <li>
                <label for="penulis">penulis</label>
                <input type="text" name="penulis" id="penulis">
            </li>
            <li>
                <button type="submit" name="tambah">tambah</button>
            </li>
        </ul>
    </form>
</body>
</html>