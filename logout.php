<?php
    require("koneksi.php");
    session_start();

    if(isset($_SESSION["session-siswa"])){
        session_destroy();
        echo "<script>alert('Berhasil Logout!');document.location.href = 'index.php'</script>";
        exit;
    }
?>