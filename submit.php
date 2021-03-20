<!--Charger la langue en fonction du cookie--> 
<?php include "backend/language.php";?>

<!DOCTYPE html>
<html lang="<?php echo $lang['language'] ?>">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Description du site" />
    <link rel="icon" href="./images/assets/favicon.png" type="image/gif" sizes="16x16">
    <link rel="preconnect" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
    />
    <link rel="stylesheet" href="./style/style.css" />
    <?php if (isset($_COOKIE['theme']) && $_COOKIE["theme"]=="dark") {echo "<link rel=\"stylesheet\" href=\"./style/darktheme.css\" />";}?>
    <title><?php echo $lang['formPage'] ?></title>
  </head>
  <body>
    <?php include "backend/components/navigation.php";?>

    <!--Image de formulaire-->
    <img class="submit-image" src="images/assets/submit-recipe.svg" alt="" />

    <!--Formulaire-->
    <form action="backend/form.php" method="post" class="form" enctype="multipart/form-data">
      <div class="form__section">
        <h2 class="form__section-title"><?php echo $lang['personalInfo'] ?></h2>
        <input
          class="form__input-text"
          type="text"
          id="userLastName"
          name="userLastName"
          placeholder="<?php echo $lang['lastName'] ?>"
        />
        <input
          class="form__input-text"
          type="text"
          id="userFirstName"
          name="userFirstName"
          placeholder="<?php echo $lang['firstName'] ?>"
        />
        <input class="form__input-text" type="text" id="userEmail" name="userEmail" placeholder="<?php echo $lang['email'] ?>" />
        <input
          class="form__input-text"
          type="text"
          id="userOrganisation"
          name="userOrganisation"
          placeholder="<?php echo $lang['organisation'] ?>"
        />
      </div>
      <div class="form__section">
        <h2 class="form__section-title"><?php echo $lang['recipeGeneralInfo'] ?></h2>
        <label class="form__label" for="recipeName"
          ><i class="form__label-icon fas fa-paragraph"></i><?php echo $lang['recipeName'] ?></label
        >
        <input
          class="form__input-text"
          type="text"
          id="recipeName"
          name="recipeName"
          placeholder="<?php echo $lang['recipeName'] ?>"
        />
        <label class="form__label" for="recipeName"
          ><i class="form__label-icon fas fa-folder-open"></i><?php echo $lang['recipeType'] ?></label
        >
        <select class="form__selection" name="recipeType" id="recipeType">
          <option value="aperitif"><?php echo $lang['appetizer'] ?></option>
          <option value="drink"><?php echo $lang['drink'] ?></option>
          <option value="dessert"><?php echo $lang['dessert'] ?></option>
          <option value="mainDish"><?php echo $lang['mainDish'] ?></option>
        </select>
        <label class="form__label" for="recipeName"
          ><i class="form__label-icon fas fa-image"></i><?php echo $lang['recipePresentationPhoto'] ?></label
        >
        <input class="form__file-input" type="file" name="recipeImage" id="recipeImage" />
      </div>
      <div class="form__section">
        <h2 class="form__section-title"><?php echo $lang['recipeDetails'] ?></h2>
        <label class="form__label" for="recipeDescription"
          ><i class="form__label-icon fas fa-utensils"></i><?php echo $lang['recipeRealization'] ?></label
        >
        <textarea
          class="form__text-area"
          id="recipeDescription"
          name="recipeDescription"
          rows="4"
          cols="50"
          required
        ><?php echo $lang['recipeRealizationPlaceholder'] ?></textarea>
        <label class="form__label" for="recipeDifficulty"
          ><i class="form__label-icon fas fa-brain"></i><?php echo $lang['difficultyLevel'] ?></label
        >
        <select class="form__selection" name="recipeDifficulty" id="recipeDifficulty">
          <option value="beginner"><?php echo $lang['beginner'] ?></option>
          <option value="intermediate"><?php echo $lang['intermediate'] ?></option>
          <option value="advanced"><?php echo $lang['advanced'] ?></option>
        </select>
        <label class="form__label" for="recipePreparationTime"
          ><i class="form__label-icon fas fa-clock"></i><?php echo $lang['preparationTime'] ?> </label
        >
        <input class="form__number-input" id="recipePreparationTime" name="recipePreparationTime" type="number" min="0" value="60" />
        <label class="form__label" for="recipeRealization"><i class="form__label-icon fas fa-sticky-note"></i><?php echo $lang['precisions'] ?></label>
        <textarea
          class="form__text-area"
          id="recipeDetails"
          name="recipeDetails"
          rows="4"
          cols="50"
          required><?php echo $lang['precisionsPlaceholder'] ?></textarea>
        <label class="form__label" for="recipeRealization"
          ><i class="form__label-icon fas fa-lemon"></i><?php echo $lang['ingrediants'] ?></label
        >
        <div class="form__ingrediants-buttons">
          <button type="button" class="form__ingrediant-add" id="addBtn">Ajouter</button>
          <button type="button" class="form__ingrediant-delete" id="deleteBtn">Supprimer</button>
        </div>
        <div class="form__ingrediants-div" id="formIngrediants">  
          <div class="form__ingrediant">       
            <input
              class="form__ingrediant-name"
              type="text"
              name="ingrediantName1"
              placeholder="Ingrediant name"
            />
            <input
              class="form__ingrediant-quantity"
              type="text"
              name="ingrediantQuantity1"
              placeholder="Quantity"
            /> 
          </div>
        </div>
      </div>
      <div class="form__checkbox">
        <input
          class="checkbox-form"
          type="checkbox"
          id="confirmCheckbox"
          name="confirmed"
          value="yes"
        />
        <label for="checkbox-form"> Lorem ipsum dolor sit amet consectetur.</label><br />
      </div>
      <div class="form__buttons">
        <input class="button button--reset-form" type="reset" />
        <input class="button button--submit-form" name="submit" type="submit" />
      </div>
    </form>

    <!--Modal reglages-->
    <?php include "backend/components/settings.php";?>

    <script src="./javascript/ingrediants.js"></script>
    <script src="./javascript/language.js"></script>
    <script src="./javascript/theme.js"></script>
    <script src="./javascript/userinterface.js"></script>
  </body>
</html>

