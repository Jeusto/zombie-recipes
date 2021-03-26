<?php 

// On verifie que le cookie de la langue existe
if(isset($_COOKIE['language'])) {
  // On charge le fichier de langue en fonction du cookie
  if($_COOKIE['language']=="en") {include ("backend/languages/en.php");}
  else if($_COOKIE['language']=="es") {include ("backend/languages/es.php");}
  else {include ("backend/languages/fr.php");}
}
// Si y a pas de cookie, on charge la langue francais
else {include ("backend/languages/fr.php");}

?>