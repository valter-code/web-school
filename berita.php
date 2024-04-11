<?php
require("koneksi.php");
session_start();

$id = $_GET["id"];
$query = "SELECT * FROM berita WHERE id = ?";
$statement = mysqli_prepare($koneksi, $query);
mysqli_stmt_bind_param($statement, "i", $id);
mysqli_stmt_execute($statement);
$result = mysqli_stmt_get_result($statement);
$row = mysqli_fetch_assoc($result);



$berita = query("SELECT * FROM berita");

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
    <link rel="shortcut icon" href="./src/assets/logo.png" type="image/x-icon">
    <link href="./src/output.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

</head>

<body class=" bg-white">


    <!-- NAV -->

    <!-- NAV END -->

    <!-- HERO -->
    <!-- <section id="home" class="h-screen mb-36">
        <div class="bg-[url('../assets/banner.svg')]  bg-cover bg-center w-full h-full">
            <div class="text-white text-center py-52 ">
                <h1 class="text-xl font-bold mb-2" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="500">WELCOME</h1>
                <h2 class="text-4xl font-bold mb-10" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="700">SMK Trimulia Jakarta</h2>
                <?php if (isset($nothing)) : ?>
                    <?php echo $nothing ?>
                <?php endif; ?>
                <form action="" class="py-10 px-3 mx-auto max-w-xl" method="get" data-aos="fade-down" data-aos-duration="1000" data-aos-delay="800">
                    <input name="keyword" placeholder="Cari Berita Terkini" type="text" class="focus:ring-0 focus:border-white  placeholder-white placeholder:font-semibold w-full bg-transparent border-white border-2 rounded-lg">
                    <button type="submit" name="cari" class="hidden">cari</button>
                </form>

                <br>
                <div data-aos="fade-down" data-aos-duration="1000" data-aos-delay="900">

                    <a href="#kontak"><button class="hover:bg-white hover:text-black font-semibold transition duration-300 bg-transparent border-2 rounded-lg border-white py-2 px-7">CONTACT US</button></a>
                </div>

            </div>

        </div>
    </section> -->
    <!-- HERO END -->


    <!-- JURUSAN -->
    <!-- <section id="jurusan" class="jurusan">
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
    </section> -->
    <!-- JURUSAN END -->

    <!-- BREADCRUMB -->
    <div class="container pt-20">
        <ul class="flex gap-2 items-center md:text-xl text-zinc-800 text-berita">
            <a href="./index.php#berita">
                <li>Home</li>
            </a>
            <li>//</li>
            <a href="#">
                <li class="breadcrumb-aktif"><?php echo $row["judul_berita"] ?></li>
            </a>
        </ul>
    </div>
    <!-- BREADCRUMB END -->

    <!-- BERITA -->
    <section id="berita" class="pt-10 pb-80">
        <div class="container  ">
            <div class="border float-left mb-2 mr-4  h-60 max-w-sm w-full overflow-hidden">
                <img class="object-cover w-full h-full" src="./src/img-berita/<?php echo $row["gambar_berita"] ?>" alt=""><br>
            </div>
            <h1 id="2" class="text-berita font-bold text-zinc-800 text-4xl    "><?php echo $row["judul_berita"] ?></h1>
            <h3 class="text-berita mb-5 text-zinc-800">Autor - 24 April 2007</h3>
            <p id="p2" class="text-zinc-800 text-berita text-base"><?php echo $row["isi_berita"] ?></p>


            <div class="flex items-center gap-0 lg:gap-1 mt-28 sm:px-32 w-full">
                <div class="border-t-slate-600 pembatas border-t block w-1/2  lg:w-full  "></div>
                <a href="./index.php#berita" class="text-zinc-800 font-bold text-berita text-center w-full   md:w-1/3 lg:w-1/3 ">lihat berita lainnya</a>
                <div class="border-t-slate-600 pembatas border-t block w-1/2 lg:w-full  "></div>
            </div>
        </div>



    </section>
    <!-- BERITA END -->


    <!-- CONTACT -->

    <!-- <section id="kontak" class="mb-10">
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
    </section> -->

    <!-- CONTACT END -->


    <!-- FOOTER -->
    <section class=" h-full bg-neutral-800 py-36">
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
    <a id="toTop" href="#" class="hidden h-14 w-14 hover:animate-pulse bg-zinc-400  z-50 bottom-4 right-4 p-4 fixed rounded-full">
        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m5 15 7-7 7 7" />
        </svg>
    </a>

    <a id="darkMode" href="#" class="  justify-center items-center h-14 w-14 hover:animate-pulse bg-violet-400  z-50 bottom-20 right-4 p-4 fixed rounded-full">
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