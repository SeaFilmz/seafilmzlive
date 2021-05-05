<!--link to the start of a seafilmz general webpage template-->
<?php
  $title = 'Seattle Athletes - SeaFilmz'; 
  $mDesc = 'List of athletes born in the city of Seattle organized by sport then by first name.';
  $body = 'MainBody';
  require_once 'sftemplate.php';
  headerTemp();
?>

    <h2 class="AthletesPageHeader">
      <b>
        <a href="seattleathletes">New Athletes Data UI Beta</a>
      </b>
    </h2>

    <h2 class="AthletesPageHeader"><b>Athletes Born in Seattle</b></h2>

    <div class="ATable">
    <table class="AthletesTable">
      <tr>
        <th class="AthletesColumnHeader1">Name</th>
        <th class="AthletesColumnHeader2">Sport Known For</th>
      </tr>

        <?php
            // 2. Perform database query
            $query = $newconnection->prepare(" SELECT * FROM peoplesjobs INNER JOIN peoples ON peoples.PeopleID = peoplesjobs.PeopleID INNER JOIN jobs ON jobs.JobID = peoplesjobs.JobID WHERE CityTownBorn = ? AND Jobs = ? ORDER BY SportKnownFor ASC, FirstName ");

            $city = 'Seattle';
            $job = 'athlete';
            $query->execute();

            //Result variable with an error check
            $result = $query->get_result()
              or die("Database query failed.");

            // 3. Use returned data (if any)
            while($athletes = mysqli_fetch_assoc($result)) {
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

    <div class="ACTable">
    <table class="AthletesCountTable">
      <tr class="MoviesContent">
        <th class="AthletesCountRowHeader">Total Athletes</th>

        <?php
            // 2. Perform database query
            $query = $newconnection->prepare("SELECT COUNT(*) FROM peoplesjobs INNER JOIN peoples ON peoples.PeopleID = peoplesjobs.PeopleID INNER JOIN jobs ON jobs.JobID = peoplesjobs.JobID WHERE CityTownBorn = ? AND Jobs = ? ");

            $query->bind_param("ss", $city, $job);
            $query->execute();
            
            //Result variable with an error check
            $result = $query->get_result()
              or die("Database query failed.");

            // 3. Use returned data (if any)
            while($athletes = mysqli_fetch_assoc($result)) {
                // output data from each row
        ?>

        <td class="AthletesCountNumber"><?php echo $athletes["COUNT(*)"]; ?></td>
      </tr>

        <?php
            }

            // 4. Release returned data
            mysqli_free_result($result);
        ?>

    </table>
    </div>

    <!--link to footer-->
<?php
  require_once 'sftemplate.php';
  footerTemp();
?>