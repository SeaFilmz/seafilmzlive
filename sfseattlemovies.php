<!--link to the start of a seafilmz general webpage template-->
<?php
  $title = 'Seattle Movies by Title or Year - SeaFilmz'; 
  $mDesc = 'List of movies filmed fully or partly in the city of Seattle organized by title or by year.';
  $body = 'MainBody';
  require_once 'sftemplate.php';
  headerTemp();
?>

    <h2 id="sortByTitle" class="MoviesPageHeader"><b>Movies Filmed in Seattle by Title</b></h2>
        
    <div class="MTTable">
    <table class="MoviesTable">
      <tr>
        <th class="MoviesColumnHeader1">Title</th>
        <th class="MoviesColumnHeader2"><a href="#sortByYear" class="SortText">Year</a><div class="SortTriangle">&#9660</div></th>
      </tr>

        <?php
            // 2. Perform database query
            $query = $connection->prepare("SELECT * FROM moviesfilminglocation INNER JOIN movies ON movies.MovieID = moviesfilminglocation.MovieID INNER JOIN filminglocations ON filminglocations.FilmingLocationID = moviesfilminglocation.FilmingLocationID WHERE City = ? ORDER BY MovieTitle ASC ");
            
            $city = "Seattle";
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
        <td class="MovieTitlesContent"><b><a href= "<?php echo $movies["MoviePageLink"]; ?>"><?php echo $movies["MovieTitle"]; ?></a></b></td>
        <td class="MovieYearContent"><?php echo $movies["YearReleased"]; ?></td>
      </tr>
          
        <?php
            }

            // 4. Release returned data
            mysqli_free_result($result);
        ?>

    </table>
    </div>

        <!--link to Total Movie Count-->
<?php 
  require 'moviefunctions.php';
  cityMoviesCount('Seattle');
?>

    <h2 id="sortByYear" class="MoviesPageHeader"><b>Movies Filmed in Seattle by Year</b></h2>

    <div class="MYTable">
    <table class="MoviesTable">
      <tr>
        <th class="MoviesColumnHeader1"><a href="#sortByTitle" class="SortText">Title</a><div class="SortTriangle">&#9650</div></th>
        <th class="MoviesColumnHeader2">Year</th>
      </tr>

        <?php
            // 2. Perform database query
            $query = $connection->prepare("SELECT * FROM moviesfilminglocation INNER JOIN movies ON movies.MovieID = moviesfilminglocation.MovieID INNER JOIN filminglocations ON filminglocations.FilmingLocationID = moviesfilminglocation.FilmingLocationID WHERE City = ? ORDER BY YearReleased DESC, MovieTitle ");

            $cityY = "Seattle";
            $query->bind_param("s", $cityY);
            $query->execute(); 

            //Result variable with an error check
            $result = $query->get_result()
              or die("Database query failed.");

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
    
            // 4. Release returned data
            mysqli_free_result($result);
        ?>

    </table>
    </div>

        <!--link to Total Movie Count-->
<?php cityMoviesCount('Seattle'); ?>

    <!--link to footer-->
<?php
  require_once 'sftemplate.php';
  footerTemp();
?>