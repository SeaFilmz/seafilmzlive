<!--link to the start of a seafilmz general webpage template-->
<?php
  $title = 'Portland, Oregon Actors by First Name or by Birthdate - SeaFilmz';
  $mDesc = 'List of actors born is the city of Portland, Oregon organized by first name or birthdate.';
  $ogTitle = 'Portland, Oregon Actors by First Name or by Birthdate - SeaFilmz';
  $ogURL = 'https://seafilmz.com/portland-oregon-actors';
  $body = 'MainBody';
  require_once 'templates/main-page-structure.php';
  headerTemp();
?>

    <p class="ActorsPageHeader">
      <b>
        <a href="portland-oregon-actors-beta">New Actors Data UI Beta</a>
      </b>
    </p>

    <h1 id="sortByActorName" class="ActorsPageHeader"><b>Actors Born in Portland, Oregon by First Name</b></h1>

    <div class="MATable">
    <table class="ActorsTable">
      <tr>
        <th class="ActorsColumnHeader1">Name</th>
        <th class="ActorsColumnHeader2"><a href="#sortByBirthdate" class="SortText">Birthdate</a><div class="SortTriangle">&#9660</div></th>
      </tr>

        <?php
            // 2. Perform database query
            $query = $newconnection->prepare("SELECT * FROM peoples_jobs INNER JOIN peoples ON peoples.people_id = peoples_jobs.people_id INNER JOIN jobs ON  = peoples_jobs.job_id INNER JOIN cities ON  = peoples.birth_city_id WHERE city = ? AND jobs = ? AND first_name IS NOT NULL ORDER BY first_name ASC ");

            $city = 'Portland';
            $job = 'actor';
            $query->bind_param("ss", $city, $job);
            $query->execute();

            //Result variable with an error check
            $result = $query->get_result()
              or die("Database query failed.");

            // 3. Use returned data (if any)
            while ($actors = mysqli_fetch_assoc($result)) {
                // output data from each row
        ?>

      <tr class="ActorsMainContent">
        <td class="ActorsNameContent"><b class="ActorsFirstName"> <a href= "<?php echo $actors["people_links"]; ?>"> <?php echo $actors["first_name"]; ?> <?php echo $actors["middle_initialname"]; ?> <?php echo $actors["LastName"]; ?></a></b></td>
        <td class="ActorsBirthdateContent"><?php $date = date_create($actors["BirthDate"]); echo date_format($date, "M d, Y"); ?></td>
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

    <!--link to Total Actors Count-->
<?php
  require 'queryfunctions/people-functions.php';
  peopleCityBornByJobCount('Portland', 'actor');
?>

    <h1 id="sortByBirthdate" class="ActorsPageHeader"><b>Actors Born in Portland, Oregon by Birthdate</b></h1>

    <div class="MATable">
    <table class="ActorsTable">
      <tr>
        <th class="ActorsColumnHeader1"><a href="#sortByActorName" class="SortText">Name</a><div class="SortTriangle">&#9650</div></th>
        <th class="ActorsColumnHeader2">Birthdate</th>
      </tr>

        <?php
            // 2. Perform database query
            $query = $newconnection->prepare("SELECT * FROM peoples_jobs INNER JOIN peoples ON peoples.people_id = peoples_jobs.people_id INNER JOIN jobs ON  = peoples_jobs.job_id INNER JOIN cities ON  = peoples.birth_city_id WHERE city = ? AND jobs = ? AND first_name IS NOT NULL ORDER BY Birthdate DESC ");

            $cityBirthdate = 'Portland';
            $jobBirthdate = 'actor';
            $query->bind_param("ss", $cityBirthdate, $jobBirthdate);
            $query->execute();

            //Result variable with an error check
            $result = $query->get_result()
              or die("Database query failed.");

            // 3. Use returned data (if any)
            while ($actors = mysqli_fetch_assoc($result)) {
                // output data from each row
        ?>

      <tr class="ActorsMainContent">
        <td class="ActorsNameContent"> <b class="ActorsFirstName"> <a href= "<?php echo $actors["people_links"]; ?>"> <?php echo $actors["first_name"]; ?> <?php echo $actors["middle_initialname"]; ?> <?php echo $actors["LastName"]; ?></a></b></td>
        <td class="ActorsBirthdateContent"><?php $date = date_create($actors["BirthDate"]); echo date_format($date, "M d, Y"); ?></td>
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

    <!--link to Total Actors Count-->
<?php peopleCityBornByJobCount('Portland', 'actor'); ?>

<?php
  // footer display function
  footerTemp();
?>