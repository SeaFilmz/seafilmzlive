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
    <header id="WashingtonCitiesTop" class="banner">	
      <a href="/"><h1>SeaFilmz</h1></a>
      <b class="solgan">Your Seattle Film and Data Connection</b>

    <!--link to desktop and mobile menu in header-->
<?php require_once("sfmenu.php"); ?>

    </header>

        <?php         
            // 4. Release returned data
            mysqli_free_result($result);
        ?>

    <h2 class="WashingtonCitiesHeader"><b>Other Washington State Cities</b></h2>

    <div class="WashingtonCitiesContent">

      <p class="WashingtonCitiesLink"><a href="shoreline.php">Shoreline</a></p>

      <p class="WashingtonCitiesLink"><a href="lfp.php">Lake Forest Park</a></p>

      <p class="WashingtonCitiesLink"><a href="tukwila.php">Tukwila</a></p>

      <p class="WashingtonCitiesLink"><a href="burien.php">Burien</a></p>

      <p class="WashingtonCitiesLink"><a href="seatac.php">SeaTac</a></p>

      <p class="WashingtonCitiesLink"><a href="mercerisland.php">Mercer Island</a></p>

      <p class="WashingtonCitiesLink"><a href="medina.php">Medina</a></p>

      <p class="WashingtonCitiesLink"><a href="bellevue.php">Bellevue</a></p>

    </div>

    <footer>
      <nav class="navigation"> 
        <ul>
          <li class="NavFooterMobile"><a href="#WashingtonCitiesTop">Go to Top</a></li>

          <?php require_once("sffootermenu.php"); ?>
        </ul>
      </nav>
    </footer> 

  </body>

</html>