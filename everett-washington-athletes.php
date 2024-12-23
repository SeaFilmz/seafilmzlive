<!--link to the start of a seafilmz general webpage template-->
<?php
  $title = 'Everett, Washington Athletes - SeaFilmz';
  $mDesc = 'List of athletes born in the city of Everett, Washington organized by sport then by first name.';
  $body = 'MainBody';
  require_once 'sftemplate.php';
  headerTemp();
?>

    <h2 class="AthletesPageHeader">
      <b>
        <a href="everett-washington-athletes-beta">New Athletes Data UI Beta</a>
      </b>
    </h2>

    <h2 class="AthletesPageHeader">
      <b>
        <a href="everett-washington-athletes-dataviz">Everett, Washington Born Athletes Dataviz</a>
      </b>
    </h2>

    <h2 class="AthletesPageHeader"><b>Athletes Born in Everett, Washington</b></h2>

    <div class="ATable">
    <table class="AthletesTable">
      <tr>
        <th class="AthletesColumnHeader1">Name</th>
        <th class="AthletesColumnHeader2">Sport Known For</th>
      </tr>

        <?php
            // 2. Perform database query
            $query = $newconnection->prepare(" SELECT * FROM peoplesjobs INNER JOIN peoples ON peoples.PeopleID = peoplesjobs.PeopleID INNER JOIN jobs ON jobs.JobID = peoplesjobs.JobID INNER JOIN cities ON cities.CityID = peoples.BirthCityID WHERE City = ? AND Jobs = ? ORDER BY SportKnownFor ASC, FirstName ");

            $city = 'Everett';
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
  require 'queryfunctions/peoplefunctions.php';
  peopleCityBornByJobCount('Everett', 'athlete');
?>

<?php
  // footer display function
  footerTemp();
?>