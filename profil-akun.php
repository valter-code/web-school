<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="./src/output.css" rel="stylesheet">
</head>

<body class="">
    <div class="h-screen py-20 px-10 flex justify-center bg-[url('https://i.pinimg.com/originals/a5/dd/de/a5ddde2a6c8944df7cb4bc4f3da9679a.gif')] ">
        <div class="overflow-y-scroll lg:overflow-hidden  bg-gray-900 rounded-md bg-clip-padding backdrop-filter backdrop-blur-sm bg-opacity-40 border border-gray-100 p-10 ">

            <div class="mb-10 flex flex-col items-center">
                <div class="mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="white" class="bi bi-person-circle   " viewBox="0 0 16 16">
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                    </svg>
                </div>

                <div>
                    <h1 class="text-white text-lg">Kevin Ekarevano</h1>
                    <p class="text-center text-sm font-semibold text-white">Siswa</p>
                </div>
            </div>
            <div class="flex gap-5 flex-wrap lg:flex-nowrap justify-center ">
                <div class="w-full lg:w-1/3  mb-5 bg-white py-3 px-6 shadow-xl rounded-md hover:scale-105 cursor-pointer transition duration-500">
                    <h1 class="text-neutral-900 border-b-2 pb-2 border-zinc-700 font-semibold mb-4">Nama Lengkap</h1>
                    <p class="bg-neutral-900 shadow-md shadow-neutral-900 border-white font-semibold text-white py-1 px-7 rounded-md ">Kevin Ekarevano</p>

                </div>
                <div class="w-full lg:w-1/3    mb-5 bg-white py-3 px-6 shadow-xl rounded-md hover:scale-105 cursor-pointer transition duration-500">
                    <h1 class="text-neutral-900 border-b-2 pb-2 border-zinc-700 font-semibold mb-4">Jurusan</h1>
                    <p class="bg-neutral-900 shadow-md shadow-neutral-900 border-white font-semibold text-white py-1 px-7 rounded-md ">TKJ</p>

                </div>
                <div class="w-full lg:w-1/3  mb-5 bg-white py-3 px-6 shadow-xl rounded-md hover:scale-105 cursor-pointer transition duration-500">
                    <h1 class="text-neutral-900 border-b-2 pb-2 border-zinc-700 font-semibold mb-4">NISN</h1>
                    <p class="bg-neutral-900 shadow-md shadow-neutral-900 border-white font-semibold text-white py-1 px-7 rounded-md ">123456789</p>
                </div>

            </div>

            <button class="mt-5 text-white font-bold bg-red-500 py-2 px-7 rounded-lg w-full shadolg hover:scale-95 transition duration-300 hover:bg-red-600">LOGOUT</button>

        </div>
        <a href="./akun.php" class="h-12 w-12 rounded-full bottom-3 z-50 absolute flex justify-center items-center bg-white dark:bg-white ">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="black" class="bi bi-arrow-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8" />
            </svg>
        </a>
    </div>
</body>

</html>