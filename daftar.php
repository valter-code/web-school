<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="./src/output.css" rel="stylesheet">
</head>

<body>
    <div class="bg-[url('https://i.pinimg.com/originals/a5/dd/de/a5ddde2a6c8944df7cb4bc4f3da9679a.gif')] h-screen bg-cover">

        <div id="daftar" class="fixed flex justify-center items-center bg-black bg-opacity-75 z-50 top-0 w-screen h-screen">
            <form action="" class="bg-purple-400 rounded-md bg-clip-padding backdrop-filter backdrop-blur-sm bg-opacity-0 border border-gray-100  p-12 h-[510px] flex flex-col items-center justify-center">
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

                <h1 class="text-white">Sudah Punya Akun? <a href="./login.php" class="underline font-semibold">Login</a></h1>

                <div class="w-64 absolute -z-50 brightness-50 opacity-15 top-50">
                    <img src="./assets/logo.png" alt="">
                </div>

                <a href="./index.php" class="h-12 w-12 rounded-full -left-20 z-50 absolute flex justify-center items-center bg-white dark:bg-white ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="black" class="bi bi-arrow-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8" />
                    </svg>
                </a>
            </form>
        </div>




    </div>


</body>

</html>