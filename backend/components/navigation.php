<!--Navigation en haut-->
<nav class="topnav">
  <a class="topnav__link"
     href="about.php"><i class="topnav__icon fas fa-info-circle fa-fw"></i><?= $lang['about'] ?></a>
  <a class="topnav__link"
     href="submit.php"><i class="topnav__icon fas fa-plus-square fa-fw"></i><?= $lang['submit'] ?></a>
  <button class="topnav__hamburgerBtn fas fa-bars"
          id="openSidenavBtn"
          aria-label="Menu button"></button>
  <a class="topnav__link topnav__logo"
     href="index.php"><img style="width: 2.5rem"
         src="images/assets/logoWebsite.png"
         alt="Main page link" /></a>
  <button class="topnav__cogsBtn fas fa-cog"
          id="openModalBtnMobile"
          aria-label="Settings button"></button>
  <a class="topnav__link"
     href="bookmark.php"><i class="topnav__icon fas fa-bookmark fa-fw"></i><?= $lang['bookmarks'] ?></a>
  <button class="topnav__link"
          id="openModalBtn"
          tabindex="0"><i class="topnav__icon fas fa-cog fa-fw"></i><?= $lang['settings'] ?></button>
</nav>

<!--Navigation mobile a gauche-->
<nav class="sidenav"
     id="sidenav">
  <div class="sidenav__content"
       id="sidenavContent">
    <button tabindex="111"
            class="sidenav__closeBtn fas fa-times"
            id="sidenavCloseBtn"
            aria-label="Close side bar button"></button>
    <a class="sidenav__link"
       href="about.php"><i class="sidenav__icon fas fa-info-circle fa-fw"></i><?= $lang['about'] ?></a>
    <a class="sidenav__link"
       href="submit.php"><i class="sidenav__icon fas fa-plus-square fa-fw"></i><?= $lang['submit'] ?></a>
    <a class="sidenav__link"
       href="bookmark.php"><i class="sidenav__icon fas fa-bookmark fa-fw"></i><?= $lang['bookmarks'] ?></a>
  </div>
</nav>