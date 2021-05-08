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

<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible"
      content="IE=edge" />
<meta name="viewport"
      content="width=device-width, initial-scale=1.0" />
<meta name="description"
      content="Site de recettes pour zombies" />
<link rel="icon"
      href="./images/assets/favicon.png"
      type="image/gif"
      sizes="16x16">
<link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
<link rel="stylesheet"
      href="./style/css/style.css" />

<!--On charge la feuille de style du mode nuit si c'est le theme choisi par l'utilisateur-->
<?php if (isset($_COOKIE['theme']) && $_COOKIE["theme"]=="dark") {echo "<link rel=\"stylesheet\" href=\"./style/css/dark.css\" />";}?>
<title><?= $lang[$pageName] ?></title>