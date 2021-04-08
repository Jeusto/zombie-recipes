<!--Modal reglages-->
<div class="settings" id="settingsModal">
  <div class="settings__content">
    <button style="background-color:none;" class="settings__closebtn" id="settingsModalClose" tabindex="0">
      <span class="fas fa-times" ></span>
    </button>
    <h1 class="settings__title"><?= $lang['settings'] ?></h1>
    <div class="settings__item">
      <h3 class="settings__item-texte"><?= $lang['darkMode'] ?></h3>
      <label class="switch" tabindex="0">
        <input id="darkmodeCheckbox" type="checkbox" aria-label="Switch dark mode button"         
        <?php 
        if (isset($_COOKIE['theme']) && ($_COOKIE['theme']== "dark")) {
          echo ("checked=\"checked\"");
        }
        ?> />
        <span class="slider round"></span>
      </label>
    </div>
    <div class="settings__item">
      <h3 class="settings__item-texte"><?= $lang['chooseLanguage'] ?></h3>
      <div class="settings__language">
        <input type="image" id="frLanguage" class="settings__flag 
        <?php 
        if (isset($_COOKIE['language']) && ($_COOKIE['language']== "fr")) {
          echo ("settings__flag--active");
        } else if (!isset($_COOKIE['language'])) {
          echo ("settings__flag--active");
        } 
        ?>" 
        src="./images/assets/flagFR.svg" alt="French flag" tabindex="0"/>
        <input type="image"
          id="enLanguage"
          class="settings__flag <?php if (isset($_COOKIE['language']) && ($_COOKIE['language']== "en")) { echo ("settings__flag--active"); }?>"
          src="./images/assets/flagGB.svg"
          alt="English flag"
          tabindex="0"
        />
        <input type="image" id="esLanguage" class="settings__flag <?php if (isset($_COOKIE['language']) && ($_COOKIE['language']== "es")) { echo ("settings__flag--active"); }?>" src="./images/assets/flagES.svg" alt="Spanish flag" tabindex="0"/>
      </div>
    </div>
  </div>
</div>