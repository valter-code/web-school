<?php
    require("../koneksi.php");
    session_start();

    //kick jika belum login
    if(!isset($_SESSION["admin-session"])){
        header("Location: login.php");
        exit();
    }

    //query
    $siswa = query("SELECT * FROM siswa");

    //fungsi pencarian siswa
    if(isset($_GET["cari"])){
        $query = "SELECT * FROM siswa WHERE nama_siswa LIKE ? OR jurusan_siswa LIKE ?";
        $statement = mysqli_prepare( $koneksi, $query);
        $keyword = htmlspecialchars($_GET["keyword"]);

        //bind
        $keyword = "%" . $keyword ."%";
        mysqli_stmt_bind_param( $statement,"ss", $keyword, $keyword);

        //execute
        mysqli_stmt_execute($statement);

        //result
        $result = mysqli_stmt_get_result($statement);

        //simpan data kedalam array
        $siswa = mysqli_fetch_all($result, MYSQLI_ASSOC);

        if(mysqli_num_rows( $result ) === 0){
            $nothing = "Pencarian Anda : " . htmlspecialchars($_GET["keyword"]) . " tidak ada";
        }else{
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
                    <img src="../assets/logo.png" alt="avatar" />
                </div>
                <div class="flex flex-col">
                    <span>Namamu</span>
                    <span class="text-xs font-normal text-content2">Admin</span>
                    <a href="logout.php" style="color:red;"><span>logout</span></a>
                </div>
            </section>
            <section class="sidebar-content min-h-[20rem]">
                <nav class="menu rounded-md">
                    <section class="menu-section px-4">
                        <span class="menu-title">Main menu</span>
                        <a href="index.php"><ul class="menu-items">
                            <a href="index.php"><li class="menu-item">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 opacity-75" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                <span>Home</span>
                            </li></a>

                            <a href="data-siswa.php"><li class="menu-item menu-active">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 opacity-75" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                <span>Data Siswa</span>
                            </li></a>

                            <a href="berita.php"><li class="menu-item">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 opacity-75" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                </svg>
                                <span>Berita</span>
                            </li></a>

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
                <h1 class="font-bold text-2xl">DATA SISWA</h1>
                <br>
                <h2 class="font-bold text-3xl">SMK Trimulia Jakarta</h2>
            </div>

            <div class="my-4 grid w-full  gap-4">
                <form action="" method="get" class="">
                    <input type="text" name="keyword" placeholder="Search" class="p-2 border-white focus:outline-none shadow-sm border-b-2 bg-transparent">
                    <button class="" type="submit" name="cari">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#ffffff" class="bi bi-search ml-2" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
                        </svg>
                    </button>
                </form>

                <!-- Jika menampilkan data -->
                <?php if(isset($some)): ?>
                    <?php echo $some ?>
                <?php endif; ?>
                <!-- Akhir jika menampilkan data -->
                
                <!-- Jika tidak menampilkan data -->
                <?php if(isset($nothing)): ?>
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
                            <?php foreach($siswa as $siswa): ?>
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