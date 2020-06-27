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
    <!--link to header-->
<?php require_once("sfheader.php"); ?>


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

    <!--link to footer-->
<?php require_once("sffooter.php"); ?>

  </body>

</html>

<?php
    // 5. Close database connection
    mysqli_close($connection);
?>