<?php

// Si y a pas de recherche, on charge toutes les recettes
if (empty($_GET["search"])) {
  try {
    // On ouvre la base de donnees
    $dirPath = dirname(__FILE__);
    $pdo = new PDO("sqlite:{$dirPath}/database/recipes.sqlite");
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // On cree la table si elle existe pas
    $pdo->query(
      'CREATE TABLE IF NOT EXISTS "Recipes" (
      "Id"	INTEGER NOT NULL UNIQUE,
      "RecipeName"	TEXT,
      "RecipeType"	TEXT,
      "ImageUrl"	TEXT,
      "RecipeDescription"	TEXT,
      "Difficulty"	TEXT,
      "PreparationTime"	INTEGER,
      "Details"	TEXT,
      "FirstName"	TEXT,
      "LastName"	TEXT,
      "Email"	TEXT,
      "Organisation"	TEXT,
      "Ingrediants"	TEXT,
      "Quantities"	TEXT,
      "PublishDate"	TEXT,
      PRIMARY KEY("Id" AUTOINCREMENT))'
    );

    // On charge tout
    $statement = $pdo->query("SELECT * FROM Recipes");
    $rows = $statement->fetchAll(PDO::FETCH_ASSOC);

    // On affiche tout
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
      } else {
        $recipeIconName = "far fa-bookmark";
      }
      // On affiche la recette
      include "components/recipeCard.php";
    }
  } catch (PDOException $exception) {
    var_dump($exception);
  }
}