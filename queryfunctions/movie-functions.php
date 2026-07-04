<?php
  function moviesFilmedCityByTitleQuery($databaseConnection, $city) {

    // 2. Perform database query
    $sql = "SELECT * FROM movies_cities INNER JOIN movies ON movies.movie_id = movies_cities.movie_id INNER JOIN cities ON movies_cities.city_id = cities.city_id WHERE city = ? ORDER BY movie_title ASC ";

    $query = $databaseConnection->prepare($sql);
    $query->bind_param("s", $city);
    $query->execute();

    //Result variable with an error check
    $moviesByCity = $query->get_result()
      or die("Database query failed.");

    return $moviesByCity;
  }
?>

<?php
  function moviesFilmedCityByReleaseYearTitleQuery($databaseConnection,$city) {

    // 2. Perform database query
    $sql = "SELECT * FROM movies_cities INNER JOIN movies ON movies.movie_id = movies_cities.movie_id INNER JOIN cities ON movies_cities.city_id = cities.city_id WHERE city = ? ORDER BY year_released DESC, movie_title ";

    $query = $databaseConnection->prepare($sql);
    $query->bind_param("s", $city);
    $query->execute();

    //Result variable with an error check
    $moviesByCityByYearReleased = $query->get_result()
      or die("Database query failed.");

    return $moviesByCityByYearReleased;
  }
?>

<?php
  function cityMoviesCount($city) {
    global $newConnection;
?>

<div class="MCTable">
        <table class="MovieCountTable">
          <tr>
            <th class="MovieCountRowHeader">Total Movies</th>

        <?php
            // 2. Perform database query
            $query = $newConnection->prepare("SELECT COUNT(*) FROM movies_cities INNER JOIN movies ON movies.movie_id = movies_cities.movie_id INNER JOIN cities ON movies_cities.city_id WHERE city = ? ");

            $query->bind_param("s", $city);
            $query->execute();

            //Result variable with an error check
            $result = $query->get_result()
              or die("Database query failed.");

            // 3. Use returned data (if any)
            while ($movies = mysqli_fetch_assoc($result)) {
                // output data from each row
        ?>

            <td class="MovieCountNumber"><?php echo $movies["COUNT(*)"]; ?></td>
          </tr>

        <?php
            }

            // 4. Release returned data
            mysqli_free_result($result);
        ?>

        </table>
        </div>

<?php }

  function moviesFilmedCityByRuntimeQuery($city) {
    global $newConnection;

    // 2. Perform database query
    $query = $newConnection->prepare("SELECT * FROM movies_cities INNER JOIN movies ON movies.movie_id = movies_cities.movie_id INNER JOIN cities ON movies_cities.city_id = cities.city_id WHERE city = ? ORDER BY runtime ASC, movie_title ");

    $query->bind_param("s", $city);
    $query->execute();

    //Result variable with an error check
    $moviesByCityByRuntime = $query->get_result()
      or die("Database query failed.");

    return $moviesByCityByRuntime;
  }
?>

<?php

  function cityRuntimeCount($cityRt) {
    global $newConnection;
?>

<div class="MTRTable">
    <table class="MovieTotalRuntimeTable">
      <tr class="MoviesContent">
        <th class="MovieTotalRuntimeRowHeader">Total Seattle Movie Runtime</th>

        <?php
            // 2. Perform database query
            $query = $newConnection->prepare("SELECT SUM(runtime) FROM movies_cities INNER JOIN movies ON movies.movie_id = movies_cities.movie_id INNER JOIN cities ON movies_cities.city_id WHERE city = ? ");

            $query->bind_param("s", $cityRt);
            $query->execute();

            //Result variable with an error check
            $result = $query->get_result()
              or die("Database query failed.");

            // 3. Use returned data (if any)
            while ($movies = mysqli_fetch_assoc($result)) {
                // output data from each row
        ?>

        <td class="MovieTotalRuntimeNumber"><?php echo number_format($movies["SUM(runtime)"]); ?> Minutes</td>
      </tr>

        <?php
            }

            // 4. Release returned data
            mysqli_free_result($result);
        ?>

    </table>
    </div>

<?php }

