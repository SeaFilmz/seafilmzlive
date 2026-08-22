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
      <h1 class="MovieTitle"><b><?= $movies["movie_title"]; ?></b></h1>

      <?php
        $releaseYear = $movies["year_released"]; // Movies Year Released from DB
        $currentYear = date('Y'); // Todays Date
        $movieAge = $currentYear-$releaseYear; // Calculate Age
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

          if ($movies["runtime"] != NULL) {
            tableFactRow("Run Time", $movies["runtime"] . ' Minutes');
          }

          if ($movies["production_budget"] != NULL) {
            tableFactRow("Production Budget", "$" . number_format($movies["production_budget"]));
          }

          if ($movies["total_world_gross"] != NULL) {
            tableFactRow("Total Worldwide Gross in US Dollars", "$" . number_format($movies["total_world_gross"]));
          }
  } ?>

      <?php
        $movieActors = individualMoviePeopleFactPageQuery($movieSLUGPartFixed, 'actor');
      ?>
        <tr class="MovieDataPointRow">
          <td class="MovieData MovieDataDesc">Main Actors</td>
          <td class="MovieDataActor">
            <?php
              while ($actors = mysqli_fetch_assoc($movieActors)) {
            ?>
                <p><?= htmlspecialchars($actors["first_name"]); ?> <?php if ($actors["middle_initialname"] != NULL) { echo htmlspecialchars($actors["middle_initialname"]); } ?> <?= htmlspecialchars($actors["last_name"]); ?></p>
              <?php } ?>
          </td>

          <?php
            // 4. Release returned data
            mysqli_free_result($movieActors);
          ?>
        </tr>

      <?php
        $movieDirector = individualMoviePeopleFactPageQuery($movieSLUGPartFixed, 'director');
      ?>
        <tr class="MovieDataPointRow">
          <td class="MovieData MovieDataDesc">Director</td>
          <td class="MovieDataDirector">
            <?php
              while ($director = mysqli_fetch_assoc($movieDirector)) {
            ?>
              <p><?= htmlspecialchars($director["first_name"]); ?> <?php if ($director["middle_initialname"] != NULL) { echo htmlspecialchars($director["middle_initialname"]); } ?> <?= htmlspecialchars($director["last_name"]); ?></p>
              <?php } ?>
          </td>

          <?php
            // 4. Release returned data
            mysqli_free_result($movieDirector);
          ?>
        </tr>

      <?php
        $filmLocations = individualMovieFactPageLocationQuery($movieSLUGPartFixed);
      ?>

        <tr class="MovieDataPointRow">
          <td class="MovieData MovieDataDesc">Filming Location</td>
          <td class="MovieDataFilmLocations">
            <?php
              while ($locations = mysqli_fetch_assoc($filmLocations)) {
            ?>
                <p><a href="<?= htmlspecialchars($locations["city_links"]); ?>"><?= htmlspecialchars($locations["city"]); ?></a>, <?= htmlspecialchars($locations["state_province"]); ?>, <?= htmlspecialchars($locations["country"]); ?></p>
              <?php } ?>
          </td>

          <?php
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