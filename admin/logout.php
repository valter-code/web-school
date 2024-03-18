<?php
    session_start();
    if(isset($_SESSION["admin-session"])){
        session_destroy();
        header("Location: login.php");
        exit;
    }
?>