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
    fermeModal();
  }
};

// Fonction pour afficher le modal
function ouvreModal() {
  // On affiche le modal
  modal.style.display = "block";

  // On limite le tab index au modal
  let focusableElements =
    "#closeModalBtn, #darkmodeCheckbox, #frLanguage, #enLanguage, #esLanguage";
  let modal2 = document.querySelector("#modal");
  let firstFocusableElement = modal2.querySelectorAll(focusableElements)[0];
  let focusableContent = modal2.querySelectorAll(focusableElements);
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

// Fonction pour cacher le modal
function fermeModal() {
  modal.style.display = "none";
}
