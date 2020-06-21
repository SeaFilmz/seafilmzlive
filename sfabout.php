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
    <!--link to header-->
<?php require_once("sfheader.php"); ?>


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

    <!--link to footer-->
<?php require_once("sffooter.php"); ?>

  </body>

</html>

<?php
    // 5. Close database connection
    mysqli_close($connection);
?>