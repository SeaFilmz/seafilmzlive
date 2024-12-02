<!--link to the start of a seafilmz general webpage template-->
<?php
  $title = 'Washington State Cities - SeaFilmz'; 
  $mDesc = 'List of important Washington state cities.';
  $body = 'MainBody';
  require_once 'sftemplate.php';
  headerTemp();
?>

    <h2 class="WashingtonCitiesHeader"><b>Washington State Cities</b></h2>

    <div class="WashingtonCitiesContent">

      <?php
        require_once 'queryfunctions/statecitiesfunction.php';
        stateCitiesQuery("Washington");
      ?>

    </div>
 
<?php
  // footer display function
  footerTemp();
?>