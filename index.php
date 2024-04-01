<?php
require("koneksi.php");
session_start();

//pagination
$maxData = 4;
$jumlahData = count(query("SELECT * FROM berita"));
$jumlahHalaman = ceil($jumlahData / $maxData);
$halamanAktif = (isset($_GET["hal"])) ? $_GET["hal"] : 1;
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
    <link href="./src/output.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

</head>

<body class=" bg-white">


    <!-- NAV -->
    <nav class=" bg-transparent fixed z-50 w-full" data-aos="fade-down" data-aos-duration="1000">
        <div class='px-5 py-4 flex items-center justify-between'>
            <div class="flex items-center justify-center gap-2">
                <img class="w-10" src="./assets/logo.png" alt="">
                <h2 class="text-white font-poppins  sm:text-xl md:text-2xl ">SMK Trimulia Jakarta</h2>
            </div>


            <div class="mr-10 hidden lg:block">
                <ul class="flex gap-10 text-white  font-bold  text-lg">
                    <li><a href="#home" class="Home">Home</a></li>
                    <li><a href="#jurusan" class="jurusan">Mitra</a></li>
                    <li><a href="#berita" class="berita">Berita</a></li>
                    <li><a href="#kontak" class="kontak">Kontak</a></li>
                </ul>
            </div>

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

            <?php if (isset($_SESSION["session-siswa"])) : ?>
                <div id="akun" class="gap-5 hidden lg:block ">
                    <div class="flex items-center gap-4">
                        <a href="#" class="w-11 h-11 block rounded-full border-dashed border overflow-hidden border-slate-400 akun">
                            <img src="./img-berita/goku.jpg" alt="" class="w-full h-full object-cover">

                        </a>

                        <a href="#" class="akun">
                            <h1 class="text-white">Selamat datang,</h1>
                            <p class="text-white font-bold"><?php echo $_SESSION["username-siswa"] ?></p>
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
                <div id="logout" class="fixed hidden bg-zinc-900 z-[9999]  top-20 right-12 rounded-lg px-5 py-7">
                    <a href="./profil-akun.php">
                        <h1 class="text-white font-bold text-center mb-5 text-lg">Lihat Profil</h1>
                    </a>
                    <div class="border-t pt-5">

                        <a href="logout.php"><button class="bg-red-500 py-1 px-7 text-white font-bold rounded-lg">Logout</button></a>
                    </div>
                </div>
            <?php endif; ?>

        </div>

        <div id="nav-menu" class="lg:hidden hidden absolute z-40 text-white  bg-zinc-900 rounded-md bg-clip-padding backdrop-filter backdrop-blur-sm bg-opacity-60 border border-gray-100 w-full   p-6 ">
            <ul class="flex flex-col gap-4 text-xl  ">
                <a href="#">
                    <li>Home</li>
                </a>
                <a href="#jurusan">
                    <li>Mitra</li>
                </a>
                <a href="#berita">
                    <li>Berita</li>
                </a>
                <a href="#kontak">
                    <li>Kontak</li>
                </a>
            </ul>


            <!-- Jika siswa belum login -->
            <?php if (!isset($_SESSION["session-siswa"])) : ?>
                <div class="flex flex-wrap sm:flex-nowrap w-full gap-3 mt-3 ">



                    <a href="./login.php" class=" ">
                        <div class="bg-green-600 py-2 flex items-center gap-2 px-7 border-2 hover:bg-green-500 hover:border-green-500 transition duration-300 border-green-600 rounded-md font-bold text-white">
                            LOGIN
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0z" />
                                <path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z" />
                            </svg>
                        </div>
                    </a>

                </div>
            <?php endif; ?>


            <!-- jika siswa sudah login -->
            <?php if (isset($_SESSION["session-siswa"])) : ?>

                <a href="#" class="">
                    <h1 class="text-white text-lg mt-2">Selamat datang,</h1>
                    <p class="text-white text-lg font-bold"><?php echo $_SESSION["username-siswa"] ?></p>
                </a>

                <div class="flex flex-wrap gap-2  mt-5 sm:flex-nowrap">

                    <a href="./profil-akun.php" class="w-full  ">
                        <button class="w-full bg-neutral-800 py-2 px-4 border-2 border-neutral-600 rounded-md hover:bg-opacity-75  transition duration-300 text-white font-bold">LIHAT PROFIL</button>
                    </a>


                    <a href="./logout.php" class="w-full ">
                        <button class="w-full bg-transparent py-2 px-9 border-2 border-red-800 rounded-md hover:bg-red-800 transition duration-300 text-white font-bold">LOGOUT</button>
                    </a>
                </div>


            <?php endif; ?>
        </div>
    </nav>


    <!-- NAV END -->

    <!-- HERO -->
    <section id="home" class="h-screen mb-36">
        <div class="bg-[url('../assets/banner.svg')]  bg-cover bg-center w-full h-full">
            <div class="text-white text-center py-52 ">
                <h1 class="text-xl font-bold mb-2" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="500">WELCOME</h1>
                <h2 class="text-4xl font-bold mb-10" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="700">SMK Trimulia Jakarta</h2>
                <?php if (isset($nothing)) : ?>
                    <?php echo $nothing ?>
                <?php endif; ?>
                <form id="cari-berita" action="" class="py-10 px-3 mx-auto max-w-xl" method="get" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="800">
                    <input id="input-berita" name="keyword" placeholder="Cari Berita Terkini" type="text" class="focus:ring-0 focus:border-white  placeholder-white placeholder:font-semibold w-full bg-transparent border-white border-2 rounded-lg">
                    <button id="cari" type="submit" name="cari" value="#berita" class="hidden">cari</button>
                </form>

                <br>
                <div data-aos="fade-down" data-aos-duration="1000" data-aos-delay="900">

                    <a href="#kontak"><button class="hover:bg-white hover:text-black font-semibold transition duration-300 bg-transparent border-2 rounded-lg border-white py-2 px-7">CONTACT US</button></a>
                </div>

            </div>


        </div>
    </section>
    <!-- HERO END -->


    <!-- JURUSAN -->
    <section id="jurusan" class="jurusan">
        <div class="container">
            <div class="text-center mb-10">
                <h1 id="1" class="font-bold text-slate-900  text-3xl mb-7" data-aos="fade-down" data-aos-delay="100" data-aos-duration="1000">Kami bekerja sama dengan</h1>
                <p data-aos="fade-down" data-aos-delay="200" data-aos-duration="1000" id="p1" class="text-slate-700 text-base">Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero animi fuga nihil. Est tempora adipisci nihil quas ipsa nisi quis nesciunt commodi quasi, qui suscipit aliquam tempore eveniet</p>
            </div>

            <div class="flex overflow-hidden space-x-2 group" data-aos="flip-up" data-aos-delay="300" data-aos-duration="1000">
                <div class="flex group-hover:paused space-x-2 gap-1 items-center  animate-loop-scroll">
                    <img class="max-w-none" src="./assets/dummy1.png" alt="">
                    <img class="max-w-none" src="./assets/dummy2.png" alt="">
                    <img class="max-w-none" src="./assets/dummy3.png" alt="">
                    <img class="max-w-none" src="./assets/dummy4.png" alt="">
                    <img class="max-w-none" src="./assets/dummy5.png" alt="">
                    <img class="max-w-none" src="./assets/dummy6.png" alt="">
                </div>
                <div aria-hidden="true" class=" flex group-hover:paused  space-x-2 items-center gap-1 animate-loop-scroll">
                    <img class="max-w-none" src="./assets/dummy1.png" alt="">
                    <img class="max-w-none" src="./assets/dummy2.png" alt="">
                    <img class="max-w-none" src="./assets/dummy3.png" alt="">
                    <img class="max-w-none" src="./assets/dummy4.png" alt="">
                    <img class="max-w-none" src="./assets/dummy5.png" alt="">
                    <img class="max-w-none" src="./assets/dummy6.png" alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- JURUSAN END -->

    <!-- BERITA -->
    <section id="berita" class="my-40">
        <div class="container">
            <div class="text-center my-10">
                <h1 data-aos="fade-down" data-aos-delay="100" data-aos-duration="1000" id="2" class="font-bold text-slate-900 text-3xl mb-7">Berita Terkini</h1>
                <p data-aos="fade-down" data-aos-delay="200" data-aos-duration="000" id="p2" class="text-slate-700 text-base">Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero animi fuga nihil. Est tempora adipisci nihil quas ipsa nisi quis nesciunt commodi quasi, qui suscipit aliquam tempore eveniet</p>
            </div>


            <div class="flex flex-wrap justify-start items-center ">

                <?php $delay = 300 ?>
                <?php foreach ($berita as $row) : ?>

                    <div class=" sm:w-1/2  lg:w-1/4 w-full px-2 " data-aos="flip-right" data-aos-delay=<?php echo $delay ?> data-aos-duration="500">
                        <div class="w-full mb-4 hover:cursor-pointer hover:-translate-y-1 transition   border border-slate-500 rounded-lg overflow-hidden">
                            <div class=" h-52 hover:scale-105 transition duration-300 ">
                                <img src="./img-berita/<?php echo $row["gambar_berita"] ?>" alt="" class="object-cover w-full h-full ">
                            </div>

                            <div class="p-3 h-60 flex flex-col justify-between ">
                                <a href="berita.php?id=<?php echo $row["id"] ?>">
                                    <h1 class="text-berita font-bold text-zinc-800 text-2xl  line-clamp-1 h-1/3   "><?php echo $row["judul_berita"] ?></h1>
                                    <p class="text-zinc-800 text-berita  line-clamp-1 mb-10 h-full  py-2"> <?php echo $row["isi_berita"] ?></p>

                                    <a href="berita.php?id=<?php echo $row["id"] ?>"><button class="w-full    hover:translate-x-1 hover:shadow-sm hover:shadow-zinc-700 transition duration-500 bg-zinc-700 text-white px-7 py-2 rounded-md font-bold">Baca Selengkapnya</button></a>
                            </div>
                        </div>
                    </div>
                    <?php $delay += 100 ?>
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
                        <a href="?hal=<?php echo $i ?> #berita" class="bg-violet-700 h-10 w-10 bg-transparent border border-zinc-800 hover:bg-violet-700 group flex justify-center items-center rounded-md ">
                            <h1 class="font-bold text-violet-700 transition duration-300 group-hover:text-white"><?php echo $i ?></h1>
                        </a>
                    <?php else : ?>
                        <a href="?hal=<?php echo $i ?> #berita" class="h-10 w-10 bg-transparent border border-zinc-800 hover:bg-violet-700 group flex justify-center items-center rounded-md ">
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


    <!-- CONTACT -->

    <section id="kontak" class="mb-10">
        <div class="conatiner">
            <div class="text-center mb-10">
                <h1 data-aos="fade-down" data-aos-delay="100" data-aos-duration="1000" id="3" class="font-bold text-slate-900 text-3xl mb-5">Contact Us</h1>
                <p data-aos="fade-down" data-aos-delay="200" data-aos-duration="1000" id="p3" class="text-slate-700 text-base">Lorem ipsum dolor sit amet consectetu</p>
            </div>



            <form action="" method="get" class="pb-10">
                <div class="max-w-xl mx-auto">
                    <div class="w-full px-4 mb-8" data-aos="fade-right">
                        <label id="label1" for="" class="text-slate-900 font-semibold">Nama</label>
                        <input placeholder="Contoh: kevin" type="text" class="w-full bg-zinc-700 text-white rounded-md p-3 border-none focus:ring-0 hover:scale-105 transition focus:scale-105 duration-500">
                    </div>


                    <div class="w-full px-4 mb-8" data-aos="fade-right" data-aos-duration="500" data-aos-delay="200">
                        <label id="label2" for="" class="text-slate-900 font-semibold">Email</label>
                        <input placeholder="Contoh: kevin@gmail.com" type="email" class="w-full bg-zinc-700 text-white rounded-md p-3 border-none focus:ring-0 hover:scale-105 transition focus:scale-105 duration-500">
                    </div>

                    <div class="w-full px-4 mb-8" data-aos="fade-right" data-aos-delay="300">
                        <label id="label3" for="" class="text-slate-900 font-semibold">Subject</label>
                        <input placeholder="Contoh: Judul" type="text" class="w-full bg-zinc-700 text-white rounded-md p-3 border-none focus:ring-0 hover:scale-105 transition focus:scale-105 duration-500">
                    </div>


                    <div class="w-full px-4 mb-8" data-aos="fade-right" data-aos-delay="400">
                        <label id="label4" for="" class="text-slate-900 font-semibold">Pesan</label>
                        <textarea placeholder="Pesan..." class="w-full bg-zinc-700 text-white rounded-md p-3 border-none focus:ring-0 hover:scale-105 transition focus:scale-105 duration-500"></textarea>
                    </div>

                    <div class="flex justify-center" data-aos="fade-right" data-aos-delay="500">
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

                <div class="mb-14 w-full  sm:w-1/4">
                    <div>
                        <h2 class="mb-3 text-zinc-200 font-bold text-2xl">Tautan</h2>
                        <p class="text-slate-200 text-base mb-3">.....</p>
                        <p class="text-slate-200 text-base mb-3">.....</p>
                        <p class="text-slate-200 text-base mb-3">.....</p>
                    </div>
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




    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script src="./node_modules/preline/dist/preline.js"></script>
    <script src="./main.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>