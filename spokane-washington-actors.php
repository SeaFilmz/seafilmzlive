<!--link to the start of a seafilmz general webpage template-->
<?php
  $title = 'Spokane, Washington Actors by First Name or by Birthdate - SeaFilmz';
  $mDesc = 'List of actors born is the city of Spokane, Washington organized by first name or by birthdate.';
  $ogTitle = 'Spokane, Washington Actors by First Name or by Birthdate - SeaFilmz';
  $ogURL = 'https://seafilmz.com/spokane-washington-actors';
  $body = 'MainBody';
  require_once 'templates/main-page-structure.php';
  headerTemp();
?>

    <p class="ActorsPageHeader">
      <b>
        <a href="spokane-washington-actors-beta">New Actors Data UI Beta</a>
      </b>
    </p>

    <h1 id="SortByActorName" class="ActorsPageHeader"><b>Actors Born in Spokane, Washington by First Name</b></h1>

    <div class="MATable">
    <table class="ActorsTable">
      <tr>
        <th class="ActorsColumnHeader1">Name</th>
        <th class="ActorsColumnHeader2"><a href="#SortByBirthdate" class="SortText">Birthdate</a><div class="SortTriangle">&#9660</div></th>
      </tr>

        <?php
            // 2. Perform database query
            $query = $newConnection->prepare("SELECT * FROM peoples_jobs INNER JOIN peoples ON peoples.people_id = peoples_jobs.people_id INNER JOIN jobs ON jobs.job_id = peoples_jobs.job_id INNER JOIN cities ON cities.city_id = peoples.birth_city_id WHERE city = ? AND job = ? AND first_name IS NOT NULL ORDER BY first_name ASC ");

            $city = 'Spokane';
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
        <td class="ActorsNameContent"><b class="ActorsFirstName"> <a href= "<?php echo $actors["people_links"]; ?>"> <?php echo $actors["first_name"]; ?> <?php echo $actors["middle_initial_name"]; ?> <?php echo $actors["last_name"]; ?></a></b></td>
        <td class="ActorsBirthdateContent"><?php $date = date_create($actors["birthdate"]); echo date_format($date, "M d, Y"); ?></td>
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
  require_once 'queryfunctions/people-functions.php';
  peopleCityBornByJobCount('Spokane', 'actor');
?>

    <h1 id="SortByBirthdate" class="ActorsPageHeader"><b>Actors Born in Spokane, Washington by Birthdate</b></h1>

    <div class="MATable">
    <table class="ActorsTable">
      <tr>
        <th class="ActorsColumnHeader1"><a href="#SortByActorName" class="SortText">Name</a><div class="SortTriangle">&#9650</div></th>
        <th class="ActorsColumnHeader2">Birthdate</th>
      </tr>

        <?php
            // 2. Perform database query
            $query = $newConnection->prepare("SELECT * FROM peoples_jobs INNER JOIN peoples ON peoples.people_id = peoples_jobs.people_id INNER JOIN jobs ON jobs.job_id = peoples_jobs.job_id INNER JOIN cities ON cities.city_id = peoples.birth_city_id WHERE city = ? AND job = ? AND first_name IS NOT NULL ORDER BY birthdate DESC ");

            $cityBirthdate = 'Spokane';
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
        <td class="ActorsNameContent"> <b class="ActorsFirstName"> <a href= "<?php echo $actors["people_links"]; ?>"> <?php echo $actors["first_name"]; ?> <?php echo $actors["middle_initial_name"]; ?> <?php echo $actors["last_name"]; ?></a></b></td>
        <td class="ActorsBirthdateContent"><?php $date = date_create($actors["birthdate"]); echo date_format($date, "M d, Y"); ?></td>
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
<?php peopleCityBornByJobCount('Spokane', 'actor'); ?>

<?php
  // footer display function
  footerTemp();
?>