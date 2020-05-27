    <div class="MACTable">
    <table class="AtorsCountTable">
      <tr>
        <th class="ActorsCountRowHeader">Total Actors</th>       
        
        <?php
            // 2. Perform database query
            $query = "SELECT COUNT(*) ";
            $query .= "FROM actors ";
            $query .= "WHERE CityTownBorn = 'Seattle' ";
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
            while($actors = mysqli_fetch_assoc($result)) {
                // output data from each row
        ?>

        <td class="ActorsCountNumber"><?php echo $actors["COUNT(*)"]; ?></td>
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