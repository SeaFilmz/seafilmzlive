<!--link to the start of a seafilmz general webpage template-->
<?php
  $title = 'Washington State Cities - SeaFilmz';
  $mDesc = 'List of important Washington state cities.';
  $ogTitle = 'Washington State Cities - SeaFilmz';
  $ogURL = 'https://seafilmz.com/washington-cities';
  $body = 'MainBody';
  require_once 'templates/main-page-structure.php';
  headerTemp();
?>

    <h1 class="StateCitiesHeader"><b>Washington State Cities</b></h1>

    <div class="StateCitiesContent">

      <?php
        require_once 'queryfunctions/state-cities-functions.php';
        stateCitiesQuery("Washington");
      ?>

    </div>

<?php
  // footer display function
  footerTemp();
?>