function cityRuntimeCountHours($cityRt) {
  global $newConnection;
?>

<div class="MTRTable">
  <table class="MovieTotalRuntimeTable">
    <tr class="MoviesContent">
      <th class="MovieTotalRuntimeRowHeader">Total Seattle Movie Runtime</th>

      <?php
          // 2. Perform database query
          $query = $newConnection->prepare("SELECT SUM(runtime) FROM movies_cities INNER JOIN movies ON movies.movie_id = movies_cities.movie_id INNER JOIN cities ON movies_cities.city_id WHERE city = ? ");

          $query->bind_param("s", $cityRt);
          $query->execute();

          //Result variable with an error check
          $result = $query->get_result()
            or die("Database query failed.");

          // 3. Use returned data (if any)
          while ($movies = mysqli_fetch_assoc($result)) {
              // output data from each row
      ?>

      <td class="MovieTotalRuntimeNumber">
        <?php
          if ($movies["SUM(runtime)"] % 60 == 0) { ?>
            <td class="MovieTotalRuntimeNumber"><?= number_format($movies["SUM(runtime)"]/60); ?> Hours</td>
          <?php } else {
            $totalRuntimeHours = floor($movies["SUM(runtime)"]/60);
            $totalRuntimeHoursFormated = number_format($totalRuntimeHours);
            $remainingRuntimeMintues = $movies["SUM(runtime)"] - ($totalRuntimeHours * 60);
          ?>
            <td class="MovieTotalRuntimeNumber"><?= "{$totalRuntimeHoursFormated} Hours {$remainingRuntimeMintues} Minutes"; ?></td>
          <?php } ?>
    </tr>

      <?php
          }

          // 4. Release returned data
          mysqli_free_result($result);
      ?>

  </table>
  </div>

<?php }

function cityRuntimeAvg($cityRtAvg) {
    global $newConnection;
?>

<div class="MTRTable">
    <table class="MovieAvgRuntimeTable">

        <?php
            // 2. Perform database query
            $query = $newConnection->prepare("SELECT AVG(runtime) FROM movies_cities INNER JOIN movies ON movies.movie_id = movies_cities.movie_id INNER JOIN cities ON movies_cities.city_id WHERE city = ? ");

            $query->bind_param("s", $cityRtAvg);
            $query->execute();

            //Result variable with an error check
            $result = $query->get_result()
              or die("Database query failed.");

            // 3. Use returned data (if any)
            while ($movies = mysqli_fetch_assoc($result)) {
                // output data from each row
        ?>

      <tr class="MoviesContent">
        <th class="MovieTotalRuntimeRowHeader">Average Seattle Movie Runtime</th>
        <td class="MovieTotalRuntimeNumber"><?php echo $movies["AVG(runtime)"]; ?> Minutes</td>
      </tr>

        <?php
            }

            // 4. Release returned data
            mysqli_free_result($result);
        ?>

    </table>
    </div>

    <?php }

