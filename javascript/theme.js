// Si le cookie du theme existe pas, on le cree
if ((allCookies = document.cookie).includes("theme") == false) {
  setCookie("theme", "light", 10000);
}

var darkmodeCheckbox = document.getElementById("darkmodeCheckbox");
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
function setCookie(name, cvalue, expiration) {
  var d = new Date();
  d.setTime(d.getTime() + expiration * 24 * 60 * 60 * 1000);
  var expires = "expires=" + d.toUTCString();
  document.cookie = name + "=" + cvalue + ";" + expires + ";path=/";
}

// Fonction pour lire un cookie
function getCookie(cname) {
  var name = cname + "=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(";");
  for (var i = 0; i < ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == " ") {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}
