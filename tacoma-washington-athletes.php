<!--link to the start of a seafilmz general webpage template-->
<?php
  $title = 'Tacoma, Washington Athletes - SeaFilmz';
  $mDesc = 'List of athletes born in the city of Tacoma, Washington organized by sport then by first name.';
  $ogTitle = 'Tacoma, Washington Athletes - SeaFilmz';
  $ogURL = 'https://seafilmz.com/tacoma-washington';
  $body = 'MainBody';
  require_once 'templates/main-page-structure.php';
  headerTemp();
?>

    <p class="AthletesPageHeader">
      <b>
        <a href="tacoma-washington-athletes-beta">New Athletes Data UI Beta</a>
      </b>
    </p>

    <h2 class="AthletesPageHeader">
      <b>
        <a href="tacoma-washington-athletes-dataviz">Tacoma, Washington Born Athletes Dataviz</a>
      </b>
    </h2>

    <h1 class="AthletesPageHeader"><b>Athletes Born in Tacoma, Washington</b></h1>

    <div class="ATable">
    <table class="AthletesTable">
      <tr>
        <th class="AthletesColumnHeader1">Name</th>
        <th class="AthletesColumnHeader2">Sport Known For</th>
      </tr>

        <?php
            // 2. Perform database query
            $query = $newconnection->prepare("SELECT * FROM peoples_jobs INNER JOIN peoples ON peoples.people_id = peoples_jobs.people_id INNER JOIN jobs ON  = peoples_jobs.job_id INNER JOIN cities ON  = peoples.birth_city_id WHERE city = ? AND jobs = ? ORDER BY SportKnownFor ASC, FirstName ");

            $city = 'Tacoma';
            $job = 'athlete';
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
        <td class="AthletesNameContent"> <b class="AthletesPageContent"> <a href= "<?php echo $athletes["PeopleLinks"]; ?>"> <?php echo $athletes["FirstName"]; ?> <?php echo $athletes["LastName"]; ?></a> </b></td>
        <td class="SportPlayed"><?php echo $athletes["SportKnownFor"]; ?></td>
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
  require 'queryfunctions/people-functions.php';
  peopleCityBornByJobCount('Tacoma', 'athlete');
?>


<?php
  // footer display function
  footerTemp();
?>