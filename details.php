<!DOCTYPE html>
  <html lang="<?php if (isset($_COOKIE['language'])) {echo $_COOKIE['language'];} else {echo 'fr';}?>">
  <head>
    <!--La langue et les tags-->
    <?php $pageName = "detailsPage"; 
    include "backend/components/headHtml.php";?>
  </head>
  <body>
    <!--Navigation-->
    <?php include "backend/components/navigation.php";?>

    <!--Details du recette -->
    <?php include "backend/recipeDetails.php";?>
    <main class="details" data-id="recipe<?= $recipeId ?>">
      <section class="details__top">
        <button class="details__backBtn" onclick="history.go(-1);">
          <i class="details__backIcon fas fa-arrow-left"></i><?= $lang["backLastPage"] ?>
        </button>
        <div class="details__share">        
          <a class="details__shareLink" href="https://facebook.com/sharer/sharer.php?u=<?= $currentLink ?>" target="_blank" rel="noopener" aria-label="Share on Facebook">
            <i class="details__shareIcon fab fa-facebook-square"></i>
          </a>
          <a class="details__shareLink" href="https://twitter.com/intent/tweet/?text=Message%20ici:&amp;url=<?= $currentLink ?>" target="_blank" rel="noopener" aria-label="Share on Twitter">
            <i class="details__shareIcon fab fa-twitter-square"></i>
          </a>
        </div>
      </section>
      <figure class="details__img">
        <img src="images/recipes/<?= $recipeImageUrl ?>" alt="Recipe image" />
      </figure>
      <section class="">
        <div class="details__infolist">
          <div class="details__info"><i class="fas fa-user"></i> <span><?= $lang['by'] ." ". $userFirstName." ".$userLastName?></span></div>
          <div class="details__info"><i class="fas fa-calendar"></i> <span><?= $publishedDate ?></span></div>
          <div class="details__info"><i class="fas fa-utensils"></i> <span><?= $lang[$recipeType] ?></span></div>
          <div class="details__info"><i class="fas fa-brain"></i> <span><?= $lang[$recipeDifficulty] ?></span></div>
          <div class="details__info">
            <i class="fas fa-clock"></i>
            <span><?= $recipePreparationTime." " ?>min</span>
          </div>
        </div>
        <h2 class="details__title"><?= $recipeName ?></h2>
        <h4 class="details__header"><?= $lang["recipeRealization"] ?></h4>
        <p class="details__text"><?= $recipeDescription ?></p>
        <hr>
        <h4 class="details__header"><?= $lang["ingrediants"] ?></h4>
        <table class="styled-table">
          <thead>
            <tr>
              <th><?= $lang["ingrediantsTable"] ?></th>
              <th><?= $lang["quantitiesTable"] ?></th>
            </tr>
          </thead>
          <tbody>
            <?php  
              for ($i=0; $i < count($ingrediants)-1; $i++) { 
                echo "<tr><td>" .ucfirst($ingrediants[$i]) . "</td>" . "<td>" .$quantities[$i] . "</td>"; } 
            ?>
          </tbody>
        </table>
        <?php if (!empty($recipeDetails)) {echo "<h4 class=\"details__header\">" . $lang["precisions"] . "</h4><p class=\"details__text\">" . $recipeDetails . "</p>";}?>
      </section>
    </main>

    <!--Modal reglages-->
    <?php include "backend/components/settingsModal.php";?>

    <script src="./javascript/language.js"></script>
    <script src="./javascript/theme.js"></script>
    <script src="./javascript/settingsModal.js"></script>
    <script src="./javascript/sidebarNav.js"></script>
  </body>
</html>
