<?php
  function cityMoviesCount($city) {
    global $query, $connection, $result;
?>

<div class="MCTable">
        <table class="MovieCountTable">
          <tr>
            <th class="MovieCountRowHeader">Total Movies</th>

        <?php
            // 2. Perform database query
            $query = "SELECT COUNT(*) ";
            $query .= "FROM moviesfilminglocation ";
            $query .= "INNER JOIN movies ";
            $query .= "ON movies.MovieID = moviesfilminglocation.MovieID ";
            $query .= "INNER JOIN filminglocations ";
            $query .= "ON filminglocations.FilmingLocationID = moviesfilminglocation.FilmingLocationID ";
            $query .= "WHERE City = '$city' ";
            //Result variable with an error check
            $result = mysqli_query($connection, $query)
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
    global $query, $connection, $result;
?>

<div class="MTRTable">
    <table class="MovieTotalRuntimeTable">
      <tr class="MoviesContent">
        <th class="MovieTotalRuntimeRowHeader">Total Seattle Movie Runtime</th>

        <?php
            // 2. Perform database query
            $query = "SELECT SUM(RunTime) ";
            $query .= "FROM moviesfilminglocation ";
            $query .= "INNER JOIN movies ";
            $query .= "ON movies.MovieID = moviesfilminglocation.MovieID ";
            $query .= "INNER JOIN filminglocations ";
            $query .= "ON filminglocations.FilmingLocationID = moviesfilminglocation.FilmingLocationID ";
            $query .= "WHERE City = '$cityRt' ";
            //Result variable with an error check
            $result = mysqli_query($connection, $query)
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

<?php  } ?>