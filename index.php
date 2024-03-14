<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="./src/output.css" rel="stylesheet">
</head>
<body class="bg-white  ">

<!-- NAV START -->
<header class="flex flex-wrap sm:justify-start sm:flex-nowrap w-full bg-white text-sm py-4 dark:bg-blue-800">
  <nav class="max-w-[85rem] w-full mx-auto px-4 flex flex-wrap basis-full items-center justify-between" aria-label="Global">
    <div class="flex items-center gap-2">
        <div class="w-10">
            <img src="./src/assets/tm.png" alt="" class="">
        </div>
        <a class="sm:order-1 flex-none text-xl font-semibold dark:text-white" href="#">SMK Trimulia JKT</a>
        
    </div>
    <div class="sm:order-3 flex items-center gap-x-2">
      <button type="button" class="sm:hidden hs-collapse-toggle p-2.5 inline-flex justify-center items-center gap-x-2 rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-transparent dark:border-gray-700 dark:text-white dark:hover:bg-white/10 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" data-hs-collapse="#navbar-alignment" aria-controls="navbar-alignment" aria-label="Toggle navigation">
        <svg class="hs-collapse-open:hidden flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" x2="21" y1="6" y2="6"/><line x1="3" x2="21" y1="12" y2="12"/><line x1="3" x2="21" y1="18" y2="18"/></svg>
        <svg class="hs-collapse-open:block hidden flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
      </button>
      <button onclick="tombol()" type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg  border-white bg-white text-gray-800 shadow-sm hover:bg-blue-300 disabled:opacity-50 disabled:pointer-events-none dark:bg-blue-400  dark:text-white dark:hover:bg-blue-500 hover:shadow-md transition duration-500 hover:scale-105 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
        LOGIN
      </button>
    </div>
    <div id="navbar-alignment" class="mr-36 hs-collapse hidden overflow-hidden transition-all duration-300 basis-full grow sm:grow-0 sm:basis-auto sm:block sm:order-2 ">
      <div class="flex flex-col gap-5 mt-5 sm:flex-row sm:items-center sm:mt-0 sm:ps-5">
        <a class="font-medium text-blue-500 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" href="#" aria-current="page">Home</a>
        <a class="font-medium text-gray-600 hover:text-gray-400 dark:text-white dark:hover:text-gray-500 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" href="#">Home</a>
        <a class="font-medium text-gray-600 hover:text-gray-400 dark:text-white dark:hover:text-gray-500 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" href="#">Work</a>
        <a class="font-medium text-gray-600 hover:text-gray-400 dark:text-white dark:hover:text-gray-500 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600" href="#">Blog</a>
      </div>
    </div>
  </nav>
</header>
<!-- NAV END -->

<!-- HERO START -->
<!-- Slider -->
<div data-hs-carousel='{
    "loadingClasses": "opacity-0",
    "isAutoPlay": true
  }' class="relative">
  <div class="hs-carousel relative overflow-hidden w-full min-h-[500px] bg-white ">
    <div class="hs-carousel-body absolute top-0 bottom-0 start-0 flex flex-nowrap transition-transform duration-700 opacity-0">
      <div class="hs-carousel-slide">
        <div class="flex justify-center h-full bg-gray-100 ">
            <img src="./src/assets/3tm.png" alt="" class="w-full">
        </div>
      </div>
      <div class="hs-carousel-slide">
        <div class="flex justify-center h-full bg-violet-200 ">
          <img src="./src/assets/1tm.jpg" alt="" class="w-full">
        </div>
      </div>
      <div class="hs-carousel-slide">
        <div class="flex justify-center h-full bg-gray-300 ">
            <img src="./src/assets/2tm.jpg" alt="" class="w-full">
        </div>
      </div>
    </div>
  </div>

  <button type="button" class="hs-carousel-prev hs-carousel:disabled:opacity-50 disabled:pointer-events-none absolute inset-y-0 start-0 inline-flex justify-center items-center w-[46px] h-full text-gray-800 hover:bg-gray-800/[.1]">
    <span class="text-2xl" aria-hidden="true">
      <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
      </svg>
    </span>
    <span class="sr-only">Previous</span>
  </button>
  <button type="button" class="hs-carousel-next hs-carousel:disabled:opacity-50 disabled:pointer-events-none absolute inset-y-0 end-0 inline-flex justify-center items-center w-[46px] h-full text-gray-800 hover:bg-gray-800/[.1]">
    <span class="sr-only">Next</span>
    <span class="text-2xl" aria-hidden="true">
      <svg class="size-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
      </svg>
    </span>
  </button>

  <div class="hs-carousel-pagination flex justify-center absolute bottom-3 start-0 end-0 space-x-2">
    <span class="hs-carousel-active:bg-blue-700 hs-carousel-active:border-blue-700 size-3 border border-gray-400 rounded-full cursor-pointer"></span>
    <span class="hs-carousel-active:bg-blue-700 hs-carousel-active:border-blue-700 size-3 border border-gray-400 rounded-full cursor-pointer"></span>
    <span class="hs-carousel-active:bg-blue-700 hs-carousel-active:border-blue-700 size-3 border border-gray-400 rounded-full cursor-pointer"></span>
  </div>
</div>
<!-- End Slider -->
<!-- HERO END -->


<!-- EVENT START -->
<div class="my-24">
    <h1 class="text-center font-sans font-extrabold text-4xl text-black">EVENT SEKOLAH</h1>
</div>

