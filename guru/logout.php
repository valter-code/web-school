<?php
    session_start();
    if(isset($_SESSION["guru-session"])){
        session_destroy();
        header("Location: ../admin/login.php");
        exit;
    }
?>