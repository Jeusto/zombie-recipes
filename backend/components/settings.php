<div class="settings" id="settingsModal">
  <div class="settings__content">
    <div class="settings__closebtn" id="settingsModalClose">
      <span class="fas fa-times"></span>
    </div>
    <h1 class="settings__title"><?php echo $lang['settings'] ?></h1>
    <div class="settings__item">
      <h3 class="settings__item-texte"><?php echo $lang['darkMode'] ?></h3>
      <label class="switch">
        <input id="darkmodeCheckbox" type="checkbox"         
        <?php 
        if (isset($_COOKIE['theme']) && ($_COOKIE['theme']== "dark")) {
          echo ("checked=\"checked\"");
        }
        ?> />
        <span class="slider round"></span>
      </label>
    </div>
    <div class="settings__item">
      <h3 class="settings__item-texte"><?php echo $lang['chooseLanguage'] ?></h3>
      <div class="settings__language">
        <img id="frLanguage" class="settings__flag 
        <?php 
        if (isset($_COOKIE['language']) && ($_COOKIE['language']== "fr")) {
          echo ("settings__flag--active");
        } else if (!isset($_COOKIE['language'])) {
          echo ("settings__flag--active");
        } 
        ?>" 
        src="./images/assets/fr.svg" alt="" />
        <img
          id="enLanguage"
          class="settings__flag <?php if (isset($_COOKIE['language']) && ($_COOKIE['language']== "en")) { echo ("settings__flag--active"); }?>"
          src="./images/assets/gb.svg"
          alt=""
        />
        <img id="esLanguage" class="settings__flag <?php if (isset($_COOKIE['language']) && ($_COOKIE['language']== "es")) { echo ("settings__flag--active"); }?>" src="./images/assets/es.svg" alt="" />
      </div>
    </div>
  </div>
</div>