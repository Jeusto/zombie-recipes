<?php

// On ouvre la base de donnees
$recipeDataBase = new PDO('sqlite:backend/database/recipes.db');

// Si y a une recherche, on charge les recettes correspondantes 
if (!empty($_GET["search"])) {
  $search = $_GET["search"];
  $statement = $recipeDataBase -> query("SELECT * FROM Recipes WHERE RecipeName LIKE '%$search%' ");
  $rows = $statement -> fetchAll(PDO::FETCH_ASSOC); 
  
  // Si le resultat est vide, on charge le composant qui l'indique
  if (count($rows) == 0) {
    include "backend/components/noresult.php";
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
      if (strpos($_COOKIE["bookmarks"], $tmp)) {
        $recipeIconName = "fas fa-bookmark";
      }
      else {
        $recipeIconName = "far fa-bookmark";
      }
      include "backend/components/recipeCard.php";
    }
  }
}

// Si y a pas de recherche, on charge toutes les recettes
else { 
  $statement = $recipeDataBase -> query("SELECT * FROM Recipes");
  $rows = $statement -> fetchAll(PDO::FETCH_ASSOC); 
  
  for ($i = 0; $i < count($rows); $i++) {
    $recipeId = ($rows[$i]['Id']);
    $recipeName = ($rows[$i]['RecipeName']);
    $recipeType = ($rows[$i]['RecipeType']);
    $recipeImageUrl = ($rows[$i]['ImageUrl']);
    $recipeDescription = ($rows[$i]['RecipeDescription']);
    $recipeDifficulty = ($rows[$i]['Difficulty']);
    $recipePreparationTime = ($rows[$i]['PreparationTime']);
    $recipeDetails = ($rows[$i]['Details']);

    // On met l'icon bookmark en fonction de si la recette est sauvegarde ou non
    $tmp = "bookmarkBtn" . $recipeId;
    if (isset($_COOKIE["bookmarks"]) && strpos($_COOKIE["bookmarks"], $tmp)) {
      $recipeIconName = "fas fa-bookmark";
    }
    else {
      $recipeIconName = "far fa-bookmark";
    }
    include "backend/components/recipeCard.php";
  }
}

?>