<?php
require("../koneksi.php");
session_start();

//kick jika belum login
if (!isset($_SESSION["session-admin"])) {
    header("Location: login.php");
    exit();
}

$berita = query("SELECT * FROM berita");

//fitur search
if (isset($_GET["cari"])) {
    $query = "SELECT * FROM berita WHERE judul_berita LIKE ?";
    $statement = mysqli_prepare($koneksi, $query);
    $keyword = htmlspecialchars($_GET["keyword"]);

    //bind
    $keyword = "%" . $keyword . "%";
    mysqli_stmt_bind_param($statement, "s", $keyword);

    mysqli_stmt_execute($statement);

    $result = mysqli_stmt_get_result($statement);

    $berita = mysqli_fetch_all($result, MYSQLI_ASSOC);

    if (mysqli_num_rows($result) === 0) {
        $nothing = "Pencarian anda " . htmlspecialchars($_GET["keyword"]) . " Tidak ada";
    } else {
        $some = "Pencarian anda " . htmlspecialchars($_GET["keyword"]);
    }
}

$gambarAdmin = gambarAdmin($koneksi, $_SESSION["username-admin"]);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Berita</title>
    <link rel="icon" href="../src/assets/logo.svg">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/rippleui@1.12.1/dist/css/styles.css" />
</head>

