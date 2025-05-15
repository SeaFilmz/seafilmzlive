<?php
  $title = 'Portland, Oregon Movies by Title or Year - SeaFilmz';
  $mDesc = 'List of movies filmed fully or partly in the city of Portland, Oregon organized by title or by year.';
  $ogTitle = 'Portland, Oregon Movies by Title or Year - SeaFilmz';
  $ogURL = 'https://seafilmz.com/portland-oregon-movies';
  $body = 'MainBody';
  /*link to the start of a seafilmz general web page template*/
  require_once 'templates/main-page-structure.php';
  headerTemp();
?>

    <p class="MoviesPageHeader">
      <b>
        <a href="portland-oregon-movies-beta">New Movie Data UI Beta</a>
      </b>
    </p>

    <h1 id="sortByTitle" class="MoviesPageHeader"><b>Movies Filmed in Portland, Oregon by Title</b></h1>

    <div class="MTTable">
    <table class="MoviesTable">
      <tr>
        <th class="MoviesColumnHeader1">Title</th>
        <th class="MoviesColumnHeader2"><a href="#sortByYear" class="SortText">Year</a><div class="SortTriangle">&#9660</div></th>
      </tr>

        <?php
            // 2. Perform database querylike
            $query = $newconnection->prepare("SELECT * FROM movies_cities INNER JOIN movies ON movies.MovieID = movies_cities.MovieID INNER JOIN cities ON cities.CityID = movies_cities.CityID WHERE city = ? ORDER BY MovieTitle ASC ");

            $city = 'Portland';
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
        <td class="MovieCountCheckbox">
          <input type="checkbox" class="movieCheckboxes" name="movieCheckboxes">
          <label for="movieCheckboxes"></label>
        </td>
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
  require 'queryfunctions/movie-functions.php';
  cityMoviesCount('Portland');
?>

    <div class="watchedButton">
      <button onclick="movieWatchedButton('Portland')" class="watchedButton"><b>Movies Watched</b></button>
    </div>

    <p id="watchedText" class="watchedText"></p>

    <h2 id="sortByYear" class="MoviesPageHeader"><b>Movies Filmed in Portland, Oregon by Year</b></h2>

    <div class="MYTable">
    <table class="MoviesTable">
      <tr>
        <th class="MoviesColumnHeader1"><a href="#sortByTitle" class="SortText">Title</a><div class="SortTriangle">&#9650</div></th>
        <th class="MoviesColumnHeader2">Year</th>
      </tr>

        <?php
            // 2. Perform database query
            $query = $newconnection->prepare("SELECT * FROM movies_cities INNER JOIN movies ON movies.MovieID = movies_cities.MovieID INNER JOIN cities ON cities.CityID = movies_cities.CityID WHERE city = ? ORDER BY YearReleased DESC, MovieTitle ");

            $cityY = 'Portland';
            $query->bind_param("s", $cityY);
            $query->execute();

            //Result variable with an error check
            $result = $query->get_result()
              or die("Database query failed.");

            // 3. Use returned data (if any)
            while ($movies = mysqli_fetch_assoc($result)) {
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
<?php cityMoviesCount('Portland'); ?>

    <script src="/js/movies-watched.js" defer></script>

  <!-- footer display function -->
<?php footerTemp(); ?>