<?php
    require("../koneksi.php");
    session_start();

    //untuk logout
    if(isset($_SESSION["session-guru"])){
        session_destroy();
        header("Location: ../admin/login.php");
        exit;
    }
?>