<?php
require("../koneksi.php");
session_start();

if (!isset($_SESSION["session-admin"])) {
    header("Location:login.php");
    exit;
}

$id = $_SESSION["username-admin"];
$username = $_SESSION["username-admin"];

$query = "SELECT * FROM admin WHERE username_admin = '$username'";
$result = mysqli_query($koneksi, $query);
$admin = mysqli_fetch_assoc($result);

$err = "";
$succ = "";


//ubah profil
if(isset($_POST["ubahProfil"])){
    $username = htmlspecialchars($_POST["username"]);
    $email = htmlspecialchars($_POST["email"]);
    
    if(isset($_FILES["gambar_berita"]) && $_FILES["gambar_berita"]["error"] !== 4){
        $gambar = uploadAdmin($id);        

        if($admin["gambar_admin"] !== "default-admin.svg" && file_exists("../src/img-admin/" . $admin["gambar_admin"])){
            unlink("../src/img-admin/" . $admin["gambar_admin"]);
        }

        //jika gambar ada yg gagal
        if(!$gambar){
            return false;
        }
    }else{
        $gambar = $admin["gambar_admin"];
    }


    $query2 = "SELECT username_admin FROM admin WHERE username_admin = '$username'";
    $result2 = mysqli_query($koneksi, $query2);
    //2 karena session usernamenya terpakai
    if(mysqli_num_rows($result2) == 1){
        echo "<script>alert('Username admin sudah ada, gagal mengubah profil'); document.location.href = 'account.php'</script>";
        exit;
    }else{
        $query = "UPDATE admin SET username_admin = '$username', email_admin = '$email', gambar_admin = '$gambar' WHERE username_admin = '$id'";
        $result = mysqli_query($koneksi, $query);
        $_SESSION["username-admin"] = $username;
        echo "<script>alert('berhasil mengubah profil!'); document.location.href = 'account.php'</script>";
    }
    
}

//ubah sandi
if (isset($_POST["ubahSandi"])) {
    $passwordOld = htmlspecialchars($_POST["passwordOld"]);
    $password = htmlspecialchars($_POST["password"]);
    $password2 = htmlspecialchars($_POST["password2"]);

    if(!password_verify($passwordOld, $admin["password_admin"])){
        $err = "Password lama salah";
    }else{

        if(strlen($password) < 3){
            $err = "panjang password harus lebih dari 3";
        }

        if($password !== $password2){
            $err = "Konfirmasi password tidak sesuai";
        }

        if(empty($err)){
            $password = password_hash($password, PASSWORD_DEFAULT);
            $query = "UPDATE admin SET password_admin = '$password' WHERE username_admin = '$username'";
            mysqli_query($koneksi, $query);
            if(mysqli_affected_rows($koneksi) > 0){
                echo "<script>alert('berhasil mengubah password!'); document.location.href = 'account.php'</script>";
            }
        }
    }
}

$gambarAdminURL = (file_exists("../src/img-admin/" . $admin["gambar_admin"]) ? $admin["gambar_admin"] : "default-admin.svg");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account settings</title>
    <link rel="icon" href="../src/assets/logo.svg">
    <link rel="stylesheet" href="../src/output.css">
</head>

