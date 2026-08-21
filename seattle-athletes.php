<!--link to the start of a seafilmz general webpage template-->
<?php
  $title = 'Seattle Athletes - SeaFilmz';
  $mDesc = 'List of athletes born in the city of Seattle organized by sport then by first name.';
  $ogTitle = 'Seattle Athletes - SeaFilmz';
  $ogURL = 'https://seafilmz.com/seattle-athletes';
  $body = 'MainBody';
  require_once 'templates/main-page-structure.php';
  headerTemp();
?>

    <p class="AthletesPageHeader">
      <b>
        <a href="seattle-athletes-beta">New Athletes Data UI Beta</a>
      </b>
    </p>

    <p class="AthletesPageHeader">
      <b>
        <a href="seattle-athletes-dataviz">Seattle Born Athletes Dataviz</a>
      </b>
    </p>

    <h2 class="AthletesPageHeader"><b>Athletes Born in Seattle</b></h2>

    <div class="ATable">
    <table class="AthletesTable">
      <tr>
        <th class="AthletesColumnHeader1">Name</th>
        <th class="AthletesColumnHeader2">Sport Known For</th>
      </tr>

        <?php
            // 1. Declare Global Variables
            $city = 'Seattle';
            $job = 'athlete';

            // 2. Perform database query
            $query = $newConnection->prepare("SELECT * FROM peoples_jobs INNER JOIN peoples ON peoples.people_id = peoples_jobs.people_id INNER JOIN jobs ON jobs.job_id = peoples_jobs.job_id INNER JOIN cities ON cities.city_id = peoples.birth_city_id WHERE city = ? AND job = ? AND first_name IS NOT NULL ORDER BY first_name ASC ");

            $query->bind_param("ss", $city, $job);
            $query->execute();

            //Result variable with an error check
            $result = $query->get_result()
              or die("Database query failed.");

            // 3. Use returned data (if any)
            while ($athletes = mysqli_fetch_assoc($result)) {
                // output data from each row
        ?>

      <tr class="AthletesContent">
        <td class="AthletesNameContent"> <b class="AthletesPageContent"> <a href= "<?php echo $athletes["people_links"]; ?>"> <?php echo $athletes["first_name"]; ?> <?php echo $athletes["last_name"]; ?></a> </b></td>
        <td class="SportPlayed"><?php echo $athletes["sport_known_for"]; ?></td>
      </tr>

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