<!--Navigation en haut-->
<div class="topnav">
  <span class="topnav__hamburger fas fa-bars" id="topnavHamburger"></span>
  <span class="topnav__cogs fas fa-cog" id="topnavCogs"></span>
  <a class="topnav__link" href="about.php"
    ><i class="topnav__icon fas fa-info-circle fa-fw"></i><?php echo $lang['about'] ?></a
  >
  <a class="topnav__link" href="submit.php"
    ><i class="topnav__icon fas fa-plus-square fa-fw"></i><?php echo $lang['submit'] ?></a
  >
  <a class="topnav__link--active topnav__logo" href="index.php"
    ><img src="images/assets/logosite.png" style="width: 2.5rem" alt=""
  /></a>
  <a class="topnav__link" href="bookmark.php"
    ><i class="topnav__icon fas fa-bookmark fa-fw"></i><?php echo $lang['bookmarks'] ?></a
  >
  <a class="topnav__link" id="settingsModal__button"
    ><i class="topnav__icon fas fa-cog fa-fw"></i><?php echo $lang['settings'] ?></a
  >
</div>

<!--Navigation mobile a gauche-->
<div class="sidenav" id="sidenav">
  <div class="sidenav__content" id="sidenavContent">
    <span class="sidenav__close fas fa-times" id="sidenavClose"></span>
    <a class="sidenav__link" href="about.php"
      ><i class="sidenav__icon fas fa-info-circle fa-fw"></i><?php echo $lang['about'] ?></a
    >
    <a class="sidenav__link" href="submit.php"
      ><i class="sidenav__icon fas fa-plus-square fa-fw"></i><?php echo $lang['submit'] ?></a
    >
    <a class="sidenav__link" href="bookmark.php"
      ><i class="sidenav__icon fas fa-bookmark fa-fw"></i><?php echo $lang['bookmarks'] ?></a
    >
  </div>
</div>