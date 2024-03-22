<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMK Trimulia Jakarta</title>
    <link href="./src/output.css" rel="stylesheet">

</head>

<body class=" bg-white">


    <!-- NAV -->
    <nav class=" bg-transparent fixed w-full">
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

            <div class="flex gap-5 hidden lg:block ">
                <a href="./login.php"><button class="bg-green-600 py-2 px-7 border-2 hover:bg-green-500 hover:border-green-500 transition duration-300 border-green-600 rounded-md font-bold text-white">Login</button></a>
                <a href="./daftar.php"><button class="bg-transparent py-2 px-6 border-2 border-green-600 rounded-md hover:bg-green-800 transition duration-300 text-white font-bold">Daftar</button></a>
            </div>

            <div class="lg:hidden">
                <svg id="close" class="w-6 h-6  text-white dark:text-yellow-500 relative hidden" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6" />
                </svg>

                <svg id="open" class="cursor-pointer w-6 h-6  text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M5 7h14M5 12h14M5 17h14" />
                </svg>

            </div>

        </div>

        <div id="nav-menu" class="hidden absolute z-40  bg-white w-full text-black  p-6 ">
            <ul class="flex flex-col gap-4 text-xl  ">
                <li>Home</li>
                <li>Page 2</li>
                <li>Page 3</li>
                <li>Login</li>
                <li>Daftar</li>
            </ul>
        </div>
    </nav>


    <!-- NAV END -->

    <!-- HERO -->
    <section id="home" class="h-screen mb-36">
        <div class="bg-[url('../assets/1.2.png')] bg-cover h-full">
            <div class="text-white text-center py-52 ">
                <h1 class="text-xl font-bold mb-2">WELCOME</h1>
                <h2 class="text-4xl font-bold mb-10">SMK Trimulia Jakarta</h2>
                <form action="" class="py-10 px-3 mx-auto max-w-xl">
                    <input placeholder="Cari Berita Terkini " type="text" class="focus:ring-0 focus:border-white  placeholder-white placeholder:font-semibold w-full bg-transparent border-white border-2 rounded-lg">
                </form>


                <button class="hover:bg-white hover:text-black font-semibold transition duration-300 bg-transparent border-2 rounded-lg border-white py-2 px-7">CONTACT US</button>

            </div>

        </div>
    </section>
    <!-- HERO END -->


    <!-- JURUSAN -->
    <section id="jurusan" class="jurusan">
        <div class="container">
            <div class="text-center">
                <h1 id="1" class="font-bold text-slate-900 text-3xl mb-7">Kami bekerja sama dengan</h1>
                <p id="p1" class="text-slate-700 text-base">Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero animi fuga nihil. Est tempora adipisci nihil quas ipsa nisi quis nesciunt commodi quasi, qui suscipit aliquam tempore eveniet</p>
            </div>

            <div class="flex flex-wrap items-center gap-5 justify-center my-12">
                <img src="./assets/dummy1.png" alt="">
                <img src="./assets/dummy2.png" alt="">
                <img src="./assets/dummy3.png" alt="">
                <img src="./assets/dummy4.png" alt="">
                <img src="./assets/dummy5.png" alt="">
                <img src="./assets/dummy6.png" alt="">
            </div>
        </div>
    </section>
    <!-- JURUSAN END -->

    <!-- BERITA -->
    <section id="berita" class="my-40">
        <div class="container">
            <div class="text-center my-10">
                <h1 id="2" class="font-bold text-slate-900 text-3xl mb-7">Berita Terkini</h1>
                <p id="p2" class="text-slate-700 text-base">Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero animi fuga nihil. Est tempora adipisci nihil quas ipsa nisi quis nesciunt commodi quasi, qui suscipit aliquam tempore eveniet</p>
            </div>


            <div class="flex flex-wrap justify-start items-center ">

                <div class="w-full flex justify-center  sm:w-1/2 md:w-1/4  px-4">
                    <div class=" rounded-md  kartu shadow-xl  border-spacing-4 border border-gray-700 overflow-hidden mb-10 max-h-96 max-w-60">
                        <img src="./assets/2.JPG" alt="" class="w-full">

                        <div class="py-8 px-6">
                            <h3 class="text-berita mb-3 font-semibold text-xl truncate ">Indofringe</h3>
                            <p class="text-berita mb-7 line-clamp-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui, debitis.wwqwqwqwqwqwwwwwwwwwsssssssssssssswwwwwwwwwww</p>
                            <a href="" class="font-medium text-sm text-white bg-primary py-2 px-4 rounded-lg hover:shadow-lg hover:shadow-primary transition duration-500 ">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <div class="w-full flex justify-center  sm:w-1/2 md:w-1/4  px-4">
                    <div class=" rounded-md  kartu shadow-xl  border-spacing-4 border border-gray-700 overflow-hidden mb-10 max-h-96 max-w-60">
                        <img src="./assets/2.JPG" alt="" class="w-full">

                        <div class="py-8 px-6">
                            <h3 class="text-berita mb-3 font-semibold text-xl truncate ">Indofringe</h3>
                            <p class="text-berita mb-7 line-clamp-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui, debitis.wwqwqwqwqwqwwwwwwwwwsssssssssssssswwwwwwwwwww</p>
                            <a href="" class="font-medium text-sm text-white bg-primary py-2 px-4 rounded-lg hover:shadow-lg hover:shadow-primary transition duration-500 ">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <div class="w-full flex justify-center  sm:w-1/2 md:w-1/4  px-4">
                    <div class=" rounded-md  kartu shadow-xl  border-spacing-4 border border-gray-700 overflow-hidden mb-10 max-h-96 max-w-60">
                        <img src="./assets/2.JPG" alt="" class="w-full">

                        <div class="py-8 px-6">
                            <h3 class="text-berita mb-3 font-semibold text-xl truncate ">Indofringe</h3>
                            <p class="text-berita mb-7 line-clamp-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui, debitis.wwqwqwqwqwqwwwwwwwwwsssssssssssssswwwwwwwwwww</p>
                            <a href="" class="font-medium text-sm text-white bg-primary py-2 px-4 rounded-lg hover:shadow-lg hover:shadow-primary transition duration-500 ">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <div class="w-full flex justify-center  sm:w-1/2 md:w-1/4  px-4">
                    <div class=" rounded-md  kartu shadow-xl  border-spacing-4 border border-gray-700 overflow-hidden mb-10 max-h-96 max-w-60">
                        <img src="./assets/2.JPG" alt="" class="w-full">

                        <div class="py-8 px-6">
                            <h3 class="text-berita mb-3 font-semibold text-xl truncate ">Indofringe</h3>
                            <p class="text-berita mb-7 line-clamp-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui, debitis.wwqwqwqwqwqwwwwwwwwwsssssssssssssswwwwwwwwwww</p>
                            <a href="" class="font-medium text-sm text-white bg-primary py-2 px-4 rounded-lg hover:shadow-lg hover:shadow-primary transition duration-500 ">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <div class="w-full flex justify-center  sm:w-1/2 md:w-1/4  px-4">
                    <div class=" rounded-md  kartu shadow-xl  border-spacing-4 border border-gray-700 overflow-hidden mb-10 max-h-96 max-w-60">
                        <img src="./assets/2.JPG" alt="" class="w-full">

                        <div class="py-8 px-6">
                            <h3 class="text-berita mb-3 font-semibold text-xl truncate ">Indofringe</h3>
                            <p class="text-berita mb-7 line-clamp-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui, debitis.wwqwqwqwqwqwwwwwwwwwsssssssssssssswwwwwwwwwww</p>
                            <a href="" class="font-medium text-sm text-white bg-primary py-2 px-4 rounded-lg hover:shadow-lg hover:shadow-primary transition duration-500 ">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <div class="w-full flex justify-center  sm:w-1/2 md:w-1/4  px-4">
                    <div class=" rounded-md  kartu shadow-xl  border-spacing-4 border border-gray-700 overflow-hidden mb-10 max-h-96 max-w-60">
                        <img src="./assets/2.JPG" alt="" class="w-full">

                        <div class="py-8 px-6">
                            <h3 class="text-berita mb-3 font-semibold text-xl truncate ">Indofringe</h3>
                            <p class="text-berita mb-7 line-clamp-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui, debitis.wwqwqwqwqwqwwwwwwwwwsssssssssssssswwwwwwwwwww</p>
                            <a href="" class="font-medium text-sm text-white bg-primary py-2 px-4 rounded-lg hover:shadow-lg hover:shadow-primary transition duration-500 ">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>
    <!-- BERITA END -->


    <!-- CONTACT -->

    <section id="kontak" class="mb-10">
        <div class="conatiner">
            <div class="text-center mb-10">
                <h1 id="3" class="font-bold text-slate-900 text-3xl mb-5">Contact Us</h1>
                <p id="p3" class="text-slate-700 text-base">Lorem ipsum dolor sit amet consectetu</p>
            </div>



            <form action="" class="pb-10">
                <div class="max-w-xl mx-auto">
                    <div class="w-full px-4 mb-8">
                        <label id="label1" for="" class="text-slate-900 font-semibold">Nama</label>
                        <input placeholder="Contoh: kevin" type="text" class="w-full bg-zinc-700 text-white rounded-md p-3 border-none focus:ring-0 hover:scale-105 transition focus:scale-105 duration-500">
                    </div>


                    <div class="w-full px-4 mb-8">
                        <label id="label2" for="" class="text-slate-900 font-semibold">Email</label>
                        <input placeholder="Contoh: kevin@gmail.com" type="email" class="w-full bg-zinc-700 text-white rounded-md p-3 border-none focus:ring-0 hover:scale-105 transition focus:scale-105 duration-500">
                    </div>

                    <div class="w-full px-4 mb-8">
                        <label id="label3" for="" class="text-slate-900 font-semibold">Subject</label>
                        <input placeholder="Contoh: Judul" type="text" class="w-full bg-zinc-700 text-white rounded-md p-3 border-none focus:ring-0 hover:scale-105 transition focus:scale-105 duration-500">
                    </div>


                    <div class="w-full px-4 mb-8">
                        <label id="label4" for="" class="text-slate-900 font-semibold">Pesan</label>
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

                <div class=" sm:w-1/3">
                    <div class="mb-14">

                        <h2 class="mb-3 text-zinc-200 font-bold text-2xl">Hubungi Kami</h2>
                        <p class="text-slate-200 text-base mb-3">forbidden@gmail.com</p>
                        <p class="text-slate-200 text-base mb-3">@forbidden on ig</p>
                        <p class="text-slate-200 text-base mb-3">Amerika Utara</p>
                    </div>
                </div>

                <div class="mb-14  sm:w-1/3">
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


    <!-- LOGIN -->
    <div id=" login" class="fixed flex justify-center items-center bg-black bg-opacity-75 z-50 top-0 w-screen h-screen hidden">
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









    <!-- TO TOP -->

    <a id="toTop" href="#" class="hidden h-14 w-14 hover:animate-pulse bg-zinc-400  z-50 bottom-4 right-4 p-4 fixed rounded-full">
        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m5 15 7-7 7 7" />
        </svg>
    </a>

    <a id="darkMode" href="#" class="hidden  justify-center items-center h-14 w-14 hover:animate-pulse bg-violet-400  z-50 bottom-20 right-4 p-4 fixed rounded-full">
        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="1" height="1" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 21a9 9 0 0 1-.5-17.986V3c-.354.966-.5 1.911-.5 3a9 9 0 0 0 9 9c.239 0 .254.018.488 0A9.004 9.004 0 0 1 12 21Z" />
        </svg>

    </a>




    <!-- TO TOP END -->




    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script src="./node_modules/preline/dist/preline.js"></script>
    <script src="./main.js"></script>
</body>

</html>