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
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 opacity-75" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                    <span>Home</span>
                                </li>
                            </a>

                            <a href="data-siswa.php">
                                <li class="menu-item ">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 opacity-75" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                    <span>Data SIswa</span>
                                </li>
                            </a>

                            <a href="berita.php">
                                <li class="menu-item">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 opacity-75" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                    </svg>
                                    <span>Berita</span>
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