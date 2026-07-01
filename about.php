<!--link to the start of a seafilmz general webpage template-->
<?php
  $title = 'About - SeaFilmz';
  $mDesc = 'Info about what is seafilmz and who its founder/developer is.';
  $ogTitle = 'About - SeaFilmz';
  $ogURL = 'https://seafilmz.com/about';
  $schemaType = 'AboutPage';
  $body = 'MainBody';
  require_once 'templates/main-page-structure.php';
  headerTemp();
?>

    <main>
      <section class="AboutPageContent">
        <h2 class="AboutHeader">About SeaFilmz</h2>

        <div class="AboutDescription">
          <ul>
            <li class="AboutPageFirstQuestion">Are you looking to discover more about movies, music or sports?</li>
            <li>Do you want to learn about cities in the Northwest United States?</li>
          </ul>
          
          <p>If you answered yes to either of these questions, welcome to the SeaFilmz website!</p>
          <p>SeaFilmz is a Northwest United States media website with a focus on movies. It is developed by a movie enthusiast who grew up in the Northwest United States.</p>
        </div>
      </section>

      <div class="SecondHeader">
        <button id="HeaderTextSwapButton" class="SecondHeaderButton">SeaFilmz Stand For</button>
      </div>
    </main>

    <script src="/js/website-name-stands-for.js" defer></script>

<?php
  // footer display function
  footerTemp();
?>
