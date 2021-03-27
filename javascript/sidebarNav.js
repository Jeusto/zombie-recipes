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
