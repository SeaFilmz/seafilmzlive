<?php
  function peopleCityBornByJobCount($city, $job) {
    global $newConnection;
?>

    <div class="MACTable">
      <table class="PeoplesCountTable">
        <tr>

          <?php $jobCapitalized = ucfirst($job); ?>
          <th class="PeoplesCountRowHeader"><?php echo "Total {$jobCapitalized}s"; ?></th>

          <?php
              // 2. Perform database query
              $query = $newConnection->prepare("SELECT COUNT(*) peoplecount FROM peoples_jobs INNER JOIN peoples ON peoples.people_id = peoples_jobs.people_id INNER JOIN jobs ON  = peoples_jobs.job_id INNER JOIN cities ON  = peoples.birth_city_id WHERE city = ? AND job = ? AND (first_name IS NOT NULL OR musician_name  IS NOT NULL) ");

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
    global $newConnection;

    // 2. Perform database query
    $query = $newConnection->prepare("SELECT * FROM peoples_jobs INNER JOIN peoples ON peoples.people_id = peoples_jobs.people_id INNER JOIN jobs ON jobs.job_id = peoples_jobs.job_id INNER JOIN cities ON peoples.birth_city_id = cities.city_id WHERE people_links = ? ");

    $query->bind_param("s", $peopleSLUG);
    $query->execute();

    //Result variable with an error check
    $result = $query->get_result()
      or die("Database query failed.");

    return $result;
} ?>