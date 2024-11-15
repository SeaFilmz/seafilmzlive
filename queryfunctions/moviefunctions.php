<?php
  function cityMoviesCount($city) {
    global $newconnection;
?>

<div class="MCTable">
        <table class="MovieCountTable">
          <tr>
            <th class="MovieCountRowHeader">Total Movies</th>

        <?php
            // 2. Perform database query
            $query = $newconnection->prepare("SELECT COUNT(*) FROM moviesfilminglocation INNER JOIN movies ON movies.MovieID = moviesfilminglocation.MovieID INNER JOIN filminglocations ON filminglocations.FilmingLocationID = moviesfilminglocation.FilmingLocationID WHERE City = ? ");
            
            $query->bind_param("s", $city);
            $query->execute();
            
            //Result variable with an error check
            $result = $query->get_result()
              or die("Database query failed.");
            
            // 3. Use returned data (if any)
            while($movies = mysqli_fetch_assoc($result)) {
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

<?php  } 

  function cityRuntimeCount($cityRt) {
    global $newconnection;
?>

<div class="MTRTable">
    <table class="MovieTotalRuntimeTable">
      <tr class="MoviesContent">
        <th class="MovieTotalRuntimeRowHeader">Total Seattle Movie Runtime</th>

        <?php
            // 2. Perform database query
            $query = $newconnection->prepare("SELECT SUM(RunTime) FROM moviesfilminglocation INNER JOIN movies ON movies.MovieID = moviesfilminglocation.MovieID INNER JOIN filminglocations ON filminglocations.FilmingLocationID = moviesfilminglocation.FilmingLocationID WHERE City = ? ");
            
            $query->bind_param("s", $cityRt);
            $query->execute();
            
            //Result variable with an error check
            $result = $query->get_result()
              or die("Database query failed.");

            // 3. Use returned data (if any)
            while($movies = mysqli_fetch_assoc($result)) {
                // output data from each row
        ?>

        <td class="MovieTotalRuntimeNumber"><?php echo number_format($movies["SUM(RunTime)"]); ?> Minutes</td>
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
  global $newconnection;
?>

<div class="MTRTable">
  <table class="MovieTotalRuntimeTable">
    <tr class="MoviesContent">
      <th class="MovieTotalRuntimeRowHeader">Total Seattle Movie Runtime</th>

      <?php
          // 2. Perform database query
          $query = $newconnection->prepare("SELECT SUM(RunTime) FROM moviesfilminglocation INNER JOIN movies ON movies.MovieID = moviesfilminglocation.MovieID INNER JOIN cities ON cities.CityID = moviesfilminglocation.CityID WHERE City = ? ");
          
          $query->bind_param("s", $cityRt);
          $query->execute();
          
          //Result variable with an error check
          $result = $query->get_result()
            or die("Database query failed.");

          // 3. Use returned data (if any)
          while($movies = mysqli_fetch_assoc($result)) {
              // output data from each row
      ?>

      <td class="MovieTotalRuntimeNumber">
        <?php
          if ($movies["SUM(RunTime)"] % 60 == 0) { ?>
            <td class="MovieTotalRuntimeNumber"><?= number_format($movies["SUM(RunTime)"]/60); ?> Hours</td>
          <?php } else { 
            $totalRuntimeHours = floor($movies["SUM(RunTime)"]/60);
            $totalRuntimeHoursFormated = number_format($totalRuntimeHours);
            $remainingRuntimeMintues = $movies["SUM(RunTime)"] - ($totalRuntimeHours * 60);
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
    global $newconnection;
?>

<div class="MTRTable">
    <table class="MovieAvgRuntimeTable">
        
        <?php
            // 2. Perform database query
            $query = $newconnection->prepare("SELECT AVG(RunTime) FROM moviesfilminglocation INNER JOIN movies ON movies.MovieID = moviesfilminglocation.MovieID INNER JOIN filminglocations ON filminglocations.FilmingLocationID = moviesfilminglocation.FilmingLocationID WHERE City = ? ");

            $query->bind_param("s", $cityRtAvg);
            $query->execute();

            //Result variable with an error check
            $result = $query->get_result()
              or die("Database query failed.");

            // 3. Use returned data (if any)
            while($movies = mysqli_fetch_assoc($result)) {
                // output data from each row
        ?>

      <tr class="MoviesContent">
        <th class="MovieTotalRuntimeRowHeader">Average Seattle Movie Runtime</th>
        <td class="MovieTotalRuntimeNumber"><?php echo $movies["AVG(RunTime)"]; ?> Minutes</td>
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
  global $newconnection;
?>

<div class="MTRTable">
  <table class="MovieAvgRuntimeTable">
      
      <?php
          // 2. Perform database query
          $query = $newconnection->prepare("SELECT AVG(RunTime) FROM moviesfilminglocation INNER JOIN movies ON movies.MovieID = moviesfilminglocation.MovieID INNER JOIN cities ON cities.CityID = moviesfilminglocation.CityID WHERE City = ? ");

          $query->bind_param("s", $cityRtAvg);
          $query->execute();

          //Result variable with an error check
          $result = $query->get_result()
            or die("Database query failed.");

          // 3. Use returned data (if any)
          while($movies = mysqli_fetch_assoc($result)) {
              // output data from each row
      ?>



    <tr class="MoviesContent">
      <th class="MovieTotalRuntimeRowHeader">Average Seattle Movie Runtime</th>
        <?php if ($movies["AVG(RunTime)"] / 60 === 0) { ?>
          <td class="MovieTotalRuntimeNumber"><?= number_format($movies["AVG(RunTime)"]/60); ?> Hours</td>
        <?php } else { 
          $averageRuntimeHours = floor($movies["AVG(RunTime)"]/60);
          $averageRuntimeHoursFormated = number_format($averageRuntimeHours);
          $remainingAverageRuntimeMinutes = $movies["AVG(RunTime)"] - ($averageRuntimeHours * 60);
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
  global $newconnection;
?>

<div class="MTRTable">
  <table class="MovieAvgRuntimeTable">
      
      <?php
          // 2. Perform database query
          $query = $newconnection->prepare("SELECT MIN(RunTime) FROM moviesfilminglocation INNER JOIN movies ON movies.MovieID = moviesfilminglocation.MovieID INNER JOIN cities ON cities.CityID = moviesfilminglocation.CityID WHERE City = ? ");

          $query->bind_param("s", $cityRtShortest);
          $query->execute();

          //Result variable with an error check
          $result = $query->get_result()
            or die("Database query failed.");

          // 3. Use returned data (if any)
          while($movies = mysqli_fetch_assoc($result)) {
              // output data from each row
      ?>

    <tr class="MoviesContent">
      <th class="MovieTotalRuntimeRowHeader">Shortest Seattle Movie Runtime</th>
      <td class="MovieTotalRuntimeNumber"><?php echo $movies["MIN(RunTime)"]; ?> Minutes</td>
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
  global $newconnection;
?>

<div class="MTRTable">
  <table class="MovieAvgRuntimeTable">
      
      <?php
          // 2. Perform database query
          $query = $newconnection->prepare("SELECT MIN(RunTime) FROM moviesfilminglocation INNER JOIN movies ON movies.MovieID = moviesfilminglocation.MovieID INNER JOIN cities ON cities.CityID = moviesfilminglocation.CityID WHERE City = ? ");

          $query->bind_param("s", $cityRtShortest);
          $query->execute();

          //Result variable with an error check
          $result = $query->get_result()
            or die("Database query failed.");

          // 3. Use returned data (if any)
          while($movies = mysqli_fetch_assoc($result)) {
              // output data from each row
      ?>

    <tr class="MoviesContent">
      <th class="MovieTotalRuntimeRowHeader">Shortest Seattle Movie Runtime</th>
      <?php if ($movies["MIN(RunTime)"] % 60 == 0) { ?>
        <td class="MovieTotalRuntimeNumber"><?php $movies["MIN(RunTime)"]/60; ?> Hours</td>
      <?php } else { 
        $shortestRuntimeHours = floor($movies["MIN(RunTime)"]/60);
        $shortestRuntimeHoursFormated = number_format($shortestRuntimeHours);
        $remainingShortestRuntimeMinutes = $movies["MIN(RunTime)"] - ($shortestRuntimeHours * 60);
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
    global $newconnection;
?>

<div class="MTRTable">
    <table class="MovieAvgRuntimeTable">
        
        <?php
            // 2. Perform database query
            $query = $newconnection->prepare("SELECT MAX(RunTime) FROM moviesfilminglocation INNER JOIN movies ON movies.MovieID = moviesfilminglocation.MovieID INNER JOIN cities ON cities.CityID = moviesfilminglocation.CityID WHERE City = ? ");

            $query->bind_param("s", $cityRtLongest);
            $query->execute();

            //Result variable with an error check
            $result = $query->get_result()
              or die("Database query failed.");

            // 3. Use returned data (if any)
            while($movies = mysqli_fetch_assoc($result)) {
                // output data from each row
        ?>

      <tr class="MoviesContent">
        <th class="MovieTotalRuntimeRowHeader">Longest Seattle Movie Runtime</th>
        <td class="MovieTotalRuntimeNumber"><?php echo $movies["MAX(RunTime)"]; ?> Minutes</td>
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
    global $newconnection;
?>

<div class="MTRTable">
    <table class="MovieAvgRuntimeTable">
        
        <?php
            // 2. Perform database query
            $query = $newconnection->prepare("SELECT MAX(RunTime) FROM moviesfilminglocation INNER JOIN movies ON movies.MovieID = moviesfilminglocation.MovieID INNER JOIN cities ON cities.CityID = moviesfilminglocation.CityID WHERE City = ? ");

            $query->bind_param("s", $cityRtLongest);
            $query->execute();

            //Result variable with an error check
            $result = $query->get_result()
              or die("Database query failed.");

            // 3. Use returned data (if any)
            while($movies = mysqli_fetch_assoc($result)) {
                // output data from each row
        ?>

      <tr class="MoviesContent">
        <th class="MovieTotalRuntimeRowHeader">Longest Seattle Movie Runtime</th>
        <?php if ($movies["MAX(RunTime)"] % 60 == 0) { ?>
          <td class="MovieTotalRuntimeNumber"><?php $movies["MAX(RunTime)"]/60; ?> Hours</td>
        <?php } else { 
          $longestRuntimeHours = floor($movies["MAX(RunTime)"]/60);
          $longestRuntimeHoursFormated = number_format($longestRuntimeHours);
          $remainingLongestRuntimeMinutes = $movies["MAX(RunTime)"] - ($longestRuntimeHours * 60);
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
    global $newconnection;
?>

<div class="MTGTable">
    <table class="MovieTotalGrossTable">
      <tr class="MoviesContent">
        <th class="MovieTotalGrossRowHeader">Total Seattle Movie Gross (US Dollars)</th>      

        <?php
            // 2. Perform database query
            $query = $newconnection->prepare("SELECT SUM(TotalWorldGross) FROM moviesfilminglocation INNER JOIN movies ON movies.MovieID = moviesfilminglocation.MovieID INNER JOIN filminglocations ON filminglocations.FilmingLocationID = moviesfilminglocation.FilmingLocationID WHERE City = ? ");
            
            $query->bind_param("s", $cityGrossTotal);
            $query->execute();            
            
            //Result variable with an error check
            $result = $query->get_result()
              or die("Database query failed.");

            // 3. Use returned data (if any)
            while($movies = mysqli_fetch_assoc($result)) {
                // output data from each row
        ?>

        <td class="MovieTotalGrossNumber">$<?php echo number_format($movies["SUM(TotalWorldGross)"]); ?></td>
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
    global $newconnection;
?>

<div class="MTGTable">
    <table class="MovieTotalGrossTable">
      <tr class="MoviesContent">
        <th class="MovieTotalGrossRowHeader">Highest Seattle Movie Gross (US Dollars)</th>      

        <?php
            // 2. Perform database query
            $query = $newconnection->prepare("SELECT MAX(TotalWorldGross) FROM moviesfilminglocation INNER JOIN movies ON movies.MovieID = moviesfilminglocation.MovieID INNER JOIN cities ON cities.CityID = moviesfilminglocation.CityID WHERE City = ? ");
            
            $query->bind_param("s", $cityHighestGrossTotal);
            $query->execute();            
            
            //Result variable with an error check
            $result = $query->get_result()
              or die("Database query failed.");

            // 3. Use returned data (if any)
            while($movies = mysqli_fetch_assoc($result)) {
                // output data from each row
        ?>

        <td class="MovieTotalGrossNumber">$<?php echo number_format($movies["MAX(TotalWorldGross)"]); ?></td>
      </tr>

        <?php
            }

            // 4. Release returned data
            mysqli_free_result($result);
        ?>

        </table>
        </div>

<?php } ?>

<?php
  function individualMovieFactPageQuery($movieTitle, $city) {
    global $newconnection;

    // 2. Perform database query
    $query = $newconnection->prepare("SELECT * FROM moviesfilminglocation INNER JOIN movies ON movies.MovieID = moviesfilminglocation.MovieID INNER JOIN filminglocations ON filminglocations.FilmingLocationID = moviesfilminglocation.FilmingLocationID WHERE MovieTitle = ? AND City = ? ");

    $query->bind_param("ss", $movieTitle, $city);
    $query->execute();

    //Result variable with an error check
    $result = $query->get_result()
      or die("Database query failed.");

    return $result;
} ?>