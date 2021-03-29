<?php
  // On ouvre la base de donnees
  $recipeDataBase = new PDO('sqlite:backend/database/recipes.sqlite');

  // On recupere la recette qui correspond 
  $currentRecipe = $_GET["recipe"];
  $statement = $recipeDataBase -> query("SELECT * FROM Recipes WHERE Id LIKE '%$currentRecipe%' ");
  $rows = $statement -> fetchAll(PDO::FETCH_ASSOC); 
  $currentLink = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

  // On met les donnees dans des variables pour les afficher
  for ($i = 0; $i < count($rows); $i++) {
    $recipeId = ($rows[$i]['Id']);
    $recipeName = ($rows[$i]['RecipeName']);
    $recipeType = ($rows[$i]['RecipeType']);
    $recipeImageUrl = ($rows[$i]['ImageUrl']);
    $recipeDescription = ($rows[$i]['RecipeDescription']);
    $recipeDifficulty = ($rows[$i]['Difficulty']);
    $recipePreparationTime = ($rows[$i]['PreparationTime']);
    $recipeDetails = ($rows[$i]['Details']);
    $recipeIngrediants = ($rows[$i]['Ingrediants']);
    $recipeQuantities = ($rows[$i]['Quantities']);
    $ingrediants = explode(";", $recipeIngrediants);
    $quantities = explode(";", $recipeQuantities);
    $userFirstName = ($rows[$i]['FirstName']);
    $userLastName = ($rows[$i]['LastName']);
    $publishedDate = ($rows[$i]['PublishDate']);
  }

?>