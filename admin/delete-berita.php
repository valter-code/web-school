<?php
    require("../koneksi.php");

    $id = $_GET["id"];

    if(deleteBerita($id)){
        echo "<script>alert('Berhasil menghapus berita'); document.location.href = 'berita.php'</script>";
        exit;
    }else{
        echo "<script>alert('Gagal menghapus berita'); document.location.href = 'berita.php'</script>";
        exit;
    }
?>