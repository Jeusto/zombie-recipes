<?php

// On verifie que le cookie de la langue existe
if(isset($_COOKIE['language'])) {
  // On charge le fichier de langue en fonction du cookie
  if($_COOKIE['language']=="en") {include ("languages/en.php");}
  else if($_COOKIE['language']=="es") {include ("languages/es.php");}
  else {include ("languages/fr.php");}
}
// Si y a pas de cookie, on charge la langue francais
else {include ("languages/fr.php");}


// Si y a une recherche, on charge les recettes correspondantes 
try {
  $pdo = new PDO('sqlite:database/recipes.sqlite');
  $search = htmlspecialchars($_GET["search"]);
  $statement = $pdo -> query("SELECT * FROM Recipes WHERE RecipeName LIKE '%$search%' ");
  $rows = $statement -> fetchAll(PDO::FETCH_ASSOC); 

  // Si le resultat est vide, on charge le composant qui l'indique
  if (count($rows) == 0) {
    include "components/noResult.php";
  }

  // Sinon, on affiche les resultats de la recherche
  else  {
    for ($i = 0; $i < count($rows); $i++) {
      $recipeId = ($rows[$i]['Id']);
      $recipeName = ($rows[$i]['RecipeName']);
      $recipeType = ($rows[$i]['RecipeType']);
      $recipeImageUrl = ($rows[$i]['ImageUrl']);
      $recipeDescription = ($rows[$i]['RecipeDescription']);
      $recipeDifficulty = ($rows[$i]['Difficulty']);
      $recipePreparationTime = ($rows[$i]['PreparationTime']);
      $recipeDetails = ($rows[$i]['Details']);
      
      // On met l'icon en fonction de si la recette est sauvegarde ou non
      $tmp = "bookmarkBtn" . $recipeId;
      if (strpos($_COOKIE["bookmarks"], $tmp)) {$recipeIconName = "fas fa-bookmark";}
      else {$recipeIconName = "far fa-bookmark";}
      include "components/recipeCard.php";
    }
  }
}
catch (PDOException $exception) {
  var_dump($exception);
} 

?>