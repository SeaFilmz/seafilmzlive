<?php
  function cityMoviesCount($city) {
    global $query, $newconnection, $result;
?>

<div class="MCTable">
        <table class="MovieCountTable">
          <tr>
            <th class="MovieCountRowHeader">Total Movies</th>

        <?php
            // 2. Perform database query
            $query = $newconnection->prepare("SELECT COUNT(*) FROM movies as m, moviesfilminglocation as mfl WHERE m.MovieID = mfl.MovieID AND mfl.FilmingLocationID = (SELECT FilmingLocationID FROM filminglocations WHERE City = ?) ");
            
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
    global $query, $newconnection, $result;
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

function cityRuntimeAvg($cityRtAvg) {
    global $query, $newconnection, $result;
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

<?php  }

function cityMovieGrossTotal($cityGrossTotal) {
    global $query, $newconnection, $result;
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

<?php } ?>

<?php
  function individualMovieFactPageQuery($movieTitle, $city) {
    global $query, $newconnection;

    // 2. Perform database query
    $query = $newconnection->prepare("SELECT * FROM moviesfilminglocation INNER JOIN movies ON movies.MovieID = moviesfilminglocation.MovieID INNER JOIN filminglocations ON filminglocations.FilmingLocationID = moviesfilminglocation.FilmingLocationID WHERE MovieTitle = ? AND City = ? ");

    $query->bind_param("ss", $movieTitle, $city);
    $query->execute();

    //Result variable with an error check
    $result = $query->get_result()
      or die("Database query failed.");

    return $result;
} ?>