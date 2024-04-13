<?php
require("koneksi.php");
session_start();

if (isset($_POST["login"])) {
    $nisn = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["nisn_siswa"]));
    $_SESSION["nisn-siswa"] = $nisn;
    $password = htmlspecialchars(mysqli_real_escape_string($koneksi, $_POST["password_siswa"]));

    $query = "SELECT * FROM siswa WHERE nisn_siswa = '$nisn'";
    $result = mysqli_query($koneksi, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password_siswa"])) {
            $_SESSION["session-siswa"] = true;
            header("Location: index.php");
            exit;
        }
    }
    $error = true;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="shortcut icon" href="./src/assets/logo.svg" type="image/x-icon">
    <link href="./src/output.css" rel="stylesheet">
</head>

<body>
    <div class="bg-[url('https://i.pinimg.com/originals/a5/dd/de/a5ddde2a6c8944df7cb4bc4f3da9679a.gif')] h-screen bg-cover">

        <div id=" login" class="fixed flex justify-center items-center bg-black bg-opacity-75 z-50 top-0 w-screen h-screen ">
            <form action="" method="post" class="bg-purple-400 rounded-lg bg-clip-padding backdrop-filter backdrop-blur-sm bg-opacity-0 border border-gray-100  p-12 h-[400px] flex flex-col items-center justify-center">
                <div class="mb-10">
                    <h1 class="text-white text-center font-bold">SMK TRIMULIA JAKARTA</h1>


                    <h2 class="text-white text-center text-sm font-light">LOGIN SISWA</h2>
                </div>

                <?php if (isset($error)) : ?>
                    <p style="color:red;">NISN/password salah</p>
                <?php endif; ?>

                <div class="border-b-2 mb-10">
                    <label for="siswa" class="text-white">NISN Siswa</label>
                    <input name="nisn_siswa" type="text" id="siswa" class="w-full bg-transparent border-none focus:ring-0 text-white autofill:bg-black">
                </div>

                <div class="border-b-2 mb-10 w-full">
                    <label for="pass" class="text-white">Password </label>
                    <input name="password_siswa" type="password" id="pass" class="w-full bg-transparent border-none focus:ring-0 text-white autofill:bg-n">
                </div>

                <button type="submit" name="login" class="w-full mb-5 bg-violet-800 py-2 rounded-full font-bold text-white shadow-sm hover:scale-95 transition duration-150 hover:bg-violet-900">
                    LOGIN
                </button>



                <div class="w-60 absolute -z-50 brightness-50 opacity-15 top-20">
                    <img src="./assets/logo.png" alt="">
                </div>

                <a href="./index.php" class="h-12 w-12 rounded-full -bottom-20 left-50 md:-left-20 md:bottom-auto z-50 absolute flex justify-center items-center bg-white dark:bg-white ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="black" class="bi bi-arrow-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8" />
                    </svg>
                </a>
            </form>
        </div>





    </div>


</body>

</html>