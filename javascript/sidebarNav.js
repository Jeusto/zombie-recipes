// Gestion du sidebar
let sidebarIsOpen = false;
let sidenav = document.getElementById("sidenav");
let sidenavContent = document.getElementById("sidenavContent");
let openSidenavBtn = document.getElementById("openSidenavBtn");
let closeSidenavBtn = document.getElementById("sidenavCloseBtn");

openSidenavBtn.addEventListener("click", sidebar);
closeSidenavBtn.addEventListener("click", sidebar);
sidenav.addEventListener("click", (e) => {
  if (e.target !== e.currentTarget) return;
  else sidebar();
});

function sidebar() {
  if (sidebarIsOpen) {
    sidenav.style.display = "none";
    sidebarIsOpen = false;
  } else {
    sidenav.style.display = "block";
    sidebarIsOpen = true;
  }
}
