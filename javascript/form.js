// On empeche l'envoi du formulaire pour verifier les inputs
document.querySelector("#formSubmitBtn").addEventListener("click", function (event) {
  event.preventDefault();
  let hasError = false;
  let imageHasError = false;

  // Regex pour les différents inputs
  const regexName = /^[\S]{1,50}$/;
  const regexMail = /^$|[^@]+@[^\.]+\..+/;
  const regexOrganisation = /^$|^[A-Za-z0-9 -]*[A-Za-z0-9][A-Za-z0-9 _]*$/;
  const regexRecipeName = /^[A-Za-z']+( [A-Za-z']+)*$/;
  const regexRecipeRealization = /^[A-Za-z']+( [A-Za-z']+)*$/;
  const regexRecipeDetails = /^$|[A-Za-z']+( [A-Za-z']+)*$/;
  const regexIngrediant = /^[A-Za-z']+( [A-Za-z']+)*$/;
  const regexQuantity = /^[A-Za-z']+( [A-Za-z']+)*$/;

  // On verifie les valeurs des differents inputs
  let lastName = document.getElementById("userLastName");
  inputVerif1.call(lastName, regexName);
  lastName.addEventListener("input", inputVerif2(regexName));

  let firstName = document.getElementById("userFirstName");
  inputVerif1.call(firstName, regexName);
  firstName.addEventListener("input", inputVerif2(regexName));

  let email = document.getElementById("userEmail");
  inputVerif1.call(email, regexMail);
  email.addEventListener("input", inputVerif2(regexMail));

  let organisation = document.getElementById("userOrganisation");
  inputVerif1.call(organisation, regexOrganisation);
  organisation.addEventListener("input", inputVerif2(regexOrganisation));

  let recipeName = document.getElementById("recipeName");
  inputVerif1.call(recipeName, regexRecipeName);
  recipeName.addEventListener("input", inputVerif2(regexRecipeName));

  let details = document.getElementById("recipeDetails");
  inputVerif1.call(details, regexRecipeDetails);
  details.addEventListener("input", inputVerif2(regexRecipeDetails));

  let description = document.getElementById("recipeDescription");
  inputVerif1.call(description, regexRecipeRealization);
  description.addEventListener("input", inputVerif2(regexRecipeRealization));

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

  // Si y a pas d'erreur on envoie le formulaire et on affiche un mesage
  if (hasError == false && imageHasError == false) {
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
