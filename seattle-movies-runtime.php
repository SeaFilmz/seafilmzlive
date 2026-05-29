<!--link to the start of a seafilmz general webpage template-->
<?php
  $title = 'Seattle Movies by Runtime - SeaFilmz';
  $mDesc = 'Discover movies filmed fully or partly in Seattle — organized by runtime from shortest to longest.';
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

    <h2 class="MoviesPageHeader"><b>Movies Filmed in Seattle by Runtime</b></h2>

    <div class="MRTable">
    <table class="MovieRuntimeTable">
      <tr>
        <th class="MovieRuntimeColumnHeader1">Title</th>
        <th class="MovieRuntimeColumnHeader2">Runtime (Minutes)</th>
      </tr>

        <?php
            // 1. Declare Global Variables
            $city = 'Seattle';

            // 2. Perform database query
            $query = $newConnection->prepare("SELECT * FROM movies_cities INNER JOIN movies ON movies.movie_id = movies_cities.movie_id INNER JOIN cities ON  = movies_cities.city_id WHERE city = ? ORDER BY runtime ASC, movie_title ");

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
        <td class="MovieTitlesRContent"><b><a href= "<?php echo $movies["movie_page_link"]; ?>"><?php echo $movies["movie_title"]; ?></a></b></td>
        <td class="MovieRuntimeContent"><?php echo $movies["runtime"]; ?></td>
      </tr>

        <?php
            }

            // 4. Release returned data
            mysqli_free_result($result);
        ?>

        </table>
        </div>

<?php
  require_once 'queryfunctions/movie-functions.php';
  cityRuntimeCount($city);
  cityRuntimeAvg($city);
  cityRuntimeShortest($city);
  cityRuntimeLongest($city);
?>
<br>
<?php
  cityRuntimeCountHours($city);
  cityRuntimeAvgHours($city);
  cityRuntimeShortestHours($city);
  cityRuntimeLongestHours($city);
?>

<?php
  // footer display function
  footerTemp();
?>