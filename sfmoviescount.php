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
            $query .= "WHERE City = 'Seattle' ";
            $result = mysqli_query($connection, $query);
            //Test if there was a query error
            if (!$result) {
                die("Database query failed.");
            } /* else {
                echo "Connected";
            } */
        ?>

        <?php
            // 3. Use returned data (if any)
            while($movies = mysqli_fetch_assoc($result)) {
                // output data from each row
        ?>

            <td class="MovieCountNumber"><?php echo $movies["COUNT(*)"]; ?></td>
          </tr>

        <?php
            }
        ?>

        <?php
            // 4. Release returned data
            mysqli_free_result($result);
        ?>

        </table>
        </div>