<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account settings</title>
    <link rel="icon" href="../src/assets/logo.svg">
    <link rel="stylesheet" href="../src/output.css">
</head>

<body>
    <div class=" h-full flex justify-center items-center bg-cover bg-[url('https://i.pinimg.com/originals/a5/dd/de/a5ddde2a6c8944df7cb4bc4f3da9679a.gif')] w-full  ">
        <div class="  bg-gray-900 rounded-md bg-clip-padding backdrop-filter backdrop-blur-sm bg-opacity-40  w-full h-full p-10  ">
            <a href="./index.php">

                <div class="absolute flex items-center gap-2 top-10 text-center px-10 font-bold text-red-300  mx-auto py-2 rounded-full bg-gray-700 bg-clip-padding backdrop-filter backdrop-blur-sm bg-opacity-20 border-2 hover:bg-opacity-75 transition border-gray-100">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0z" />
                        <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708z" />
                    </svg>
                    <h1>KEMBALI</h1>
                </div>
            </a>
            <div class="flex flex-col items-center">
                <div class="w-16 mb-2  h-16 border rounded-full overflow-hidden ">
                    <img src="../src/img-admin/<?php echo $admin["gambar_admin"] ?>" alt="gambar admin" class="w-full h-full object-cover object-center">
                </div>

                <h1 class="text-white font-bold mb-1">NamaGuru</h1>
                <p class="text-white font-normal text-sm">Role</p>
            </div>


            <!-- UBAH DATA -->
            <div class="flex justify-evenly w-full mt-3 ">

                <!-- FORM UBAH PROFIL -->
                <form action="" class="p-5 bg-zinc-900  rounded-md bg-clip-padding backdrop-filter backdrop-blur-sm bg-opacity-75 border border-gray-100">
                    <div class="absolute -top-12     rotate-12 right-40 h-20 w-20 object-cover grid">
                        <h1 class="w-full text-5xl self-center text-center  object-fill">🗃️</h1>
                    </div>
                    <div>
                        <h1 class="text-white font-bold text-3xl text-center mt-3">Ubah Profil</h1>
                    </div>
                    <div class="mb-7 w-full mt-5 ">
                        <label for="" class="text-white font-semibold ">Nama Lengkap</label>
                        <input type="text" value="NamaLengkapGuru" class="w-full bg-transparent border-2 mt-[2px]  rounded-lg focus:border-white  text-zinc-200 focus:ring-0 border-zinc-500">
                    </div>
                    <div class="mb-7 w-full ">
                        <label for="" class="text-white font-semibold ">Email</label>
                        <input type="email" value="EmailSekarang@gmal.com" class="w-full bg-transparent border-2 mt-[2px]  rounded-lg focus:border-white  text-zinc-200 focus:ring-0 border-zinc-500">
                    </div>
                    <div class="mb-7 w-full ">
                        <label for="" class="text-white font-semibold ">Ganti Foto</label>
                        <input name="gambar_berita" type="file" class="w-full file:bg-violet-500 bg-transparent border-2 mt-[2px]  rounded-lg focus:border-white  text-zinc-200 focus:ring-0 border-zinc-500">
                    </div>
                    <div class="w-full">
                        <button type="submit" name="ganti" class="font-bold text-emerald-200 px-7 py-2  w-full rounded-md bg-gray-700 bg-clip-padding backdrop-filter backdrop-blur-sm bg-opacity-20 border-2 hover:bg-opacity-75 transition border-gray-100">SIMPAN PERUBAHAN</button>
                    </div>
                </form>
                <!-- FORM UBAH PROFIL END -->

                <!-- FORM UBAH PASSWORD -->
                <form action="" class="p-5 bg-zinc-900  rounded-md bg-clip-padding backdrop-filter backdrop-blur-sm bg-opacity-75 border border-gray-100">
                    <div class="absolute -top-12 rotate-12 right-40 h-20 w-20 object-cover grid">
                        <h1 class="w-full text-5xl self-center text-center  object-fill">🔐</h1>
                    </div>
                    <div>
                        <h1 class="text-white font-bold text-3xl text-center mt-3">Ubah Password</h1>
                    </div>
                    <div class="mb-7 w-full mt-5 ">
                        <label for="" class="text-white font-semibold ">Password Sekarang</label>
                        <input type="password" value="passwordSekarang" class="w-full bg-transparent border-2 mt-[2px]  rounded-lg focus:border-white  text-zinc-200 focus:ring-0 border-zinc-500">
                    </div>
                    <div class="mb-7 w-full ">
                        <label for="" class="text-white font-semibold ">Password Baru</label>
                        <input type="password" value="" placeholder="Masukkan Password Yang Kuat" class=" w-full bg-transparent border-2 mt-[2px]  rounded-lg focus:border-white  text-zinc-200 focus:ring-0 border-zinc-500">
                    </div>
                    <div class="mb-7 w-full ">
                        <label for="" class="text-white font-semibold ">Konfirmasi Password</label>
                        <input type="password" value="" placeholder="Konfirmasi Password" class="w-full bg-transparent border-2 mt-[2px]  rounded-lg focus:border-white  text-zinc-200 focus:ring-0 border-zinc-500">
                    </div>

                    <div class="w-full">
                        <button type="submit" name="ganti" class="font-bold text-emerald-200 px-7 py-2  w-full rounded-md bg-gray-700 bg-clip-padding backdrop-filter backdrop-blur-sm bg-opacity-20 border-2 hover:bg-opacity-75 transition border-gray-100">SIMPAN PERUBAHAN</button>
                    </div>
                </form>
                <!-- FORM UBAH PASSWORD END -->

            </div>
            <!-- UBAH DATA END -->

        </div>
</body>

</html>