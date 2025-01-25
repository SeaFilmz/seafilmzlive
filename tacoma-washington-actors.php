<?php
  $title = 'Tacoma, Washington Actors by First Name or by Birthdate- SeaFilmz';
  $mDesc = 'List of actors born is the city of Tacoma, Washington organized by first name or by birthday.';
  $ogTitle = 'Tacoma, Washington Actors by First Name or by Birthdate - SeaFilmz';
  $ogURL = 'https://seafilmz.com/tacoma-washington-actors';
  $body = 'MainBody';
  require_once 'sftemplate.php';
  headerTemp();
?>

    <p class="ActorsPageHeader">
      <b>
        <a href="tacoma-washington-actors-beta">New Actors Data UI Beta</a>
      </b>
    </p>

    <h1 id="sortByActorName" class="ActorsPageHeader"><b>Actors Born in Tacoma, Washington by First Name</b></h1>

    <div class="MATable">
    <table class="ActorsTable">
      <tr>
        <th class="ActorsColumnHeader1">Name</th>
        <th class="ActorsColumnHeader2"><a href="#sortByBirthdate" class="SortText">Birthdate</a><div class="SortTriangle">&#9660;</div></th>
      </tr>

        <?php
            // 2. Perform database query
            $query = $newconnection->prepare("SELECT * FROM peoplesjobs INNER JOIN peoples ON peoples.PeopleID = peoplesjobs.PeopleID INNER JOIN jobs ON jobs.JobID = peoplesjobs.JobID INNER JOIN cities ON cities.CityID = peoples.BirthCityID WHERE City = ? AND Jobs = ? AND FirstName IS NOT NULL ORDER BY FirstName ASC ");

            $city = 'Tacoma';
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
        <td class="ActorsNameContent"><b class="ActorsFirstName"> <a href= "<?php echo $actors["PeopleLinks"]; ?>"> <?php echo $actors["FirstName"]; ?> <?php echo $actors["MiddleInitialName"]; ?> <?php echo $actors["LastName"]; ?></a></b></td>
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
  require 'queryfunctions/peoplefunctions.php';
  peopleCityBornByJobCount('Tacoma', 'actor');
?>

    <h2 id="sortByBirthdate" class="ActorsPageHeader"><b>Actors Born in Tacoma, Washington by Birthdate</b></h2>

    <div class="MATable">
    <table class="ActorsTable">
      <tr>
        <th class="ActorsColumnHeader1"><a href="#sortByActorName" class="SortText">Name</a><div class="SortTriangle">&#9650;</div></th>
        <th class="ActorsColumnHeader2">Birthdate</th>
      </tr>

        <?php
            // 2. Perform database query
            $query = $newconnection->prepare("SELECT * FROM peoplesjobs INNER JOIN peoples ON peoples.PeopleID = peoplesjobs.PeopleID INNER JOIN jobs ON jobs.JobID = peoplesjobs.JobID INNER JOIN cities ON cities.CityID = peoples.BirthCityID WHERE City = ? AND Jobs = ? AND FirstName IS NOT NULL ORDER BY Birthdate DESC ");

            $cityBirthdate = 'Tacoma';
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
        <td class="ActorsNameContent"> <b class="ActorsFirstName"> <a href= "<?php echo $actors["PeopleLinks"]; ?>"> <?php echo $actors["FirstName"]; ?> <?php echo $actors["MiddleInitialName"]; ?> <?php echo $actors["LastName"]; ?></a></b></td>
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
<?php   peopleCityBornByJobCount('Tacoma', 'actor'); ?>

<?php
  // footer display function
  footerTemp();
?>