<!DOCTYPE html>
<html lang="<?php if (isset($_COOKIE['language'])) {
                     echo $_COOKIE['language'];
              } else {
                     echo 'fr';
              } ?>">

<head>
  <!--La langue et les tags-->
  <?php $pageName = "formPage";
       include "backend/components/headHtml.php";
       ?>
</head>

<body>
  <!--Navigation-->
  <?php include "backend/components/navigation.php"; ?>

  <!--Image de formulaire-->
  <img class="submitImage"
       src="images/assets/submitRecipe.svg"
       alt="Chief and a plant" />

  <!--Formulaire-->
  <form action="submit.php"
        method="post"
        class="form"
        id="recipeForm"
        enctype="multipart/form-data">

    <div class="form__section">
      <h2 class="form__sectionTitle"><?= $lang['recipeGeneralInfo'] ?></h2>
      <label class="form__label"
             for="userLastName"><i class="form__labelIcon fas fa-signature"></i><?= $lang['lastAndFirstName'] . " *" ?></label>
      <input class="form__inputText"
             type="text"
             id="userLastName"
             name="userLastName"
             placeholder="<?= $lang['lastName'] . " *" ?>"
             required
             maxlength="40" />
      <input class="form__inputText"
             type="text"
             id="userFirstName"
             name="userFirstName"
             placeholder="<?= $lang['firstName'] . " *" ?>"
             required
             maxlength="40" />
      <label class="form__label"
             for="recipeName"><i class="form__labelIcon fas fa-paragraph"></i><?= $lang['recipeName'] . " *" ?></label>
      <input class="form__inputText form__recipeName"
             type="text"
             id="recipeName"
             name="recipeName"
             placeholder="<?= $lang['recipeName'] ?>"
             required
             maxlength="40" />
      <label class="form__label"
             for="recipeType"><i class="form__labelIcon fas fa-folder-open"></i><?= $lang['recipeType'] ?></label>
      <select class="form__selection"
              name="recipeType"
              id="recipeType">
        <option value="appetizer"><?= $lang['appetizer'] ?></option>
        <option value="drink"><?= $lang['drink'] ?></option>
        <option value="dessert"><?= $lang['dessert'] ?></option>
        <option value="mainDish"><?= $lang['mainDish'] ?></option>
      </select>
      <label class="form__label"
             for="recipeImage"><i class="form__labelIcon fas fa-image"></i><?= $lang['recipePresentationPhoto'] . " *" ?></label>
      <input class="form__fileInput"
             type="file"
             name="recipeImage"
             id="recipeImage"
             accept=".jpg, .png, .jpeg"
             required />
    </div>
    <div class="form__section">
      <h2 class="form__sectionTitle"><?= $lang['recipeDetails'] ?></h2>
      <label class="form__label"
             for="recipeDescription"><i class="form__labelIcon fas fa-utensils"></i><?= $lang['recipeRealization'] . " *" ?></label>
      <textarea class="form__textArea"
                id="recipeDescription"
                name="recipeDescription"
                rows="4"
                cols="50"
                maxlength="1000"
                required
                placeholder="<?= $lang['recipeRealizationPlaceholder'] ?>"></textarea>
      <label class="form__label"
             for="recipeDifficulty"><i class="form__labelIcon fas fa-brain"></i><?= $lang['difficultyLevel'] ?></label>
      <select class="form__selection"
              name="recipeDifficulty"
              id="recipeDifficulty">
        <option value="beginner"><?= $lang['beginner'] ?></option>
        <option value="intermediate"><?= $lang['intermediate'] ?></option>
        <option value="advanced"><?= $lang['advanced'] ?></option>
      </select>
      <label class="form__label"
             for="recipePreparationTime"><i class="form__labelIcon fas fa-clock"></i><?= $lang['preparationTime'] ?> </label>
      <input class="form__numberInput"
             id="recipePreparationTime"
             name="recipePreparationTime"
             type="number"
             min="0"
             value="0"
             max="960" />
      <label class="form__label"
             for="recipeDetails"><i class="form__labelIcon fas fa-sticky-note"></i><?= $lang['precisions'] ?></label>
      <textarea class="form__textArea"
                id="recipeDetails"
                name="recipeDetails"
                rows="4"
                cols="50"
                maxlength="1000"
                placeholder="<?= $lang['precisionsPlaceholder'] ?>"></textarea>
      <p class="form__label"><i class="form__labelIcon fas fa-lemon"></i><?= $lang['ingrediants'] ?></p>
      <div class="form__ingrediantsBtns">
        <button type="button"
                class="button--ingrediantAdd"
                id="addIngrediantBtn"
                aria-label="Add ingrediant input"><i class="fas fa-plus"></i> <?= $lang['add'] ?></button>
        <button type="button"
                class="button--ingrediantDelete"
                id="deleteIngrediantBtn"
                aria-label="Remove ingrediant input"><i class="fas fa-trash-alt"></i> <?= $lang['remove'] ?></button>
      </div>
      <div class="form__ingrediantsDiv"
           id="ingrediantsDiv">
        <div class="form__ingrediant">
          <input class="form__ingrediantName"
                 type="text"
                 name="ingrediantName1"
                 placeholder="Ingrediant name"
                 maxlength="40" />
          <input class="form__ingrediantQuantity"
                 type="text"
                 name="ingrediantQuantity1"
                 placeholder="Quantity"
                 maxlength="25" />
        </div>
      </div>
    </div>
    <div class="form__successMsg"
         id="successMessage">
      <h2><i class="fas fa-check"></i> <?= $lang['success'] ?></h2>
      <p><?= $lang['successMessage'] ?></p>
    </div>
    <div class="form__errorMsg"
         id="errorMessage">
      <h2><i class="fas fa-exclamation-triangle"></i> <?= $lang['error'] ?></h2>
      <p id="errorText"><?= $lang['errorMessage'] ?></p>
    </div>
    <div class="form__buttons">
      <button class="button button--submitForm"
              id="formSubmitBtn"
              name="submitButton"
              type="submit"><?= $lang['send'] ?></button>
      <button class="button button--resetForm"
              id="formResetBtn"
              type="reset"><?= $lang['reset'] ?></button>
    </div>
  </form>
  <script src="./javascript/form.js"></script>
  <?php include "backend/form.php"; ?>


  <!--Modal reglages-->
  <?php include "backend/components/settingsModal.php"; ?>

  <script src="./javascript/ingrediants.js"></script>
  <script src="./javascript/language.js"></script>
  <script src="./javascript/theme.js"></script>
  <script src="./javascript/settingsModal.js"></script>
  <script src="./javascript/sidebarNav.js"></script>
</body>

</html>