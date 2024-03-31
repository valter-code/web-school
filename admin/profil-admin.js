/////////////////// POP UP PROFIL ADMIN

const profilAdmin = document.getElementById("profil-admin");
const profilPopUp = document.getElementById("akun-admin");

profilAdmin.addEventListener("click", (event) => {
  event.stopPropagation();
  profilPopUp.classList.toggle("-translate-x-48");
});

window.addEventListener("click", function (event) {
  if (event.target !== profilAdmin && event.target !== profilPopUp) {
    profilPopUp.classList.add("-translate-x-48");
  }
});
