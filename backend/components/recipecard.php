<!--Une recette-->
<div class="recipe" data-id="recipe<?= $recipeId ?>">
  <div class="recipe__top">
    <img src="images/recipes/<?= $recipeImageUrl ?>" alt="Recipe image" class="recipe__image" />
    <button id="bookmarkBtn<?= $recipeId ?>" class="recipe__bookmark-btn <?= $recipeIconName ?>" aria-label="Bookmark button"></button>
  </div>
  <div class="recipe__bottom">
    <h3 class="recipe__title"><?= $recipeName ?></h3>
    <div class="recipe__info">
      <div class="recipe__difficulty">
        <i class="fas fa-star"></i><i class="<?php if ($recipeDifficulty=="intermediate" || $recipeDifficulty=="advanced") {echo "fas";} else { echo"far";} ?> fa-star"></i><i class="<?php if ($recipeDifficulty=="advanced") {echo "fas";} else { echo"far";} ?> fa-star"></i>
      </div>
      <div class="recipe__time"><i class="far fa-clock"></i><span> <?= $recipePreparationTime ?> min</span></div>
      <a href="/details.php?recipe=<?= $recipeId ?>" name="recipe" value="<?= $recipeId ?>" class="recipe__btn" aria-label="search"><?= $lang['details'] ?><i class="fas fa-chevron-right"></i></a></a>
    </div>
  </div>
</div>

