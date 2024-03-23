<?php
    require("../koneksi.php");
    session_start();

    //kick jika belum login
    if(!isset($_SESSION["session-guru"])){
        header("Location: ../admin/login.php");
        exit;
    }

    $id = $_GET["id_siswa"];
    if(deleteSiswa($id) > 0){
        echo "<script>alert('Berhasil Hapus Data Siswa!'); document.location.href = 'siswa.php'</script>";
        exit;
    }

?>