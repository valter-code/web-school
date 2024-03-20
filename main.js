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
// scroll y , c
{
  const scroll = () => {
    window.addEventListener("scroll", function () {
      window.scrollTo(0, 0);
    });
  };
}

const toTop = d