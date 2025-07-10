<!--link to the start of a seafilmz general webpage template-->
<?php
  $title = 'Portland, Oregon Musicians - SeaFilmz';
  $mDesc = 'List of musicians born in the city of Portland, Oregon organized by musician name.';
  $ogTitle = 'Portland, Oregon Musicians - SeaFilmz';
  $ogURL = 'https://seafilmz.com/portland-oregon-musicians';
  $body = 'MainBody';
  require_once "templates/main-page-structure.php";
  headerTemp();
?>

    <h1 class="MusiciansPageHeader"><b>Musicians Born in Portland, Oregon</b></h1>

    <div class="MTable">
    <table class="MusiciansTable">
      <tr>
        <th class="MusiciansColumnHeader1">Name</th>
      </tr>

      <?php
            // 2. Perform database query
            $query = $newConnection->prepare("SELECT * FROM peoples_jobs INNER JOIN peoples ON peoples.people_id = peoples_jobs.people_id INNER JOIN jobs ON jobs.job_id = peoples_jobs.job_id INNER JOIN cities ON cities.city_id = peoples.birth_city_id WHERE city = ? AND job = ? AND musician_name IS NOT NULL ORDER BY musician_name ");

            $city = 'Portland';
            $job = 'musician';
            $query->bind_param("ss", $city, $job);
            $query->execute();

            //Result variable with an error check
            $result = $query->get_result()
              or die("Database query failed.");

            // 3. Use returned data (if any)
            while ($musician = mysqli_fetch_assoc($result)) {
                // output data from each row
        ?>

      <tr class="MusiciansMainContent">
        <td class="MusiciansCalledContent"> <b><a href="<?php echo $musician["people_links"]; ?>"> <?php echo $musician["musician_name"]; ?> </a></b></td>
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

    <!--link to Total Musicians Count-->
<?php
  require 'queryfunctions/people-functions.php';
  peopleCityBornByJobCount('Portland', 'musician');
?>

    <!--link to footer-->
<?php
  footerTemp();
?>