<div class="flex flex-wrap gap-3 justify-start mx-5 mb-36">
    <div class="card w-96 bg-gray-200 bg-opacity-45 ">
        <figure>
            <img src="https://daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.jpg" alt="car!"/>
        </figure>
        
        <div class="card-body">
            <h2 class="card-title text-slate-900">Life hack</h2>
            <p class="text-slate-800">How to park your car at your garage?</p>
            
            <div class="card-actions mt-6">
                <button class="btn btn-primary">TOMBOL  </button>
            </div>
        </div>
    </div>
    <div class="card w-96 bg-gray-200 bg-opacity-45 ">
        <figure>
            <img src="https://daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.jpg" alt="car!"/>
        </figure>
        
        <div class="card-body">
            <h2 class="card-title text-slate-900">Life hack</h2>
            <p class="text-slate-800">How to park your car at your garage?</p>
            
            <div class="card-actions mt-6">
                <button class="btn btn-primary">TOMBOL  </button>
            </div>
        </div>
    </div>
    <div class="card w-96 bg-gray-200 bg-opacity-45 ">
        <figure>
            <img src="https://daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.jpg" alt="car!"/>
        </figure>
        
        <div class="card-body">
            <h2 class="card-title text-slate-900">Life hack</h2>
            <p class="text-slate-800">How to park your car at your garage?</p>
            
            <div class="card-actions mt-6">
                <button class="btn btn-primary">TOMBOL  </button>
            </div>
        </div>
    </div>
    <div class="card w-96 bg-gray-200 bg-opacity-45 ">
        <figure>
            <img src="https://daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.jpg" alt="car!"/>
        </figure>
        
        <div class="card-body">
            <h2 class="card-title text-slate-900">Life hack</h2>
            <p class="text-slate-800">How to park your car at your garage?</p>
            
            <div class="card-actions mt-6">
                <button class="btn btn-primary">TOMBOL  </button>
            </div>
        </div>
    </div>
    <div class="card w-96 bg-gray-200 bg-opacity-45 ">
        <figure>
            <img src="https://daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.jpg" alt="car!"/>
        </figure>
        
        <div class="card-body">
            <h2 class="card-title text-slate-900">Life hack</h2>
            <p class="text-slate-800">How to park your car at your garage?</p>
            
            <div class="card-actions mt-6">
                <button class="btn btn-primary">TOMBOL  </button>
            </div>
        </div>
    </div>
</div>
<!-- EVENT END -->


<div class="fixed w-full top-0 bg-red-950">


  <form id="maba" class=" fixed flex  justify-center top-10 w-full bg-slate-40 ">
    <div class="p-10 w-1/2 bg-zinc-600  rounded-md ">
      <div class="text-white text-center mb-10 font-bold">
        <h1>DAFTAR🚀</h1>
      </div>
  
  
  
      <div class="mb-5">
        <label for="user" class="text-white">Nama Siswa</label>
        <input type="text" class="w-full bg-sky-950 rounded-md p-2 focus:outline-none focus:scale-105 shadow-md transition duration-500 hover:scale-105">
      </div>
      
      <div class="mb-5">
        <label for="user" class="text-white">Jurusan</label>
        
        <select class="w-full bg-sky-950 p-2 rounded-md focus:outline-none focus:scale-105 hover:scale-105 transition duration-500">
          <option>TKJ</option>
          <option>MP</option>
          <option>BD</option>
        </select>
      </div>
      
      <div class="mb-5">
        <label for="user" class="text-white">Password</label>
        <input type="password" class="w-full bg-sky-950 rounded-md p-2 focus:outline-none focus:scale-105 shadow-md transition duration-500 hover:scale-105 mb-1">
        <h1 class="text-white font-medium text-sm">*Minimal 7 Huruf</h1>
      </div>
      
      <div class=>
        <label for="user" class="text-white">Konfirmasi Password</label>
        <input type="password" class="w-full bg-sky-950 rounded-md p-2 focus:outline-none focus:scale-105 shadow-md transition duration-500 hover:scale-105 mb-1">
        
      </div>
  

      <div>
        <button class="bg-red-600">DAFTAR</button>
      </div>
      <div class="text-center mt-20">
        <h1 class="text-white">Sudah punya akun? <a href="" class="underline">Login</a></h1>
      </div>

      <
    </div>
  </form>

</div>





<!-- FOOTER START -->

<footer class="bg-white  shadow dark:bg-blue-950 ">
    <div class="w-full max-w-screen-xl mx-auto p-4 md:py-8">
        <div class="sm:flex sm:items-center sm:justify-between">
            <a href="https://flowbite.com/" class="flex items-center mb-4 sm:mb-0 space-x-3 rtl:space-x-reverse">
                <img src="./src/assets/tm.png" class="h-8" alt="Flowbite Logo" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">SMK Trimulia Jakarta</span>
            </a>
            <ul class="flex flex-wrap items-center mb-6 text-sm font-medium text-gray-500 sm:mb-0 dark:text-gray-400">
                <li>
                    <a href="#" class="hover:underline me-4 md:me-6">About</a>
                </li>
                <li>
                    <a href="#" class="hover:underline me-4 md:me-6">Privacy Policy</a>
                </li>
                <li>
                    <a href="#" class="hover:underline me-4 md:me-6">Licensing</a>
                </li>
                <li>
                    <a href="#" class="hover:underline">Contact</a>
                </li>
            </ul>
        </div>
        <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
        <span class="block text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2024 Powered by <a href="" class="underline"><span class="font-bold text-white">Kevin</span><span class="font-bold text-yellow-400">Dev</span></a>  | All Rights Reserved.</span>
    </div>
</footer>

<!-- FOOTER END -->



<script src="./node_modules/preline/dist/preline.js"></script>
<script src="./main.js"></script>
</body>
</html>