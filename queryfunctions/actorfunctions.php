<?php
  function cityActorsCount($city, $job) {
    global $newconnection;
?>

<div class="MACTable">
    <table class="ActorsCountTable">
      <tr>
        <th class="ActorsCountRowHeader">Total Actors</th>

        <?php
            // 2. Perform database query
            $query = $newconnection->prepare("SELECT COUNT(*) FROM peoplesjobs INNER JOIN peoples ON peoples.PeopleID = peoplesjobs.PeopleID INNER JOIN jobs ON jobs.JobID = peoplesjobs.JobID WHERE CityTownBorn = ? AND Jobs = ? AND FirstName IS NOT NULL ");
            
            $query->bind_param("ss", $city, $job);
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

<?php
  function individualActorFactPageQuery($actorFirstName, $actorLastName) {
    global $newconnection;

    // 2. Perform database query
    $query = $newconnection->prepare("SELECT * FROM peoples WHERE FirstName = ? AND LastName = ? ");
    
    $query->bind_param("ss", $actorFirstName, $actorLastName);
    $query->execute(); 

    //Result variable with an error check
    $result = $query->get_result()
      or die("Database query failed.");

    return $result;
} ?>