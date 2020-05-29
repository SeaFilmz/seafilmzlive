<?php require_once("db_connection.php"); ?>
<!DOCTYPE html>
<html lang="en">

  <head>
    <!--Connection to Google Analytics.-->
    <?php include "googleanalytics_connection.php"; ?>

    <meta charset="utf-8">
    <title>About - SeaFilmz</title>
    <link type="text/css" rel="stylesheet" href="sfcss.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="sfmain.js" defer></script>
  </head>

  <body>
    <header id="SeattleAboutTop" class="banner">
      <h1><a href="index.php">SeaFilmz</a></h1>
      <b class="solgan">Your Seattle Film and Data Connection</b>

      <!--link to mobile menu-->
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

    <section class="aboutpagecontent">
      <h2 class="AboutHeader">About SeaFilmz</h2>

      <div class="aboutbio">
        <div class="biofacts"><span>Founder/Developer: </span>Daniel Schmidt</div>
        <div class="biofacts"><span>LinkedIn: </span><a href="https://www.linkedin.com/in/danls20">linkedin.com/in/danls20</a></div>
      </div>

      <div class="AboutDescription">
        <p>Do you enjoy movies, music, or sports? Do you watch movies or sports? Do you listen music? Do you want to learn about Seattle? If you said yes to any of these four questions then this website is for you.</p>
        <p>This website is SeaFilmz which is a media website about Seattle. SeaFilmz is developed by a person who grew up in the greater Seattle area and is a current resident who is into media and is a movie enthusiast.</p>
      </div>
    </section>

    <div id="secondHeader">
      <button onclick="headerSwitchText()">SeaFilmz Stand For</button>
    </div>

    <footer>
      <nav class="navigation">
        <ul>
          <li class="NavFooterMobile"><a href="#SeattleAboutTop">Go to Top</a></li>

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