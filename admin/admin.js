/////////////////// Edit siswa /////////////////
const edit = document.getElementsByClassName("edit");
const formEdit = document.getElementById("editsiswa");
const closeBtn = document.getElementById("close-btn");
const editWrapper = document.getElementById("edit-wrapper");

for (let i = 0; i < edit.length; i++) {
  edit[i].addEventListener("click", () => {
    formEdit.classList.toggle("scale-0");
    editWrapper.classList.toggle("scale-0");
  });
}

closeBtn.addEventListener("click", () => {
  formEdit.classList.toggle("scale-0");
  editWrapper.classList.toggle("scale-0");
});

editWrapper.addEventListener("click", (event) => {
  if (!event.target.closest("#" + formEdit.id) && !event.target.closest("#" + closeBtn.id)) {
    editWrapper.classList.add("scale-0");
    formEdit.classList.add("scale-0");
  }
});

////////////////// Tambah siswa ////////////////////
const tambahBtn = document.getElementById("tambah-btn");
const tambahWrapper = document.getElementById("tambah-wrapper");
const tambahForm = document.getElementById("tambah-form");
const closeBtnTambah = document.getElementById("close-btn-tambah");

tambahBtn.addEventListener("click", () => {
  tambahWrapper.classList.toggle("scale-0");
  tambahForm.classList.toggle("scale-0");
});

closeBtnTambah.addEventListener("click", () => {
  tambahWrapper.classList.toggle("scale-0");
  tambahForm.classList.toggle("scale-0");
});

tambahWrapper.addEventListener("click", (event) => {
  if (!event.target.closest("#" + tambahForm.id) && !event.target.closest("#" + closeBtnTambah.id)) {
    tambahWrapper.classList.add("scale-0");
    tambahForm.classList.add("scale-0");
  }
});

////////////////// Preview Profil Siswa ////////////////////
const inputTambahSiswa = document.querySelectorAll(".input-preview-siswa");
const previewImgTambahSiswa = document.querySelectorAll(".img-preview-siswa");

console.log(previewImgTambahSiswa[0])

const previewImg = (input, img) => {
  input.addEventListener("change", () => {
    if (input.files && input.files[0]) {
      const reader = new FileReader();

      reader.onload = (e) => {
        img.src = e.target.result;
      };

      reader.readAsDataURL(input.files[0]);
    }
  });
};

previewImg(inputTambahSiswa[0], previewImgTambahSiswa[0])
previewImg(inputTambahSiswa[1], previewImgTambahSiswa[1])
