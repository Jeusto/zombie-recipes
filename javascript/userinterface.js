// Gestion du sidebar
var sidebarOuvert = false;
var backgroundSidenav = document.getElementById("sidenav");
var menuTopnav = document.getElementById("topnavHamburger");
var sidenavClose = document.getElementById("sidenavClose");

backgroundSidenav.addEventListener("click", sidebar);
menuTopnav.addEventListener("click", sidebar);
sidenavClose.addEventListener("click", sidebar);

function sidebar() {
  if (sidebarOuvert) {
    document.getElementById("sidenav").style.display = "none";
    sidebarOuvert = false;
  } else {
    document.getElementById("sidenav").style.display = "block";
    sidebarOuvert = true;
  }
}

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
  document.getElementById("settingsModal").style.display = "block";
}
function fermeModal() {
  document.getElementById("settingsModal").style.display = "none";
}
