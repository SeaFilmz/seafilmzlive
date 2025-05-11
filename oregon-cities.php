<!--link to the start of a seafilmz general webpage template-->
<?php
  $title = 'Oregon State Cities - SeaFilmz';
  $mDesc = 'List of important Oregon cities.';
  $ogTitle = 'Oregon State Cities - SeaFilmz';
  $ogURL = 'https://seafilmz.com/oregon-cities';
  $body = 'MainBody';
  require_once 'templates/main-page-structure.php';
  headerTemp();
?>

    <h1 class="OregonCitiesHeader"><b>Oregon State Cities</b></h1>

    <div class="OregonCitiesContent">

      <?php
        require_once 'queryfunctions/state-cities-functions.php';
        stateCitiesQuery("Oregon");
      ?>

    </div>

<?php
  // footer display function
  footerTemp();
?>