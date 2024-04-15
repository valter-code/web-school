<?php
require("koneksi.php");
session_start();

//query siswa
if (isset($_SESSION["nisn-siswa"])) {
    $nisn = $_SESSION["nisn-siswa"];
    $query = "SELECT nama_siswa, foto_siswa FROM siswa WHERE nisn_siswa = ?";
    $statement = mysqli_prepare($koneksi, $query);
    mysqli_stmt_bind_param($statement, "s", $nisn);
    mysqli_stmt_execute($statement);
    mysqli_stmt_bind_result($statement, $nama_siswa,  $foto_siswa);
    mysqli_stmt_fetch($statement);
    mysqli_stmt_free_result($statement);
    // $query = "SELECT * FROM siswa WHERE nisn_siswa = ?";
    // $statement = mysqli_prepare($koneksi, $query);
    // mysqli_stmt_bind_param($statement, "i", $nisn);
    // mysqli_stmt_execute($statement);
    // $result = mysqli_stmt_get_result($statement);
    // $row = mysqli_fetch_assoc($result);
}

//pagination
$maxData = 4;
$jumlahData = count(query("SELECT * FROM berita"));
$jumlahHalaman = ceil($jumlahData / $maxData);
$halamanAktif = (isset($_GET["hal"]) && is_numeric($_GET["hal"])) ? $_GET["hal"] : 1;

$dataAwal = ($maxData * $halamanAktif) - $maxData;


$berita = query("SELECT * FROM berita LIMIT $dataAwal, $maxData");

//cari berita
if (isset($_GET["cari"])) {
    $query = "SELECT * FROM berita WHERE judul_berita LIKE ?";
    $statement = mysqli_prepare($koneksi, $query);
    $keyword = $_GET["keyword"];

    //bind
    $keyword = "%" . $keyword . "%";
    mysqli_stmt_bind_param($statement, "s", $keyword);

    mysqli_stmt_execute($statement);
    $result = mysqli_stmt_get_result($statement);
    $berita = mysqli_fetch_all($result, MYSQLI_ASSOC);

    if (mysqli_num_rows($result) == 0) {
        $nothing = "Pencarian anda " . htmlspecialchars($_GET["keyword"]) . " Tidak ada";
    } else {
        $nothing = "Pencarian anda " . htmlspecialchars($_GET["keyword"]);
    }
}
?>

<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMK Trimulia Jakarta</title>
    <link rel="shortcut icon" href="./src/assets/logo.svg" type="image/x-icon">
    <link href="./src/output.css" rel="stylesheet">


</head>

