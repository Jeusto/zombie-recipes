// Gestion du modal parametres
let modalSettings = document.getElementById("settingsModal");
let buttonModal = document.getElementById("settingsModal__button");
let buttonModalMobile = document.getElementById("topnavCogs");
let span = document.getElementById("settingsModalClose");

buttonModal.addEventListener("click", ouvreModal);
buttonModalMobile.addEventListener("click", ouvreModal);
span.addEventListener("click", fermeModal);

window.onclick = function (event) {
  if (event.target == settingsModal) {
    modalSettings.style.display = "none";
  }
};

function ouvreModal() {
  modalSettings.style.display = "block";
}
function fermeModal() {
  modalSettings.style.display = "none";
}
