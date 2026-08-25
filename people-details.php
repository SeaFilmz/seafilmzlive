<!--link to the start of a seafilmz general webpage template-->

<?php
  require_once 'new_db_connection.php';

  $peopleSLUGPart = $_SERVER['REQUEST_URI'];
  $peopleSLUGPartFixed = str_replace('/', '', $peopleSLUGPart);

  require_once 'queryfunctions/people-functions.php';
  $result = newIndividualPeopleFactPageQuery(trim($peopleSLUGPartFixed));

  // 3. Use returned data (if any)
  if ($people = mysqli_fetch_assoc($result)) {
    // output data from each row

    $peopleFirstName = $people["first_name"];
    $peopleLastName = $people["last_name"];

  if (($peopleFirstName and $peopleLastName and $people["sport_known_for"]) != NULL) {
    $title = $peopleFirstName . ' ' . $peopleLastName . ' - SeaFilmz';
    $mDesc = $peopleFirstName . ' ' . $peopleLastName . ' is a Seattle born athlete.';
  }
  elseif (($peopleFirstName and $peopleLastName) != NULL) {
    $title = $peopleFirstName . ' ' . $peopleLastName . ' - SeaFilmz';
    $mDesc = $peopleFirstName . ' ' . $peopleLastName . ' is a Seattle born actor.';
  }
  elseif ($people["musician_name "] != NULL) {
    $title = $people["musician_name "] . ' - SeaFilmz';
    $mDesc = $people["musician_name "] . ' is a Seattle born musician.';
  }
  if (($peopleFirstName and $peopleLastName and $people["sport_known_for"]) != NULL) {
    $ogTitle = $peopleFirstName . ' ' . $peopleLastName . ' - SeaFilmz';
  }
  elseif (($peopleFirstName and $peopleLastName) != NULL) {
    $ogTitle = $peopleFirstName . ' ' . $peopleLastName . ' - SeaFilmz';
  }
  elseif ($people["musician_name "] != NULL) {
    $ogTitle = $people["musician_name "] . ' - SeaFilmz';
  }
  $ogURL = 'https://seafilmz.com' . $peopleSLUGPart;
  $schemaType = 'Person';
  $personURLSlug = $peopleSLUGPart;
  if ($people["job"] === 'musician') {
    $personName = $people["musician_name"];
  } else {
    $personName = $peopleFirstName . ' ' . $peopleLastName;
  }
  $body = 'MainBody';
  require_once 'templates/main-page-structure.php';
  headerTemp();
?>

    <main class="PeopleMainFacts">
      <?php if (($peopleFirstName and $peopleLastName) != NULL) { ?>
        <h1 class="PeopleName"><?php echo $peopleFirstName; ?>
        <?php if ($people["middle_initialname"] != NULL) { ?>
          <b class="PeopleName"><?php echo $people["middle_initialname"]; ?></b>
        <?php } ?>
        <?php echo $peopleLastName; ?></h1>
      <?php }
      elseif ($people["musician_name "] != NULL) { ?>
        <h1 class="PeopleName"><?php echo $people["musician_name "]; ?></h1>
      <?php } ?>

      <?php function tableFactRow($label, $value) { ?>
        <tr class="PeopleDataPointRow">
          <td class="PeopleData PeopleDataDesc">
              <?= htmlspecialchars($label) ?>
          </td>
          <td class="PeopleData">
            <?= htmlspecialchars($value) ?>
          </td>
        </tr>
      <?php } ?>

      <table class="IndividualPeopleTable">
        <?php
          if ($people["birth_name"] !== NULL) {
            tableFactRow("Birth Name", $people["birth_name"]);
          }
        ?>

        <?php if ($people["birthdate"] !== NULL) { ?>
          <tr class="PeopleDataPointRow">
            <td class="PeopleData PeopleDataDesc">Birthdate</td>
            <td class="PeopleData"><?php $date = date_create($people["birthdate"]); echo date_format($date, "F d, Y"); ?></td>
          </tr>
        <?php
        }
        ?>
        <?php if ($people["death_date"] !== NULL) { ?>
          <tr class="PeopleDataPointRow">
            <td class="PeopleData PeopleDataDesc">Death Date</td>
            <td class="PeopleData"><?php $date = date_create($people["death_date"]); echo date_format($date, "F d, Y"); ?></td>
          </tr>
          <tr class="PeopleDataPointRow">
            <td class="PeopleData PeopleDataDesc">Death Age</td>
            <td class="PeopleData">
            <?php
              $bday = date_create($people["birthdate"]); // Actors Birtdate for Db
              $dday = date_create($people["death_date"]);
              /*$dday = new DateTime(date('m/d/Y'));*/ // Todays Date
              $diff = $dday->diff($bday); // Calculate Age
              printf(' %d years, %d months, %d days', $diff->y, $diff->m, $diff->d); // Display Age in Years, Months, Days
            ?>
            </td>
          </tr>
        <?php
        } elseif ($people["birthdate"] != NULL) {
        ?>
          <tr class="PeopleDataPointRow">
            <td class="PeopleData PeopleDataDesc">Age</td>
            <td class="PeopleData">
            <?php
              $bday = date_create($people["birthdate"]); // Actors Birtdate from Db
              $today = new DateTime(date('m/d/Y')); // Todays Date
              $diff = $today->diff($bday); // Calculate Age
              printf(' %d years, %d months, %d days', $diff->y, $diff->m, $diff->d); // Display Age in Years, Months
            } ?>
            </td>
          </tr>
          <tr class="PeopleDataPointRow">
            <td class="PeopleData PeopleDataDesc">Birth Place</td>
            <td class="PeopleData">
            <?php
            if ($people["city_links"] !== NULL and $people["people_links"] !== NULL) { ?>
              <a href="<?php echo $people["city_links"]; ?>"><?php echo $people["city"]; ?></a>,
            <?php } else { ?>
              <?php echo $people["city"]; ?>,
            <?php } ?>
              <?php echo $people["state_province"] . ", " . $people["country"]; ?>
            </td>
          </tr>

        <?php
          if ($people["height"] != NULL) {
            tableFactRow("Height", $people["height"]);
          }

          if ($people["sport_known_for"] != NULL) {
           tableFactRow("Sport Known For", $people["sport_known_for"]);
         } ?>
      </table>
    </main>

<?php
  }

  // 4. Release returned data
  mysqli_free_result($result);

  //link to footer-->
  footerTemp();
?>