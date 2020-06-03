<?php require_once("db_connection.php"); ?>
<!DOCTYPE html>
<html lang="en">

  <head>
    <!--Connection to Google Analytics.-->
    <?php include "googleanalytics_connection.php"; ?>

    <meta charset="utf-8">
    <meta name="description" content="Fact page about the city of Shoreline (northwest bordering city of Seattle).">
    <title>Shoreline - SeaFilmz</title>
    <link type="text/css" rel="stylesheet" href="sfcss.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="sfmain.js" defer></script>
  </head>

  <body>
    <header id="ShorelineTop" class="banner">
      <a href="index.php"><h1>SeaFilmz</h1></a>
      <b class="solgan">Your Seattle Film and Data Connection</b>

    link to mobile menu
<?php require_once("sfmobilemenu.php"); ?>

      <nav class="navigation">
        <div class="dropdown">
          <span class="NavMobile">Movies Filmed in Seattle</span><div class="upsideDownTriangle"></div>
          <div class="dropdown-content">
            <p><a href="sfseattlemovies.php">by Title</a></p>
            <p><a href="sfseattlemoviesyear.php">by Year Released</a></p>
            <p><a href="sfseattlemoviesruntime.php">by Runtime</a></p>
            <p><a href="sfseattlemoviesgross.php">by Total Worldwide Gross</a></p>
          </div>
        </div>
        <div class="dropdown">
          <span class="NavMobile">Seattle Born</span><div class="upsideDownTriangle"></div>
          <div class="dropdown-content">
            <p><a href="sfseattleactors.php">Actors</a></p>
            <p><a href="sfseattlemusicians.php">Musicians</a></p>
            <p><a href="sfseattleathletes.php">Athletes</a></p>
          </div>
        </div>
        <div class="dropdown">
          <span class="NavMobile">City Facts</span><div class="upsideDownTriangle"></div>
          <div class="dropdown-content">
            <p><a href="seattlefunfacts.php">Seattle</a></p>
            <p><a href="shoreline.php">Shoreline</a></p>
            <p><a href="lfp.php">Lake Forest Park</a></p>
            <p><a href="tukwila.php">Tukwila</a></p>
            <p><a href="burien.php">Burien</a></p>
            <p><a href="seatac.php">SeaTac</a></p>
            <p><a href="mercerisland.php">Mercer Island</a></p>
            <p><a href="medina.php">Medina</a></p>
            <p><a href="bellevue.php">Bellevue</a></p>
          </div>
        </div>
      </nav>
    </header>

    <h2 class="ShorelineHeader">City of Shoreline (Northwest Bordering City of Seattle)</h2>

		<div class="ShorelineContent">
		  <p><b>Officially Became a City:</b> August 31, 1995</p>
		  <p><b>County:</b> <a href="http://www.kingcounty.gov/">King</a></p>
		  <p><b>State:</b> <a href="http://access.wa.gov/">Washington</a></p>
		  <p><b>Country:</b> <a href="https://www.usa.gov/">United States of America</a></p>
		  <p><b>Website:</b> <a href="http://www.shorelinewa.gov/">www.shorelinewa.gov</a></p>
      <p><b>College:</b> <a href="http://www.shoreline.edu/">Shoreline Community College</a></p>
      <p><b>Libraries:</b>
        <a href="https://kcls.org/locations/1535/">Shoreline Library</a>,
        <a href="https://kcls.org/locations/1532/">Richmond Beach Library</a>
      </p>
		  <p><b>Movies Filmed in Shoreline:</b> <a href="sflaggies.php">Laggies</a></p>
      <p><b>Movie Theaters in Shoreline:</b> <a href="https://www.landmarktheatres.com/seattle/crest-cinema-center">Landmark Crest Cinema Center</a></p>
      <p><b>Bowling Alley:</b> <a href="http://spinalleybowling.com">Spin Alley</a></p>
		</div>

        <?php     
            // 4. Release returned data
            mysqli_free_result($result);
        ?>

    <footer>
      <nav class="navigation">
        <ul>
          <li class="NavFooterMobile"><a href="#ShorelineTop">Go to Top</a></li>

          <?php require_once("sffootermenu.php"); ?>
        </ul>
      </nav>
    </footer>

  </body>

</html>

<?php
    // 5. Close database connection
    mysqli_close($connection);
?>