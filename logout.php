<?php
    require("koneksi.php");
    session_start();

    if(isset($_SESSION["session-siswa"])){
        unset($_SESSION["session-siswa"]);
        echo "<script>alert('Berhasil Logout!');document.location.href = 'index.php'</script>";
        exit;
    }
?>