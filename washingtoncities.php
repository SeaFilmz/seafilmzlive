<?php require_once("db_connection.php"); ?>
<!DOCTYPE html>
<html lang="en">

  <head>
    <!--Connection to Google Analytics.-->
    <?php include "googleanalytics_connection.php"; ?>

    <meta charset="utf-8">
    <meta name="description" content="SeaFilmz is your Seattle media connection with a focus on film.">
    <title>Washington State Cities - SeaFilmz</title>
    <link type="text/css" rel="stylesheet" href="sfcss.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="sfmain.js" defer></script>
  </head>

  <body>
    <!--link to header-->
<?php require_once("sfheader.php"); ?>

        <?php         
            // 4. Release returned data
            mysqli_free_result($result);
        ?>

    <h2 class="WashingtonCitiesHeader"><b>Other Washington State Cities</b></h2>

    <div class="WashingtonCitiesContent">

      <p class="WashingtonCitiesLink"><a href="shoreline">Shoreline</a></p>

      <p class="WashingtonCitiesLink"><a href="lfp">Lake Forest Park</a></p>

      <p class="WashingtonCitiesLink"><a href="tukwila">Tukwila</a></p>

      <p class="WashingtonCitiesLink"><a href="burien">Burien</a></p>

      <p class="WashingtonCitiesLink"><a href="seatac">SeaTac</a></p>

      <p class="WashingtonCitiesLink"><a href="mercerisland">Mercer Island</a></p>

      <p class="WashingtonCitiesLink"><a href="medina">Medina</a></p>

      <p class="WashingtonCitiesLink"><a href="bellevue">Bellevue</a></p>

    </div>

    <!--link to footer-->
<?php require_once("sffooter.php"); ?>

  </body>

</html>