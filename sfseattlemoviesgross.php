<!--link to the start of a seafilmz general webpage template-->
<?php
  $title = 'Seattle Movies by Box Office Gross - SeaFilmz'; 
  $mDesc = 'List of movies filmed fully or partly in the city of Seattle organized by total worldwide gross in US dollars.';
  $body = 'MainBody';
  require_once 'sftemplate.php';
  headerTemp();
?>

    <h2 class="MoviesPageHeader">
      <b>
        <a href="seattlemovies">New Movie Data UI Beta</a>
      </b>
    </h2>

        <h2 class="MoviesPageHeader"><b>Movies Filmed in Seattle by Total Worldwide Gross</b></h2>

        <div class="MGTable">
        <table class="MovieGrossTable">
          <tr>
            <th class="MovieGrossColumnHeader1">Title</th>
            <th class="MovieGrossColumnHeader2">Total Wordwide Gross (US Dollars)</th>
          </tr>

        <?php
            // 2. Perform database query
            $query = $newconnection->prepare("SELECT * FROM moviesfilminglocation INNER JOIN movies ON movies.MovieID = moviesfilminglocation.MovieID INNER JOIN filminglocations ON filminglocations.FilmingLocationID = moviesfilminglocation.FilmingLocationID WHERE City = ? AND TotalWorldGross IS NOT NULL ORDER BY TotalWorldGross DESC ");

            $city = 'Seattle';
            $query->bind_param("s", $city);
            $query->execute();

            //Result variable with an error check
            $result = $query->get_result()
              or die("Database query failed.");

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

            // 4. Release returned data
            mysqli_free_result($result);
        ?>

    </table>
    </div>

<?php 
  require 'moviefunctions.php';
  cityMovieGrossTotal('Seattle');
?>

    <!--link to footer-->
<?php
  require_once 'sftemplate.php';
  footerTemp();
?>