// tombol pop up
const popUp = () => {
  const formLogin = document.getElementById("login");
  formLogin.classList.remove("hidden");
  scroll();
};

// tombol daftar
const popDaftar = () => {
  const formDaftar = document.getElementById("daftar");
  const formLogin = document.getElementById("login");

  formDaftar.classList.remove("hidden");
  formLogin.classList.add("hidden");
};

// tombol login
const popLogin = () => {
  const formDaftar = document.getElementById("daftar");
  const formLogin = document.getElementById("login");
  formDaftar.classList.toggle("hidden");
  formLogin.classList.toggle("hidden");
};

//scroll
const scroll = () => {
  window.addEventListener("scroll", function () {
    window.scrollTo(0, 0);
  });
};

// toTop BUTTON & navbar & hide darkmode

window.onscroll = () => {
  const yOffset = window.pageYOffset;
  const x = Math.round(yOffset);
  const toTop = document.getElementById("toTop");
  const darkMode = document.getElementById("darkMode");
  const navbar = document.getElementsByTagName("nav")[0];
  const jurusan = document.getElementsByClassName("jurusan")[0];
  const berita = document.getElementsByClassName("berita")[0];
  const kontak = document.getElementsByClassName("kontak")[0];
  const home = document.getElementsByClassName("Home")[0];

  if (x > 0) {
    darkMode.classList.remove("translate-x-[5rem]");
    darkMode.classList.remove("opacity-5");
    darkMode.classList.add("flex");

    toTop.classList.remove("translate-x-[5rem]");
    toTop.classList.remove("opacity-5");
    navbar.classList.add("bening");
  } else {
    toTop.classList.add("translate-x-[5rem]");
    toTop.classList.add("opacity-5");
    darkMode.classList.add("translate-x-[5rem]");
    darkMode.classList.add("opacity-5");
    darkMode.classList.remove("flex");
    navbar.classList.remove("bening");
  }

  if (x >= 0 && x < 635) {
    home.classList.add("aktif");
  } else {
    home.classList.remove("aktif");
  }

  if (x > 635 && x < 1058) {
    jurusan.classList.add("aktif");
  } else {
    jurusan.classList.remove("aktif");
  }

  if (x > 1063 && x < 2015) {
    berita.classList.add("aktif");
  } else {
    berita.classList.remove("aktif");
  }

  if (x > 2015 && x < 2643) {
    kontak.classList.add("aktif");
  } else {
    kontak.classList.remove("aktif");
  }

  console.log("Posisi vertikal saat ini:", x);
};

// data element
const darkMode = document.getElementById("darkMode");
const lightMode = [document.getElementById("1"), document.getElementById("2"), document.getElementById("3")];
const lightModeP = [document.getElementById("p1"), document.getElementById("p2"), document.getElementById("p3")];
const lightModeLabel = [document.getElementById("label1"), document.getElementById("label2"), document.getElementById("label3"), document.getElementById("label4")];
const kartu = document.getElementsByClassName("kartu");
const textBerita = document.getElementsByClassName("text-berita");
const pembatas = document.getElementsByClassName("pembatas");

// darkmode
darkMode.addEventListener("click", (event) => {
  event.preventDefault();

  const moon = document.getElementById("moon");
  const sun = document.getElementById("sun");

  moon.classList.toggle("hidden");
  sun.classList.toggle("hidden");
  document.body.classList.toggle("bg-white");
  document.body.classList.toggle("bg-neutral-900");

  for (let i = 0; i < textBerita.length; i++) {
    textBerita[i].classList.toggle("text-zinc-800");
    textBerita[i].classList.toggle("text-zinc-200");
  }

  for (let i = 0; i < pembatas.length; i++) {
    pembatas[i].classList.toggle("border-t-slate-600");
    pembatas[i].classList.toggle("border-t-violet-400");
  }

  for (let i = 0; i < kartu.length; i++) {
    kartu[i].classList.toggle("bg-zinc-900");
  }

  for (let i = 0; i < lightModeLabel.length; i++) {
    lightModeLabel[i].classList.toggle("text-slate-900");
    lightModeLabel[i].classList.toggle("text-white");
  }

  for (let i = 0; i < lightMode.length; i++) {
    lightMode[i].classList.toggle("text-white");
  }

  for (let i = 0; i < lightModeP.length; i++) {
    lightModeP[i].classList.toggle("text-slate-700");
    lightModeP[i].classList.toggle("text-slate-400");
  }
});

// Toggle navbar
const buka = document.getElementById("open");
const tutup = document.getElementById("close");
const navMenu = document.getElementById("nav-menu");

buka.addEventListener("click", () => {
  navMenu.classList.remove("hidden");
  buka.classList.add("hidden");
  tutup.classList.remove("hidden");
});

tutup.addEventListener("click", () => {
  navMenu.classList.add("hidden");
  tutup.classList.add("hidden");
  buka.classList.remove("hidden");
});

// const akun = document.getElementById("akun");
// const logout = document.getElementById("logout");

// akun.addEventListener("click", () => {
//   const logout = document.getElementById("logout");
//   logout.classList.toggle("hidden");
// });

// window.addEventListener("click", function (e) {
//   if (e.target.id !== akun && e.target.id !== logout ) {

//     logout.classList.add("hidden");
//   }
// });

// Pop Up akun

const akun = document.getElementById("akun");
const logout = document.getElementById("logout");

akun.addEventListener("click", (event) => {
  logout.classList.toggle("hidden");
  event.stopPropagation(); // Menghentikan penyebaran event ke atas
});

window.addEventListener("click", function (event) {
  if (event.target.id !== akun.id && event.target.id !== logout.id) {
    logout.classList.add("hidden");
  }
});


// fungsi auto scoll ke section berita jika enter pada input cari berita
const inputBerita = document.getElementById("input-berita");
const formBerita = document.getElementById("cari-berita");

formBerita.addEventListener("submit", function (event) {
  // Mengambil nilai dari input field
  let inputText = inputBerita.value.trim();

  // Menetapkan hash fragment di URL tanpa memuat ulang halamant h
  window.location.hash = inputText === "#berita" ? inputText : "berita";
});
