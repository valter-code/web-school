<?php
require("../koneksi.php");
session_start();

//kick jika belum login
if (!isset($_SESSION["admin-session"])) {
    header("Location: login.php");
    exit();
}

//query
$siswa = query("SELECT * FROM siswa");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/rippleui@1.12.1/dist/css/styles.css" />
</head>

<body>


    <div class="sticky flex h-screen flex-row gap- overflow-y-auto rounded-lg sm:overflow-x-hidden">
        <aside class="sidebar-sticky sidebar justify-start">
            <section class="sidebar-title items-center p-4">
                <div class="w-12 mr-2">
                    <div class="avatar rounded-sm bg-transparent bg-tra avatar-md">
                        <div class="dropdown-container">
                            <div class="dropdown">
                                <label class="btn btn-ghost flex cursor-pointer px-0 hover:bg-inherit" tabindex="0">
                                    <img src="../assets/logo.png" alt="avatar" />
                                </label>
                                <div class="dropdown-menu dropdown-menu-bottom-right">
                                    <a class="dropdown-item text-sm">Profile</a>
                                    <a tabindex="-1" class="dropdown-item text-sm">Account settings</a>
                                    <a href="logout.php" tabindex="-1" class="dropdown-item text-sm text-red-600">Logout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col">
                    <span>Welcome admin</span>
                    <span class="text-xs font-normal text-content2"><?php echo $_SESSION["username_admin"] ?></span>

                </div>
            </section>
            <section class="sidebar-content min-h-[20rem]">
                <nav class="menu rounded-md">
                    <section class="menu-section px-4">
                        <span class="menu-title">Main menu</span>
                        <ul class="menu-items">
                            <a href="index.php">
                                <li class="menu-item menu-active">
                                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd" d="M11.293 3.293a1 1 0 0 1 1.414 0l6 6 2 2a1 1 0 0 1-1.414 1.414L19 12.414V19a2 2 0 0 1-2 2h-3a1 1 0 0 1-1-1v-3h-2v3a1 1 0 0 1-1 1H7a2 2 0 0 1-2-2v-6.586l-.293.293a1 1 0 0 1-1.414-1.414l2-2 6-6Z" clip-rule="evenodd" />
                                    </svg>


                                    <span>Home</span>
                                </li>
                            </a>

                            <a href="data-siswa.php">
                                <li class="menu-item ">
                                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 9h3m-3 3h3m-3 3h3m-6 1c-.306-.613-.933-1-1.618-1H7.618c-.685 0-1.312.387-1.618 1M4 5h16a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1Zm7 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z" />
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
                </nav>
            </section>
            <section class="sidebar-footer bg-gray-2 pt-2 hidden">
                <div class="divider my-0"></div>
                <div class="dropdown z-50 flex h-fit w-full cursor-pointer hover:bg-gray-4">
                    <label class="whites mx-2 flex h-fit w-full cursor-pointer p-0 hover:bg-gray-4" tabindex="0">
                        <div class="flex flex-row gap-4 p-4">
                            <div class="avatar avatar-md">
                                <img src="" alt="avatar" />
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
        <div class="flex w-full flex-row flex-wrap   justify-center">


            <div class="text-center">
                <h1 class="font-bold text-3xl">Welcome Admin</h1>
                <br>
                <h2 class="font-bold text-lg">SMK Trimulia Jakarta</h2>
            </div>

            <div class="my-4 w-full gap-4">

                <!-- Content -->

                <div class="flex  gap-3 mx-5">
                    <div class="hover:cursor-pointer hover:-translate-y-2 transition duration-200 bg-indigo-900 rounded-3xl bg-clip-padding backdrop-filter backdrop-blur-sm bg-opacity-10 border border-gray-100 w-1/3 p-10 flex flex-col justify-center items-center">
                        <img class="w-20 rounded-full" src="https://i.pinimg.com/564x/4f/a9/f9/4fa9f9916731730fa5530958d3082548.jpg" alt="">
                        <span class="badge bg-zinc-700 border-none mt-3">Guru</span>
                        <h2 class="mt-2 font-bold text-white">24</h2>
                    </div>
                    <div class="hover:cursor-pointer hover:-translate-y-2 transition duration-200 bg-indigo-900 rounded-3xl bg-clip-padding backdrop-filter backdrop-blur-sm bg-opacity-10 border border-gray-100 w-1/3 p-10 flex flex-col justify-center items-center">
                        <img class="w-20 rounded-full" src="https://i.pinimg.com/564x/f5/3d/3f/f53d3f0e5624f46450dc2ee4c0025092.jpg" alt="">
                        <span class="badge bg-zinc-700 border-none mt-3">Murid</span>
                        <h2 class="mt-2 font-bold text-white">24</h2>
                    </div>
                    <div class="hover:cursor-pointer hover:-translate-y-2 transition duration-200 bg-indigo-900 rounded-3xl bg-clip-padding backdrop-filter backdrop-blur-sm bg-opacity-10 border border-gray-100 w-1/3 p-10 flex flex-col justify-center items-center">
                        <img class="w-20 rounded-full" src="../assets/berita.svg" alt="">
                        <span class="badge bg-zinc-700 border-none mt-3">Berita</span>
                        <h2 class="mt-2 font-bold text-white">24</h2>
                    </div>
                    <div class="hover:cursor-pointer hover:-translate-y-2 transition duration-200 bg-indigo-900 rounded-3xl bg-clip-padding backdrop-filter backdrop-blur-sm bg-opacity-10 border border-gray-100 w-1/3 p-10 flex flex-col justify-center items-center">
                        <img class="w-20 rounded-full" src="https://i.pinimg.com/564x/5d/04/14/5d04141fdc10b958ca9e43d21e350b45.jpg" alt="">
                        <span class="badge bg-zinc-700 border-none mt-3">....</span>
                        <h2 class="mt-2 font-bold text-white">24</h2>
                    </div>
                </div>






                <!-- Content END -->

            </div>
        </div>
    </div>


    <script src="https://cdn.tailwindcss.com"></script>
</body>

</html>