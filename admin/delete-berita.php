<?php
    require("../koneksi.php");

    $id = $_GET["id"];

    if(deleteBerita($id)){
        echo "<script>alert('Berhasil menghapus data mahasiswa'); document.location.href = 'berita.php'</script>";
        exit;
    }else{
        echo "<script>alert('Gagal menghapus data mahasiswa'); document.location.href = 'berita.php'</script>";
        exit;
    }
?>