<!DOCTYPE html>
  <html lang="<?php if (isset($_COOKIE['language'])) {echo $_COOKIE['language'];} else {echo 'fr';}?>">
  <head>
    <!--La langue et les tags-->
    <?php $pageName = "mainPage"; 
    include "backend/components/headHtml.php";?>
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
    <?php include "backend/components/settingsModal.php";?>

    <script src="./javascript/searchAjax.js"></script>
    <script src="./javascript/bookmark.js"></script>
    <script src="./javascript/language.js"></script>
    <script src="./javascript/theme.js"></script>
    <script src="./javascript/settingsModal.js"></script>
    <script src="./javascript/sidebarNav.js"></script>
  </body>
</html>
