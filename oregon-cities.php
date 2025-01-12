<!--link to the start of a seafilmz general webpage template-->
<?php
  $title = 'Oregon State Cities - SeaFilmz';
  $mDesc = 'List of important Oregon cities.';
  $body = 'MainBody';
  require_once 'sftemplate.php';
  headerTemp();
?>

    <h1 class="OregonCitiesHeader"><b>Oregon State Cities</b></h1>

    <div class="OregonCitiesContent">

      <?php
        require_once 'queryfunctions/statecitiesfunction.php';
        stateCitiesQuery("Oregon");
      ?>

    </div>

<?php
  // footer display function
  footerTemp();
?>