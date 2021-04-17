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

// Fonction pour afficher ou cacher le sidebar
function sidebar() {
  if (sidebarIsOpen) {
    sidenav.style.display = "none";
    sidebarIsOpen = false;
  } else {
    sidenav.style.display = "block";
    sidebarIsOpen = true;

    // On limite le tab index au sidebar
    let focusableElements = "#sidenavCloseBtn, .sidenav__link";
    let sidenav2 = document.querySelector("#sidenavContent");
    let firstFocusableElement = sidenav2.querySelectorAll(focusableElements)[0];
    let focusableContent = sidenav2.querySelectorAll(focusableElements);
    let lastFocusableElement = focusableContent[focusableContent.length - 1];

    document.addEventListener("keydown", function (e) {
      let isTabPressed = e.key === "Tab" || e.keyCode === 9;
      if (!isTabPressed) {
        return;
      }
      if (e.shiftKey) {
        if (document.activeElement === firstFocusableElement) {
          lastFocusableElement.focus();
          e.preventDefault();
        }
      } else {
        if (document.activeElement === lastFocusableElement) {
          firstFocusableElement.focus();
          e.preventDefault();
        }
      }
    });
    firstFocusableElement.focus();
  }
}
