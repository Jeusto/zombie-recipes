<!DOCTYPE html>
<html lang="<?php if (isset($_COOKIE['language'])) {
              echo $_COOKIE['language'];
            } else {
              echo 'fr';
            } ?>">

<head>
  <!--La langue et les tags-->
  <?php $pageName = "aboutPage";
  include "backend/components/headHtml.php"; ?>
</head>

<body>
  <!--Navigation-->
  <?php include "backend/components/navigation.php"; ?>
  <img class="aboutImage"
       src="images/assets/aboutSite.svg"
       alt="Food truck" />
  <section class="about">
    <h2 class="about__title">Fresh & flesh, <?= $lang["aboutTitle"] ?></h2>
    <p class="about__text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil expedita hic, voluptatibus, minus distinctio neque reprehenderit molestiae dolorum rem similique enim minima.
      Laborum quod possimus labore veritatis distinctio, eaque ipsam reiciendis ullam consequatur quos. Eius ab delectus officiis quam ipsam qui repellendus debitis in quas perferendis mollitia fuga
      quos doloribus quo optio ullam nostrum consequatur tenetur, aut nam blanditiis molestias.</p>
  </section>
  <section class="features">
    <div class="features__card">
      <i class="features__icon fas fa-user-shield"></i>
      <h3 class="features__title"><?= $lang["famousChiefs"] ?></h3>
      <p class="features__description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam, voluptatem. Odit suscipit veritatis officiis culpa pariatur maiores temporibus voluptate facere,
        magnam earum.</p>
    </div>
    <div class="features__card">
      <i class="features__icon fas fa-brain"></i>
      <h3 class="features__title"><?= $lang["bestRecipes"] ?></h3>
      <p class="features__description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam, voluptatem. Odit suscipit veritatis officiis culpa pariatur maiores temporibus voluptate facere,
        magnam earum.</p>
    </div>
    <div class="features__card">
      <i class="features__icon fas fa-users"></i>
      <h3 class="features__title"><?= $lang["communityDriven"] ?></h3>
      <p class="features__description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam, voluptatem. Odit suscipit veritatis officiis culpa pariatur maiores temporibus voluptate facere,
        magnam earum.</p>
    </div>
  </section>

  <!--Modal reglages-->
  <?php include "backend/components/settingsModal.php"; ?>

  <script src="./javascript/language.js"></script>
  <script src="./javascript/theme.js"></script>
  <script src="./javascript/settingsModal.js"></script>
  <script src="./javascript/sidebarNav.js"></script>
</body>

</html>