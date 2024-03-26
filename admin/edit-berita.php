<?php
    require("../koneksi.php");
    $id = $_GET["id"];

    $query = "SELECT * FROM berita WHERE id = ?";
    $statement = mysqli_prepare($koneksi, $query);
    mysqli_stmt_bind_param($statement,"i", $id);
    mysqli_stmt_execute($statement);
    $result = mysqli_stmt_get_result($statement);
    $berita = mysqli_fetch_assoc($result);

    // $result = mysqli_query($koneksi, $query);
    // $berita = mysqli_fetch_assoc($result);

    if(isset($_POST["edit"])){
        // var_dump($_POST);
        // var_dump($_FILES); die;

        if(editBerita($_POST) > 0){
            echo "<script>alert('Berhasil update berita!'); document.location.href = 'berita.php'</script>";
        }else{
            echo "<script>alert('Gagal update berita!'); document.location.href = 'berita.php'</script>";

        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit berita</title>
</head>
<body>
    <h1>edit berita</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" id="id" value="<?php echo $berita["id"] ?>">
        <ul>
            <li>
                <label for="judul_berita">judul berita</label>
                <input type="text" name="judul_berita" id="judul_berita" value="<?php echo $berita["judul_berita"] ?>">
            </li>
            <li>
                <label for="penulis">judul berita</label>
                <input type="text" name="penulis" id="penulis" value="<?php echo $berita["penulis"] ?>">
            </li>
            <li>
                <label for="isi_berita">isi berita</label>
                <input type="text" name="isi_berita" id="isi_berita" value="<?php echo $berita["isi_berita"] ?>">
            </li>
            <li>
                <img src="../img-berita/<?php echo $berita["gambar_berita"] ?>" width="50px" height="30px"><br>
                <label for="gambar_berita">gambar berita</label><br>
                <input type="file" name="gambar_berita" id="gambar_berita" value="<?php echo $berita["gambar_berita"] ?>">
            </li>
            <li>
                <button type="submit" name="edit">edit</button>
            </li>
        </ul>

    </form>
</body>
</html>