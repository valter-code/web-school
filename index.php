<?php
require("koneksi.php");

$berita = query("SELECT * FROM berita");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMK Trimulia Jakarta</title>
    <link href="./src/output.css" rel="stylesheet">
</head>

<body class="bg-white  ">
    <!-- NAV START -->
    <header class="flex flex-wrap sm:justify-start sm:flex-nowrap w-full bg-zinc-800 text-sm py-4 shadow-lg fixed z-50 ">
        <nav class="max-w-[85rem] w-full mx-auto px-4 flex flex-wrap basis-full items-center justify-between" aria-label="Global">
            <div class="flex items-center gap-2">
                <div class="w-10">
                    <img src="./assets/logo.png" alt="" class="">
                </div>
                <a class="sm:order-1 flex-none text-xl font-semibold text-white" href="#">SMK Trimulia JKT</a>

            </div>
            <div class="sm:order-3 flex items-center gap-x-2">
                <button type="button" class="sm:hidden hs-collapse-toggle p-2.5 inline-flex justify-center items-center gap-x-2 rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-transparent dark:border-gray-700 dark:text-white dark:hover:bg-white/10 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-collapse="#navbar-alignment" aria-controls="navbar-alignment" aria-label="Toggle navigation">
                    <svg class="hs-collapse-open:hidden flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="3" x2="21" y1="6" y2="6" />
                        <line x1="3" x2="21" y1="12" y2="12" />
                        <line x1="3" x2="21" y1="18" y2="18" />
                    </svg>
                    <svg class="hs-collapse-open:block hidden flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M18 6 6 18" />
                        <path d="m6 6 12 12" />
                    </svg>
                </button>
                <button onclick="popUp()" type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg  border-white bg-gradient-to-r from-rose-100 to-teal-100  text-gray-800 shadow-sm hover:bg-blue-300 disabled:opacity-50 disabled:pointer-events-none dark:bg-blue-400  dark:text-white dark:hover:bg-blue-500 hover:shadow-lg transition duration-500 hover:scale-105 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                    LOGIN / DAFTAR
                </button>
            </div>
            <div id="navbar-alignment" class="mr-36 hs-collapse hidden overflow-hidden transition-all duration-300 basis-full grow sm:grow-0 sm:basis-auto sm:block sm:order-2 ">
                <div class="flex flex-col gap-5 mt-5 sm:flex-row sm:items-center sm:mt-0 sm:ps-5">
                    <a class="font-medium text-cyan-500  text-lg dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" href="#" aria-current="page">Home</a>
                    <a class="font-medium text-white hover:text-cyan-400 hover:shadow-cyan-400 hover:-translate-y-1 transition duration-300 dark:hover:text-gray-500 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" href="#">Page2</a>
                    <a class="font-medium text-white hover:text-cyan-400 hover:shadow-cyan-400 hover:-translate-y-1 transition duration-300 dark:hover:text-gray-500 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" href="#">Page3</a>
                    <a class="font-medium text-white hover:text-cyan-400 hover:shadow-cyan-400 hover:-translate-y-1 transition duration-300 dark:hover:text-gray-500 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" href="#">Page4</a>
                </div>
            </div>
        </nav>
    </header>
    <!-- NAV END -->


    <!-- HERO START -->
    <div data-hs-carousel='{
        "loadingClasses": "opacity-0",
        "isAutoPlay": true
      }' class="relative pt-16">
        <div class="hs-carousel relative overflow-hidden w-full min-h-[500px] bg-white  ">
            <div class="hs-carousel-body absolute top-0 bottom-0 start-0 flex flex-nowrap transition-transform duration-700 opacity-0">
                <div class="hs-carousel-slide">
                    <div class="flex justify-center h-full bg-gray-100 ">
                        <img src="./assets/1tm.jpg" alt="" class="w-full">
                    </div>
                </div>
                <div class="hs-carousel-slide">
                    <div class="flex justify-center h-full bg-violet-200 ">
                        <img src="./assets/2tm.jpg" alt="" class="w-full">
                    </div>
                </div>
                <div class="hs-carousel-slide">
                    <div class="flex justify-center h-full w-full bg-gray-300 ">
                        <img src="./assets/3tm.png" alt="" class="w-full">
                    </div>
                </div>
            </div>
        </div>
        <button type="button" class="hs-carousel-prev hs-carousel:disabled:opacity-50 disabled:pointer-events-none absolute inset-y-0 start-0 inline-flex justify-center items-center w-[46px] h-full text-gray-800 hover:bg-gray-800/[.1]">
            <span class="text-2xl" aria-hidden="true">
                <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z" />
                </svg>
            </span>
            <span class="sr-only">Previous</span>
        </button>
        <button type="button" class="hs-carousel-next hs-carousel:disabled:opacity-50 disabled:pointer-events-none absolute inset-y-0 end-0 inline-flex justify-center items-center w-[46px] h-full text-gray-800 hover:bg-gray-800/[.1]">
            <span class="sr-only">Next</span>
            <span class="text-2xl" aria-hidden="true">
                <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z" />
                </svg>
            </span>
        </button>
        <div class="hs-carousel-pagination flex justify-center absolute bottom-3 start-0 end-0 space-x-2">
            <span class="hs-carousel-active:bg-blue-700 hs-carousel-active:border-blue-700 size-3 border border-gray-400 rounded-full cursor-pointer"></span>
            <span class="hs-carousel-active:bg-blue-700 hs-carousel-active:border-blue-700 size-3 border border-gray-400 rounded-full cursor-pointer"></span>
            <span class="hs-carousel-active:bg-blue-700 hs-carousel-active:border-blue-700 size-3 border border-gray-400 rounded-full cursor-pointer"></span>
        </div>
    </div>
    <!-- HERO END -->


    <!-- BERITA START -->
    <div class="my-24">
        <h1 class="text-center font-sans font-extrabold text-4xl text-black">BERITA SEKOLAH</h1>
    </div>
    <div class="flex flex-wrap gap-3 justify-start mx-5 mb-36">
        <?php foreach ($berita as $berita) : ?>
            <div class="card w-96 bg-gray-200 bg-opacity-45 ">
                <figure>
                    <img src="https://daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.jpg" alt="car!" />
                </figure>

                <div class="card-body">
                    <h2 class="card-title text-slate-900"><?php echo $berita["judul_berita"] ?></h2>
                    <p class="text-slate-800 line-clamp-5"><?php echo $berita["isi_berita"] ?></p>

                    <div class="card-actions mt-6">
                        <a href="berita.php?id=<?php echo $berita["id"] ?>"><button class="btn btn-primary">TOMBOL </button></a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <!-- BERITA END -->







    <!-- LOGIN -->
    <div id="login" class="fixed flex justify-center items-center bg-black bg-opacity-75 z-50 top-0 w-screen h-screen hidden">
        <form action="" class="bg-purple-400 rounded-md bg-clip-padding backdrop-filter backdrop-blur-md bg-opacity-0 border border-gray-100  p-12 h-[400px] flex flex-col items-center justify-center">
            <div class="mb-10">
                <h1 class="text-white text-center font-bold">SMK TRIMULIA JAKARTA</h1>

                <a href="" class="absolute right-1 top-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
                    </svg>
                </a>

                <h2 class="text-white text-center text-sm font-light">LOGIN SISWA</h2>
            </div>

            <div class="border-b-2 mb-10">
                <label for="siswa" class="text-white">Nama Siswa</label>
                <input type="text" id="siswa" class="w-full bg-transparent border-none focus:ring-0 text-white autofill:bg-black">
            </div>

            <div class="border-b-2 mb-10 w-full">
                <label for="pass" class="text-white">Password </label>
                <input type="password" id="pass" class="w-full bg-transparent border-none focus:ring-0 text-white autofill:bg-n">
            </div>

            <button class="w-full mb-5 bg-violet-800 py-2 rounded-full font-bold text-white shadow-sm hover:scale-95 transition duration-150 hover:bg-violet-900">
                LOGIN
            </button>

            <h1 class="text-white">Belum Punya Akun? <a onclick="popDaftar()" href="#" class="underline font-semibold">Daftar</a></h1>

            <div class="w-60 absolute -z-50 brightness-50 opacity-15 top-20">
                <img src="./assets/logo.png" alt="">
            </div>
        </form>
    </div>
    <!-- LOGIN END -->


    <!-- DAFTAR -->
    <div id="daftar" class="fixed flex justify-center items-center bg-black bg-opacity-75 z-50 top-0 w-screen h-screen hidden">
        <form action="" class="bg-purple-400 rounded-md bg-clip-padding backdrop-filter backdrop-blur-md bg-opacity-0 border border-gray-100  p-12 h-[510px] flex flex-col items-center justify-center">
            <div class="mb-10">
                <h1 class="text-white text-center font-bold">SMK TRIMULIA JAKARTA</h1>

                <a href="" class="absolute right-1 top-1">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
                    </svg>
                </a>

                <h2 class="text-white text-center text-sm font-light">DAFTAR SISWA</h2>
            </div>

            <div class="border-b-2 mb-10">
                <label for="siswa" class="text-white font-semibold  ">Nama Siswa</label>
                <input type="text" id="siswa" class="w-full bg-transparent border-none focus:ring-0 text-white">
            </div>

            <div class="w-full mb-10 border-b-2">
                <label for="jurusan" class="text-white font-semibold">Jurusan</label>
                <select name="" id="jurusan" class="w-full bg-transparent border-none focus:ring-0 ">
                    <option value="" disabled class="bg-neutral-800 text-white font-semibold">Daftar Jurusan</option>
                    <option value="" class="bg-neutral-800 text-white font-semibold">TKJ</option>
                    <option value="" class="bg-neutral-800 text-white font-semibold">MP</option>
                    <option value="" class="bg-neutral-800 text-white font-semibold">BD</option>
                </select>
            </div>

            <div class="border-b-2 mb-10 w-full">
                <label for="pass" class="text-white font-semibold">Password </label>
                <input type="password" id="pass" class="w-full bg-transparent border-none focus:ring-0 text-white">
            </div>

            <button class="w-full mb-5 bg-violet-800 py-2 rounded-full font-bold text-white shadow-sm hover:scale-95 transition duration-150 hover:bg-violet-900">
                DAFTAR
            </button>

            <h1 class="text-white">Sudah Punya Akun? <a onclick="popLogin()" href="#" class="underline font-semibold">Login</a></h1>

            <div class="w-64 absolute -z-50 brightness-50 opacity-15 top-50">
                <img src="./assets/logo.png" alt="">
            </div>
        </form>
    </div>
    <!-- DAFTAR -->



    <!-- FOOTER START -->
    <footer class="bg-zinc-800 shadow  ">
        <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
            <div class="sm:flex sm:items-center sm:justify-between">
                <a href="https://flowbite.com/" class="flex items-center mb-4 sm:mb-0 space-x-3 rtl:space-x-reverse">
                    <img src="./assets/logo.png" class="h-8" alt="Flowbite Logo" />
                    <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">SMK Trimulia Jakarta</span>
                </a>
                <ul class="flex flex-wrap items-center mb-6 text-sm font-medium text-gray-500 sm:mb-0 dark:text-gray-400">
                    <li>
                        <a href="#" class="hover:underline me-4 md:me-6">About</a>
                    </li>
                    <li>
                        <a href="#" class="hover:underline me-4 md:me-6">Privacy Policy</a>
                    </li>
                    <li>
                        <a href="#" class="hover:underline me-4 md:me-6">Licensing</a>
                    </li>
                    <li>
                        <a href="#" class="hover:underline">Contact</a>
                    </li>
                </ul>
            </div>
            <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
            <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2024 Powered by <a href="" class="underline"><span class="font-bold text-white">Kevin</span><span class="font-bold text-yellow-400">Dev</span></a> | All Rights Reserved.</span>
        </div>
    </footer>
    <!-- FOOTER END -->
    <script src="./node_modules/preline/dist/preline.js"></script>
    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
    <script src="./main.js"></script>
</body>

</html>