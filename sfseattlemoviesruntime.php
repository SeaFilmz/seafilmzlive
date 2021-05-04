<!--link to the start of a seafilmz general webpage template-->
<?php
  $title = 'Seattle Movies by Runtime - SeaFilmz'; 
  $mDesc = 'List of movies filmed fully or partly in the city of Seattle organized by runtime.';
  $body = 'MainBody';  
  require_once 'sftemplate.php';
  headerTemp();
?>

    <h2 class="MoviesPageHeader">
      <b>
        <a href="seattlemovies">New Movie Data UI Beta</a>
      </b>
    </h2>

    <h2 class="MoviesPageHeader"><b>Movies Filmed in Seattle by Runtime</b></h2>

    <div class="MRTable">
    <table class="MovieRuntimeTable">
      <tr>
        <th class="MovieRuntimeColumnHeader1">Title</th>
        <th class="MovieRuntimeColumnHeader2">Runtime (Minutes)</th>
      </tr>

        <?php
            // 2. Perform database query
            $query = $newconnection->prepare("SELECT * FROM moviesfilminglocation INNER JOIN movies ON movies.MovieID = moviesfilminglocation.MovieID INNER JOIN filminglocations ON filminglocations.FilmingLocationID = moviesfilminglocation.FilmingLocationID WHERE City = ? ORDER BY RunTime ASC, MovieTitle ");

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
        <td class="MovieTitlesRContent"><b><a href= "<?php echo $movies["MoviePageLink"]; ?>"><?php echo $movies["MovieTitle"]; ?></a></b></td>
        <td class="MovieRuntimeContent"><?php echo $movies["RunTime"]; ?></td>
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
  cityRuntimeCount('Seattle');
  cityRuntimeAvg('Seattle');
?>

    <!--link to footer-->
<?php
  require_once 'sftemplate.php';
  footerTemp();
?>