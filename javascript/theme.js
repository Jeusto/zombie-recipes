// Si le cookie du theme existe pas, on le cree
if ((allCookies = document.cookie).includes("theme") == false) {
  setCookie("theme", "light", 10000);
}

// Si on clique sur le switch, on change le theme
let darkmodeCheckbox = document.getElementById("darkmodeCheckbox");
darkmodeCheckbox.addEventListener("click", switchTheme);

// Fonction pour changer le theme
function switchTheme() {
  if (getCookie("theme") == "light") {
    setCookie("theme", "dark", 10000);
    location.reload();
  } else {
    setCookie("theme", "light", 10000);
    location.reload();
  }
}

// Fonction pour mettre le cookie
function setCookie(cname, cvalue, expiration) {
  let d = new Date();
  d.setTime(d.getTime() + expiration * 24 * 60 * 60 * 1000);
  let expires = "expires=" + d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

// Fonction pour lire un cookie
function getCookie(cname) {
  let name = cname + "=";
  let decodedCookie = decodeURIComponent(document.cookie);
  let ca = decodedCookie.split(";");
  for (let i = 0; i < ca.length; i++) {
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
