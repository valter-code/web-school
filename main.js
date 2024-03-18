// tombol pop up
const popUp = () => {
  const formLogin = document.getElementById("login");
  const formDaftar = document.getElementById("daftar");
  const parent = document.getElementById("parent");
  formLogin.classList.toggle("hidden");
  formDaftar.classList.add("hidden");
};

// tombol daftar
const popDaftar = () => {
  const formDaftar = document.getElementById("daftar");
  formDaftar.classList.remove("hidden");
};

// tombol login
const popLogin = () => {
  const formDaftar = document.getElementById("daftar");
  formDaftar.classList.add("hidden");
};

//scroll
const scroll = () => {
  window.addEventListener("scroll", function () {
    window.scrollTo(0, 0);
  });
};