<body>


    <div class="sticky flex h-screen flex-row gap-4 overflow-y-auto rounded-lg sm:overflow-x-hidden">
        <aside class="sidebar-sticky sidebar justify-start">
            <section id="profil-admin" class="sidebar-title items-center p-4 ">
                <div class="border w-10 h-10 rounded-full mr-3 overflow-hidden hover:cursor-pointer">
                    <img src="../src/img-admin/<?php echo $gambarAdmin ?>" alt="" class="w-full h-full object-cover">
                </div>
                <div class="flex flex-col hover:cursor-pointer">
                    <span>Welcome admin</span>
                    <span class="text-xs font-normal text-content2"><?php echo $_SESSION["username-admin"] ?></span>

                </div>
            </section>
            <section class="sidebar-content min-h-[20rem]">
                <nav class="menu rounded-md">
                    <section class="menu-section px-4">
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
                                <li class="menu-item">
                                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 9h3m-3 3h3m-3 3h3m-6 1c-.306-.613-.933-1-1.618-1H7.618c-.685 0-1.312.387-1.618 1M4 5h16a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1Zm7 5a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z" />
                                    </svg>



                                    <span>Data Siswa</span>
                                </li>
                            </a>

                            <a href="berita.php ">
                                <li class="menu-item menu-active">
                                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                        <path fill-rule="evenodd" d="M9 2.221V7H4.221a2 2 0 0 1 .365-.5L8.5 2.586A2 2 0 0 1 9 2.22ZM11 2v5a2 2 0 0 1-2 2H4v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2h-7ZM8 16a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2H9a1 1 0 0 1-1-1Zm1-5a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2H9Z" clip-rule="evenodd" />
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
        <div class="flex w-full flex-row flex-wrap gap-4 p-6 justify-center">


            <div class="text-center">
                <h1 class="font-bold text-4xl">Berita</h1>
                <br>
                <h2 class="font-bold text-2xl">SMK Trimulia Jakarta</h2>
            </div>

            <div class="my-4 grid w-full  gap-4">
                <a href="./tambah-berita.php" class="w-1/5 block">
                    <button class="bg-blue-700 font-bold py-2 rounded-lg w-full ">TAMBAH BERITA</button>
                </a>
                <form action="" method="get">
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
                                <th>Judul Berita</th>
                                <th>Isi Berita</th>
                                <th>penulis</th>
                                <th>date</th>
                                <th>gambar</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1 ?>
                            <?php foreach ($berita as $berita) : ?>
                                <tr>
                                    <th><?php echo $no ?></th>
                                    <th><?php echo $berita["judul_berita"] ?></th>
                                    <th>
                                        <p class="w-64 truncate"><?php echo $berita["isi_berita"] ?></p>
                                    </th>
                                    <th><?php echo $berita["penulis"] ?></th>
                                    <th><?php echo $berita["date"] ?></th>
                                    <th>
                                        <div class="w-14 h-10  border-zinc-600 border-2 rounded-md overflow-hidden">
                                            <img src="../src/img-berita/<?php echo $berita["gambar_berita"] ?>" alt="" class="w-full h-full object-cover object-center">
                                        </div>



                                    </th>
                                    <th><a class="text-sky-500 edit" href="#">Edit</a> | <a class="text-red-600" href="delete-berita.php?id=<?php echo $berita["id"] ?>">Delete</a></th>
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

    <!-- EDIT BERITA POPUP -->
    <div id="berita-wrapper" class="fixed bg-zinc-900 bg-opacity-45   flex scale-0   px-96 w-full h-full top-0  justify-center py-3">
        <form id="berita-form" action="" class="bg-neutral-900 px-10 py-5 scale-0  transition duration-200 overflow-y-scroll rounded-lg shadow-md ">

            <a href="#" id="close-btn" class="flex  justify-center items-center h-10 w-10 rounded-full hover:bg-neutral-800  transition ">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                    <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z" />
                </svg>
            </a>

            <div class="text-center mb-7">
                <h1 class="text-white text-2xl font-bold mb-1">Edit Berita</h1>
                <p class="text-white text-sm">SMK Trimulia Jakarta</p>
            </div>

            <div>
                <div class="flex gap-5 justify-center">
                    <div>
                        <label for="" class="text-zinc-100 text-sm text-center block">Edit Judul</label>
                        <input type="text" class="w-full mt-1 bg-transparent px-2 placeholder:text-neutral-600 focus:outline-none placeholder:text-sm  rounded-lg border-neutral-700 py-1 border-2">
                    </div>
                    <div>
                        <label for="" class="text-zinc-100 text-sm text-center block w-full">Edit Penulis</label>
                        <input type="text" class="w-full mt-1 bg-transparent px-2 placeholder:text-neutral-600 focus:outline-none placeholder:text-sm  rounded-lg border-neutral-700 py-1 border-2">
                    </div>
                </div>

                <div class="mt-10">
                    <label for="" class="text-zinc-100 text-sm text-center block">Edit Isi Berita</label>
                    <textarea name="" id="" cols="30" rows="10" class="w-full mt-1 bg-transparent px-2 placeholder:text-neutral-600 focus:outline-none placeholder:text-sm  rounded-lg border-neutral-700 py-1 border-2"></textarea>
                </div>

                <div class="flex gap-5 justify-center mt-10 ">
                    <div class="w-1/2">
                        <label for="" class="text-zinc-100 text-sm text-center block w-full">Edit Tanggal</label>
                        <input type="date" class="w-full mt-1 bg-transparent px-2 placeholder:text-neutral-600 focus:outline-none placeholder:text-sm  rounded-lg border-neutral-700 py-1 border-2">
                    </div>
                    <div class="w-1/2">
                        <label for="" class="text-zinc-100 text-sm text-center block w-full">Edit Gambar</label>
                        <input type="file" class="file:border-none w-full mt-1 bg-transparent  placeholder:text-neutral-600 file:bg-zinc-700 file:text-zinc-300 focus:outline-none placeholder:text-sm file:h-full  rounded-lg border-neutral-700 h-9 border-2">
                    </div>
                </div>

                <div class=" mt-8 w-full flex gap-5 ">
                    <button class="text-white font-bold w-full hover:bg-blue-600 transition  bg-blue-500 px-5 py-2 rounded-md">UBAH BERITA</button>
                    <button class="text-red-600 font-bold w-full hover:text-white hover:bg-red-500 transition bg-transparent border-red-500 border px-3 py-2  rounded-md">BATAL</button>
                </div>
            </div>





        </form>
    </div>
    <!-- EDIT BERITA POPUP END -->

    <script src="./berita.js"></script>
    <script src="./profil-admin.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</body>

</html>