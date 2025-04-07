<!--link to the start of a seafilmz general webpage template-->
<?php
  $title = 'Seattle Musicians - SeaFilmz';
  $mDesc = 'List of musicians born in the city of Seattle organized by musician name.';
  $ogTitle = 'Seattle Musicians - SeaFilmz';
  $ogURL = 'https://seafilmz.com/seattle-musicians';
  $body = 'MainBody';
  require_once "templates/sftemplate.php";
  headerTemp();
?>



    <h1 class="MusiciansPageHeader"><b>Musicians Born in Seattle</b></h1>

    <div class="MTable">
    <table class="MusiciansTable">
      <tr>
        <th class="MusiciansColumnHeader1">Name</th>
      </tr>

      <?php
            // 2. Perform database query
            $query = $newconnection->prepare("SELECT * FROM peoplesjobs INNER JOIN peoples ON peoples.PeopleID = peoplesjobs.PeopleID INNER JOIN jobs ON jobs.JobID = peoplesjobs.JobID INNER JOIN cities ON cities.CityID = peoples.BirthCityID WHERE City = ? AND Jobs = ? AND MusicianName IS NOT NULL ORDER BY MusicianName ");

            $city = 'Seattle';
            $job = 'musician';
            $query->bind_param("ss", $city, $job);
            $query->execute();

            //Result variable with an error check
            $result = $query->get_result()
              or die("Database query failed.");

            // 3. Use returned data (if any)
            while ($musician = mysqli_fetch_assoc($result)) {
                // output data from each row
        ?>

      <tr class="MusiciansMainContent">
        <td class="MusiciansCalledContent"> <b><a href="<?php echo $musician["PeopleLinks"]; ?>"> <?php echo $musician["MusicianName"]; ?> </a></b></td>
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

    <!--link to Total Musicians Count-->
<?php
  require 'queryfunctions/musicianfunctions.php';
  cityMusiciansCount('Seattle', 'musician');
?>

    <!--link to footer-->
<?php
  footerTemp();
?>