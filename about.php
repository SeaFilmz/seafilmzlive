<!--link to the start of a seafilmz general webpage template-->
<?php
  $title = 'About - SeaFilmz';
  $mDesc = 'Info about what is seafilmz and who its founder/developer is.';
  $ogTitle = 'About - SeaFilmz';
  $ogURL = 'https://seafilmz.com/about';
  $body = 'MainBody';
  require_once 'templates/main-page-structure.php';
  headerTemp();
?>

    <section class="AboutPageContent">
      <h2 class="AboutHeader">About SeaFilmz</h2>

      <div class="AboutDescription">
        <p>Do you enjoy movies, music, or sports?</p>
        <p>Do you watch movies or sports?</p>
        <p>Do you listen to music?</p>
        <p>Do you want to learn about Seattle?</p>
        <p>If you said yes to any of these four questions then this website is for you.</p>
        <p>This website is SeaFilmz which is a media website about Seattle. SeaFilmz is developed by a person who grew up in the greater Seattle area and is a current resident who is into media and is a movie enthusiast.</p>
      </div>
    </section>

    <div class="SecondHeader">
      <button id="HeaderTextSwapButton" class="SecondHeaderButton">SeaFilmz Stand For</button>
    </div>

    <script src="/js/website-name-stands-for.js" defer></script>

<?php
  // footer display function
  footerTemp();
?>
