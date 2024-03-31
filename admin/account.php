<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account settings</title>
    <link rel="stylesheet" href="../src/output.css">
</head>

<body>
    <div class=" h-full flex justify-center items-center bg-cover bg-[url('https://i.pinimg.com/originals/a5/dd/de/a5ddde2a6c8944df7cb4bc4f3da9679a.gif')] w-full  ">
        <div class="  bg-gray-900 rounded-md bg-clip-padding backdrop-filter backdrop-blur-sm bg-opacity-40 overflow-y-scroll md:overflow-hidden h-screen p-10  ">
            <div class="flex flex-col items-center">
                <div class="w-16 mb-2  h-16 border rounded-full overflow-hidden ">
                    <img src="../assets/deafult.profil-admin.svg" alt="" class="w-full h-full object-cover object-center">
                </div>

                <h1 class="text-white font-bold mb-1">NamaAdmin</h1>
                <p class="text-white font-normal text-sm">Admin</p>
            </div>

            <!-- FORM -->
            <form action="">
                <div class="rounded-lg gap-5 px-7 justify-evenly  flex flex-wrap">
                    <div class="mb-7 w-full sm:w-1/2 md:w-1/3">
                        <label for="" class="text-white font-semibold ">Nama</label>
                        <input type="text" value="Nama Sekarang" class="w-full bg-transparent border-2 mt-[2px]  rounded-lg focus:border-white  text-zinc-200 focus:ring-0 border-zinc-500">
                    </div>
                    <div class="mb-7 w-full sm:w-1/2 md:w-1/3">
                        <label for="" class="text-white font-semibold ">Password Baru</label>
                        <input type="password" class="w-full bg-transparent border-2 mt-[2px]  rounded-lg focus:border-white  text-zinc-200 focus:ring-0 border-zinc-500">
                    </div>

                    <div class="mb-7 w-full sm:w-1/2 md:w-1/3">
                        <label for="" class="text-white font-semibold ">Email</label>
                        <input type="email" value="emailSekarang@gmail.com" class="w-full bg-transparent border-2 mt-[2px]  rounded-lg focus:border-white  text-zinc-200 focus:ring-0 border-zinc-500">
                    </div>

                    <div class="mb-7 w-full sm:w-1/2 md:w-1/3">
                        <label for="" class="text-white font-semibold ">Konfirmasi Password</label>
                        <input type="password" class="w-full bg-transparent border-2 mt-[2px]  rounded-lg focus:border-white  text-zinc-200 focus:ring-0 border-zinc-500">
                    </div>
                    <div class="mb-7 w-full sm:w-1/2 md:w-1/3">
                        <label for="" class="text-white font-semibold ">Password Sekarang</label>
                        <input type="password" value="Password Sekarang" class="w-full bg-transparent border-2 mt-[2px]  rounded-lg focus:border-white  text-zinc-200 focus:ring-0 border-zinc-500">
                    </div>
                    <div class="mb-7 w-full sm:w-1/2 md:w-1/3">
                        <label for="" class="text-white font-semibold ">Ganti Foto</label>
                        <input type="file" class="w-full file:bg-violet-500 bg-transparent border-2 mt-[2px]  rounded-lg focus:border-white  text-zinc-200 focus:ring-0 border-zinc-500">
                    </div>
                </div>
                <div class="w-full flex flex-wrap justify-center gap-6 mt-5">
                    <button class=" font-bold text-emerald-200 px-7 py-2 rounded-md bg-gray-700 bg-clip-padding backdrop-filter backdrop-blur-sm bg-opacity-20 border-2 hover:bg-opacity-75 transition border-gray-100">SIMPAN PERUBAHAN</button>
                    <a href="./index.php" class=" font-bold text-red-300 px-[75px] py-2 rounded-md bg-gray-700 bg-clip-padding backdrop-filter backdrop-blur-sm bg-opacity-20 border-2 hover:bg-opacity-75 transition border-gray-100">KEMBALI</a>
                </div>
            </form>
            <!-- FORM -->

        </div>
</body>

</html>