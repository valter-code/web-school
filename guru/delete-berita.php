<?php
    require("../koneksi.php");
    session_start();

    //kick jika belum login
    if(!isset($_SESSION["session-guru"])){
        header("Location: ../admin/login.php");
        exit;
    }

    $id = $_GET["id"];

    if(deleteBerita($id)){
        echo "<script>alert('Berhasil menghapus data mahasiswa'); document.location.href = 'berita.php'</script>";
        exit;
    }else{
        echo "<script>alert('Gagal menghapus data mahasiswa'); document.location.href = 'berita.php'</script>";
        exit;
    }
?>