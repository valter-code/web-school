<?php
    require("../koneksi.php");
    
    if(isset($_POST["tambah"])){
        $nama = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["nama_siswa"]));
        $jurusan = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["jurusan_siswa"]));
        $password_siswa = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["password_siswa"]));

        //query insert
        $query = "INSERT INTO siswa VALUES ('', '$nama', '$jurusan', '$password_siswa')";
        $result = mysqli_query($koneksi, $query);
        if(mysqli_affected_rows($koneksi) > 0){
            echo "Berhasil tambah data siswa";
        }else{
            echo "Gagal tambah data siswa";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Siswa</title>
</head>
<body>
    <h2>tambah data msiswa</h2>
    <form action="" method="post">
        <ul>
            <li>
                <label for="nama_siswa">nama</label>
                <input type="text" name="nama_siswa" id="nama_siswa">
            </li>
            <li>
                <label for="jurusan_siswa">jurusan</label>
                <input type="text" name="jurusan_siswa" id="jurusan_siswa">
            </li>
            <li>
                <label for="password_siswa">password</label>
                <input type="text" name="password_siswa" id="password_siswa">
            </li>
            <li>
                <button type="submit" name="tambah">tambah</button>
            </li>
        </ul>
    </form>
</body>
</html>