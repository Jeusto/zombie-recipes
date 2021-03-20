<!--Charger la langue en fonction du cookie-->
<?php include "backend/language.php";?>

<!DOCTYPE html>
<html lang="<?php echo $lang['language'] ?>">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Description du site" />
    <link rel="icon" href="./images/assets/favicon.png" type="image/gif" sizes="16x16" />
    <link
      rel="preconnect"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
    />
    <link rel="stylesheet" href="./style/style.css" />
    <?php if (isset($_COOKIE['theme']) && $_COOKIE["theme"]=="dark") {echo "<link rel=\"stylesheet\" href=\"./style/darktheme.css\" />";}?>
    <title>Test</title>
  </head>
  <body>
    <?php include "backend/components/navigation.php";?>

    <?php include "backend/recipeDetails.php";?>

    <!--Details du recette -->
    <div class="details" data-id="recipe<?php echo $recipeId ?>">
      <div class="details__top">
        <button class="details__backBtn" onclick="history.go(-1);">
          <i class="details__backIcon fas fa-arrow-left"></i>Revenir à la page précèdente
        </button>
        <!--<div class="details__share">        
          <a class="details__shareLink" href="https://facebook.com/sharer/sharer.php?u=<?php echo $currentLink ?>" target="_blank" rel="noopener" aria-label="Share on Facebook">
            <i class="details__shareIcon fab fa-facebook-square"></i>
          </a>
          <a class="details__shareLink" href="https://twitter.com/intent/tweet/?text=Message%20ici:&amp;url=<?php echo $currentLink ?>" target="_blank" rel="noopener" aria-label="Share on Twitter">
            <i class="details__shareIcon fab fa-twitter-square"></i>
          </a>
        </div>!-->
      </div>
      <div class="details__img">
        <img src="images/recipes/<?php echo $recipeImageUrl ?>" alt="Recipe image" />
      </div>
      <div class="">
        <div class="details__infolist">
          <div class="details__info"><i class="fas fa-user"></i> <span>par Arhun Saday</span></div>
          <div class="details__info"><i class="fas fa-utensils"></i> <span>Dessert</span></div>
          <div class="details__info"><i class="fas fa-brain"></i> <span>Debutant</span></div>
          <div class="details__info">
            <i class="fas fa-clock"></i>
            <span><?php echo $recipePreparationTime ?>min</span>
          </div>
        </div>
        <h2 class="details__title"><?php echo $recipeName ?></h2>
        <h4 class="details__header">Réalisation du recette</h4>
        <p><?php echo $recipeDescription ?></p>
        <h4 class="details__header">Ingrédiants</h4>
        <table class="styled-table">
          <thead>
            <tr>
              <th>Ingrédiants</th>
              <th>Quantité</th>
            </tr>
          </thead>
          <tbody>
            <?php  
              for ($i=0; $i < count($ingrediants)-1; $i++) { 
                echo "<tr><td>" .ucfirst($ingrediants[$i]) . "</td>" . "<td>" .$quantities[$i] . "</td>"; } 
            ?>
          </tbody>
        </table>
        <h4 class="details__header">Details</h4>
        <p><?php echo $recipeDetails ?></p>
      </div>
    </div>

    <!--Modal reglages-->
    <?php include "backend/components/settings.php";?>

    <script src="./javascript/language.js"></script>
    <script src="./javascript/theme.js"></script>
    <script src="./javascript/userinterface.js"></script>
  </body>
</html>
