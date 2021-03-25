<!--Navigation en haut-->
<div class="topnav">
  <button class="topnav__hamburger fas fa-bars" id="topnavHamburger"></button>
  <button class="topnav__cogs fas fa-cog" id="topnavCogs"></button>
  <a class="topnav__link" href="about.php"
    ><i class="topnav__icon fas fa-info-circle fa-fw"></i><?= $lang['about'] ?></a
  >
  <a class="topnav__link" href="submit.php"
    ><i class="topnav__icon fas fa-plus-square fa-fw"></i><?= $lang['submit'] ?></a
  >
  <a class="topnav__link--active topnav__logo" href="index.php"
    ><img src="images/assets/logosite.png" style="width: 2.5rem" alt=""
  /></a>
  <a class="topnav__link" href="bookmark.php"
    ><i class="topnav__icon fas fa-bookmark fa-fw"></i><?= $lang['bookmarks'] ?></a
  >
  <a class="topnav__link" id="settingsModal__button"
    ><i class="topnav__icon fas fa-cog fa-fw"></i><?= $lang['settings'] ?></a
  >
</div>

<!--Navigation mobile a gauche-->
<div class="sidenav" id="sidenav">
  <div class="sidenav__content" id="sidenavContent">
    <button class="sidenav__close fas fa-times" id="sidenavClose"></button>
    <a class="sidenav__link" href="about.php"
      ><i class="sidenav__icon fas fa-info-circle fa-fw"></i><?= $lang['about'] ?></a
    >
    <a class="sidenav__link" href="submit.php"
      ><i class="sidenav__icon fas fa-plus-square fa-fw"></i><?= $lang['submit'] ?></a
    >
    <a class="sidenav__link" href="bookmark.php"
      ><i class="sidenav__icon fas fa-bookmark fa-fw"></i><?= $lang['bookmarks'] ?></a
    >
  </div>
</div>