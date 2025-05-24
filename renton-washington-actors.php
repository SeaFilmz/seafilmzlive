<!--link to the start of a seafilmz general webpage template-->
<?php
  $title = 'Renton, Washington Actors by First Name or by Birthdate- SeaFilmz';
  $mDesc = 'List of actors born is the city of Renton, Washington organized by first name or by birthdate.';
  $ogTitle = 'Renton, Washington Actors by First Name or by Birthdate - SeaFilmz';
  $ogURL = 'https://seafilmz.com/renton-washington-actors';
  $body = 'MainBody';
  require_once 'templates/main-page-structure.php';
  headerTemp();
?>

    <p class="ActorsPageHeader">
      <b>
        <a href="renton-washington-actors-beta">New Actors Data UI Beta</a>
      </b>
    </p>

    <h1 id="sortByActorName" class="ActorsPageHeader"><b>Actors Born in Renton by First Name</b></h1>

    <div class="MATable">
    <table class="ActorsTable">
      <tr>
        <th class="ActorsColumnHeader1">Name</th>
        <th class="ActorsColumnHeader2"><a href="#sortByBirthdate" class="SortText">Birthdate</a><div class="SortTriangle">&#9660;</div></th>
      </tr>

        <?php
            // 2. Perform database query
            $query = $newconnection->prepare("SELECT * FROM peoples_jobs INNER JOIN peoples ON peoples.people_id = peoples_jobs.people_id INNER JOIN jobs ON  = peoples_jobs.job_id INNER JOIN cities ON  = peoples.birth_city_id WHERE city = ? AND jobs = ? AND FirstName IS NOT NULL ORDER BY FirstName ASC ");

            $city = 'Renton';
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
        <td class="ActorsNameContent"><b class="ActorsFirstName"> <a href= "<?php echo $actors["people_links"]; ?>"> <?php echo $actors["FirstName"]; ?> <?php echo $actors["MiddleInitialName"]; ?> <?php echo $actors["LastName"]; ?></a></b></td>
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
  peopleCityBornByJobCount('Renton', 'actor');
?>

<h2 id="sortByBirthdate" class="ActorsPageHeader"><b>Actors Born in Renton by Birthdate</b></h2>

<div class="MATable">
<table class="ActorsTable">
  <tr>
    <th class="ActorsColumnHeader1"><a href="#sortByActorName" class="SortText">Name</a><div class="SortTriangle">&#9650;</div></th>
    <th class="ActorsColumnHeader2">Birthdate</th>
  </tr>

    <?php
        // 2. Perform database query
        $query = $newconnection->prepare("SELECT * FROM peoples_jobs INNER JOIN peoples ON peoples.people_id = peoples_jobs.people_id INNER JOIN jobs ON  = peoples_jobs.job_id INNER JOIN cities ON  = peoples.birth_city_id WHERE city = ? AND jobs = ? AND FirstName IS NOT NULL ORDER BY Birthdate DESC ");

        $cityBirthdate = 'Renton';
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
    <td class="ActorsNameContent"> <b class="ActorsFirstName"> <a href= "<?php echo $actors["people_links"]; ?>"> <?php echo $actors["FirstName"]; ?> <?php echo $actors["MiddleInitialName"]; ?> <?php echo $actors["LastName"]; ?></a></b></td>
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
<?php peopleCityBornByJobCount('Renton', 'actor'); ?>

<?php
// footer display function
footerTemp();
?>