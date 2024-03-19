<?php
require("../koneksi.php");
session_start();

//kick jika belum login
if (!isset($_SESSION["admin-session"])) {
    header("Location: login.php");
    exit();
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/rippleui@1.12.1/dist/css/styles.css" />
</head>

<body>


    <div class="sticky flex h-screen flex-row gap-4 overflow-y-auto rounded-lg sm:overflow-x-hidden">
        <aside class="sidebar-sticky sidebar justify-start">
            <section class="sidebar-title items-center p-4">
                <div class="w-12 mr-2">
                    <div class="avatar avatar-ring avatar-md">
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



                    <a href="berita.php">
                        <li class="menu-item menu-active">
                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M8 7V2.221a2 2 0 0 0-.5.365L3.586 6.5a2 2 0 0 0-.365.5H8Zm2 0V2h7a2 2 0 0 1 2 2v.126a5.087 5.087 0 0 0-4.74 1.368v.001l-6.642 6.642a3 3 0 0 0-.82 1.532l-.74 3.692a3 3 0 0 0 3.53 3.53l3.694-.738a3 3 0 0 0 1.532-.82L19 15.149V20a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V9h5a2 2 0 0 0 2-2Z" clip-rule="evenodd" />
                                <path fill-rule="evenodd" d="M17.447 8.08a1.087 1.087 0 0 1 1.187.238l.002.001a1.088 1.088 0 0 1 0 1.539l-.377.377-1.54-1.542.373-.374.002-.001c.1-.102.22-.182.353-.237Zm-2.143 2.027-4.644 4.644-.385 1.924 1.925-.385 4.644-4.642-1.54-1.54Zm2.56-4.11a3.087 3.087 0 0 0-2.187.909l-6.645 6.645a1 1 0 0 0-.274.51l-.739 3.693a1 1 0 0 0 1.177 1.176l3.693-.738a1 1 0 0 0 .51-.274l6.65-6.646a3.088 3.088 0 0 0-2.185-5.275Z" clip-rule="evenodd" />
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

            <!-- CONTENT -->
            <div class="text-center">
                <h1 class="font-bold text-2xl">TAMBAH BERITA</h1>
                <br>
                <h2 class="font-bold text-3xl">SMK Trimulia Jakarta</h2>
            </div>

            <div class="my-10 flex flex-wrap justify-center items-center gap-4 w-full border-neutral-700 border-dashed border-2 rounded-xl p-5">
                <div class="w-1/3 ">
                    <h1 class="text-white mb-2 text-center">Judul Berita</h1>
                    <input type="text" class="input-ghost-secondary input ">
                </div>

                <div class="w-1/3 ">
                    <h1 class="text-white mb-2 text-center">Isi Berita</h1>
                    <input type="text" class="input-ghost-secondary input ">
                </div>

                <div class="w-full">
                    <h1 class="text-white mb-2">Isi Berita</h1>
                    <textarea class="textarea-ghost-secondary textarea textarea-block" name="" id="" cols="30" rows="20"></textarea>
                </div>

                <div class="flex flex-col justify-center items-center gap-2 w-full">
                    <label for="" class="font-bold mb-2">Thumbnail Berita</label>
                    <input type="file" class="input-file mb-5 hover:border-violet-500 border-dashed" placeholder="Thumbnail" />
                    <a href=""><button class="btn btn-solid-secondary px-10">Upload</button></a>
                </div>
                <!-- CONTENT END -->





















            </div>
        </div>
    </div>


    <script src="https://cdn.tailwindcss.com"></script>
</body>

</html>