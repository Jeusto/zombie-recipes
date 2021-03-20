// Si le cookie existe pas, on le cree
if ((allCookies = document.cookie).includes("language") == false) {
  setCookie("language", "fr", 10000);
}

// On change le cookie et on rafraichit la page quand on clique sur les drapeaux
var frLanguage = document.getElementById("frLanguage");
var enLanguage = document.getElementById("enLanguage");
var esLanguage = document.getElementById("esLanguage");
frLanguage.addEventListener("click", frenchSwitch);
enLanguage.addEventListener("click", englishSwitch);
esLanguage.addEventListener("click", spanishSwitch);

// Fonction pour mettre le cookie
function setCookie(name, cvalue, expiration) {
  var d = new Date();
  d.setTime(d.getTime() + expiration * 24 * 60 * 60 * 1000);
  var expires = "expires=" + d.toUTCString();
  document.cookie = name + "=" + cvalue + ";" + expires + ";path=/";
}

function frenchSwitch() {
  frLanguage.classList.add("settings__flag--active");
  enLanguage.classList.remove("settings__flag--active");
  esLanguage.classList.remove("settings__flag--active");
  setCookie("language", "fr", 10000);
  location.reload();
}
function englishSwitch() {
  enLanguage.classList.add("settings__flag--active");
  frLanguage.classList.remove("settings__flag--active");
  esLanguage.classList.remove("settings__flag--active");
  setCookie("language", "en", 10000);
  location.reload();
}
function spanishSwitch() {
  esLanguage.classList.add("settings__flag--active");
  frLanguage.classList.remove("settings__flag--active");
  enLanguage.classList.remove("settings__flag--active");
  setCookie("language", "es", 10000);
  location.reload();
}
