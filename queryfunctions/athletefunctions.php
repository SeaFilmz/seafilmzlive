<?php
  function cityAthletesCount($city, $job) {
    global $newconnection;
?>

<div class="ACTable">
    <table class="AthletesCountTable">
        <tr class="MoviesContent">
            <th class="AthletesCountRowHeader">Total Athletes</th>

        <?php
            // 2. Perform database query
            $query = $newconnection->prepare("SELECT COUNT(*) athletecount FROM peoplesjobs INNER JOIN peoples ON peoples.PeopleID = peoplesjobs.PeopleID INNER JOIN jobs ON jobs.JobID = peoplesjobs.JobID INNER JOIN cities ON cities.CityID = peoples.BirthCityID WHERE City = ? AND Jobs = ? AND FirstName IS NOT NULL ");
            
            $query->bind_param("ss", $city, $job);
            $query->execute();         

            //Result variable with an error check
            $result = $query->get_result()
              or die("Database query failed.");

            // 3. Use returned data (if any)
            while($athletes = mysqli_fetch_assoc($result)) {
                // output data from each row
        ?>

        <td class="AthletesCountNumber"><?php echo $athletes["athletecount"]; ?></td>
      </tr>

        <?php
            }
     
            // 4. Release returned data
            mysqli_free_result($result);
        ?>

        </table>
        </div>

        <?php  } ?>