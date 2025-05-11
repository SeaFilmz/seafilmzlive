<!--link to the start of a seafilmz general webpage template-->
<?php
  $title = 'Anchorage, Alaska Athletes - SeaFilmz';
  $mDesc = 'List of athletes born in the city of Anchorage organized by sport then by first name.';
  $ogTitle = 'Anchorage, Alaska Athletes - SeaFilmz';
  $ogURL = 'https://seafilmz.com/anchorage-alaska-athletes';
  $body = 'MainBody';
  require_once 'templates/main-page-structure.php';
  headerTemp();
?>

    <p class="AthletesPageHeader">
      <b>
        <a href="anchorage-alaska-athletes-beta">New Athletes Data UI Beta</a>
      </b>
    </p>

    <p class="AthletesPageHeader">
      <b>
        <a href="anchorage-alaska-athletes-dataviz">Anchorage Born Athletes Dataviz</a>
      </b>
    </p>

    <h1 class="AthletesPageHeader"><b>Athletes Born in Anchorage</b></h1>

    <div class="ATable">
    <table class="AthletesTable">
      <tr>
        <th class="AthletesColumnHeader1">Name</th>
        <th class="AthletesColumnHeader2">Sport Known For</th>
      </tr>

        <?php
            // 2. Perform database query
            $query = $newconnection->prepare("SELECT * FROM peoples_jobs INNER JOIN peoples ON peoples.PeopleID = peoples_jobs.PeopleID INNER JOIN jobs ON jobs.JobID = peoples_jobs.JobID INNER JOIN cities ON cities.CityID = peoples.BirthCityID WHERE City = ? AND Jobs = ? ORDER BY SportKnownFor ASC, FirstName ");

            $city = 'Anchorage';
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

      <tr class="AthletesContent">
        <td class="AthletesNameContent"> <b class="AthletesPageContent"> <a href= "<?php echo $athletes["PeopleLinks"]; ?>"> <?php echo $athletes["FirstName"]; ?> <?php echo $athletes["LastName"]; ?></a> </b></td>
        <td class="SportPlayed"><?php echo $athletes["SportKnownFor"]; ?></td>
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
  require 'queryfunctions/athlete-functions.php';
  require 'queryfunctions/people-functions.php';
  peopleCityBornByJobCount('Anchorage', 'athlete');
?>


<?php
  // footer display function
  footerTemp();
?>