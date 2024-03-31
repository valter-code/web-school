<?php
require("../koneksi.php");
session_start();

//untuk logout
if (isset($_SESSION["session-admin"])) {
    session_destroy();
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGOUT</title>
    <link href="./src/output.css" rel="stylesheet">
</head>

<body>
    <h1 class="text-violet-800">BERHASIL LOGOUT</h1>
</body>

</html>