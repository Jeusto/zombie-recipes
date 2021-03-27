<?php

// Si y a pas de recherche, on charge toutes les recettes
if (empty($_GET["search"])) { 
  $recipeDataBase = new PDO('sqlite:backend/database/recipes.db');
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
    include "components/recipeCard.php";
  }
}

?>