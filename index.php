<!--Charger la langue en fonction du cookie--> 
<?php include "backend/language.php";?>

<!DOCTYPE html>
<html lang="<?= $lang['language'] ?>">
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
    <title><?= $lang['mainPage'] ?></title>
  </head>
  <body>
    <!--Navigation-->
    <?php include "backend/components/navigation.php";?>
    
    <!--Image de header-->
    <div class="header-image"></div>

    <!--Barre de recherche-->
    <form class="search" action="index.php" method="get" class="form" enctype="multipart/form-data">
      <input
        class="search__input"
        type="text"
        placeholder="<?= $lang['searchRecipe']?>"
        maxlength="60"
        name ="search"
      />
      <div class="search__button-list">
        <button class="search__button" type="submit" aria-label="search">
          <i class="fas fa-search"></i>
        </button>
        <!--<button class="search__button" type="submit">
          <i class="fas fa-sliders-h"></i>
        </button>!-->
      </div>
    </form>

    <!--Liste de recettes-->
    <div class="recipe-list" id="recipeList">
      <?php include "backend/recipeSearch.php"?>
    </div>

    <!--Modal reglages-->
    <?php include "backend/components/settings.php";?>

    <script src="./javascript/bookmark.js"></script>
    <script src="./javascript/language.js"></script>
    <script src="./javascript/theme.js"></script>
    <script src="./javascript/userinterface.js"></script>
  </body>
</html>