function cityRuntimeAvgHours($cityRtAvg) {
  global $newConnection;
?>

<div class="MTRTable">
  <table class="MovieAvgRuntimeTable">

      <?php
          // 2. Perform database query
          $query = $newConnection->prepare("SELECT AVG(runtime) FROM movies_cities INNER JOIN movies ON movies.movie_id = movies_cities.movie_id INNER JOIN cities ON movies_cities.city_id WHERE city = ? ");

          $query->bind_param("s", $cityRtAvg);
          $query->execute();

          //Result variable with an error check
          $result = $query->get_result()
            or die("Database query failed.");

          // 3. Use returned data (if any)
          while ($movies = mysqli_fetch_assoc($result)) {
              // output data from each row
      ?>

    <tr class="MoviesContent">
      <th class="MovieTotalRuntimeRowHeader">Average Seattle Movie Runtime</th>
        <?php if ($movies["AVG(runtime)"] / 60 === 0) { ?>
          <td class="MovieTotalRuntimeNumber"><?= number_format($movies["AVG(runtime)"]/60); ?> Hours</td>
        <?php } else {
          $averageRuntimeHours = floor($movies["AVG(runtime)"]/60);
          $averageRuntimeHoursFormated = number_format($averageRuntimeHours);
          $remainingAverageRuntimeMinutes = $movies["AVG(runtime)"] - ($averageRuntimeHours * 60);
        ?>
          <td class="MovieTotalRuntimeNumber"><?= "{$averageRuntimeHoursFormated} Hours {$remainingAverageRuntimeMinutes} Minutes"; ?></td>
        <?php } ?>
    </tr>

      <?php
          }

          // 4. Release returned data
          mysqli_free_result($result);
      ?>

  </table>
  </div>

<?php }

function cityRuntimeShortest($cityRtShortest) {
  global $newConnection;
?>

<div class="MTRTable">
  <table class="MovieAvgRuntimeTable">

      <?php
          // 2. Perform database query
          $query = $newConnection->prepare("SELECT MIN(runtime) FROM movies_cities INNER JOIN movies ON movies.movie_id = movies_cities.movie_id INNER JOIN cities ON movies_cities.city_id WHERE city = ? ");

          $query->bind_param("s", $cityRtShortest);
          $query->execute();

          //Result variable with an error check
          $result = $query->get_result()
            or die("Database query failed.");

          // 3. Use returned data (if any)
          while ($movies = mysqli_fetch_assoc($result)) {
              // output data from each row
      ?>

    <tr class="MoviesContent">
      <th class="MovieTotalRuntimeRowHeader">Shortest Seattle Movie Runtime</th>
      <td class="MovieTotalRuntimeNumber"><?php echo $movies["MIN(runtime)"]; ?> Minutes</td>
    </tr>

      <?php
          }

          // 4. Release returned data
          mysqli_free_result($result);
      ?>

  </table>
  </div>

<?php  }

function cityRuntimeShortestHours($cityRtShortest) {
  global $newConnection;
?>

<div class="MTRTable">
  <table class="MovieAvgRuntimeTable">

      <?php
          // 2. Perform database query
          $query = $newConnection->prepare("SELECT MIN(runtime) FROM movies_cities INNER JOIN movies ON movies.movie_id = movies_cities.movie_id INNER JOIN cities ON movies_cities.city_id WHERE city = ? ");

          $query->bind_param("s", $cityRtShortest);
          $query->execute();

          //Result variable with an error check
          $result = $query->get_result()
            or die("Database query failed.");

          // 3. Use returned data (if any)
          while ($movies = mysqli_fetch_assoc($result)) {
              // output data from each row
      ?>

    <tr class="MoviesContent">
      <th class="MovieTotalRuntimeRowHeader">Shortest Seattle Movie Runtime</th>
      <?php if ($movies["MIN(runtime)"] % 60 == 0) { ?>
        <td class="MovieTotalRuntimeNumber"><?php $movies["MIN(runtime)"]/60; ?> Hours</td>
      <?php } else {
        $shortestRuntimeHours = floor($movies["MIN(runtime)"]/60);
        $shortestRuntimeHoursFormated = number_format($shortestRuntimeHours);
        $remainingShortestRuntimeMinutes = $movies["MIN(runtime)"] - ($shortestRuntimeHours * 60);
      ?>
        <td class="MovieTotalRuntimeNumber"><?= "{$shortestRuntimeHoursFormated} Hours {$remainingShortestRuntimeMinutes} Minutes"; ?></td>
      <?php } ?>
    </tr>

      <?php
          }

          // 4. Release returned data
          mysqli_free_result($result);
      ?>

  </table>
  </div>

  <?php }

