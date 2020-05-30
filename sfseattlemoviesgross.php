<?php require_once("db_connection.php"); ?>
<!DOCTYPE html>
<html lang="en">

  <head>
    <!--Connection to Google Analytics.-->
    <?php include "googleanalytics_connection.php"; ?>

    <meta charset="utf-8">
    <title>Seattle Movies by Box Office Gross - SeaFilmz</title>
    <link type="text/css" rel="stylesheet" href="sfcss.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="sfmain.js" defer></script>
  </head>

  <body>
    <header id="MovieGrossTop" class="banner">
      <a href="index.php"><h1>SeaFilmz</h1></a>
      <b class="solgan">Greater Seattle Film, Media, Data</b>

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

        <h2 class="MoviesGrossPageHeader"><b>Movies Filmed in Seattle by Total Worldwide Gross</b></h2>

        <div class="MGTable">
        <table class="MovieGrossTable">
          <tr>
            <th class="MovieGrossColumnHeader1">Title</th>
            <th class="MovieGrossColumnHeader2">Total Wordwide Gross (US Dollars)</th>
          </tr>

        <?php
            // 2. Perform database query
            $query = "SELECT * ";
            $query .= "FROM moviesfilminglocation ";
            $query .= "INNER JOIN movies ";
            $query .= "ON movies.MovieID = moviesfilminglocation.MovieID ";
            $query .= "INNER JOIN filminglocations ";
            $query .= "ON filminglocations.FilmingLocationID = moviesfilminglocation.FilmingLocationID ";
            $query .= "WHERE City = 'Seattle' AND TotalWorldGross IS NOT NULL ";
            $query .= "ORDER BY TotalWorldGross DESC ";
            $result = mysqli_query($connection, $query);
            //Test if there was a query error
            if (!$result) {
                die("Database query failed.");
            }
        ?>

        <?php
            // 3. Use returned data (if any)
            while($movies = mysqli_fetch_assoc($result)) {
                // output data from each row
        ?>

          <tr class="MoviesContent">
            <td class="MovieTitlesContent"><b ><a href= "<?php echo $movies["MoviePageLink"]; ?>"><?php echo $movies["MovieTitle"]; ?></a></b></td>
            <td class="MovieGrossContent">$<?php echo number_format($movies["TotalWorldGross"]); ?></td>
          </tr>

        <?php
            }
        ?>

        <?php
            // 4. Release returned data
            mysqli_free_result($result);
        ?>

    </table>
    </div>

    <div class="MTGTable">
    <table class="MovieTotalGrossTable">
      <tr class="MoviesContent">
        <th class="MovieTotalGrossRowHeader">Total Seattle Movie Gross (US Dollars)</th>      

        <?php
            // 2. Perform database query
            $query = "SELECT SUM(TotalWorldGross) ";
            $query .= "FROM moviesfilminglocation ";
            $query .= "INNER JOIN movies ";
            $query .= "ON movies.MovieID = moviesfilminglocation.MovieID ";
            $query .= "INNER JOIN filminglocations ";
            $query .= "ON filminglocations.FilmingLocationID = moviesfilminglocation.FilmingLocationID ";
            $query .= "WHERE City = 'Seattle' ";
            $result = mysqli_query($connection, $query);
            //Test if there was a query error
            if (!$result) {
                die("Database query failed.");
            } /* else {
                echo "Connected";
            } */
        ?>

        <?php
            // 3. Use returned data (if any)
            while($movies = mysqli_fetch_assoc($result)) {
                // output data from each row
        ?>

        <td class="MovieTotalGrossNumber">$<?php echo number_format($movies["SUM(TotalWorldGross)"]); ?></td>
      </tr>

        <?php
            }
        ?>

        <?php
            // 4. Release returned data
            mysqli_free_result($result);
        ?>

        </table>
        </div>

    <footer>
      <nav class="navigation">
        <ul>
          <li class="NavFooterMobile"><a href="#MovieGrossTop">Go to Top</a></li>

          <!--link to Part of Footer Menu-->
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