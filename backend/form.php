<?php 

if(!empty($_POST)) {
  $noError = true;

  $regexName = "/^[\S]{1,50}$/";
  $regexMail = "/^$|[^@]+@[^\.]+\..+/";
  $regexOrganisation = "/^$|^[A-Za-z0-9 -]*[A-Za-z0-9][A-Za-z0-9 _]*$/";
  $regexRecipeName = "/^[A-Za-z']+( [A-Za-z']+)*$/";
  $regexRecipeRealization = "/^[A-Za-z']+( [A-Za-z']+)*$/";
  $regexRecipeDetails = "/^$|[A-Za-z']+( [A-Za-z']+)*$/";
  $regexIngrediant = "/^[A-Za-z']+( [A-Za-z']+)*$/";

  // On ouvre la base de donnees
  $recipeDataBase = new PDO('sqlite:backend/database/recipes.db');
  $statement = $recipeDataBase -> query("SELECT * FROM Recipes");
  $rows = $statement -> fetchAll(PDO::FETCH_ASSOC); 

  // On recupere les reponses du formulaire
  $recipeName = $_POST["recipeName"];
  $recipeType = $_POST["recipeType"];
  $recipeImageUrl = $_FILES["recipeImage"]["name"];
  $recipeDescription = $_POST["recipeDescription"];
  $recipeDifficulty = $_POST["recipeDifficulty"];
  $recipePreparationTime = $_POST["recipePreparationTime"];
  $recipeDetails = $_POST["recipeDetails"];
  $userFirstName = $_POST["userFirstName"];
  $userLastName = $_POST["userLastName"];
  $userEmail = $_POST["userEmail"];
  $userOrganisation = $_POST["userOrganisation"];
  $ingrediantsNames = "";
  $ingrediantsQuantities = "";
  for ($i=0; $i < 15 ; $i++) { 
    if ((isset($_POST["ingrediantName".$i]))) {
      $ingrediantsNames = $ingrediantsNames . $_POST["ingrediantName".$i] . ";"; 
      $ingrediantsQuantities = $ingrediantsQuantities . $_POST["ingrediantQuantity".$i] . ";"; 
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
  

  // On ajoute tout dans la base de donnees si y'a pas d'erreur
  if ($noError) {
    $idNumber = count($rows)+1;
    $add = $recipeDataBase -> exec("INSERT INTO Recipes (Id, RecipeName, RecipeType, ImageUrl, RecipeDescription, Difficulty, PreparationTime, Details, FirstName, LastName, Email, Organisation, Ingrediants, Quantities) 
    VALUES ('$idNumber', '$_POST[recipeName]','$_POST[recipeType]','$recipeImageUrl','$_POST[recipeDescription]','$_POST[recipeDifficulty]','$_POST[recipePreparationTime]','$_POST[recipeDetails]','$_POST[userFirstName]','$_POST[userLastName]','$_POST[userEmail]','$_POST[userOrganisation]','$ingrediantsNames', '$ingrediantsQuantities')"); 
  }
  // On affiche le message de succes
  echo "<script type=\"text/javascript\">successMessage();</script>";

}

// La fonction pour afficher un message d'erreur 
function printError($errorMessage) {
  global $noError;
  $noError = false;
  echo "<script type=\"text/javascript\">errorMessage(\"".$errorMessage."\");</script>";
  exit();
}

// La fonction pour verifier les inputs
function regexVerification($regex, $object) {
  if (preg_match($regex,$object) == 0) {
    $errorMessage = "Le champs qui comporte \\\"" .$object. "\\\" n'est pas valide!";
    printError($errorMessage); 
  }
}

// La fonction pour verifier et upload 
function imageUpload() {
  // On sauvegarde l'image envoye dans le formulaire
  $target_dir = "images/recipes/";
  $target_file = $target_dir . basename($_FILES["recipeImage"]["name"]);
  $fileName = htmlspecialchars( basename( $_FILES["recipeImage"]["name"]));
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  // On verifie que c'est une image
  if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["recipeImage"]["tmp_name"]);
    if($check !== false) {
      echo "Le fichier est au format " . $check["mime"] . ".";
    } else {
      $errorMessage = "Le fichier " .$fileName. " n'est pas une image";
      printError($errorMessage);
    }
  }
  // On verifie que le fichier existe
  if (file_exists($target_file)) {
    $errorMessage = "Le fichier " .$fileName. " existe deja";
    printError($errorMessage);
  }
  // On verifie taille du fichier
  if ($_FILES["recipeImage"]["size"] > 500000) {
    $errorMessage = "Le fichier " .$fileName. " est trop large (superieur a 50mo)";
    printError($errorMessage);
  }
  // On verifie le format du fichier
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
    $errorMessage = "Le fichier " .$fileName. " n'est pas au format jpeg, jpg ou png.";
    printError($errorMessage);
  }
  // On telecharge si c'est bon
  if (move_uploaded_file($_FILES["recipeImage"]["tmp_name"], $target_file)) {
  } else {
    $errorMessage = "Le fichier " .$fileName. " n'as pas pu etre enregistree.";
    printError($errorMessage);
  }
}

?>