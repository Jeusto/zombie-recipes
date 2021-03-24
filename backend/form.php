<?php 

  // if(isset($_POST['submitButton'])) 

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

// On sauvegarde l'image envoye dans le formulaire
$target_dir = "images/recipes/";
$target_file = $target_dir . basename($_FILES["recipeImage"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// On verifie que c'est une image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["recipeImage"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = true;
  } else {
    echo "File is not an image.";
    $uploadOk = false;
  }
}
// On verifie que le fichier existe
if (file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = false;
}
// On verifie taille du fichier
if ($_FILES["recipeImage"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = false;
}
// On verifie le format du fichier
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
  echo "Sorry, only JPG, JPEG & PNG files are allowed.";
  $uploadOk = false;
}
// On verifie que y a pas d'erreur
if ($uploadOk == false) {
  echo "Sorry, your file was not uploaded.";
// On telecharge si c'est bon
} else {
  if (move_uploaded_file($_FILES["recipeImage"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["recipeImage"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}

// Si l'upload de fichier a reussi, on ajoute tout dans la base de donnees
if ($uploadOk == true) {
  // On recupere le nombre de lignes pour avoir le nouveau id 
  $idNumber = count($rows)+1;
  echo($idNumber);

  // On les ajoute dans la base de donnees
  $add = $recipeDataBase -> exec("INSERT INTO Recipes (Id, RecipeName, RecipeType, ImageUrl, RecipeDescription, Difficulty, PreparationTime, Details, FirstName, LastName, Email, Organisation, Ingrediants, Quantities) 
  VALUES ('$idNumber', '$_POST[recipeName]','$_POST[recipeType]','$recipeImageUrl','$_POST[recipeDescription]','$_POST[recipeDifficulty]','$_POST[recipePreparationTime]','$_POST[recipeDetails]','$_POST[userFirstName]','$_POST[userLastName]','$_POST[userEmail]','$_POST[userOrganisation]','$ingrediantsNames', '$ingrediantsQuantities')"); 
}

?>