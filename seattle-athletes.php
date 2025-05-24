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

    <h1 class="AthletesPageHeader"><b>Athletes Born in Seattle</b></h1>

    <div class="ATable">
    <table class="AthletesTable">
      <tr>
        <th class="AthletesColumnHeader1">Name</th>
        <th class="AthletesColumnHeader2">Sport Known For</th>
      </tr>

        <?php
            // 2. Perform database query
            $query = $newconnection->prepare("SELECT * FROM peoples_jobs INNER JOIN peoples ON peoples.people_id = peoples_jobs.people_id INNER JOIN jobs ON  = peoples_jobs.job_id INNER JOIN cities ON  = peoples.birth_city_id WHERE city = ? AND jobs = ? ORDER BY SportKnownFor ASC, FirstName  ");

            $city = 'Seattle';
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
        <td class="AthletesNameContent"> <b class="AthletesPageContent"> <a href= "<?php echo $athletes["people_links"]; ?>"> <?php echo $athletes["FirstName"]; ?> <?php echo $athletes["LastName"]; ?></a> </b></td>
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
  require 'queryfunctions/people-functions.php';
  peopleCityBornByJobCount('Seattle', 'athlete');
?>

<?php
  // footer display function
  footerTemp();
?>