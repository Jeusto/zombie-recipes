// Gestion du sidebar
let sidebarOuvert = false;
let backgroundSidenav = document.getElementById("sidenav");
let menuTopnav = document.getElementById("topnavHamburger");
let sidenavClose = document.getElementById("sidenavClose");
let sidenavContent = document.getElementById("sidenavContent");

menuTopnav.addEventListener("click", sidebar);
sidenavClose.addEventListener("click", sidebar);
backgroundSidenav.addEventListener("click", (e) => {
  if (e.target !== e.currentTarget) return;
  else sidebar();
});

function sidebar() {
  if (sidebarOuvert) {
    document.getElementById("sidenav").style.display = "none";
    sidebarOuvert = false;
  } else {
    document.getElementById("sidenav").style.display = "block";
    sidebarOuvert = true;
  }
}
