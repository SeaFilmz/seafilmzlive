<?php
  function peopleCityBornByJobCount($city, $job) {
    global $newconnection;
?>

    <div class="MACTable">
      <table class="PeoplesCountTable">
        <tr>

          <?php $jobCapitalized = ucfirst($job); ?>
          <th class="PeoplesCountRowHeader"><?php echo "Total {$jobCapitalized}s"; ?></th>

          <?php
              // 2. Perform database query
              $query = $newconnection->prepare("SELECT COUNT(*) peoplecount FROM peoples_jobs INNER JOIN peoples ON peoples.PeopleID = peoples_jobs.PeopleID INNER JOIN jobs ON jobs.JobID = peoples_jobs.JobID INNER JOIN cities ON cities.CityID = peoples.BirthCityID WHERE City = ? AND Jobs = ? AND FirstName IS NOT NULL ");

              $query->bind_param("ss", $city, $job);
              $query->execute();

              //Result variable with an error check
              $result = $query->get_result()
                or die("Database query failed.");

              // 3. Use returned data (if any)
              while ($peoples = mysqli_fetch_assoc($result)) {
                  // output data from each row
          ?>

          <td class="PeoplesCountNumber"><?php echo $peoples["peoplecount"]; ?></td>
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
  function newIndividualPeopleFactPageQuery($peopleSLUG) {
    global $newconnection;

    // 2. Perform database query
    $query = $newconnection->prepare("SELECT * FROM peoples INNER JOIN cities ON cities.CityID = peoples.BirthCityID WHERE PeopleLinks = ? ");

    $query->bind_param("s", $peopleSLUG);
    $query->execute();

    //Result variable with an error check
    $result = $query->get_result()
      or die("Database query failed.");

    return $result;
} ?>