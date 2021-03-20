<!--Une recette-->
<div class="recipe" data-id="recipe<?php echo $recipeId ?>">
  <div class="recipe__top">
    <img src="images/recipes/<?php echo $recipeImageUrl ?>" alt="" class="recipe__image" />
    <button id="bookmarkBtn<?php echo $recipeId ?>" class="recipe__bookmark-btn <?php echo $recipeIconName ?>"></button>
  </div>
  <div class="recipe__bottom">
    <h3 class="recipe__title"><?php echo $recipeName ?></h3>
    <div class="recipe__info">
      <div class="recipe__difficulty">
        <i class="fas fa-star"></i><i class="<?php if ($recipeDifficulty=="intermediate" || $recipeDifficulty=="advanced") {echo "fas";} else { echo"far";} ?> fa-star"></i><i class="<?php if ($recipeDifficulty=="advanced") {echo "fas";} else { echo"far";} ?> fa-star"></i>
      </div>
      <div class="recipe__time"><i class="far fa-clock"></i><span> <?php echo $recipePreparationTime ?> min</span></div>
      <form action="recipedetails.php" method="get" class="form" enctype="multipart/form-data">
        <button type="submit" name="recipe" value="<?php echo $recipeId ?>" class="recipe__btn" aria-label="search"><?php echo $lang['details'] ?><i class="fas fa-chevron-right"></i></button></a>
      </form>
    </div>
  </div>
</div>

