// On empeche l'envoi du formulaire pour verifier les inputs
document.querySelector("#formSubmitBtn").addEventListener("click", function (event) {
  event.preventDefault();
  let hasError = false;
  let imageHasError = false;

  // Regex pour les différents inputs
  const regexName = /^[A-Za-z]|[A-Za-z][A-Za-z\s]*[A-Za-z]$/;
  const regexRecipeName = /^[A-Za-z']+( [A-Za-z']+)*$/;
  const regexRecipeRealization = /^[A-Za-z'.0-9]+( [A-Za-z'.0-9]+)*$/;
  const regexRecipeDetails = /^$|[A-Za-z']+( [A-Za-z']+)*$/;
  const regexIngrediant = /^[A-Za-z'.0-9]+( [A-Za-z'.0-9]+)*$/;

  // On verifie les valeurs des differents inputs
  let lastName = document.getElementById("userLastName");
  inputVerif1.call(lastName, regexName);
  lastName.addEventListener("input", inputVerif2(regexName));

  let firstName = document.getElementById("userFirstName");
  inputVerif1.call(firstName, regexName);
  firstName.addEventListener("input", inputVerif2(regexName));

  let recipeName = document.getElementById("recipeName");
  inputVerif1.call(recipeName, regexRecipeName);
  recipeName.addEventListener("input", inputVerif2(regexRecipeName));

  let details = document.getElementById("recipeDetails");
  inputVerif1.call(details, regexRecipeDetails);
  details.addEventListener("input", inputVerif2(regexRecipeDetails));

  let description = document.getElementById("recipeDescription");
  inputVerif1.call(description, regexRecipeRealization);
  description.addEventListener("input", inputVerif2(regexRecipeRealization));

  // On verifie l'image
  let recipeImage = document.getElementById("recipeImage");
  if (recipeImage.value == "") {
    imageHasError = true;
    recipeImage.classList.add("error");
  }
  recipeImage.addEventListener("change", function () {
    if (recipeImage.value == "") {
      imageHasError = true;
      recipeImage.classList.add("error");
    } else {
      imageHasError = false;
      recipeImage.classList.remove("error");
    }
  });

  // On verifie les inputs ingrediants
  var ingrediants = document.querySelectorAll(".form__ingrediant-name, .form__ingrediant-quantity");
  ingrediants.forEach(function (ingrediant) {
    inputVerif1.call(ingrediant, regexIngrediant);
    ingrediant.addEventListener("input", inputVerif2(regexIngrediant));
  });

  // Si y a pas d'erreur on envoie le formulaire
  if (!hasError && !imageHasError) {
    document.getElementById("recipeForm").submit();
  }
  // Si y a une erreur on l'affiche
  else {
    errorMessage(
      "Un ou plusieurs champs ne sont pas valides, veuillez vérifier vos informations et essayer à nouveau!"
    );
  }
});

// La fonction pour verifier qu'un input est valide
function inputVerif1(regexArg) {
  if (this.value.match(regexArg) === null) {
    hasError = true;
    this.classList.add("error");
  } else {
    this.classList.remove("error");
  }
}
function inputVerif2(regexArg) {
  return function executeOnEvent(event) {
    if (this.value.match(regexArg) === null) {
      hasError = true;
      this.classList.add("error");
    } else {
      this.classList.remove("error");
    }
  };
}

// La fonction pour afficher un message d'erreur
function errorMessage(message) {
  document.getElementById("form__success").style.display = "none";
  document.getElementById("form__error").style.display = "block";
  document.getElementById("errorMessage").innerHTML = message;
}

// La fonction pour afficher un message de succes
function successMessage() {
  document.getElementById("form__success").style.display = "block";
  document.getElementById("form__error").style.display = "none";
}
