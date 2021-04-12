// On empeche l'envoi du formulaire pour verifier les inputs
document.querySelector("#formSubmitBtn").addEventListener("click", function (event) {
  event.preventDefault();
  let formHasError = false;
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
    recipeImage.classList.add("form__errorOutline");
  }
  recipeImage.addEventListener("change", function () {
    if (recipeImage.value == "") {
      imageHasError = true;
      recipeImage.classList.add("form__errorOutline");
    } else {
      imageHasError = false;
      recipeImage.classList.remove("form__errorOutline");
    }
  });

  // On verifie les inputs ingrediants
  var ingrediants = document.querySelectorAll(".form__ingrediantName, .form__ingrediantQuantity");
  ingrediants.forEach(function (ingrediant) {
    inputVerif1.call(ingrediant, regexIngrediant);
    ingrediant.addEventListener("input", inputVerif2(regexIngrediant));
  });

  // Si y a pas d'erreur on envoie le formulaire
  if (!formHasError && !imageHasError) {
    document.getElementById("recipeForm").submit();
  }
  // Si y a une erreur on l'affiche
  else {
    errorMessage(
      "Un ou plusieurs champs ne sont pas valides, veuillez vérifier vos informations et essayer à nouveau!"
    );
  }

  // On scroll a la fin du page pour que l'utilisateur voit bien le message
  window.scrollTo({ top: document.body.scrollHeight, behavior: "smooth" });
});

// On enleve tout les erreurs si on clique sur le bouton "reinitialiser"
resetBtn = document.getElementById("formResetBtn");
resetBtn.addEventListener("click", function resetForm() {
  var elems = document.querySelectorAll(".form__errorOutline");
  [].forEach.call(elems, function (el) {
    el.classList.remove("form__errorOutline");
  });
  document.getElementById("successMessage").style.display = "none";
  document.getElementById("errorMessage").style.display = "none";
});

// La fonction pour verifier qu'un input est valide
function inputVerif1(regexArg) {
  if (this.value.match(regexArg) === null) {
    formHasError = true;
    this.classList.add("form__errorOutline");
  } else {
    this.classList.remove("form__errorOutline");
  }
}
function inputVerif2(regexArg) {
  return function executeOnEvent(event) {
    if (this.value.match(regexArg) === null) {
      formHasError = true;
      this.classList.add("form__errorOutline");
    } else {
      this.classList.remove("form__errorOutline");
    }
  };
}

// La fonction pour afficher un message d'erreur
function errorMessage(message) {
  document.getElementById("successMessage").style.display = "none";
  document.getElementById("errorMessage").style.display = "block";
  document.getElementById("errorText").innerHTML = message;
}

// La fonction pour afficher un message de succes
function successMessage() {
  document.getElementById("successMessage").style.display = "block";
  document.getElementById("errorMessage").style.display = "none";
}