function cityRuntimeLongest($cityRtLongest) {
    global $newConnection;
?>

<div class="MTRTable">
    <table class="MovieAvgRuntimeTable">

        <?php
            // 2. Perform database query
            $query = $newConnection->prepare("SELECT MAX(runtime) FROM movies_cities INNER JOIN movies ON movies.movie_id = movies_cities.movie_id INNER JOIN cities ON movies_cities.city_id WHERE city = ? ");

            $query->bind_param("s", $cityRtLongest);
            $query->execute();

            //Result variable with an error check
            $result = $query->get_result()
              or die("Database query failed.");

            // 3. Use returned data (if any)
            while ($movies = mysqli_fetch_assoc($result)) {
                // output data from each row
        ?>

      <tr class="MoviesContent">
        <th class="MovieTotalRuntimeRowHeader">Longest Seattle Movie Runtime</th>
        <td class="MovieTotalRuntimeNumber"><?php echo $movies["MAX(runtime)"]; ?> Minutes</td>
      </tr>

        <?php
            }

            // 4. Release returned data
            mysqli_free_result($result);
        ?>

    </table>
    </div>

<?php }

function cityRuntimeLongestHours($cityRtLongest) {
    global $newConnection;
?>

<div class="MTRTable">
    <table class="MovieAvgRuntimeTable">

        <?php
            // 2. Perform database query
            $query = $newConnection->prepare("SELECT MAX(runtime) FROM movies_cities INNER JOIN movies ON movies.movie_id = movies_cities.movie_id INNER JOIN cities ON movies_cities.city_id WHERE city = ? ");

            $query->bind_param("s", $cityRtLongest);
            $query->execute();

            //Result variable with an error check
            $result = $query->get_result()
              or die("Database query failed.");

            // 3. Use returned data (if any)
            while ($movies = mysqli_fetch_assoc($result)) {
                // output data from each row
        ?>

      <tr class="MoviesContent">
        <th class="MovieTotalRuntimeRowHeader">Longest Seattle Movie Runtime</th>
        <?php if ($movies["MAX(runtime)"] % 60 == 0) { ?>
          <td class="MovieTotalRuntimeNumber"><?php $movies["MAX(runtime)"]/60; ?> Hours</td>
        <?php } else {
          $longestRuntimeHours = floor($movies["MAX(runtime)"]/60);
          $longestRuntimeHoursFormated = number_format($longestRuntimeHours);
          $remainingLongestRuntimeMinutes = $movies["MAX(runtime)"] - ($longestRuntimeHours * 60);
        ?>
          <td class="MovieTotalRuntimeNumber"><?= "{$longestRuntimeHoursFormated} Hours {$remainingLongestRuntimeMinutes} Minutes"; ?></td>
        <?php } ?>
      </tr>

        <?php
            }

            // 4. Release returned data
            mysqli_free_result($result);
        ?>

    </table>
    </div>

<?php  }

function cityMovieGrossTotal($cityGrossTotal) {
    global $newConnection;
?>

<div class="MTGTable">
    <table class="MovieTotalGrossTable">
      <tr class="MoviesContent">
        <th class="MovieTotalGrossRowHeader">Total Seattle Movie Gross (US Dollars)</th>

        <?php
            // 2. Perform database query
            $query = $newConnection->prepare("SELECT SUM(total_world_gross) FROM movies_cities INNER JOIN movies ON movies.movie_id = movies_cities.movie_id INNER JOIN cities ON  = movies_cities.city_id WHERE city = ? ");

            $query->bind_param("s", $cityGrossTotal);
            $query->execute();

            //Result variable with an error check
            $result = $query->get_result()
              or die("Database query failed.");

            // 3. Use returned data (if any)
            while ($movies = mysqli_fetch_assoc($result)) {
                // output data from each row
        ?>

        <td class="MovieTotalGrossNumber">$<?php echo number_format($movies["SUM(total_world_gross)"]); ?></td>
      </tr>

        <?php
            }

            // 4. Release returned data
            mysqli_free_result($result);
        ?>

        </table>
        </div>

<?php }

