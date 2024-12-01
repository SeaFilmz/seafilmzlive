<!--link to the start of a seafilmz general webpage template-->
<?php
  $title = 'Idaho State Cities - SeaFilmz'; 
  $mDesc = 'List of important Idaho cities.';
  $body = 'MainBody';
  require_once 'sftemplate.php';
  headerTemp();
?>




    <h2 class="IdahoCitiesHeader"><b>Idaho State Cities</b></h2>

    <div class="IdahoCitiesContent">

      <?php $cities = [
        "Boise",
        "Moscow",
        "Meridian",
        "Garden City",
        "Eagle",
        "Pocatello",
      ];

        for ($i = 0; $i < count(cities); $i++) { 
          if (str_contains($cities, "")) { ?>
            <p class="IdahoCitiesLink"><a href="<?= "{strtolower(cities)}-idaho"; ?>"><?= cities[$i]; ?></a></p>
          <?php } else { ?>
            <p class="IdahoCitiesLink"><a href="<?= "{str_replace(' ', '-', strtolower(cities)}-idaho"; ?>"><?= cities[$i]; ?></a></p>
          <?php }
        } ?>

      <p class="IdahoCitiesLink"><a href="coeurdalene-idaho">Coeur d'Alene</a></p>

    </div>

    
<?php
  // footer display function
  footerTemp();
?>