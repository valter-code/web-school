<?php
require("../koneksi.php");
session_start();

//untuk logout
if (isset($_SESSION["session-admin"])) {
    session_destroy();
    header("Location: login.php");
    exit;
}else{
    header("Location: login.php");
    exit;
}
?>