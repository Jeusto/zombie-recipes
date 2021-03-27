// Gestion du modal parametres
var modalSettings = document.getElementById("settingsModal");
var buttonModal = document.getElementById("settingsModal__button");
var buttonModalMobile = document.getElementById("topnavCogs");
var span = document.getElementById("settingsModalClose");

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
