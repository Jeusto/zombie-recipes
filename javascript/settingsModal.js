// Gestion du modal parametres
let modal = document.getElementById("modal");
let openModalBtn = document.getElementById("openModalBtn");
let openModalBtnMobile = document.getElementById("openModalBtnMobile");
let closeModalBtn = document.getElementById("closeModalBtn");

openModalBtn.addEventListener("click", ouvreModal);
openModalBtnMobile.addEventListener("click", ouvreModal);
closeModalBtn.addEventListener("click", fermeModal);

window.onclick = function (event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
};

function ouvreModal() {
  modal.style.display = "block";
}
function fermeModal() {
  modal.style.display = "none";
}
