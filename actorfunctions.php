<?php
  function cityActorsCount($city) {
    global $query, $connection, $result;
?>

<div class="MACTable">
    <table class="ActorsCountTable">
      <tr>
        <th class="ActorsCountRowHeader">Total Actors</th>

        <?php
            // 2. Perform database query
            $query = $connection->prepare("SELECT COUNT(*) FROM actors WHERE CityTownBorn = ? ");
            
            $query->bind_param("s", $city);
            $query->execute();         

            //Result variable with an error check
            $result = $query->get_result()
              or die("Database query failed.");

            // 3. Use returned data (if any)
            while($actors = mysqli_fetch_assoc($result)) {
                // output data from each row
        ?>

        <td class="ActorsCountNumber"><?php echo $actors["COUNT(*)"]; ?></td>
      </tr>

        <?php
            }
     
            // 4. Release returned data
            mysqli_free_result($result);
        ?>

        </table>
        </div>

        <?php  } ?>        