<!--link to the start of a seafilmz general webpage template-->
<?php
  $title = 'Alaska State Cities - SeaFilmz';
  $mDesc = 'List of important Alaska cities.';
  $ogTitle = 'Alaska State Cities - SeaFilmz';
  $ogURL = 'https://seafilmz.com/alaska-cities';
  $body = 'MainBody';
  require_once 'templates/main-page-structure.php';
  headerTemp();
?>

    <h1 class="WashingtonCitiesHeader"><b>Alaska State Cities</b></h1>

    <div class="WashingtonCitiesContent">

      <?php
        require_once 'queryfunctions/state-cities-functions.php';
        stateCitiesQuery("Alaska");
      ?>

    </div>

<?php
  // footer display function
  footerTemp();
?>