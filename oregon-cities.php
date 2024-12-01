<!--link to the start of a seafilmz general webpage template-->
<?php
  $title = 'Oregon State Cities - SeaFilmz'; 
  $mDesc = 'List of important Oregon cities.';
  $body = 'MainBody';
  require_once 'sftemplate.php';
  headerTemp();
?>

		<h2 class="OregonCitiesHeader"><b>Oregon State Cities</b></h2>

    <div class="OregonCitiesContent">

      <?php $cities = [
          "Portland",
          "Salem",
          "Eugene",
          "Gresham",
          "Happy Valley",
          "Milwaukie",
          "Lake Oswego",
          "Tigard",
          "Beaverton",
          "Corvallis",
        ];

        for ($i = 0; $i < count(cities); $i++) { 
          if (str_contains($cities, "")) { ?>
            <p class="OregonCitiesLink"><a href="<?= "{strtolower(cities)}-oregon"; ?>"><?= cities[$i]; ?></a></p>
          <?php } else { ?>
            <p class="OregonCitiesLink"><a href="<?= "{str_replace(' ', '-', strtolower(cities)}-oregon"; ?>"><?= cities[$i]; ?></a></p>
          <?php }
        } ?>

    </div>

<?php
  // footer display function
  footerTemp();
?>