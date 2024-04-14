<?php
require("../koneksi.php");
session_start();

//kick jika belum login
if (!isset($_SESSION["session-guru"])) {
    header("Location: login.php");
    exit();
}

//query
$siswa = query("SELECT * FROM siswa");

//fungsi pencarian siswa
if (isset($_GET["cari"])) {
    $query = "SELECT * FROM siswa WHERE nama_siswa LIKE ? OR jurusan_siswa LIKE ?";
    $statement = mysqli_prepare($koneksi, $query);
    $keyword = htmlspecialchars($_GET["keyword"]);

    //bind
    $keyword = "%" . $keyword . "%";
    mysqli_stmt_bind_param($statement, "ss", $keyword, $keyword);

    //execute
    mysqli_stmt_execute($statement);

    //result
    $result = mysqli_stmt_get_result($statement);

    //simpan data kedalam array
    $siswa = mysqli_fetch_all($result, MYSQLI_ASSOC);

    if (mysqli_num_rows($result) === 0) {
        $nothing = "Pencarian Anda : " . htmlspecialchars($_GET["keyword"]) . " tidak ada";
    } else {
        $some = "Pecarian Anda : " . htmlspecialchars($_GET["keyword"]);
    }
}

if (isset($_POST["tambah"])) {
    if (tambahSiswa($_POST) > 0) {
        echo "<script>alert('Berhasil tambah data siswa'); document.location.href = 'siswa.php'</script>";
        exit;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
    <link rel="icon" href="../src/assets/logo.svg">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/rippleui@1.12.1/dist/css/styles.css" />
</head>

<body>


    <div class="sticky flex h-screen flex-row gap-4 overflow-y-auto rounded-lg sm:overflow-x-hidden">
        <aside class="sidebar-sticky sidebar justify-start">
            <section id="profil-admin" class="sidebar-title items-center p-4 ">
                <div class="border w-10 h-10 rounded-full mr-3 overflow-hidden hover:cursor-pointer">
                    <img src="../src/img-siswa/default-siswa.svg" alt="" class="w-full h-full object-cover">
                </div>
                <div class="flex flex-col hover:cursor-pointer">
                    <span>Nama Guru</span>
                    <span class="text-xs font-normal text-content2"><?php echo $_SESSION["username-guru"] ?></span>

                </div>
            </section>
            <section class="menu-section px-4 mt-6">
                <span class="menu-title">Main menu</span>
                <ul class="menu-items">
                    <a href="index.php">
                        <li class="menu-item">
                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m4 12 8-8 8 8M6 10.5V19a1 1 0 0 0 1 1h3v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h3a1 1 0 0 0 1-1v-8.5" />
                            </svg>



                            <span>Home</span>
                        </li>
                    </a>

                    <a href="siswa.php">
                        <li class="menu-item menu-active">
                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M4 4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2H4Zm10 5a1 1 0 0 1 1-1h3a1 1 0 1 1 0 2h-3a1 1 0 0 1-1-1Zm0 3a1 1 0 0 1 1-1h3a1 1 0 1 1 0 2h-3a1 1 0 0 1-1-1Zm0 3a1 1 0 0 1 1-1h3a1 1 0 1 1 0 2h-3a1 1 0 0 1-1-1Zm-8-5a3 3 0 1 1 6 0 3 3 0 0 1-6 0Zm1.942 4a3 3 0 0 0-2.847 2.051l-.044.133-.004.012c-.042.126-.055.167-.042.195.006.013.02.023.038.039.032.025.08.064.146.155A1 1 0 0 0 6 17h6a1 1 0 0 0 .811-.415.713.713 0 0 1 .146-.155c.019-.016.031-.026.038-.04.014-.027 0-.068-.042-.194l-.004-.012-.044-.133A3 3 0 0 0 10.059 14H7.942Z" clip-rule="evenodd" />
                            </svg>


                            <span>Data Siswa</span>
                        </li>
                    </a>

                    <a href="berita.php">
                        <li class="menu-item">
                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 3v4a1 1 0 0 1-1 1H5m4 8h6m-6-4h6m4-8v16a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V7.914a1 1 0 0 1 .293-.707l3.914-3.914A1 1 0 0 1 9.914 3H18a1 1 0 0 1 1 1Z" />
                            </svg>






                            <span>Data Berita</span>
                        </li>
                    </a>



                    <a href="tambah-berita.php">
                        <li class="menu-item">
                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 5V4a1 1 0 0 0-1-1H8.914a1 1 0 0 0-.707.293L4.293 7.207A1 1 0 0 0 4 7.914V20a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-5M9 3v4a1 1 0 0 1-1 1H4m11.383.772 2.745 2.746m1.215-3.906a2.089 2.089 0 0 1 0 2.953l-6.65 6.646L9 17.95l.739-3.692 6.646-6.646a2.087 2.087 0 0 1 2.958 0Z" />
                            </svg>

                            <span>Tambah Berita</span>
                        </li>
                    </a>

                </ul>
            </section>

            <section class="sidebar-footer bg-gray-2 pt-2 hidden">
                <div class="divider my-0"></div>
                <div class="dropdown z-50 flex h-fit w-full cursor-pointer hover:bg-gray-4">
                    <label class="whites mx-2 flex h-fit w-full cursor-pointer p-0 hover:bg-gray-4" tabindex="0">
                        <div class="flex flex-row gap-4 p-4">
                            <div class="avatar avatar-md">
                                <img src="" altz="avatar" />
                            </div>

                            <div class="flex flex-col">
                                <span></span>
                                <span class="text-xs font-normal text-content2">sandra</span>
                            </div>
                        </div>
                    </label>
                </div>
            </section>
        </aside>
        <div class="flex w-full flex-row flex-wrap gap-4 p-6 justify-center">


            <div class="text-center">
                <h1 class="font-bold text-2xl">DATA SISWA</h1>
                <br>
                <h2 class="font-bold text-3xl">SMK Trimulia Jakarta</h2>
            </div>

            <div class="my-4 grid w-full  gap-4">


                <!-- TAMBAH SISWA -->
                <button id="tambah-btn" class="text-white font-bold bg-blue-700 px-7 py-2 rounded-lg w-1/5 hover:bg-blue-800 transition shadow-lg">TAMBAH SISWA</button>
                <!-- TAMBAH SISWA END -->

                <form action="" method="get" class="">
                    <input type="text" name="keyword" placeholder="Search" class="p-2 border-white focus:outline-none shadow-sm border-b-2 bg-transparent">
                    <button class="" type="submit" name="cari">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#ffffff" class="bi bi-search ml-2" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
                        </svg>
                    </button>
                </form>

                <!-- Jika menampilkan data -->
                <?php if (isset($some)) : ?>
                    <?php echo $some ?>
                <?php endif; ?>
                <!-- Akhir jika menampilkan data -->

                <!-- Jika tidak menampilkan data -->
                <?php if (isset($nothing)) : ?>
                    <?php echo $nothing ?>
                <?php endif; ?>
                <!-- Akhir Jika tidak menampilkan data -->
                <!-- TABLE -->
                <div class="flex w-full overflow-x-auto">
                    <table class="table-zebra table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Jurusan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1 ?>
                            <?php foreach ($siswa as $siswa) : ?>
                                <tr>
                                    <th class="text-violet-900"><?php echo $no ?></th>
                                    <th><?php echo $siswa["nama_siswa"] ?></th>
                                    <th><?php echo $siswa["jurusan_siswa"] ?></th>
                                    <th><a class="text-sky-500 edit" href="#">Edit</a> | <a class="text-red-600" href="delete-siswa.php?id_siswa=<?php echo $siswa["id_siswa"] ?>">Delete</a></th>
                                </tr>
                                <?php $no++ ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <!-- TABLE -->











            </div>
        </div>
    </div>


    <!-- POP UP TAMBAH SISWA -->
    <div id="tambah-wrapper" class="fixed bg-zinc-900 bg-opacity-45 scale-0  flex   px-96 w-full h-full top-0  justify-center py-3">
        <form id="tambah-form" action="" class="bg-neutral-900 px-2 scale-0 py-5 transition duration-200 overflow-y-scroll rounded-lg shadow-md ">

            <a href="#" id="close-btn-tambah" class="flex justify-center items-center h-10 w-10 rounded-full hover:bg-neutral-800  transition ">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                    <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z" />
                </svg>
            </a>

            <div class="text-center mb-7">
                <h1 class="text-white text-3xl font-bold mb-1">Tambah Siswa</h1>
                <p class="text-white text-sm">SMK Trimulia Jakarta</p>
            </div>

            <div class="flex justify-evenly gap-2 flex-wrap">

                <div class=" mb-7 w-1/3">
                    <label for="" class="text-zinc-100 text-sm">Nama Lengkap</label>
                    <input type="text" placeholder="contoh: John Doe" class="w-full mt-1 bg-transparent px-2 placeholder:text-neutral-600 focus:outline-none placeholder:text-sm  rounded-lg border-neutral-700 py-1 border-2">
                </div>
                <div class="mb-7 w-1/3">
                    <label for="" class="text-zinc-100 text-sm">Jurusan</label>
                    <select name="" id="" class="w-full border-2 bg-transparent border-neutral-700 focus:outline-none rounded-lg py-1 px-2 text-zinc-100">
                        <option value="" class="bg-neutral-900 text-zinc-100">TKJ</option>
                        <option value="" class="bg-neutral-900 text-zinc-100">MP</option>
                        <option value="" class="bg-neutral-900 text-zinc-100">BD</option>
                    </select>
                </div>
                <div class="mb-7 w-1/3">
                    <label for="" class="text-zinc-100 text-sm">Password</label>
                    <input type="password" placeholder="Masukkan password yang kuat" class="w-full mt-1 bg-transparent px-2 placeholder:text-neutral-600 focus:outline-none placeholder:text-sm  rounded-lg border-neutral-700 py-1 border-2">
                </div>
                <div class="mb-7 w-1/3">
                    <label for="" class="text-zinc-100 text-sm">Agama</label>
                    <select required name="jurusan_siswa" id="" class="w-full mt-1 border-2 bg-transparent border-neutral-700 focus:outline-none rounded-lg py-1 px-2 text-zinc-100">
                        <option value="Protestan" class="bg-neutral-900 text-zinc-100">Protestan</option>
                        <option value="Khatolik" class="bg-neutral-900 text-zinc-100">Khatolik</option>
                        <option value="Islam" class="bg-neutral-900 text-zinc-100">Islam</option>
                        <option value="Buddha" class="bg-neutral-900 text-zinc-100">Buddha</option>
                        <option value="Hindu" class="bg-neutral-900 text-zinc-100">Hindu</option>
                        <option value="Konghucu" class="bg-neutral-900 text-zinc-100">Konghucu</option>
                    </select>
                </div>
                <div class="mb-7 w-1/3">
                    <label for="" class="text-zinc-100 text-sm">NISN</label>
                    <input type="text" placeholder="contoh: 1234567" class="w-full mt-1 bg-transparent px-2 placeholder:text-neutral-600 focus:outline-none placeholder:text-sm  rounded-lg border-neutral-700 py-1 border-2">
                </div>
                <div class="mb-7 w-1/3">
                    <label for="" class="text-zinc-100 text-sm">NIS</label>
                    <input type="text" placeholder="contoh: 1234567" class="w-full mt-1 bg-transparent px-2 placeholder:text-neutral-600 focus:outline-none placeholder:text-sm  rounded-lg border-neutral-700 py-1 border-2">
                </div>
                <div class="mb-7 w-1/3">
                    <label for="" class="text-zinc-100 text-sm">Tempat Lahir</label>
                    <input type="text" placeholder="contoh: Tangerang" class="w-full mt-1 bg-transparent px-2 placeholder:text-neutral-600 focus:outline-none placeholder:text-sm  rounded-lg border-neutral-700 py-1 border-2">
                </div>
                <div class="mb-7 w-1/3">
                    <label for="" class="text-zinc-100 text-sm">Tanggal Lahir</label>
                    <input type="date" placeholder="contoh: 24 April 2007" class="w-full mt-1 bg-transparent px-2 placeholder:text-neutral-600 focus:outline-none placeholder:text-sm  rounded-lg border-neutral-700 py-1 border-2">
                </div>
                <div class="mb-7 w-1/3">
                    <label for="" class="text-zinc-100 text-sm">Kelas</label>
                    <input type="text" placeholder="contoh: 11 TKJ 1" class="w-full mt-1 bg-transparent px-2 placeholder:text-neutral-600 focus:outline-none placeholder:text-sm  rounded-lg border-neutral-700 py-1 border-2">
                </div>
                <div class="mb-7 w-1/3">
                    <label for="" class="text-zinc-100 text-sm">Gender</label>
                    <select required name="jurusan_siswa" id="" class="w-full mt-1 border-2 bg-transparent border-neutral-700 focus:outline-none rounded-lg py-1 px-2 text-zinc-100">
                        <option value="Laki-laki" class="bg-neutral-900 text-zinc-100">Laki-laki</option>
                        <option value="Perempuan" class="bg-neutral-900 text-zinc-100">Perempuan</option>
                 
                    </select>
                </div>

                <div class="mb-3 w-1/3   ">
                    <label for="" class="text-zinc-100 text-sm">Pilih Foto Profil</label>

                    <input type="file" placeholder="contoh: 11 TKJ 1" class="w-full input-preview-siswa mt-1 bg-transparent  file:bg-zinc-800 file:text-neutral-400 file:h-full file:py-1 file:border-none text-zinc-300 placeholder:text-neutral-600 focus:outline-none placeholder:text-sm  rounded-lg border-neutral-700  border-2 ">
                </div>

            </div>

            <div class="flex justify-center mb-7  ">
                <div class="bg-neutral-800  p-4 w-1/3  shadow-lg rounded-xl">

                    <div class="mx-auto mb-3 h-14 mt-3 w-14 border-dashed border border-zinc-950 shadow-lg rounded-full overflow-hidden">
                        <img src="../src/img-siswa/default-siswa.svg" alt="" class="w-full img-preview-siswa h-full object-cover">
                    </div>
                    <h1 class="text-center font-bold">Preview Profil</h1>
                    <p class="text-center text-sm">Siswa</p>
                </div>
            </div>

            <div class=" mt-8 w-full flex gap-5 px-20">
                <button class="text-white font-bold w-full hover:bg-blue-600 transition  bg-blue-500 px-7 py-2 rounded-md">TAMBAH</button>
                <button class="text-red-600 font-bold w-full hover:text-white hover:bg-red-500 transition bg-transparent border-red-500 border px-10 py-2  rounded-md">BATAL</button>
            </div>


        </form>
    </div>
    <!-- POP UP TAMBAH SISWA END -->


    <!-- POP UP EDIT SISWA -->
    <div id="edit-wrapper" class="fixed bg-zinc-900 bg-opacity-45 scale-0  flex   px-96 w-full h-full top-0  justify-center py-3">
        <form id="editsiswa" action="" class="bg-neutral-900 px-2 py-5 scale-0 transition duration-200 overflow-y-scroll rounded-lg shadow-md ">

            <a href="#" id="close-btn" class="flex justify-center items-center h-10 w-10 rounded-full hover:bg-neutral-800  transition ">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                    <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z" />
                </svg>
            </a>

            <div class="text-center mb-7">
                <h1 class="text-white text-2xl font-bold mb-1">Edit Siswa</h1>
                <p class="text-white text-sm">SMK Trimulia Jakarta</p>
            </div>

            <div class="flex justify-evenly gap-2 flex-wrap">

                <div class=" mb-7 w-1/3">
                    <label for="" class="text-zinc-100 text-sm">Nama Lengkap</label>
                    <input type="text" placeholder="contoh: John Doe" class="w-full mt-1 bg-transparent px-2 placeholder:text-neutral-600 focus:outline-none placeholder:text-sm  rounded-lg border-neutral-700 py-1 border-2">
                </div>
                <div class="mb-7 w-1/3">
                    <label for="" class="text-zinc-100 text-sm">Jurusan</label>
                    <select name="" id="" class="w-full border-2 bg-transparent border-neutral-700 focus:outline-none rounded-lg py-1 px-2 text-zinc-100">
                        <option value="" class="bg-neutral-900 text-zinc-100">TKJ</option>
                        <option value="" class="bg-neutral-900 text-zinc-100">MP</option>
                        <option value="" class="bg-neutral-900 text-zinc-100">BD</option>
                    </select>
                </div>
                <div class="mb-7 w-1/3">
                    <label for="" class="text-zinc-100 text-sm">Ganti Password</label>
                    <input type="password" placeholder="Masukkan password yang kuat" class="w-full mt-1 bg-transparent px-2 placeholder:text-neutral-600 focus:outline-none placeholder:text-sm  rounded-lg border-neutral-700 py-1 border-2">
                </div>
                <div class="mb-7 w-1/3">
                    <label for="" class="text-zinc-100 text-sm">Agama</label>
                    <select required name="jurusan_siswa" id="" class="w-full mt-1 border-2 bg-transparent border-neutral-700 focus:outline-none rounded-lg py-1 px-2 text-zinc-100">
                        <option value="Protestan" class="bg-neutral-900 text-zinc-100">Protestan</option>
                        <option value="Khatolik" class="bg-neutral-900 text-zinc-100">Khatolik</option>
                        <option value="Islam" class="bg-neutral-900 text-zinc-100">Islam</option>
                        <option value="Buddha" class="bg-neutral-900 text-zinc-100">Buddha</option>
                        <option value="Hindu" class="bg-neutral-900 text-zinc-100">Hindu</option>
                        <option value="Konghucu" class="bg-neutral-900 text-zinc-100">Konghucu</option>
                    </select>
                </div>
                <div class="mb-7 w-1/3">
                    <label for="" class="text-zinc-100 text-sm">NISN</label>
                    <input type="text" placeholder="contoh: 1234567" class="w-full mt-1 bg-transparent px-2 placeholder:text-neutral-600 focus:outline-none placeholder:text-sm  rounded-lg border-neutral-700 py-1 border-2">
                </div>
                <div class="mb-7 w-1/3">
                    <label for="" class="text-zinc-100 text-sm">NIS</label>
                    <input type="text" placeholder="contoh: 1234567" class="w-full mt-1 bg-transparent px-2 placeholder:text-neutral-600 focus:outline-none placeholder:text-sm  rounded-lg border-neutral-700 py-1 border-2">
                </div>
                <div class="mb-7 w-1/3">
                    <label for="" class="text-zinc-100 text-sm">Tempat Lahir</label>
                    <input type="text" placeholder="contoh: Tangerang" class="w-full mt-1 bg-transparent px-2 placeholder:text-neutral-600 focus:outline-none placeholder:text-sm  rounded-lg border-neutral-700 py-1 border-2">
                </div>
                <div class="mb-7 w-1/3">
                    <label for="" class="text-zinc-100 text-sm">Tanggal Lahir</label>
                    <input type="date" placeholder="contoh: 24 April 2007" class="w-full mt-1 bg-transparent px-2 placeholder:text-neutral-600 focus:outline-none placeholder:text-sm  rounded-lg border-neutral-700 py-1 border-2">
                </div>
                <div class="mb-7 w-1/3">
                    <label for="" class="text-zinc-100 text-sm">Kelas</label>
                    <input type="text" placeholder="contoh: 11 TKJ 1" class="w-full mt-1 bg-transparent px-2 placeholder:text-neutral-600 focus:outline-none placeholder:text-sm  rounded-lg border-neutral-700 py-1 border-2">
                </div>
                <div class="mb-7 w-1/3">
                    <label for="" class="text-zinc-100 text-sm">Gender</label>
                    <select required name="jurusan_siswa" id="" class="w-full mt-1 border-2 bg-transparent border-neutral-700 focus:outline-none rounded-lg py-1 px-2 text-zinc-100">
                        <option value="Laki-laki" class="bg-neutral-900 text-zinc-100">Laki-laki</option>
                        <option value="Perempuan" class="bg-neutral-900 text-zinc-100">Perempuan</option>

                    </select>
                </div>
                <div class="mb-3 w-1/3   ">
                    <label for="" class="text-zinc-100 text-sm">Ganti Foto Profil</label>

                    <input type="file" placeholder="contoh: 11 TKJ 1" class="w-full mt-1 input-preview-siswa bg-transparent  file:bg-zinc-800 file:text-neutral-400 file:h-full file:py-1 file:border-none text-zinc-300 placeholder:text-neutral-600 focus:outline-none placeholder:text-sm  rounded-lg border-neutral-700  border-2 ">
                </div>

            </div>

            <div class="flex justify-center mb-7 ">
                <div class="bg-neutral-800  p-4 w-1/3  shadow-lg rounded-xl">

                    <div class="mx-auto mb-3 h-14 mt-3 w-14 border-dashed border border-zinc-950 shadow-lg rounded-full overflow-hidden">
                        <img src="../src/img-siswa/default-siswa.svg" alt="" class="w-full img-preview-siswa h-full object-cover">
                    </div>
                    <h1 class="text-center font-bold">Preview Profil</h1>
                    <p class="text-center text-sm">Siswa</p>
                </div>
            </div>

            <div class=" mt-8 w-full flex gap-5 px-20">
                <button class="text-white font-bold w-full hover:bg-blue-600 transition  bg-blue-500 px-7 py-2 rounded-md">UBAH PROFIL</button>
                <button class="text-red-600 font-bold w-full hover:text-white hover:bg-red-500 transition bg-transparent border-red-500 border px-10 py-2  rounded-md">BATAL</button>
            </div>


        </form>
    </div>
    <!-- POP UP EDIT SISWA END -->

    <!-- PROFIL POP UP -->
    <div id="akun-admin" class="fixed top-16 left-4 shadow-lg py-7 -translate-x-48  transition duration-100 px-5 rounded-lg bg-neutral-900">

        <a href="./account.php" class="mb-3 inline-block">Account Settings</a>
        <a href="./logout.php">
            <div class="flex items-center gap-2 border-t pt-2 border-zinc-600">
                <p>Logout</p>
                <div>

                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="red" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0z" />
                        <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z" />
                    </svg>
                </div>
            </div>
        </a>
    </div>
    <!-- PROFIL POP UP END -->

    <script src="./guru.js"></script>
    <script src="./profil-guru.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</body>

</html>