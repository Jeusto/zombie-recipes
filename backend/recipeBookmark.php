<?php

// On ouvre la base de donnees
$recipeDataBase = new PDO('sqlite:backend/database/recipes.sqlite');

// Si y a pas de sauvegardes dans le cookie, on affiche le message qui l'indique 
if (!isset($_COOKIE["bookmarks"]) || empty($_COOKIE["bookmarks"])) {
  include "backend/components/noBookmark.php";
}

// Si y a des sauvegardes, on les affiche
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
    
    // Si la recette est sauvegarde on l'affiche
    $tmp = "bookmarkBtn" . $recipeId;
    if (strpos($_COOKIE["bookmarks"], $tmp)) {
      $recipeIconName = "fas fa-bookmark";
      include "backend/components/recipeCard.php";
    }
    else {
      continue;
    }
  }
}

?>