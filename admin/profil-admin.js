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

function showImage(event) {
  // Mengambil elemen input
  var fileInput = event.target;

  // Mengambil file yang dipilih
  var file = fileInput.files[0];

  // Mengecek apakah file ada
  if (file) {
    // Membuat objek FileReader
    var reader = new FileReader();

    // Ketika file selesai dibaca
    reader.onload = function (e) {
      // Mendapatkan URL gambar yang akan ditampilkan
      var imageUrl = e.target.result;

      // Menampilkan gambar pada elemen <img>
      var imagePreview = document.getElementById("preview");
      imagePreview.src = imageUrl;
      imagePreview.style.display = "block";
    };

    // Membaca file sebagai URL data
    reader.readAsDataURL(file);
  } else {
    // Menampilkan pesan jika tidak ada file yang dipilih
    alert("No file selected");
  }
}


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
