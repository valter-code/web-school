<?php
require("../koneksi.php");
session_start();

//untuk logout
if (isset($_SESSION["session-guru"])) {
    session_destroy();
    header("Location: ../admin/login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <link href="./src/output.css" rel="stylesheet">
</head>

<body>
    <h1>BERHASIL LOGOUT</h1>
</body>

</html>