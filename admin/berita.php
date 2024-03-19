<?php
require("../koneksi.php");
session_start();

//kick jika belum login
if (!isset($_SESSION["admin-session"])) {
    header("Location: login.php");
    exit();
}

//query
$berita = query("SELECT * FROM berita");

//fungsi pencarian siswa
if (isset($_GET["cari"])) {
    $query = "SELECT * FROM berita WHERE judul_berita LIKE ? OR penulis LIKE ?";
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
    $berita = mysqli_fetch_all($result, MYSQLI_ASSOC);

    if (mysqli_num_rows($result) === 0) {
        $nothing = "Pencarian Anda : " . htmlspecialchars($_GET["keyword"]) . " tidak ada";
    } else {
        $some = "Pecarian Anda : " . htmlspecialchars($_GET["keyword"]);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Berita</title>
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

                            <a href="data-siswa.php">
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
                <a href="tambah-berita.php">tambah berita</a>
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
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1 ?>
                            <?php foreach ($berita as $berita) : ?>
                                <tr>
                                    <th><?php echo $no ?></th>
                                    <th><?php echo $berita["judul_berita"] ?></th>
                                    <th><?php echo $berita["isi_berita"] ?></th>
                                    <th><?php echo $berita["penulis"] ?></th>
                                    <th><a class="text-sky-500" href="edit-siswa.php">Edit</a> | <a class="text-red-600" href="delete-berita.php?id=<?php echo $berita["id"] ?>">Delete</a></th>
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


    <script src="https://cdn.tailwindcss.com"></script>
</body>

</html>