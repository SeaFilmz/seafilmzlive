<!--link to the start of a seafilmz general webpage template-->
<?php
  $title = 'Alaska State Cities - SeaFilmz'; 
  $mDesc = 'SeaFilmz is your Seattle media connection with a focus on film.';
  $body = 'MainBody';
  require_once 'sftemplate.php';
  headerTemp();
?>

    <h2 class="WashingtonCitiesHeader"><b>Alaska State Cities</b></h2>

    <div class="WashingtonCitiesContent">


      <?php
        require_once 'queryfunctions/statecitiesfunction.php';
        stateCitiesQuery("Alaska");
      ?>


    </div>

<?php
  // footer display function
  footerTemp();
?>