<body class=" bg-white">


    <!-- NAV -->
    <nav class=" bg-transparent fixed z-50 w-full">
        <div class='px-5 py-4 flex items-center justify-between'>
            <div class="flex items-center justify-center gap-2">
                <img class="w-10" src="./src/assets/logo.svg" alt="" loading="lazy">
                <h2 class="text-white font-poppins  sm:text-xl md:text-2xl ">SMK Trimulia Jakarta</h2>
            </div>


            <div class="mr-10 hidden lg:block">
                <ul class="flex gap-10 text-white  font-bold  text-lg">
                    <li><a href="#" class="Home">Home</a></li>
                    <li><a href="#profil-sekolah" class="Profil-sekolah">Profil</a></li>
                    <li><a href="#ekskul" class="ekskul-nav">Ekskul</a></li>
                    <li><a href="#berita" class="berita">Berita</a></li>
                    <li><a href="#gallery" class="gallery">Gallery</a></li>
                    <li><a href="#kontak" class="kontak">Kontak</a></li>
                </ul>
            </div>

            <!-- Jika siswa belum login  (DESKTOP) -->
            <?php if (!isset($_SESSION["session-siswa"])) : ?>
                <a href="./login.php" class="hidden lg:block">
                    <div class="bg-green-600 py-2 flex items-center gap-2 px-7 border-2 hover:bg-green-500 hover:border-green-500 transition duration-300 border-green-600 rounded-md font-bold text-white">
                        LOGIN
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0z" />
                            <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z" />
                        </svg>
                    </div>
                </a>



                <div class="lg:hidden">
                    <svg id="close" class="w-6 h-6  text-white dark:text-yellow-500 relative hidden" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6" />
                    </svg>

                    <svg id="open" class="cursor-pointer w-6 h-6  text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M5 7h14M5 12h14M5 17h14" />
                    </svg>

                </div>
            <?php endif; ?>
            <!-- Akhir Jika siswa belum (DESKTOP) END -->


            <!-- Jika siswa sudah login (DESKTOP) -->
            <?php if (isset($_SESSION["session-siswa"])) : ?>
                <div id="akun" class="gap-5 hidden lg:block ">
                    <div class="flex items-center gap-4">
                        <a href="#" class="w-11 h-11 block rounded-full border-dashed border overflow-hidden border-slate-400 akun">
                            <img src="./src/img-siswa/<?php echo $foto_siswa ?>" alt="" class="w-full h-full object-cover">

                        </a>

                        <a href="#" class="akun">
                            <h1 class="text-white">Selamat datang,</h1>
                            <p class="text-white font-bold"><?php echo $nama_siswa ?></p>
                        </a>


                    </div>

                </div>

                <div class="lg:hidden">
                    <svg id="close" class="w-6 h-6  text-white dark:text-yellow-500 relative hidden" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6" />
                    </svg>

                    <svg id="open" class="cursor-pointer w-6 h-6  text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M5 7h14M5 12h14M5 17h14" />
                    </svg>

                </div>
                <div id="logout" class="fixed  hidden bg-zinc-900 z-[9999]  top-20 right-12 rounded-lg px-5 py-7">
                    <a href="./profil-akun.php">
                        <h1 class="text-white font-bold text-center mb-5 text-lg">Lihat Profil</h1>
                    </a>
                    <div class="border-t pt-5">

                        <a href="logout.php"><button class="bg-red-500 py-1 px-7 text-white font-bold rounded-lg">Logout</button></a>
                    </div>
                </div>
            <?php endif; ?>
            <!-- Akhir jika siswa sudah login (DESKTOP) END -->

        </div>



        <!-- JIKA SISWA SUDAH LOGIN (MOBILE) -->
        <?php if (isset($_SESSION["session-siswa"])) : ?>
            <div id="nav-menu" class="lg:hidden hidden absolute z-40 text-white  bg-zinc-900 rounded-md bg-clip-padding backdrop-filter backdrop-blur-sm bg-opacity-60 border border-gray-100 w-full   p-6 ">
                <ul class="flex flex-col gap-4 text-xl  ">
                    <a href="#">
                        <li>Home</li>
                    </a>
                    <a href="#profil-sekolah">
                        <li>Profil</li>
                    </a>
                    <a href="#ekskul">
                        <li>Ekskul</li>
                    </a>
                    <a href="#berita">
                        <li>Berita</li>
                    </a>
                    <a href="#gallery">
                        <li>Gallery</li>
                    </a>
                    <a href="#kontak">
                        <li>Kontak</li>
                    </a>
                    <a href="./profil-akun.php" class="max-w-40 border text-center py-2 rounded-md bg-zinc-900 bg-opacity-75 text-base font-poppins font-bold hover:scale-95 transition duration-300  ">
                        LIHAT PROFIL
                    </a>
                    <a href="./logout.php" class="max-w-40 border text-center py-2 rounded-md bg-red-900 bg-opacity-75 text-base font-poppins font-bold hover:scale-95 transition duration-300  ">
                        LOGOUT
                    </a>
                </ul>
            </div>
        <?php endif; ?>
        <!-- JIKA SISWA SUDAH LOGIN (MOBILE) END -->

        <!-- JIKA SISWA BELUM LOGIN (MOBILE) -->
        <?php if (!isset($_SESSION["session-siswa"])) : ?>
            <div id="nav-menu" class="lg:hidden hidden absolute z-40 text-white  bg-zinc-900 rounded-md bg-clip-padding backdrop-filter backdrop-blur-sm bg-opacity-60 border border-gray-100 w-full   p-6 ">
                <ul class="flex flex-col gap-4 text-xl  ">
                    <a href="#">
                        <li>Home</li>
                    </a>
                    <a href="#profil-sekolah">
                        <li>Profil</li>
                    </a>
                    <a href="#ekskul">
                        <li>Ekskul</li>
                    </a>
                    <a href="#berita">
                        <li>Berita</li>
                    </a>
                    <a href="#gallery">
                        <li>Gallery</li>
                    </a>
                    <a href="#kontak">
                        <li>Kontak</li>
                    </a>
                    <a href="./login.php" class="max-w-36  ">
                        <div class="bg-green-600 py-2 flex justify-center items-center gap-2 px-7 border-2 hover:bg-green-500 hover:border-green-500 transition duration-300 border-green-600 rounded-md w-full font-bold text-white">
                            LOGIN
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0z" />
                                <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z" />
                            </svg>
                        </div>
                    </a>
                </ul>
            </div>
        <?php endif; ?>
        <!-- JIKA SISWA BELUM LOGIN (MOBILE) END -->
    </nav>


    <!-- NAV END -->



    <!-- HERO -->

    <section id="home" class="h-screen mb-24">
        <div class="bg-[url('./assets/banner.webp')] lazy-background  bg-cover bg-center w-full h-full">
            <div class="text-white text-center py-52 ">
                <h1 class="text-xl font-bold mb-2 ">WELCOME</h1>
                <h2 class="text-4xl font-bold mb-10">SMK Trimulia Jakarta</h2>
                <?php if (isset($nothing)) : ?>
                    <?php echo $nothing ?>
                <?php endif; ?>
                <form id="cari-berita" action="" class="py-10 px-3 mx-auto max-w-xl" method="get">
                    <input id="input-berita" name="keyword" placeholder="Cari Berita Terkini" type="text" class="focus:ring-0 focus:border-white bg-neutral-800  placeholder-white placeholder:font-semibold w-full bg-opacity-55 border-white border-2 rounded-lg">
                    <button id="cari" type="submit" name="cari" value="#berita" class="hidden">cari</button>
                </form>

                <br>
                <div>

                    <a href="#kontak"><button class="hover:bg-white bg-neutral-800 hover:text-black font-semibold transition duration-300 bg-opacity-45 border-2 rounded-lg border-white py-2 px-7">CONTACT US</button></a>
                </div>


            </div>


        </div>
    </section>
    <!-- HERO END -->



    <!-- PROFIL SEKOLAH -->
    <section id="profil-sekolah" class="mb-36">
        <div class="container">
            <div>
                <h1 class="mb-2 text-center motto-sekolah text-zinc-800  font-bold font-poppins ">MOTTO SEKOLAH</h1>
                <h2 class="mb-36 font-poppins text-center font-extrabold text-xl text-zinc-900 sm:text-3xl md:text-4xl motto-text">JUJUR. DISIPLIN. BERAKHLAK MULIA</h2>
                <h2 class=" text-zinc-800 motto-title font-poppins text-center font-medium text-2xl mb-20 lg:mb-5 underline-offset-8 underline ">Visi & Misi</h2>
            </div>


            <div class="md:flex items-center  ">
                <div class=" hidden lg:block  lg:w-1/2 p-14">
                    <img src="./src/assets/logo.svg" alt="" class=" loading=" lazy">
                </div>

                <div class="px-5 lg:w-1/2">

                    <div class="mb-10">
                        <h1 class="font-poppins  text-slate-900  judul font-semibold text-xl">Visi Sekolah.</h1>
                        <p class="font-poppins text-slate-700 sub-judul ">Unggul Dalam Iman , Taqwa, Berakhlak Mulia Serta siap Berkompetisi Di Dunia Usaha dan Dunia Industri.</p>
                    </div>
                    <div>
                        <h1 class="font-poppins text-xl text-slate-900 judul font-semibold">Misi Sekolah.</h1>
                        <ul class="flex flex-col gap-4">
                            <li class="list-decimal font-poppins text-slate-700 sub-judul">Menyelenggarakan Layanan Pendidikan Bermutu dengan ditunjang oleh Orgaanisasi Sekolah yang Kondusif, Transparan, Akuntabel dan Nyaman.</li>
                            <li class="list-decimal font-poppins text-slate-700 sub-judul">Menyelenggarakan Pendidikan Yang Mampu Menumbuhkan dan Mengembangkan Sikap serta Pribadi yang Bertaqwa, Berkarakter, Berdaya Saing dan Mandiri dalam Diri Peserta Didik sebagai Bekal untuk Melanjutkan Pendidikan, Mampu Memasuki Dunia Kerja Maupun Berwirausaha.</li>
                            <li class="list-decimal font-poppins text-slate-700 sub-judul ">Melayani Dengan Hati.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- PROFIL SEKOLAH END -->

    <!-- EKSKUL -->
    <section id="ekskul">
        <div class="container">

            <div class="text-center mb-0">
                <h1 class="font-bold text-slate-900 judul  text-3xl mb-7">Ekstrakulikuler</h1>
                <p class="text-slate-700 sub-judul text-base">Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero animi fuga nihil. Est tempora a</p>
            </div>

            <div class="w-full p-10 inline-flex overflow-hidden scale-90 lg:scale-100 ekskul   group flex-nowrap">
                <ul class="flex items-center  justify-center md:justify-start group-hover:paused [&_li]:mx-8 [&_img]:max-w-none animate-loop-scroll">
                    <li>
                        <img src="./src/img-ekskul/akustik.svg" alt="Facebook" loading="lazy" />
                        <p class="text-center font-bold mt-5 text-zinc-950">AKUSTIK</p>
                    </li>
                    <li>
                        <img src="./src/img-ekskul/badminton.svg" alt="Facebook" loading="lazy" />
                        <p class="text-center font-bold mt-5 text-zinc-950">BADMINTON</p>
                    </li>
                    <li>
                        <img src="./src/img-ekskul/basket.svg" alt="Facebook" loading="lazy" />
                        <p class="text-center font-bold mt-5 text-zinc-950">BASKET</p>
                    </li>
                    <li>
                        <img src="./src/img-ekskul/beksi.svg" alt="Facebook" loading="lazy" />
                        <p class="text-center font-bold mt-5 text-zinc-950">BEKSI</p>
                    </li>
                    <li>
                        <img src="./src/img-ekskul/ec.svg" alt="Facebook" loading="lazy" />
                        <p class="text-center font-bold mt-5 text-zinc-950">ENGLISH CLUB</p>
                    </li>
                    <li>
                        <img src="./src/img-ekskul/futsal.svg" alt="Facebook" loading="lazy" />
                        <p class="text-center font-bold mt-5 text-zinc-950">FUTSAL</p>
                    </li>
                    <li>
                        <img src="./src/img-ekskul/saman.svg" alt="Facebook" loading="lazy" class="h-32" />
                        <p class="text-center font-bold mt-5 text-zinc-950">SAMAN</p>
                    </li>
                    <li>
                        <img src="./src/img-ekskul/paskib.svg" alt="Facebook" loading="lazy" />
                        <p class="text-center font-bold mt-5 text-zinc-950">PASKIB</p>
                    </li>
                    <li>
                        <img src="./src/img-ekskul/pramuka.svg" alt="Facebook" loading="lazy" />
                        <p class="text-center font-bold mt-5 text-zinc-950">PRAMUKA</p>
                    </li>

                </ul>

                <ul class="flex items-center  justify-center md:justify-start group-hover:paused [&_li]:mx-8 [&_img]:max-w-none animate-loop-scroll" aria-hidden="true">
                    <li>
                        <img src="./src/img-ekskul/akustik.svg" alt="Facebook" loading="lazy" />
                        <p class="text-center font-bold mt-5 text-zinc-950">AKUSTIK</p>
                    </li>
                    <li>
                        <img src="./src/img-ekskul/badminton.svg" alt="Facebook" loading="lazy" />
                        <p class="text-center font-bold mt-5 text-zinc-950">BADMINTON</p>
                    </li>
                    <li>
                        <img src="./src/img-ekskul/basket.svg" alt="Facebook" loading="lazy" />
                        <p class="text-center font-bold mt-5 text-zinc-950">BASKET</p>
                    </li>
                    <li>
                        <img src="./src/img-ekskul/beksi.svg" alt="Facebook" loading="lazy" />
                        <p class="text-center font-bold mt-5 text-zinc-950">BEKSI</p>
                    </li>
                    <li>
                        <img src="./src/img-ekskul/ec.svg" alt="Facebook" loading="lazy" />
                        <p class="text-center font-bold mt-5 text-zinc-950">ENGLISH CLUB</p>
                    </li>
                    <li>
                        <img src="./src/img-ekskul/futsal.svg" alt="Facebook" loading="lazy" />
                        <p class="text-center font-bold mt-5 text-zinc-950">FUTSAL</p>
                    </li>
                    <li>
                        <img src="./src/img-ekskul/saman.svg" alt="Facebook" loading="lazy" class="h-32" />
                        <p class="text-center font-bold mt-5 text-zinc-950">SAMAN</p>
                    </li>
                    <li>
                        <img src="./src/img-ekskul/paskib.svg" alt="Facebook" loading="lazy" />
                        <p class="text-center font-bold mt-5 text-zinc-950">PASKIB</p>
                    </li>
                    <li>
                        <img src="./src/img-ekskul/pramuka.svg" alt="Facebook" loading="lazy" />
                        <p class="text-center font-bold mt-5 text-zinc-950">PRAMUKA</p>
                    </li>
                </ul>


            </div>
        </div>
    </section>
    <!-- EKSKUL END -->





    <!-- BERITA -->
    <section id="berita" class="my-40">
        <div class="container">
            <div class="text-center my-10">
                <h1 class="font-bold text-slate-900 judul text-3xl mb-7">Berita Terkini</h1>
                <p class="text-slate-700 sub-judul text-base">Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero animi fuga nihil. Est tempora adipisci nihil quas ipsa nisi quis nesciunt commodi quasi, qui suscipit aliquam tempore eveniet</p>
            </div>


            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 ">


                <?php foreach ($berita as $row) : ?>

                    <div class="  w-full   px-2 ">
                        <div class="w-full   mb-4 hover:cursor-pointer hover:-translate-y-1 transition shadow-xl border-light  kartu rounded-md overflow-hidden">
                            <div class=" h-40 group overflow-hidden ">
                                <img src="./src/img-berita/<?php echo $row["gambar_berita"] ?>" alt="" class="object-cover group-hover:scale-110 group-hover:rotate-2 transition-all  w-full h-full  " loading="lazy">
                            </div>
                            <div class="p-3 h-36 flex flex-col justify-between ">
                                <a href="berita.php?id=<?php echo $row["id"] ?>">
                                    <h1 class="  font-poppins font-semibold judul-berita   text-zinc-800 text-xl  line-clamp-1 h-7   "><?php echo $row["judul_berita"] ?></h1>
                                    <p class="text-zinc-700  font-thin isi-berita  line-clamp-2  h-14 py-2 font-poppins  "> <?php echo $row["isi_berita"] ?></p>

                                    <a href="berita.php?id=<?php echo $row["id"] ?>" class="font-poppins flex items-center baca-selengkapnya  justify-between text-zinc-800 font-bold text-sm ">
                                        <p>Baca Selengkapnya</p> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-in-up-right" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M6.364 13.5a.5.5 0 0 0 .5.5H13.5a1.5 1.5 0 0 0 1.5-1.5v-10A1.5 1.5 0 0 0 13.5 1h-10A1.5 1.5 0 0 0 2 2.5v6.636a.5.5 0 1 0 1 0V2.5a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 .5.5v10a.5.5 0 0 1-.5.5H6.864a.5.5 0 0 0-.5.5" />
                                            <path fill-rule="evenodd" d="M11 5.5a.5.5 0 0 0-.5-.5h-5a.5.5 0 0 0 0 1h3.793l-8.147 8.146a.5.5 0 0 0 .708.708L10 6.707V10.5a.5.5 0 0 0 1 0z" />
                                        </svg>
                                    </a>


                                </a>
                            </div>

                        </div>


                    </div>

                <?php endforeach; ?>



            </div>

            <!-- pagination -->
            <div class="flex gap-1 justify-center mt-5">

                <!-- KODE UNTUK PREVIOUS pagination -->
                <?php if ($halamanAktif > 1) : ?>

                    <a href="?hal=<?php echo $halamanAktif - 1 ?> #berita" class="h-10 w-10 bg-violet-700  border  flex justify-center items-center rounded-md">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="white" class="bi bi-caret-left" viewBox="0 0 16 16">
                            <path d="M10 12.796V3.204L4.519 8zm-.659.753-5.48-4.796a1 1 0 0 1 0-1.506l5.48-4.796A1 1 0 0 1 11 3.204v9.592a1 1 0 0 1-1.659.753" />
                        </svg>
                    </a>

                <?php endif; ?>
                <!--  END KODE UNTUK PREVIOUS pagination -->


                <!-- KODE UNTUK nomor pagination -->
                <?php for ($i = 1; $i <= $jumlahHalaman; $i++) : ?>

                    <?php if ($i == $halamanAktif) : ?>
                        <a href="?hal=<?php echo $i ?> #berita" class="bg-violet-700 h-10 w-10 bg-transparent border  hover:bg-violet-700 group flex justify-center items-center rounded-md ">
                            <h1 class="font-bold text-white transition duration-300 group-hover:text-white"><?php echo $i ?></h1>
                        </a>
                    <?php else : ?>
                        <a href="?hal=<?php echo $i ?> #berita" class="h-10 w-10 bg-transparent border border-r-violet-200 hover:bg-violet-700 group flex justify-center items-center rounded-md ">
                            <h1 class="font-bold text-violet-700 transition duration-300 group-hover:text-white"><?php echo $i ?></h1>
                        </a>
                    <?php endif; ?>

                <?php endfor; ?>
                <!-- END KODE UNTUK nomor pagination -->

                <a href="./index.php#berita" class="h-10 w-10 bg-transparent border border-zinc-800 hover:bg-violet-700 group flex justify-center items-center rounded-md">
                    <h1 class="font-bold text-violet-700 transition duration-300 group-hover:text-white">...</h1>
                </a>

                <!-- KODE UNTUK NEXT pagination -->
                <?php if ($halamanAktif < $jumlahHalaman) : ?>
                    <a href="?hal=<?php echo $halamanAktif + 1 ?> #berita" class="h-10 w-10 bg-violet-700 border flex justify-center items-center rounded-md">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="white" class="bi bi-caret-right" viewBox="0 0 16 16">
                            <path d="M6 12.796V3.204L11.481 8zm.659.753 5.48-4.796a1 1 0 0 0 0-1.506L6.66 2.451C6.011 1.885 5 2.345 5 3.204v9.592a1 1 0 0 0 1.659.753" />
                        </svg>
                    </a>
                <?php endif; ?>
            </div>
            <!-- pagination end -->

    </section>
    <!-- BERITA END -->



    <!-- GALLERY -->
    <section id="gallery" class="container mb-44">

        <div class="text-center my-10">
            <h1 class="font-bold text-slate-900 judul text-3xl mb-7">Gallery</h1>
            <p class="text-slate-700 sub-judul text-base">Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero animi fuga nihil. Est tempora adipisci nihil quas ipsa nisi quis nesciunt commodi quasi, qui suscipit aliquam tempore eveniet</p>
        </div>


        <div class="grid grid-cols-2 sm:grid-cols-4 gap-5  h-screen p-3 ">
            <div class="bg-gray-600 rounded-md sm:row-span-2  relative overflow-hidden  ">
                <img src="./src/img-gallery/2.webp" loading="lazy" alt="" class="absolute h-full w-full object-cover object-center">
            </div>

            <div class="bg-gray-600 rounded-md relative overflow-hidden ">
                <img src="./src/img-gallery/1.webp" loading="lazy" alt="" class="absolute h-full w-full object-cover object-center">
            </div>
            <div class="bg-gray-600 rounded-md relative overflow-hidden ">
                <img src="./src/img-gallery/5.webp" loading="lazy" alt="" class="absolute h-full w-full object- object-cover">
            </div>
            <div class="bg-gray-600 rounded-md sm:row-span-2  relative overflow-hidden ">
                <img src="./src/img-gallery/4.webp" loading="lazy" alt="" class="absolute h-full w-full object-cover object-center">
            </div>
            <div class="bg-gray-600 rounded-md sm:col-span-2 sm:row-span-2   relative overflow-hidden ">
                <img src="./src/img-gallery/6.webp" loading="lazy" alt="" class="absolute h-full w-full object-cover ">
            </div>

            <div class="bg-gray-600 rounded-md sm:row-span-2  relative overflow-hidden ">
                <img src="./src/img-gallery/3.webp" loading="lazy" alt="" class="absolute h-full w-full object-cover object-center">
            </div>

            <div class="bg-gray-600 rounded-md relative overflow-hidden ">
                <img src="./src/img-gallery/9.webp" loading="lazy" alt="" class="absolute h-full w-full object-top top-0 object-cover">
            </div>

            <div class="bg-gray-600 rounded-md relative overflow-hidden ">
                <img src="./src/img-gallery/8.webp" loading="lazy" alt="" class="absolute h-full w-full object-center object-cover">
            </div>
            <div class="bg-gray-600 rounded-md relative sm:col-span-2 overflow-hidden ">
                <img src="./src/img-gallery/7.webp" loading="lazy" alt="" class="absolute h-full w-full object-center object-cover">
            </div>
            <div class="bg-gray-600 rounded-md relative sm:hidden overflow-hidden ">
                <img src="./src/img-gallery/7.webp" loading="lazy" alt="" class="absolute h-full w-full object-center object-cover">
            </div>

        </div>
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-5  h-screen p-3 ">
            <div class="bg-gray-600 rounded-md sm:row-span-2  relative overflow-hidden  ">
                <img src="./src/img-gallery/10.webp" loading="lazy" alt="" class="absolute h-full w-full object-cover object-center">
            </div>

            <div class="bg-gray-600 rounded-md relative overflow-hidden ">
                <img src="./src/img-gallery/11.webp" loading="lazy" alt="" class="absolute h-full w-full object-cover object-center">
            </div>
            <div class="bg-gray-600 rounded-md relative overflow-hidden ">
                <img src="./src/img-gallery/15.webp" loading="lazy" alt="" class="absolute h-full w-full object- object-cover">
            </div>
            <div class="bg-gray-600 rounded-md sm:row-span-2  relative overflow-hidden ">
                <img src="./src/img-gallery/13.webp" loading="lazy" alt="" class="absolute h-full w-full object-cover object-center">
            </div>
            <div class="bg-gray-600 rounded-md sm:col-span-2 sm:row-span-2   relative overflow-hidden ">
                <img src="./src/img-gallery/18.webp" loading="lazy" alt="" class="absolute h-full w-full object-cover ">
            </div>

            <div class="bg-gray-600 rounded-md sm:row-span-2  relative overflow-hidden ">
                <img src="./src/img-gallery/16.webp" loading="lazy" alt="" class="absolute h-full w-full object-cover object-center">
            </div>

            <div class="bg-gray-600 rounded-md relative overflow-hidden ">
                <img src="./src/img-gallery/14.webp" loading="lazy" alt="" class="absolute h-full w-full object-top top-0 object-cover">
            </div>

            <div class="bg-gray-600 rounded-md relative overflow-hidden ">
                <img src="./src/img-gallery/17.webp" loading="lazy" alt="" class="absolute h-full w-full object-center object-cover">
            </div>
            <div class="bg-gray-600 rounded-md relative sm:col-span-2 overflow-hidden ">
                <img src="./src/img-gallery/7.webp" loading="lazy" alt="" class="absolute h-full w-full object-center object-cover">
            </div>
            <div class="bg-gray-600 rounded-md relative sm:hidden overflow-hidden ">
                <img src="./src/img-gallery/7.webp" loading="lazy" alt="" class="absolute h-full w-full object-center object-cover">
            </div>

        </div>

    </section>
    <!-- GALLERY END -->




    <!-- CONTACT -->

    <section id="kontak" class="mb-10">
        <div class="conatiner">
            <div class="text-center mb-10">
                <h1 class="font-bold text-slate-900 judul text-3xl mb-5">Contact Us</h1>
                <p class="text-slate-700 sub-judul text-base">Lorem ipsum dolor sit amet consectetu</p>
            </div>



            <form action="" method="get" class="pb-10">
                <div class="max-w-xl mx-auto">
                    <div class="w-full px-4 mb-8">
                        <label for="" class="text-slate-900 judul font-semibold">Nama</label>
                        <input placeholder="Contoh: kevin" type="text" class="w-full bg-zinc-700  text-white rounded-md p-3 border-none focus:ring-0 hover:scale-105 transition focus:scale-105 duration-500">
                    </div>


                    <div class="w-full px-4 mb-8">
                        <label for="" class="text-slate-900 judul font-semibold">Email</label>
                        <input placeholder="Contoh: kevin@gmail.com" type="email" class="w-full bg-zinc-700 text-white rounded-md p-3 border-none focus:ring-0 hover:scale-105 transition focus:scale-105 duration-500">
                    </div>

                    <div class="w-full px-4 mb-8">
                        <label for="" class="text-slate-900 judul font-semibold">Subject</label>
                        <input placeholder="Contoh: Judul" type="text" class="w-full bg-zinc-700 text-white rounded-md p-3 border-none focus:ring-0 hover:scale-105 transition focus:scale-105 duration-500">
                    </div>


                    <div class="w-full px-4 mb-8">
                        <label for="" class="text-slate-900 judul font-semibold">Pesan</label>
                        <textarea placeholder="Pesan..." class="w-full bg-zinc-700 text-white rounded-md p-3 border-none focus:ring-0 hover:scale-105 transition focus:scale-105 duration-500"></textarea>
                    </div>

                    <div class="flex justify-center">
                        <button class="hover:bg-violet-600 hover:shadow-md transition hover:scale-105 duration-300 hover:shadow-violet-600 bg-violet-500 text-white py-2 px-10 rounded-lg">Kirim</button>

                    </div>



                </div>
            </form>

        </div>
    </section>

    <!-- CONTACT END -->


    <!-- FOOTER -->
    <section class="my h-full bg-neutral-800 py-36">
        <div class="container">
            <h1 class="mb-10 font-bold text-4xl text-red-500"><SPAN class="text-white">Forbidden</SPAN><span class="text-cyan-500">Team</span></h1>
            <div class="flex flex-wrap sm:gap-5 items-center ">

                <div class="w-full sm:w-1/3">
                    <div class="mb-14">

                        <h2 class="mb-3 text-zinc-200 font-bold text-2xl">Hubungi Kami</h2>
                        <p class="text-slate-200 text-base mb-3">forbidden@gmail.com</p>
                        <p class="text-slate-200 text-base mb-3">@forbidden on ig</p>
                        <p class="text-slate-200 text-base mb-3">Amerika Utara</p>
                    </div>
                </div>

                <div class="mb-14 w-full  sm:w-1/3">
                    <div>
                        <h2 class="mb-3 text-zinc-200 font-bold text-2xl">Jurusan</h2>
                        <p class="text-slate-200 text-base mb-3">Teknik Komputer & Jaringan</p>
                        <p class="text-slate-200 text-base mb-3">Manajemen Perkantoran</p>
                        <p class="text-slate-200 text-base mb-3">Bisnis Daring</p>
                    </div>
                </div>

                <div class="mb-14 w-full rounded-lg  sm:w-1/4">
                    <iframe class="rounded-lg" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.193898342303!2d106.745141409519!3d-6.238155461058475!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f0c064cd04ef%3A0xa48b08eb6a408393!2sSMK%20TRIMULIA%20JAKARTA!5e0!3m2!1sid!2sid!4v1713013624611!5m2!1sid!2sid" width="300" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>

            <div class="mx-auto sm:1/3">
                <div class="border-t-2 pt-10 flex justify-center gap-5">
                    <a href="" class="w-9 h-9 rounded-full border flex justify-center items-center hover:bg-violet-800 hover:border-violet-800 hover:scale-105 hover:shadow-md hover:shadow-violet-800 transition duration-500">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-github" viewBox="0 0 16 16">
                            <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27s1.36.09 2 .27c1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.01 8.01 0 0 0 16 8c0-4.42-3.58-8-8-8" />
                        </svg>
                    </a>
                    <a href="" class="w-9 h-9 rounded-full border flex justify-center items-center hover:bg-violet-800 hover:border-violet-800 hover:scale-105 hover:shadow-md hover:shadow-violet-800 transition duration-500">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-github" viewBox="0 0 16 16">
                            <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27s1.36.09 2 .27c1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.01 8.01 0 0 0 16 8c0-4.42-3.58-8-8-8" />
                        </svg>
                    </a>
                    <a href="" class="w-9 h-9 rounded-full border flex justify-center items-center hover:bg-violet-800 hover:border-violet-800 hover:scale-105 hover:shadow-md hover:shadow-violet-800 transition duration-500">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-github" viewBox="0 0 16 16">
                            <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27s1.36.09 2 .27c1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.01 8.01 0 0 0 16 8c0-4.42-3.58-8-8-8" />
                        </svg>
                    </a>
                    <a href="" class="w-9 h-9 rounded-full border flex justify-center items-center hover:bg-violet-800 hover:border-violet-800 hover:scale-105 hover:shadow-md hover:shadow-violet-800 transition duration-500">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-github" viewBox="0 0 16 16">
                            <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27s1.36.09 2 .27c1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.01 8.01 0 0 0 16 8c0-4.42-3.58-8-8-8" />
                        </svg>
                    </a>
                </div>

                <p class="text-white text-center mt-5">Made with ❤️ by <a href="" class="underline"><span class="text-white font-bold">Forbidden</span> <span class="font-bold text-cyan-500">Team</span></a> </p>
            </div>



    </section>
    <!-- FOOTER -->


    <!-- TO TOP -->
    <a id="toTop" href="#" class="translate-x-[5rem] transition opacity-5  duration-500 h-14 w-14 hover:animate-pulse bg-zinc-400  z-50 bottom-4 right-4 p-4 fixed rounded-full">
        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m5 15 7-7 7 7" />
        </svg>
    </a>

    <a id="darkMode" href="#" class="translate-x-[5rem] transition opacity-5  duration-300 justify-center items-center h-14 w-14 hover:animate-pulse bg-violet-400  z-50 bottom-20 right-4 p-4 fixed rounded-full">
        <svg id="moon" class="w-6 h-6 text-gray-800   dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="1" height="1" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 21a9 9 0 0 1-.5-17.986V3c-.354.966-.5 1.911-.5 3a9 9 0 0 0 9 9c.239 0 .254.018.488 0A9.004 9.004 0 0 1 12 21Z" />
        </svg>

        <svg id="sun" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="hidden text-gray-800  w-6 h-6 bi bi-brightness-high" viewBox="0 0 16 16">
            <path d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6m0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8M8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0m0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13m8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5M3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8m10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0m-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0m9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707M4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708" />
        </svg>

    </a>

    <!-- TO TOP END -->






    <script src="./main.js"></script>

</body>

</html>