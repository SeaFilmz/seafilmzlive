<!--link to the start of a seafilmz general webpage template-->
<?php
  require_once 'new_db_connection.php';

  $movieSLUGPart = $_SERVER['REQUEST_URI'];
  $movieSLUGPartFixed = str_replace('/', '', $movieSLUGPart);

  require_once 'queryfunctions/movie-functions.php';
  $result = individualMovieFactPageQuery(trim($movieSLUGPartFixed));

  // 3. Use returned data (if any)
  if ($movies = mysqli_fetch_assoc($result)) {
    // output data from each row

  $title = $movies["movie_title"] . ' (' . $movies["year_released"] . ') - SeaFilmz';
  $mDesc = 'This is the fact page for Seattle movie ' . $movies["movie_title"] . ' (' . $movies["year_released"] . ').';
  $ogTitle = $movies["movie_title"] . ' (' . $movies["year_released"] . ') - SeaFilmz';
  $ogURL = 'https://seafilmz.com' . $movieSLUGPart;
  $schemaType = 'Movie';
  $movieTitle = $movies["movie_title"];
  $movieURLSlug = $movieSLUGPart;
  $movieYear = $movies["year_released"];
  $body = 'MainBody';
  require_once 'templates/main-page-structure.php';
  headerTemp();
?>

    <main class="MovieMainFacts">
      <h1 class="MovieTitle"><b><?php echo $movies["movie_title"]; ?></b></h1>

      <?php
        $releaseYear = $movies["year_released"]; // Movies Year Released from DB
        $today = date('Y'); // Todays Date
        $movieAge = $today-$releaseYear; // Calculate Age
      ?>

        <?php function tableFactRow($label, $value) { ?>
          <tr class="MovieDataPointRow">
            <td class="MovieData MovieDataDesc">
              <?= htmlspecialchars($label) ?>
            </td>
            <td class="MovieData">
              <?= htmlspecialchars($value) ?>
            </td>
          </tr>
        <?php } ?>

      <table>
        <?php
          tableFactRow("Year Released", $movies["year_released"]);

          tableFactRow("Movie Age", $movieAge . ' Years');
        ?>
        
        <?php if ($movies["runtime"] != NULL) { ?>
          <tr class="movieDataPointRow">
            <td class="movieData  MovieDataDesc">Run Time</td>
            <td class="movieData"><?php echo $movies["runtime"]; ?> Minutes</td>
          </tr>
        <?php } ?>

        <?php if ($movies["total_world_gross"] != NULL) { ?>
          <tr class="movieDataPointRow">
            <td class="movieData MovieDataDesc">Total Worldwide Gross in US Dollars</td>
            <td class="movieData">$<?php echo number_format($movies["total_world_gross"]); ?></td>
          </tr>
        <?php }
  } ?>

      <?php
        $movieActors = individualMoviePeopleFactPageQuery($movieSLUGPartFixed, 'actor');
      ?>
        <tr class="movieDataPointRow">
          <td class="movieData MovieDataDesc">Main Actors</td>
          <?php
            while ($actors = mysqli_fetch_assoc($movieActors)) {
          ?>
          <td class="movieDataActor"><?php echo $actors["first_name"]; ?> <?php if ($actors["middle_initialname"] != NULL) { echo $actors["middle_initialname"]; } ?> <?php echo $actors["last_name"]; ?></td>
          <?php }

          // 4. Release returned data
          mysqli_free_result($movieActors);
          ?>
        </tr>

      <?php
        $movieDirector = individualMoviePeopleFactPageQuery($movieSLUGPartFixed, 'director');
      ?>
        <tr class="movieDataPointRow">
          <td class="movieData MovieDataDesc">Director</td>
          <?php
            while ($director = mysqli_fetch_assoc($movieDirector)) {
          ?>
          <td class="movieDataDirector"><?php echo $director["first_name"]; ?> <?php if ($director["middle_initialname"] != NULL) { echo $director["middle_initialname"]; } ?> <?php echo $director["last_name"]; ?></td>
          <?php }

          // 4. Release returned data
          mysqli_free_result($movieDirector);
          ?>
        </tr>

      <?php
        $filmLocations = individualMovieFactPageLocationQuery($movieSLUGPartFixed, $movies["city"]);
      ?>

        <tr class="movieDataPointRow">
          <td class="movieData MovieDataDesc">Filming Location</td>
          <?php
            while ($locations = mysqli_fetch_assoc($filmLocations)) {
          ?>
          <td class="movieDataFilmLocations"><a href="<?php echo $locations["city_links"]; ?>"><?php echo $locations["city"]; ?></a>, <?php echo $locations["state_province"]; ?>, <?php echo $locations["country"]; ?></td>
          <?php }

          // 4. Release returned data
          mysqli_free_result($filmLocations);
          ?>
        </tr>
      </table>

  <?php
  // 4. Release returned data
  mysqli_free_result($result);
  ?>

</main>

<?php
  // link to footer
  footerTemp();
?>