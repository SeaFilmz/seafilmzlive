<!--link to the start of a seafilmz general webpage template-->
<?php
  $title = 'Bellevue, Washington Athletes - SeaFilmz';
  $mDesc = 'List of athletes born in the city of Bellevue, Washington organized by sport then by first name.';
  $ogTitle = 'Bellevue, Washington Athletes - SeaFilmz';
  $ogURL = 'https://seafilmz.com/bellevue-washington-athletes';
  $body = 'MainBody';
  require_once 'templates/main-page-structure.php';
  headerTemp();
?>

    <p class="AthletesPageHeader">
      <b>
        <a href="bellevue-washington-athletes-beta">New Athletes Data UI Beta</a>
      </b>
    </p>

    <h1 class="AthletesPageHeader">
      <b>
        <a href="bellevue-washington-athletes-dataviz">Bellevue, Washington Born Athletes Dataviz</a>
      </b>
    </h1>

    <h2 class="AthletesPageHeader"><b>Athletes Born in Bellevue, Washington</b></h2>

    <div class="ATable">
    <table class="AthletesTable">
      <tr>
        <th class="AthletesColumnHeader1">Name</th>
        <th class="AthletesColumnHeader2">Sport Known For</th>
      </tr>

        <?php
            // 1. Declare Global Variables
            $city = 'Bellevue';
            $job = 'athlete';

            // 2. Perform database query
            $query = $newConnection->prepare(" SELECT * FROM peoples_jobs INNER JOIN peoples ON peoples.people_id = peoples_jobs.people_id INNER JOIN jobs ON  = peoples_jobs.job_id INNER JOIN cities ON  = peoples.birth_city_id WHERE city = ? AND job = ? ORDER BY sport_known_for ASC, first_name ");

            $query->bind_param("ss", $city, $job);
            $query->execute();

            //Result variable with an error check
            $result = $query->get_result()
              or die("Database query failed.");

            // 3. Use returned data (if any)
            while ($athletes = mysqli_fetch_assoc($result)) {
                // output data from each row
        ?>

      <div class="AthletesMainContent">
      <tr class="AthletesContent">
        <td class="AthletesNameContent"> <b class="AthletesPageContent"> <a href= "<?php echo $athletes["people_links"]; ?>"> <?php echo $athletes["first_name"]; ?> <?php echo $athletes["last_name"]; ?></a> </b></td>
        <td class="SportPlayed"><?php echo $athletes["sport_known_for"]; ?></td>
      </tr>
      </div>

        <?php
            }

            // 4. Release returned data
            mysqli_free_result($result);
        ?>

    </table>
    </div>

    <!--link to Total Athletes Count-->
<?php
  require_once 'queryfunctions/people-functions.php';
  peopleCityBornByJobCount($city, $job);
?>

<?php
  // footer display function
  footerTemp();
?>