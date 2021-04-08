<!DOCTYPE html>
  <html lang="<?php if (isset($_COOKIE['language'])) {echo $_COOKIE['language'];} else {echo 'fr';}?>">
  <head>
    <!--La langue et les tags-->
    <?php $pageName = "bookmarkPage"; 
    include "backend/components/headHtml.php";?>
  </head>
  <body>
    <!--Navigation-->
    <?php include "backend/components/navigation.php";?>
    
    <!--Liste de recettes-->
    <main class="recipe-list" id="recipeList">
      <?php include "backend/recipeBookmark.php";?>
    </main>
    
    <!--Modal reglages-->
    <?php include "backend/components/settingsModal.php";?>

    <script src="./javascript/bookmark.js"></script>
    <script src="./javascript/language.js"></script>
    <script src="./javascript/theme.js"></script>
    <script src="./javascript/settingsModal.js"></script>
    <script src="./javascript/sidebarNav.js"></script>
  </body>
</html>
