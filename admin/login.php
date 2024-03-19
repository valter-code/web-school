<?php
    require("../koneksi.php");
    session_start();

    if(isset($_POST["login"])){
        $username = mysqli_real_escape_string($koneksi, $_POST["username"]);
        $_SESSION["username_admin"] = $username;
        $password = mysqli_real_escape_string($koneksi, $_POST["password"]);

        //query 
        $query = "SELECT * FROM admin WHERE username_admin = '$username'";
        $result = mysqli_query($koneksi, $query);
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);
            
            //check password
            if(password_verify( $password, $row["password_admin"])){
                $_SESSION["admin-session"] = true;
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
    <title>Login Admin</title>
    <link rel="stylesheet" href="../src/output.css">
</head>

<body>
    <div class="flex items-center justify-center bg-[url('../assets/1p.png')] bg-cover  h-screen">
        <div class="p-12 bg-purple-400 rounded-lg bg-clip-padding backdrop-filter backdrop-blur-sm bg-opacity-10 border border-gray-100 ">
            <form action="" class="" method="post">
                <div class="w-20 mx-auto mb-1 ">
                    <img src="../assets/logo.png" alt="">
                </div>
                <div class="mb-6">
                    <h1 class="text-white text-center font-bold">LOGIN ADMIN</h1>
                </div>

                <!-- pesan error jika username/password salah -->
                <?php if(isset($error)): ?>
                    <p style="color:red;">Username/Password Salah!</p>
                <!-- pesan error jika username/password salah -->

                <?php endif; ?>
                <div class="border-b-2 mb-10 sm:w-96">
                    <div class="flex items-center gap-[2px]">
                        <label for="User" class="text-white">Username </label>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-person-fill" viewBox="0 0 16 16">
                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                        </svg>
                    </div>
                    <input name="username" type="text" class="w-full bg-transparent border-none text-white focus:ring-0  ">
                </div>

                <div class="border-b-2 mb-10">
                    <div class="flex items-center gap-[2px]">
                        <label for="User" class="text-white">Password</label>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-person-fill-lock" viewBox="0 0 16 16">
                            <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0m-9 8c0 1 1 1 1 1h5v-1a2 2 0 0 1 .01-.2 4.49 4.49 0 0 1 1.534-3.693Q8.844 9.002 8 9c-5 0-6 3-6 4m7 0a1 1 0 0 1 1-1v-1a2 2 0 1 1 4 0v1a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1zm3-3a1 1 0 0 0-1 1v1h2v-1a1 1 0 0 0-1-1" />
                        </svg>
                    </div>
                    <input name="password" type="password" placeholder="" class="w-full bg-transparent border-none text-white focus:ring-0  ">
                </div>

                <button type="submit" name="login" class="bg-violet-600 text-white w-full rounded-full py-2 shadow-lg hover:scale-95 duration-300 transition hover:bg-violet-700 font-bold">LOGIN</button>
            </form>
        </div>
    </div>
</body>

</html>