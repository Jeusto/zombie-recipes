document.querySelector("#formSubmitBtn").addEventListener("click", function (event) {
  event.preventDefault();
  let hasError = false;

  // Regex pour les différents inputs
  const regexName = /^[\S]{1,50}$/;
  const regexMail = /^$|[^@]+@[^\.]+\..+/;
  const regexOrganisation = /^$|^[A-Za-z0-9 -]*[A-Za-z0-9][A-Za-z0-9 _]*$/;
  const regexRecipeName = /^[A-Za-z']+( [A-Za-z']+)*$/;
  const regexRecipeText = /^[A-Za-z']+( [A-Za-z']+)*$/;
  const regexIngrediant = /^[A-Za-z']+( [A-Za-z']+)*$/;

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
  inputVerif1.call(details, regexRecipeText);
  details.addEventListener("input", inputVerif2(regexRecipeText));

  let description = document.getElementById("recipeDescription");
  inputVerif1.call(description, regexRecipeText);
  description.addEventListener("input", inputVerif2(regexRecipeText));

  let recipeImage = document.getElementById("recipeImage");
  if (recipeImage.value == "") {
    hasError = true;
    recipeImage.classList.add("error");
  }

  // Si y a pas d'erreur on envoie le formulaire et on affiche un texte
  if (hasError == false) {
    document.getElementById("recipeForm").submit();
    document.getElementById("form__success").style.display = "block";
    document.getElementById("form__error").style.display = "none";
  }
  // Si y a une erreur, on affiche un texte d'erreur
  else {
    document.getElementById("form__success").style.display = "none";
    document.getElementById("form__error").style.display = "block";
  }

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
});
