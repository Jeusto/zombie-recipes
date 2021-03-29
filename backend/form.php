<?php

// On verifie s'il y a une requete POST
if (!empty($_POST)) {
  $noError = true;
  $currentDate = date("d-M-Y");
  $regexName = "/^[A-Za-z]|[A-Za-z][A-Za-z\s]*[A-Za-z]$/";
  $regexMail = "/^$|[^@]+@[^\.]+\..+/";
  $regexOrganisation = "/^$|^[A-Za-z0-9 -]*[A-Za-z0-9][A-Za-z0-9 _]*$/";
  $regexRecipeName = "/^[A-Za-z']+( [A-Za-z']+)*$/";
  $regexRecipeRealization = "/^[A-Za-z']+( [A-Za-z']+)*$/";
  $regexRecipeDetails = "/^$|[A-Za-z']+( [A-Za-z']+)*$/";
  $regexIngrediant = "/^[A-Za-z'.0-9]+( [A-Za-z'.0-9]+)*$/";

  // On recupere les reponses du formulaire
  $recipeName = isset($_POST["recipeName"]) ? htmlspecialchars(($_POST["recipeName"])): null;
  $recipeType = isset($_POST["recipeType"]) ? htmlspecialchars($_POST["recipeType"]): null;
  $recipeImageUrl = isset($_FILES["recipeImage"]["name"]) ? htmlspecialchars($_FILES["recipeImage"]["name"]): null;
  $recipeDescription = isset($_POST["recipeDescription"]) ? htmlspecialchars($_POST["recipeDescription"]): null;
  $recipeDifficulty = isset($_POST["recipeDifficulty"]) ? htmlspecialchars($_POST["recipeDifficulty"]): null;
  $recipePreparationTime = isset($_POST["recipePreparationTime"]) ? htmlspecialchars($_POST["recipePreparationTime"]): null;
  $recipeDetails = isset($_POST["recipeDetails"]) ? htmlspecialchars($_POST["recipeDetails"]): null;
  $userFirstName = isset($_POST["userFirstName"]) ? htmlspecialchars(($_POST["userFirstName"])): null;
  $userLastName = isset($_POST["userLastName"]) ? htmlspecialchars($_POST["userLastName"]): null;
  $userEmail = isset($_POST["userEmail"]) ? htmlspecialchars($_POST["userEmail"]): null;
  $userOrganisation = isset($_POST["userOrganisation"]) ? htmlspecialchars($_POST["userOrganisation"]): null;
  $ingrediantsNames = "";
  $ingrediantsQuantities = "";

  // On recupere et on verifie les ingrediants
  for ($i = 0; $i < 15; $i++) {
    if ((isset($_POST["ingrediantName" . $i]))) {
      regexVerification($regexIngrediant, $_POST["ingrediantName" . $i]);
      regexVerification($regexIngrediant, $_POST["ingrediantQuantity" . $i]);
      $ingrediantsNames = $ingrediantsNames . htmlspecialchars($_POST["ingrediantName" . $i]) . ";";
      $ingrediantsQuantities = $ingrediantsQuantities . htmlspecialchars($_POST["ingrediantQuantity" . $i]) . ";";
    }
  }
  
  // On verifie les inputs avec des regex
  regexVerification($regexName, $userFirstName);
  regexVerification($regexName, $userLastName);
  regexVerification($regexMail, $userEmail);
  regexVerification($regexOrganisation, $userOrganisation);
  regexVerification($regexRecipeName, $recipeName);
  regexVerification($regexRecipeRealization, $recipeDescription);
  regexVerification($regexRecipeDetails, $recipeDetails);
  
  // On verifie et on upload l'image
  imageUpload();
  
  // On ouvre la base de donnees et on ajoute tout si y a pas d'erreur
  if ($noError) {
    try {
      $pdo = new PDO('sqlite:backend/database/recipes.sqlite');

      $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

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
    
      // On recupere le nombre d'elements pour mettre l'id
      $statement = $pdo->query("SELECT * FROM Recipes");
      $rows = $statement->fetchAll(PDO::FETCH_ASSOC);
      $idNumber = count($rows) + 1;

      $statement = $pdo->prepare("INSERT INTO Recipes (Id, RecipeName, RecipeType, ImageUrl, RecipeDescription, Difficulty, PreparationTime, Details, FirstName, LastName, Email, Organisation, Ingrediants, Quantities, PublishDate) 
      VALUES (:Id, :RecipeName, :RecipeType, :ImageUrl, :RecipeDescription, :Difficulty, :PreparationTime, :Details, :FirstName, :LastName, :Email, :Organisation, :Ingrediants, :Quantities, :PublishDate)");
      
      $statement->bindValue('Id',$idNumber, PDO::PARAM_STR);
      $statement->bindValue('RecipeName',$recipeName,PDO::PARAM_STR);
      $statement->bindValue('RecipeType',$recipeType,PDO::PARAM_STR);
      $statement->bindValue('ImageUrl',$recipeImageUrl,PDO::PARAM_STR);
      $statement->bindValue('RecipeDescription',$recipeDescription,PDO::PARAM_STR);
      $statement->bindValue('Difficulty',$recipeDifficulty,PDO::PARAM_STR);
      $statement->bindValue('PreparationTime',$recipePreparationTime,PDO::PARAM_STR);
      $statement->bindValue('Details',$recipeDetails,PDO::PARAM_STR);
      $statement->bindValue('FirstName',$userFirstName,PDO::PARAM_STR);
      $statement->bindValue('LastName',$userLastName,PDO::PARAM_STR);
      $statement->bindValue('Email',$userEmail,PDO::PARAM_STR);
      $statement->bindValue('Organisation',$userOrganisation,PDO::PARAM_STR);
      $statement->bindValue('Ingrediants',$ingrediantsNames,PDO::PARAM_STR);
      $statement->bindValue('Quantities',$ingrediantsQuantities,PDO::PARAM_STR);
      $statement->bindValue('PublishDate',$currentDate,PDO::PARAM_STR);
      
      $statement->execute();

      // On affiche le message de succes
      echo "<script type=\"text/javascript\">successMessage();</script>";
    }
    catch (PDOException $e) {
      printError($exception);
    }
  }
}

// La fonction pour afficher un message d'erreur 
function printError($errorMessage)
{
  echo "<script type=\"text/javascript\">errorMessage(\"" . $errorMessage . "\");</script>";
  exit();
}

// La fonction pour verifier les inputs
function regexVerification($regex, $object)
{
  if (preg_match($regex, $object) == 0) {
    $errorMessage = "Le champs qui comporte \\\"" . $object . "\\\" n'est pas valide!";
    printError($errorMessage);
  }
}

// La fonction pour verifier et upload 
function imageUpload()
{
  // On sauvegarde l'image envoye dans le formulaire
  $target_dir = "images/recipes/";
  $target_file = $target_dir . basename($_FILES["recipeImage"]["name"]);
  $fileName = htmlspecialchars(basename($_FILES["recipeImage"]["name"]));
  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

  // On verifie que c'est une image
  if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["recipeImage"]["tmp_name"]);
    if ($check !== false) {
      echo "Le fichier est au format " . $check["mime"] . ".";
    } else {
      $errorMessage = "Le fichier " .  htmlspecialchars($fileName) . " n'est pas une image.";
      printError($errorMessage);
    }
  }

  // On verifie que le fichier existe
  if (file_exists($target_file)) {
    $errorMessage = "Le fichier " . htmlspecialchars($fileName) . " existe deja.";
    printError($errorMessage);
  }

  // On verifie taille du fichier
  if ($_FILES["recipeImage"]["size"] > 500000) {
    $errorMessage = "Le fichier " .  htmlspecialchars($fileName) . " est trop large (superieur a 50mo).";
    printError($errorMessage);
  }

  // On verifie le format du fichier
  if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
    $errorMessage = "Le fichier " .  htmlspecialchars($fileName) . " n'est pas au format jpeg, jpg ou png.";
    printError($errorMessage);
  }

  // On telecharge l'image si c'est bon
  if (move_uploaded_file($_FILES["recipeImage"]["tmp_name"], $target_file)) {
    return 0;
  } else {
    $errorMessage = "Le fichier " . htmlspecialchars($fileName) . " n'as pas pu etre enregistree.";
    printError($errorMessage);
  }
}
