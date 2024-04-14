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


///////////////////LIVE JAM///////////////////////
const clock = document.getElementById("clock");
const date = document.getElementById("date");

const realTime = () => {
  const data = new Date();
  let hours = data.getHours();
  let minutes = data.getMinutes();
  let seconds = data.getSeconds();

  const day = data.getDate();
  const month = data.getMonth();
  const year = data.getFullYear();

  hours = hours < 10 ? `0${hours}` : hours;
  minutes = minutes < 10 ? `0${minutes}` : minutes;
  seconds = seconds < 10 ? `0${seconds}` : seconds;

  const monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

  clock.textContent = `${hours}:${minutes}:${seconds}`;
  date.textContent = `${day} ${monthNames[month]} ${year}`;
};

setInterval(realTime, 1000);
