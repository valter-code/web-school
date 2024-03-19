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

//fungsi pencarian siswa
if (isset($_GET["cari"])) {
    $query = "SELECT * FROM siswa WHERE nama_siswa LIKE ? OR jurusan_siswa LIKE ?";
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
    $siswa = mysqli_fetch_all($result, MYSQLI_ASSOC);

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
                        <li class="menu-item menu-active">
                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M4 4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2H4Zm10 5a1 1 0 0 1 1-1h3a1 1 0 1 1 0 2h-3a1 1 0 0 1-1-1Zm0 3a1 1 0 0 1 1-1h3a1 1 0 1 1 0 2h-3a1 1 0 0 1-1-1Zm0 3a1 1 0 0 1 1-1h3a1 1 0 1 1 0 2h-3a1 1 0 0 1-1-1Zm-8-5a3 3 0 1 1 6 0 3 3 0 0 1-6 0Zm1.942 4a3 3 0 0 0-2.847 2.051l-.044.133-.004.012c-.042.126-.055.167-.042.195.006.013.02.023.038.039.032.025.08.064.146.155A1 1 0 0 0 6 17h6a1 1 0 0 0 .811-.415.713.713 0 0 1 .146-.155c.019-.016.031-.026.038-.04.014-.027 0-.068-.042-.194l-.004-.012-.044-.133A3 3 0 0 0 10.059 14H7.942Z" clip-rule="evenodd" />
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


            <div class="text-center">
                <h1 class="font-bold text-2xl">DATA SISWA</h1>
                <br>
                <h2 class="font-bold text-3xl">SMK Trimulia Jakarta</h2>
            </div>

            <div class="my-4 grid w-full  gap-4">


                <!-- TAMBAH SISWA -->
                <article>
                    <label class="btn btn-primary" for="modal-1">TAMBAH SISWA</label>

                    <input class="modal-state" id="modal-1" type="checkbox" />
                    <div class="modal">
                        <label class="modal-overlay" for="modal-1"></label>
                        <div class="modal-content flex w-full flex-col gap-5 p-7">
                            <label for="modal-1" class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</label>
                            <div class="flex flex-col gap-2">
                                <h2 class="text-center text-2xl font-semibold">Tambah Siswa</h2>
                                <p class="mx-auto max-w-xs text-sm text-content2">SMK Trimulia Jakarta</p>
                            </div>

                            <section>


                                <!-- FORM -->
                                <form action="">
                                    <div class="form-group">
                                        <div class="form-field mb-5">
                                            <label class="form-label">Nama Siswa</label>
                                            <input placeholder="Ketik disini" type="email" class="input max-w-full" />
                                            <label class="form-label">
                                                <span class="form-label-alt">Masukkan nama yang sesusai.</span>
                                            </label>
                                        </div>


                                        <div class="mb-5">
                                            <label class="form-label mb-2">Jurusan</label>
                                            <select class="select select-block mb-2">
                                                <option>TKJ</option>
                                                <option>MP</option>
                                                <option>BD</option>
                                            </select>
                                            <label class="form-label">
                                                <span class="form-label-alt">Masukkan jurusan yang sesuai.</span>
                                            </label>
                                        </div>



                                        <div class="form-field">
                                            <label class="form-label">
                                                <span>Password</span>
                                            </label>
                                            <div class="form-control">
                                                <input placeholder="Ketik disini" type="password" class="input max-w-full" />
                                            </div>
                                            <label class="form-label">
                                                <span class="form-label-alt">Masukkan password yang kuat.</span>
                                            </label>
                                        </div>





                                        <div class="form-field pt-5">
                                            <div class="form-control justify-between">
                                                <button type="button" class="btn btn-primary w-full">Apakah yakin untuk membuat akun?</button>
                                            </div>
                                        </div>

                                        <div class="divider divider-horizontal"><a class="text-sky-500" href="">Ya</a> <a class="text-red-600" href="data-siswa.php">Tidak</a></div>
                                    </div>
                                </form>
                                <!-- FORM -->




                            </section>
                        </div>
                    </div>
                </article>
                <!-- TAMBAH SISWA END -->

                <form action="" method="get" class="">
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
                                <th>Nama</th>
                                <th>Jurusan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1 ?>
                            <?php foreach ($siswa as $siswa) : ?>
                                <tr>
                                    <th><?php echo $no ?></th>
                                    <th><?php echo $siswa["nama_siswa"] ?></th>
                                    <th><?php echo $siswa["jurusan_siswa"] ?></th>
                                    <th><a class="text-sky-500" href="edit-siswa.php">Edit</a> | <a class="text-red-600" href="delete-siswa.php?id_siswa=<?php echo $siswa["id_siswa"] ?>">Delete</a></th>
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