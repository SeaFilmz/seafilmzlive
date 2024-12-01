<!--link to the start of a seafilmz general webpage template-->
<?php
  $title = 'Washington State Cities - SeaFilmz'; 
  $mDesc = 'SeaFilmz is your Seattle media connection with a focus on film.';
  $body = 'MainBody';
  require_once 'sftemplate.php';
  headerTemp();
?>

    <h2 class="WashingtonCitiesHeader"><b>Other Washington State Cities</b></h2>

    <div class="WashingtonCitiesContent">

      <?php $cities = [
        "Seattle",
        "Shoreline",
        "Lake Forest Park",
        "Tukwila",
        "Burien",
        "SeaTac",
        "Mercer Island",
        "Medina",
        "Bellevue",
        "Renton",
        "Kirkland",
        "Kenmore",
        "Olympia",
        "Spokane",
        "Vancouver",
        "Pullman",
        "Bellingham",
        "Bothell",
        "Edmonds",
        "Woodway",
        "Lynnwood",
        "Gig Harbor",
      ];

      for ($i = 0; $i < count(cities); $i++) { 
        if (str_contains($cities, "")) { ?>
          <p class="WashingtonCitiesLink"><a href="<?= "{strtolower(cities)}-washington"; ?>"><?= cities[$i]; ?></a></p>
        <?php } else { ?>
          <p class="WashingtonCitiesLink"><a href="<?= "{str_replace(' ', '-', strtolower(cities)}-washington"; ?>"><?= cities[$i]; ?></a></p>
        <?php }
      } ?>

    </div>
    
<?php
  // footer display function
  footerTemp();
?>
