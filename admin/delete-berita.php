<?php
    require("../koneksi.php");
    $id_berita = $_GET["id"];

    if(delete_berita($id_berita) > 0){
        echo "<script>alert('Berhasil Hapus Data Berita'); document.location.href = 'berita.php'</script>";
        exit;
    }else{
        echo "<script>alert('Gagal Hapus Data Berita'); document.location.href = 'berita.php'</script>";
        exit;
    }
?>