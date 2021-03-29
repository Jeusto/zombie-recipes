<!DOCTYPE html>
  <html lang="<?php if (isset($_COOKIE['language'])) {echo $_COOKIE['language'];} else {echo 'fr';}?>">
  <head>
    <!--La langue et les tags-->
    <?php $pageName = "aboutPage"; 
    include "backend/components/head.php";?>
  </head>
  <body>
    <!--Navigation-->
    <?php include "backend/components/navigation.php";?>
    
    <!--Modal reglages-->
    <?php include "backend/components/settings.php";?>

    <script src="./javascript/language.js"></script>
    <script src="./javascript/theme.js"></script>
    <script src="./javascript/settingsModal.js"></script>
    <script src="./javascript/sidebarNav.js"></script>
  </body>
</html>
