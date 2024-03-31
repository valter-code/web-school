const beritaWrapper = document.getElementById("berita-wrapper");
const beritaForm = document.getElementById("berita-form");
const closeBtn = document.getElementById("close-btn");
const tombolEdit = document.getElementsByClassName("edit");

for (let i = 0; i < tombolEdit.length; i++) {
  tombolEdit[i].addEventListener("click", () => {
    beritaForm.classList.toggle("scale-0");
    beritaWrapper.classList.toggle("scale-0");
  });
}

closeBtn.addEventListener("click", () => {
  beritaForm.classList.toggle("scale-0");
  beritaWrapper.classList.toggle("scale-0");
});

beritaWrapper.addEventListener("click", (event) => {
  if (!event.target.closest("#" + beritaForm.id) && !event.target.closest("#" + closeBtn.id)) {
    beritaForm.classList.add("scale-0");
    beritaWrapper.classList.add("scale-0");
  }
});
