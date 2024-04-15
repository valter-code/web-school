// to-Top BUTTON & navbar & hide darkmode
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

  if (x >= 0 && x < 507) {
    home.classList.add("aktif");
  } else {
    home.classList.remove("aktif");
  }

  if (x > 507 && x <= 1015) {
    jurusan.classList.add("aktif");
  } else {
    jurusan.classList.remove("aktif");
  }

  if (x > 1015 && x < 3469) {
    berita.classList.add("aktif");
  } else {
    berita.classList.remove("aktif");
  }

  if (x > 3469) {
    kontak.classList.add("aktif");
  } else {
    kontak.classList.remove("aktif");
  }

  // console.log("Posisi vertikal saat ini:", x);
};

// data element

const darkMode = document.getElementById("darkMode");

function toggleDarkMode(e) {
  e.preventDefault();
  const elementsToToggle = [
    { selector: "#moon, #sun", classes: "hidden" },
    { selector: "body", classes: ["bg-white", "bg-neutral-900"] },
    { selector: ".motto-text", classes: ["gradient-text", "text-zinc-900"] },
    { selector: ".motto-title", classes: ["text-white", "text-zinc-800"] },
    { selector: ".motto-sekolah", classes: ["gradient-motto", "text-zinc-800"] },
    { selector: ".judul", classes: ["text-zinc-300", "text-slate-900"] },
    { selector: ".sub-judul", classes: ["text-zinc-400", "text-slate-700"] },
    { selector: "label + [placeholder]", classes: "placeholder:text-violet-300" },
    { selector: ".kartu", classes: ["border-dark", "border-light"] },
    { selector: ".judul-berita", classes: ["text-zinc-800", "text-zinc-200"] },
    { selector: ".baca-selengkapnya", classes: ["text-zinc-800", "text-zinc-200"] },
    { selector: ".isi-berita", classes: ["text-zinc-700", "text-zinc-400"] },
    { selector: ".ekskul", classes: "ekskul-dark" },
    { selector: ".pembatas", classes: ["border-t-zinc-700", "border-t-slate-600"] },
  ];

  elementsToToggle.forEach(({ selector, classes }) => {
    const elements = document.querySelectorAll(selector);
    elements.forEach((element) => {
      if (Array.isArray(classes)) {
        classes.forEach((className) => element.classList.toggle(className));
      } else {
        element.classList.toggle(classes);
      }
    });
  });
}

darkMode.addEventListener("click", toggleDarkMode);

// darkmode
// darkMode.addEventListener("click", (event) => {
//   event.preventDefault();

//   const moon = document.getElementById("moon");
//   const sun = document.getElementById("sun");

//   moon.classList.toggle("hidden");
//   sun.classList.toggle("hidden");
//   document.body.classList.toggle("bg-white");
//   document.body.classList.toggle("bg-neutral-900");

//   for (let i = 0; i < textBerita.length; i++) {
//     textBerita[i].classList.toggle("text-zinc-800");
//     textBerita[i].classList.toggle("text-zinc-200");
//   }

//   for (let i = 0; i < pembatas.length; i++) {
//     pembatas[i].classList.toggle("border-t-slate-600");
//     pembatas[i].classList.toggle("border-t-violet-400");
//   }

//   for (let i = 0; i < kartu.length; i++) {
//     kartu[i].classList.toggle("bg-zinc-900");
//   }

//   for (let i = 0; i < lightModeLabel.length; i++) {
//     lightModeLabel[i].classList.toggle("text-slate-900");
//     lightModeLabel[i].classList.toggle("text-white");
//   }

//   for (let i = 0; i < lightMode.length; i++) {
//     lightMode[i].classList.toggle("text-white");
//   }

//   for (let i = 0; i < lightModeP.length; i++) {
//     lightModeP[i].classList.toggle("text-slate-700");
//     lightModeP[i].classList.toggle("text-slate-400");
//   }
// });

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

// document.addEventListener("DOMContentLoaded", function() {
//   let lazyBackgrounds = [].slice.call(document.querySelectorAll(".lazy-background"));

//   if ("IntersectionObserver" in window) {
//     let lazyBackgroundObserver = new IntersectionObserver(function(entries, observer) {
//       entries.forEach(function(entry) {
//         if (entry.isIntersecting) {
//           let lazyBackground = entry.target;
//           lazyBackground.style.backgroundImage = "url(" + lazyBackground.dataset.src + ")";
//           lazyBackgroundObserver.unobserve(lazyBackground);
//         }
//       });
//     });

//     lazyBackgrounds.forEach(function(lazyBackground) {
//       lazyBackgroundObserver.observe(lazyBackground);
//     });
//   } else {
//     // Fallback untuk browser yang tidak mendukung Intersection Observer
//     lazyBackgrounds.forEach(function(lazyBackground) {
//       lazyBackground.style.backgroundImage = "url(" + lazyBackground.dataset.src + ")";
//     });
//   }
// });