function cityMovieHighestGrossTotal($cityHighestGrossTotal) {
    global $newConnection;
?>

<div class="MTGTable">
    <table class="MovieTotalGrossTable">
      <tr class="MoviesContent">
        <th class="MovieTotalGrossRowHeader">Highest Seattle Movie Gross (US Dollars)</th>

        <?php
            // 2. Perform database query
            $query = $newConnection->prepare("SELECT MAX(total_world_gross) FROM movies_cities INNER JOIN movies ON movies.movie_id = movies_cities.movie_id INNER JOIN cities ON  = movies_cities.city_id WHERE city = ? ");

            $query->bind_param("s", $cityHighestGrossTotal);
            $query->execute();

            //Result variable with an error check
            $result = $query->get_result()
              or die("Database query failed.");

            // 3. Use returned data (if any)
            while ($movies = mysqli_fetch_assoc($result)) {
                // output data from each row
        ?>

        <td class="MovieTotalGrossNumber">$<?php echo number_format($movies["MAX(total_world_gross)"]); ?></td>
      </tr>

        <?php
            }

            // 4. Release returned data
            mysqli_free_result($result);
        ?>

        </table>
        </div>

<?php }

  function individualMovieFactPageQuery($movieSLUG) {
    global $newConnection;

    // 2. Perform database query
    $query = $newConnection->prepare("SELECT * FROM movies_cities INNER JOIN movies ON movies.movie_id = movies_cities.movie_id INNER JOIN cities ON  cities.city_id = movies_cities.city_id WHERE movie_page_link = ? ");

    $query->bind_param("s", $movieSLUG);
    $query->execute();

    //Result variable with an error check
    $result = $query->get_result()
      or die("Database query failed.");

    return $result;
}

  function individualMovieFactPageLocationQuery($movieSLUG, $city) {
    global $newConnection;

    // 2. Perform database query
    $query = $newConnection->prepare("SELECT * FROM movies_cities INNER JOIN movies ON movies.movie_id = movies_cities.movie_id INNER JOIN cities ON  cities.city_id = movies_cities.city_id WHERE movie_page_link = ? AND city = ? ");

    $query->bind_param("ss", $movieSLUG, $city);
    $query->execute();

    //Result variable with an error check
    $filmLocations = $query->get_result()
      or die("Database query failed.");

    return $filmLocations;
}

  function individualMoviePeopleFactPageQuery($movieSLUGPeople, $job) {
    global $newConnection;

    // 2. Perform database query
    $query = $newConnection->prepare("SELECT first_name, middle_initial_name, last_name, birth_name FROM movies_peoples_jobs JOIN movies ON movies_peoples_jobs.movie_id = movies.movie_id JOIN peoples ON movies_peoples_jobs.people_id = peoples.people_id JOIN jobs ON movies_peoples_jobs.job_id = jobs.job_id WHERE movie_page_link = ? and job = ? ");

    $query->bind_param("ss", $movieSLUGPeople, $job);
    $query->execute();

    //Result variable with an error check
    $movieActors = $query->get_result()
      or die("Database query failed.");

    return $movieActors;
}

  function individualMovieDirectorFactPageQuery($movieSLUGDirector, $job) {
    global $newConnection;

    // 2. Perform database query
    $query = $newConnection->prepare("SELECT first_name, middle_initialname, last_name FROM movies_peoples INNER JOIN peoples_jobs ON peoples_jobs.people_id = movies_peoples.people_id INNER JOIN jobs ON peoples_jobs.job_id =  INNER JOIN peoples ON movies_peoples.people_id = peoples.people_id INNER JOIN movies ON movies_peoples.movie_id = movies.movie_id WHERE movie_page_link = ? and job = ? ");

    $query->bind_param("ss", $movieSLUGDirector, $job);
    $query->execute();

    //Result variable with an error check
    $movieDirector = $query->get_result()
      or die("Database query failed.");

    return $movieDirector;
}
?>