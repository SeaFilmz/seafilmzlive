<!--link to the start of a seafilmz general webpage template-->
<?php
  $title = 'Alaska State Cities - SeaFilmz'; 
  $mDesc = 'List of important Alaska cities.';
  $body = 'MainBody';
  require_once 'sftemplate.php';
  headerTemp();
?>




    <h2 class="AlaskaCitiesHeader"><b>Alaska State Cities</b></h2>

    <div class="AlaskaCitiesContent">

      <?php $cities = [
        "Anchorage",
        "Juneau",
        "Fairbanks",
      ];

        for ($i = 0; $i < count(cities); $i++) { 
          if (str_contains($cities, "")) { ?>
            <p class="AlaskaCitiesLink"><a href="<?= "{strtolower(cities)}-alaska"; ?>"><?= cities[$i]; ?></a></p>
          <?php }
        } ?>

    </div>

    
<?php
  // footer display function
  footerTemp();
?>