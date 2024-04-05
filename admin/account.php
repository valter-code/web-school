
<?php
    require("../koneksi.php");
    session_start();

    if(!isset($_SESSION["session-admin"])){
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

    if(isset($_POST["ganti"])){
        $passwordOld = $_POST["passwordOld"];
        $password = $_POST["password"];
        $password2 = $_POST["password2"];
        
        if(isset($_FILES["gambar_berita"]) && $_FILES["gambar_berita"]["error"] !== 4){
            $gambar = uploadAdmin($id);
            $query = "UPDATE admin SET gambar_admin = '$gambar' WHERE username_admin = '$username'";

            if(!$gambar){
                return false;
            }
            
            mysqli_query( $koneksi, $query);
            if(mysqli_affected_rows( $koneksi ) > 0){
                echo "<script>alert('berhasil up gambar');</script>";
                exit;
            }
        
        }else{
            $gimbir = $admin["gambar_admin"];
            $gambar = "../img/$gimbir";
        }

        if(!password_verify($passwordOld, $admin["password_admin"])){
            $err = "Password lama salah!";
        }else{

        if($password !== $password2){
            $err = "Konfirmasi Password Tidak Sama";
        }

        if(!preg_match("/[A-Z]/", $password)){
            $err = "Password harus mengandung setidaknya 1 huruf kapital";
        }

        if(!preg_match("/[!@#$%^&*()\-_=+{};:,<.>]/", $password)){
            $err = "Password harus mengandung setidaknya 1 simbol seperti !@#$%^&*()\-_=+{};:,<.>";
        }

        if(strlen($password) < 3){
            $err = "Password kurang dari 3 digit!";
        }

        if(empty($err)){
            $password = password_hash($password, PASSWORD_DEFAULT);
            $query = "UPDATE admin SET password_admin = '$password', gambar_admin = '$gambar' WHERE username_admin = '$username'";
            $result = mysqli_query($koneksi, $query);
            if(mysqli_affected_rows( $koneksi) > 0){
                $succ = "Berhasil update status";
            }
        }


    }
    
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account settings</title>
    <link rel="stylesheet" href="../src/output.css">
</head>

<body>
    <div class=" h-full flex justify-center items-center bg-cover bg-[url('https://i.pinimg.com/originals/a5/dd/de/a5ddde2a6c8944df7cb4bc4f3da9679a.gif')] w-full  ">
        <div class="  bg-gray-900 rounded-md bg-clip-padding backdrop-filter backdrop-blur-sm bg-opacity-40 overflow-y-scroll md:overflow-hidden h-screen p-10  ">
            <div class="flex flex-col items-center">
                <div class="w-16 mb-2  h-16 border rounded-full overflow-hidden ">
                    <img src="../img/<?php echo $admin["gambar_admin"] ?>" alt="gambar admin" class="w-full h-full object-cover object-center">
                </div>

                <h1 class="text-white font-bold mb-1"><?php echo $admin["username_admin"] ?></h1>
                <p class="text-white font-normal text-sm"><?php echo $admin["nama_admin"] ?></p>
            </div>

            <!-- FORM -->
            <form action="" method="post" enctype="multipart/form-data">
                <!-- UNTUK MENAMPILKAN PESAN ERROR/SUKSES -->

                <?php if($err): ?>
                    <?php echo $err; ?>
                <?php endif; ?>
                <?php if($succ): ?>
                    <?php echo $succ; ?>
                <?php endif; ?>

                <div class="rounded-lg gap-5 px-7 justify-evenly  flex flex-wrap">
                    <div class="mb-7 w-full sm:w-1/2 md:w-1/3">
                        <label for="" class="text-white font-semibold ">Nama</label>
                        <input readonly type="text" value="<?php echo $admin["nama_admin"] ?>" class="w-full bg-transparent border-2 mt-[2px]  rounded-lg focus:border-white  text-zinc-200 focus:ring-0 border-zinc-500">
                    </div>
                    <div class="mb-7 w-full sm:w-1/2 md:w-1/3">
                        <label for="password" class="text-white font-semibold ">Password Baru</label>
                        <input name="password" type="password" class="w-full bg-transparent border-2 mt-[2px]  rounded-lg focus:border-white  text-zinc-200 focus:ring-0 border-zinc-500" id="password">
                    </div>

                    <div class="mb-7 w-full sm:w-1/2 md:w-1/3">
                        <label for="" class="text-white font-semibold ">Email</label>
                        <input readonly type="email" value="<?php echo $admin["email_admin"] ?>" class="w-full bg-transparent border-2 mt-[2px]  rounded-lg focus:border-white  text-zinc-200 focus:ring-0 border-zinc-500">
                    </div>

                    <div class="mb-7 w-full sm:w-1/2 md:w-1/3">
                        <label for="password2" class="text-white font-semibold ">Konfirmasi Password</label>
                        <input name="password2" type="password" class="w-full bg-transparent border-2 mt-[2px]  rounded-lg focus:border-white  text-zinc-200 focus:ring-0 border-zinc-500" id="password2">
                    </div>
                    <div class="mb-7 w-full sm:w-1/2 md:w-1/3">
                        <label for="passwordOld" class="text-white font-semibold ">Password Sekarang</label>
                        <input name="passwordOld" type="password" class="w-full bg-transparent border-2 mt-[2px]  rounded-lg focus:border-white  text-zinc-200 focus:ring-0 border-zinc-500" id="passwordOld">
                    </div>
                    <div class="mb-7 w-full sm:w-1/2 md:w-1/3">
                        <label for="" class="text-white font-semibold ">Ganti Foto</label>
                        <input name="gambar_berita" type="file" class="w-full file:bg-violet-500 bg-transparent border-2 mt-[2px]  rounded-lg focus:border-white  text-zinc-200 focus:ring-0 border-zinc-500">
                    </div>
                </div>
                <div class="w-full flex flex-wrap justify-center gap-6 mt-5">
                    <button type="submit" name="ganti" class="font-bold text-emerald-200 px-7 py-2 rounded-md bg-gray-700 bg-clip-padding backdrop-filter backdrop-blur-sm bg-opacity-20 border-2 hover:bg-opacity-75 transition border-gray-100">SIMPAN PERUBAHAN</button>
                    <a href="./index.php" class=" font-bold text-red-300 px-[75px] py-2 rounded-md bg-gray-700 bg-clip-padding backdrop-filter backdrop-blur-sm bg-opacity-20 border-2 hover:bg-opacity-75 transition border-gray-100">KEMBALI</a>
                </div>
            </form>
            <!-- FORM -->

        </div>
</body>

</html>