<?php
    require("koneksi.php");
    session_start();

    if(!isset($_SESSION["session-siswa"])){
        header("Location:login.php");
        exit;
    }

    //UNTUK MENYAMAKAN INFORMASI SISWA
    $nisn = $_SESSION["nisn-siswa"];
    $query = "SELECT * FROM siswa WHERE nisn_siswa = ?";
    $statement = mysqli_prepare($koneksi, $query);
    mysqli_stmt_bind_param($statement, "i", $nisn);
    mysqli_stmt_execute($statement);
    $result = mysqli_stmt_get_result($statement);
    $row = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profil akun</title>
    <link rel="shortcut icon" href="./src/assets/logo.svg" type="image/x-icon">
    <link href="./src/output.css" rel="stylesheet">
</head>

<body class="">
    <div class="h-full py-20 px-10   bg-fixed bg-[url('https://i.pinimg.com/originals/a5/dd/de/a5ddde2a6c8944df7cb4bc4f3da9679a.gif')] ">
        <div class="  bg-gray-900 rounded-md bg-clip-padding backdrop-filter backdrop-blur-sm bg-opacity-40 border border-gray-100 p-10 ">

            <div class="mb-10 flex flex-col items-center">
                <div class="mb-3 border border-dashed border-white h-16 w-16 overflow-hidden  rounded-full">
                    <img src="./src/img-siswa/<?php echo $row["foto_siswa"] ?>" alt="" class="w-full h-full object-cover">
                </div>

                <div>
                    <h1 class="text-white text-lg"><?php echo $row["nama_siswa"] ?></h1>
                    <p class="text-center text-sm font-semibold text-white">Siswa</p>
                </div>
            </div>
            <div class="flex gap-4 flex-wrap  justify-center ">
                <div class="w-full sm:w-1/3 md:w-1/4 text-center lg:w-1/5   bg-white py-3 px-6 shadow-xl rounded-md hover:scale-105 cursor-pointer transition duration-500">
                    <h1 class="text-neutral-900 border-b-2 pb-2 border-zinc-700 font-semibold mb-4">Nama Lengkap</h1>
                    <p class="bg-neutral-900 shadow-md shadow-neutral-900 border-white font-semibold text-white py-1 px-7 rounded-md "><?php echo $row["nama_siswa"] ?></p>

                </div>
                <div class="w-full sm:w-1/3 md:w-1/4 text-center lg:w-1/5     bg-white py-3 px-6 shadow-xl rounded-md hover:scale-105 cursor-pointer transition duration-500">
                    <h1 class="text-neutral-900 border-b-2 pb-2 border-zinc-700 font-semibold mb-4">Jurusan</h1>
                    <p class="bg-neutral-900 shadow-md shadow-neutral-900 border-white font-semibold text-white py-1 px-7 rounded-md "><?php echo $row["jurusan_siswa"] ?></p>

                </div>
                <div class="w-full sm:w-1/3 md:w-1/4 text-center lg:w-1/5   bg-white py-3 px-6 shadow-xl rounded-md hover:scale-105 cursor-pointer transition duration-500">
                    <h1 class="text-neutral-900 border-b-2 pb-2 border-zinc-700 font-semibold mb-4">Gender</h1>
                    <p class="bg-neutral-900 shadow-md shadow-neutral-900 border-white font-semibold text-white py-1 px-7 rounded-md "><?php echo $row["gender_siswa"] ?></p>
                </div>
                <div class="w-full sm:w-1/3 md:w-1/4 text-center lg:w-1/5   bg-white py-3 px-6 shadow-xl rounded-md hover:scale-105 cursor-pointer transition duration-500">
                    <h1 class="text-neutral-900 border-b-2 pb-2 border-zinc-700 font-semibold mb-4">Agama</h1>
                    <p class="bg-neutral-900 shadow-md shadow-neutral-900 border-white font-semibold text-white py-1 px-7 rounded-md "><?php echo $row["agama_siswa"] ?></p>
                </div>
                <div class="w-full sm:w-1/3 md:w-1/4 text-center lg:w-1/5   bg-white py-3 px-6 shadow-xl rounded-md hover:scale-105 cursor-pointer transition duration-500">
                    <h1 class="text-neutral-900 border-b-2 pb-2 border-zinc-700 font-semibold mb-4">NIS</h1>
                    <p class="bg-neutral-900 shadow-md shadow-neutral-900 border-white font-semibold text-white py-1 px-7 rounded-md "><?php echo $row["nis_siswa"] ?></p>
                </div>
                <div class="w-full sm:w-1/3 md:w-1/4 text-center lg:w-1/5   bg-white py-3 px-6 shadow-xl rounded-md hover:scale-105 cursor-pointer transition duration-500">
                    <h1 class="text-neutral-900 border-b-2 pb-2 border-zinc-700 font-semibold mb-4">NISN</h1>
                    <p class="bg-neutral-900 shadow-md shadow-neutral-900 border-white font-semibold text-white py-1 px-7 rounded-md "><?php echo $row["nisn_siswa"] ?></p>
                </div>
                <div class="w-full sm:w-1/3 md:w-1/4 text-center lg:w-1/5   bg-white py-3 px-6 shadow-xl rounded-md hover:scale-105 cursor-pointer transition duration-500">
                    <h1 class="text-neutral-900 border-b-2 pb-2 border-zinc-700 font-semibold mb-4">Tempat Lahir</h1>
                    <p class="bg-neutral-900 shadow-md shadow-neutral-900 border-white font-semibold text-white py-1 px-7 rounded-md "><?php echo $row["tempat_lahir_siswa"] ?></p>
                </div>
                <div class="w-full sm:w-1/3 md:w-1/4 text-center lg:w-1/5   bg-white py-3 px-6 shadow-xl rounded-md hover:scale-105 cursor-pointer transition duration-500">
                    <h1 class="text-neutral-900 border-b-2 pb-2 border-zinc-700 font-semibold mb-4">Tanggal Lahir</h1>
                    <p class="bg-neutral-900 shadow-md shadow-neutral-900 border-white font-semibold text-white py-1 px-7 rounded-md "><?php echo $row["tanggal_lahir_siswa"] ?></p>
                </div>
                <div class="w-full sm:w-1/3 md:w-1/4 text-center lg:w-1/5   bg-white py-3 px-6 shadow-xl rounded-md hover:scale-105 cursor-pointer transition duration-500">
                    <h1 class="text-neutral-900 border-b-2 pb-2 border-zinc-700 font-semibold mb-4">Kelas</h1>
                    <p class="bg-neutral-900 shadow-md shadow-neutral-900 border-white font-semibold text-white py-1 px-7 rounded-md "><?php echo $row["kelas_siswa"] ?></p>
                </div>
            </div>

            <a href="./logout.php" class="mt-7 block">
                <div class="text-white font-bold text-center w-1/2 mx-auto  bg-red-500 py-2 px-7 rounded-lg   hover:scale-95 transition duration-300 hover:bg-red-600">
                    LOGOUT
                </div>
            </a>


            <a href="./index.php" class="h-12 w-12 rounded-full -top-3 sm:top-1/2 sm:-left-6 -left-3 z-50 absolute flex justify-center items-center bg-white dark:bg-white ">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="black" class="bi bi-arrow-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8" />
                </svg>
            </a>
        </div>
    </div>
</body>

</html>