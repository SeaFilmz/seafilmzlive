<!--link to the start of a seafilmz general webpage template-->
<?php
  $title = 'Seattle Movies by Runtime - SeaFilmz';
  $mDesc = 'List of movies filmed fully or partly in the city of Seattle organized by runtime.';
  $ogTitle = 'Seattle Movies by Runtime - SeaFilmz';
  $ogURL = 'https://seafilmz.com/seattle-movies-runtime';
  $body = 'MainBody';
  require_once 'templates/main-page-structure.php';
  headerTemp();
?>

    <p class="MoviesPageHeader">
      <b>
        <a href="seattle-movies-beta">New Movie Data UI Beta</a>
      </b>
    </p>

    <h1 class="MoviesPageHeader"><b>Movies Filmed in Seattle by Runtime</b></h1>

    <div class="MRTable">
    <table class="MovieRuntimeTable">
      <tr>
        <th class="MovieRuntimeColumnHeader1">Title</th>
        <th class="MovieRuntimeColumnHeader2">Runtime (Minutes)</th>
      </tr>

        <?php
            // 2. Perform database query
            $query = $newconnection->prepare("SELECT * FROM movies_cities INNER JOIN movies ON movies.MovieID = movies_cities.MovieID INNER JOIN cities ON cities.CityID = movies_cities.CityID WHERE city = ? ORDER BY RunTime ASC, MovieTitle ");

            $city = 'Seattle';
            $query->bind_param("s", $city);
            $query->execute();

            //Result variable with an error check
            $result = $query->get_result()
              or die("Database query failed.");

            // 3. Use returned data (if any)
            while ($movies = mysqli_fetch_assoc($result)) {
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
  require 'queryfunctions/movie-functions.php';
  cityRuntimeCount('Seattle');
  cityRuntimeAvg('Seattle');
  cityRuntimeShortest('Seattle');
  cityRuntimeLongest('Seattle');
?>
<br>
<?php
  cityRuntimeCountHours('Seattle');
  cityRuntimeAvgHours('Seattle');
  cityRuntimeShortestHours('Seattle');
  cityRuntimeLongestHours('Seattle');
?>

<?php
  // footer display function
  footerTemp();
?>