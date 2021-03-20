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
    <title><?php echo $lang['aboutPage'] ?></title>
  </head>
  <body>
    <?php include "backend/components/navigation.php";?>

    <!--Modal reglages-->
    <?php include "backend/components/settings.php";?>

    <script src="./javascript/language.js"></script>
    <script src="./javascript/theme.js"></script>
    <script src="./javascript/userinterface.js"></script>
  </body>
</html>