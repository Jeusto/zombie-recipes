<!--On charge la langue en fonction du cookie s'il existe--> 
<?php include "backend/language.php";?>

<!DOCTYPE html>
<html lang="<?= $lang['language'] ?>">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Site de recettes pour zombies" />
    <link rel="icon" href="./images/assets/favicon.png" type="image/gif" sizes="16x16">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
    />
    <link rel="stylesheet" href="./style/css/style.css" />
    <!--On charge la feuille de style du mode nuit si c'est le theme choisi par l'utilisateur--> 
    <?php if (isset($_COOKIE['theme']) && $_COOKIE["theme"]=="dark") {echo "<link rel=\"stylesheet\" href=\"./style/css/dark.css\" />";}?>    
    <title><?= $lang['mainPage'] ?></title>
  </head>
  <body>
    <!--Navigation-->
    <?php include "backend/components/navigation.php";?>
    
    <!--Image de header-->
    <div class="header-image"></div>

    <!--Barre de recherche-->
    <form class="search form">
      <input
        class="search__input"
        id="searchInput"
        type="search"
        placeholder="<?= $lang['searchRecipe']?>"
        maxlength="60"
        name ="search"
        aria-label="Search recipe input"
      />
      <div class="search__button-list">
        <button onclick="showResults()" id="searchButton" class="search__button" type="submit" aria-label="search">
          <i class="fas fa-search"></i>
        </button>
      </div>
    </form>

    <!--Liste de recettes-->
    <main class="recipe-list" id="recipeList">
      <?php include "backend/recipeAll.php"?>
    </main>

    <!--Modal reglages-->
    <?php include "backend/components/settings.php";?>

    <script src="./javascript/searchAjax.js"></script>
    <script src="./javascript/bookmark.js"></script>
    <script src="./javascript/language.js"></script>
    <script src="./javascript/theme.js"></script>
    <script src="./javascript/settingsModal.js"></script>
    <script src="./javascript/sidebarNav.js"></script>

  </body>
</html>