<body>
    <div class=" h-full flex justify-center items-center bg-cover bg-[url('https://i.pinimg.com/originals/a5/dd/de/a5ddde2a6c8944df7cb4bc4f3da9679a.gif')] w-full  ">
        <div class="  bg-gray-900 rounded-md bg-clip-padding backdrop-filter backdrop-blur-sm bg-opacity-40  w-full h-full p-10  ">
            <a href="./index.php">

                <div class="absolute flex items-center gap-2 top-10 text-center px-10 font-bold text-red-300  mx-auto py-2 rounded-full bg-gray-700 bg-clip-padding backdrop-filter backdrop-blur-sm bg-opacity-20 border-2 hover:bg-opacity-75 transition border-gray-100">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0z" />
                        <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708z" />
                    </svg>
                    <h1>KEMBALI</h1>
                </div>
            </a>
            <div class="flex flex-col items-center">
                <div class="w-16 mb-2  h-16 border rounded-full overflow-hidden ">
                    <img src="../src/img-admin/<?php echo $gambarAdminURL ?>" alt="gambar admin" class="w-full h-full object-cover object-center">
                </div>

                <h1 class="text-white font-bold mb-1"><?php echo $admin["username_admin"] ?></h1>
                <p class="text-white font-normal text-sm">Role</p>
            </div>


            <!-- UBAH DATA -->
            <div class="flex justify-evenly w-full mt-3">

                <!-- FORM UBAH PROFIL -->
                <form action="" method="post" enctype="multipart/form-data" class="p-5 bg-zinc-900  rounded-md bg-clip-padding backdrop-filter backdrop-blur-sm bg-opacity-75 border border-gray-100">
                    <input type="hidden" name="id_admin" value="<?php echo $admin["id"] ?>">
                    <div class="absolute -top-12     rotate-12 right-40 h-20 w-20 object-cover grid">
                        <h1 class="w-full text-5xl self-center text-center  object-fill">🗃️</h1>
                    </div>
                    <div>
                        <h1 class="text-white font-bold text-3xl text-center mt-3">Ubah Profil</h1>
                    </div>
                    <div class="mb-7 w-full mt-5 ">
                        <label for="" class="text-white font-semibold ">Username</label>
                        <input name="username" type="text" value="<?php echo $admin["username_admin"] ?>" class="w-full bg-transparent border-2 mt-[2px]  rounded-lg focus:border-white  text-zinc-200 focus:ring-0 border-zinc-500">
                    </div>
                    <div class="mb-7 w-full ">
                        <label for="" class="text-white font-semibold ">Email</label>
                        <input name="email" type="email" value="<?php echo $admin["email_admin"] ?>" class="w-full bg-transparent border-2 mt-[2px]  rounded-lg focus:border-white  text-zinc-200 focus:ring-0 border-zinc-500">
                    </div>
                    <div class="mb-7 w-full ">
                        <label for="" class="text-white font-semibold ">Ganti Foto</label>
                        <input name="gambar_berita" type="file" class="w-full file:bg-violet-500 bg-transparent border-2 mt-[2px]  rounded-lg focus:border-white  text-zinc-200 focus:ring-0 border-zinc-500">
                    </div>
                    <div class="w-full">
                        <button type="submit" name="ubahProfil" class="font-bold text-emerald-200 px-7 py-2  w-full rounded-md bg-gray-700 bg-clip-padding backdrop-filter backdrop-blur-sm bg-opacity-20 border-2 hover:bg-opacity-75 transition border-gray-100">SIMPAN PERUBAHAN</button>
                    </div>
                </form>
                <!-- FORM UBAH PROFIL END -->

                <!-- FORM UBAH PASSWORD -->
                <form action="" method="post" class="p-5 bg-zinc-900  rounded-md bg-clip-padding backdrop-filter backdrop-blur-sm bg-opacity-75 border border-gray-100">
                    <div class="absolute -top-12 rotate-12 right-40 h-20 w-20 object-cover grid">
                        <h1 class="w-full text-5xl self-center text-center  object-fill">🔐</h1>
                    </div>
                    <div>
                        <h1 class="text-white font-bold text-3xl text-center mt-3">Ubah Password</h1>
                    </div>
                    <div class="mb-7 w-full mt-5 ">
                        <label for="passwordOld" class="text-white font-semibold ">Password Sekarang</label>
                        <input name="passwordOld" type="password" class="w-full bg-transparent border-2 mt-[2px]  rounded-lg focus:border-white  text-zinc-200 focus:ring-0 border-zinc-500">
                    </div>
                    <div class="mb-7 w-full ">
                        <label for="password" class="text-white font-semibold ">Password Baru</label>
                        <input name="password" type="password" placeholder="Masukkan Password Yang Kuat" class=" w-full bg-transparent border-2 mt-[2px]  rounded-lg focus:border-white  text-zinc-200 focus:ring-0 border-zinc-500">
                    </div>
                    <div class="mb-7 w-full ">
                        <label for="password2" class="text-white font-semibold ">Konfirmasi Password</label>
                        <input name="password2" type="password" placeholder="Konfirmasi Password" class="w-full bg-transparent border-2 mt-[2px]  rounded-lg focus:border-white  text-zinc-200 focus:ring-0 border-zinc-500">
                        
                        <?php if(isset($err)): ?>
                            <?php echo "<p style='color:red;'>$err</p>" ?>
                        <?php endif; ?>

                    </div>

                    <div class="w-full">
                        <button type="submit" name="ubahSandi" class="font-bold text-emerald-200 px-7 py-2  w-full rounded-md bg-gray-700 bg-clip-padding backdrop-filter backdrop-blur-sm bg-opacity-20 border-2 hover:bg-opacity-75 transition border-gray-100">SIMPAN PERUBAHAN</button>
                    </div>
                </form>
                <!-- FORM UBAH PASSWORD END -->

            </div>
            <!-- UBAH DATA END -->

        </div>
</body>

</html>