<?php require_once("db_connection.php"); ?>
<!DOCTYPE html>
<html lang="en">

  <head>
    <title>Seattle Movies by Title - SeaFilmz</title>
    <meta name="description" content="List of movies filmed fully or partly in the city of Seattle organized by title.">

    <!--link to part of my head-->
<?php require_once "sfhead.php"; ?>


  <body>
    <!--link to header-->
<?php require_once("sfheader.php"); ?>


    <h2 class="MoviesPageHeader"><b>Movies Filmed in Seattle by Title</b></h2>
        
    <div class="MTTable">
    <table class="MovieTitlesTable">
      <tr>
        <th class="MovieTitlesColumnHeader1">Title</th>
        <th class="MovieTitlesColumnHeader2">Year</th>
      </tr>

        <?php
            // 2. Perform database query
            $query = "SELECT * ";
            $query .= "FROM moviesfilminglocation ";
            $query .= "INNER JOIN movies ";
            $query .= "ON movies.MovieID = moviesfilminglocation.MovieID ";
            $query .= "INNER JOIN filminglocations ";
            $query .= "ON filminglocations.FilmingLocationID = moviesfilminglocation.FilmingLocationID ";
            $query .= "WHERE City = 'Seattle' ";
            $query .= "ORDER BY MovieTitle ASC ";
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

      <tr class="MoviesContent">
        <td class="MovieTitlesContent"><b><a href= "<?php echo $movies["MoviePageLink"]; ?>"><?php echo $movies["MovieTitle"]; ?></a></b></td>
        <td class="MovieYearContent"><?php echo $movies["YearReleased"]; ?></td>
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

        <!--link to Total Movie Count-->
<?php require("sfmoviescount.php"); ?>

    <h2 class="MoviesPageHeader"><b>Movies Filmed in Seattle by Year</b></h2>

    <div class="MYTable">
    <table class="MovieYearTable">
      <tr>
        <th class="MovieYearColumnHeader1">Title</th>
        <th class="MovieYearColumnHeader2">Year</th>
      </tr>

        <?php
            // 2. Perform database query
            $query = "SELECT * ";
            $query .= "FROM moviesfilminglocation ";
            $query .= "INNER JOIN movies ";
            $query .= "ON movies.MovieID = moviesfilminglocation.MovieID ";
            $query .= "INNER JOIN filminglocations ";
            $query .= "ON filminglocations.FilmingLocationID = moviesfilminglocation.FilmingLocationID ";
            $query .= "WHERE City = 'Seattle' ";
            $query .= "ORDER BY YearReleased DESC, MovieTitle ";
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
        <td class="MovieTitlesContent"><b><a href= "<?php echo $movies["MoviePageLink"]; ?>"><?php echo $movies["MovieTitle"]; ?></a></b></td>
        <td class="MovieYearContent"><?php echo $movies["YearReleased"]; ?></td>
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

        <!--link to Total Movie Count-->
<?php require("sfmoviescount.php"); ?>


    <!--link to footer-->
<?php require_once("sffooter.php"); ?>

  </body>

</html>

<?php
    // 5. Close database connection
    mysqli_close($connection);
?>