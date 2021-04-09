// Si le cookie des bookmarks existe pas, on le cree
if ((allCookies = document.cookie).includes("bookmarks") == false) {
  setCookie("bookmarks", "", 10000);
}

// On verifie quel bouton de bookmark est clique
const wrapper = document.getElementById("recipeList");
wrapper.addEventListener("click", (event) => {
  const isBookmarkButton = event.target.classList.contains("recipe__bookmark-btn");
  // On verifie qu'on a clique sur un bouton bookmark
  if (!isBookmarkButton) {
    return;
  }
  // Si on a clique sur un bouton bookmark, on continue
  else {
    // On remplace l'icon du bouton bookmark
    let target = document.getElementById(event.target.id);
    if (target.classList.contains("far")) {
      target.classList.remove("far");
      target.classList.add("fas");
      target.classList.add("animation-spin");
    } else {
      target.classList.remove("fas");
      target.classList.add("far");
      target.classList.remove("animation-spin");
    }
    // On recupere les bookmarks dans le cookie sous forme de tableau
    let arrayBookmarks = getCookie("bookmarks").split(",");
    // Si le bookmark est dans le cookie, on le supprime
    let indexBookmark = arrayBookmarks.indexOf(event.target.id);
    if (indexBookmark > -1) {
      arrayBookmarks.splice(indexBookmark, 1);
      // Si la page actuelle est les sauvegardes, on rafraichit la page apres avoir supprime
      if (window.location.pathname == "/bookmark.php") {
        location.reload();
      }
    }
    // Si le bookmark n'est pas dans le cookie, on l'ajoute
    else {
      arrayBookmarks.push(event.target.id);
    }
    // On retransforme en string
    let stringBookmarks = arrayBookmarks.join();
    // On met le string dans le cookie
    setCookie("bookmarks", stringBookmarks, 10000);
  }
});

// Fonction pour mettre le cookie
function setCookie(name, cvalue, expiration) {
  let d = new Date();
  d.setTime(d.getTime() + expiration * 24 * 60 * 60 * 1000);
  let expires = "expires=" + d.toUTCString();
  document.cookie = name + "=" + cvalue + ";" + expires + ";path=/";
}

// Fonction pour lire un cookie
function getCookie(cname) {
  let name = cname + "=";
  let decodedCookie = decodeURIComponent(document.cookie);
  let ca = decodedCookie.split(";");
  for (var i = 0; i < ca.length; i++) {
    let c = ca[i];
    while (c.charAt(0) == " ") {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}
