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

  if (($people["FirstName"] and $people["LastName"] and $people["SportKnownFor"]) != NULL) {
    $title = $people["FirstName"] . ' ' . $people["LastName"] . ' - SeaFilmz';
    $mDesc = $people["FirstName"] . ' ' . $people["LastName"] . ' is a Seattle born athlete.';
  }
  elseif (($people["FirstName"] and $people["LastName"]) != NULL) {
    $title = $people["FirstName"] . ' ' . $people["LastName"] . ' - SeaFilmz';
    $mDesc = $people["FirstName"] . ' ' . $people["LastName"] . ' is a Seattle born actor.';
  }
  elseif ($people["MusicianName"] != NULL) {
    $title = $people["MusicianName"] . ' - SeaFilmz';
    $mDesc = $people["MusicianName"] . ' is a Seattle born musician.';
  }
  if (($people["FirstName"] and $people["LastName"] and $people["SportKnownFor"]) != NULL) {
    $ogTitle = $people["FirstName"] . ' ' . $people["LastName"] . ' - SeaFilmz';
  }
  elseif (($people["FirstName"] and $people["LastName"]) != NULL) {
    $ogTitle = $people["FirstName"] . ' ' . $people["LastName"] . ' - SeaFilmz';
  }
  elseif ($people["MusicianName"] != NULL) {
    $ogTitle = $people["MusicianName"] . ' - SeaFilmz';
  }
  $ogURL = 'https://seafilmz.com' . $peopleSLUGPart;
  $body = 'MainBody';
  require_once 'templates/main-page-structure.php';
  headerTemp();
?>

    <main class="PeopleMainFacts">
      <?php if (($people["FirstName"] and $people["LastName"]) != NULL) { ?>
        <h1 class="PeopleName"><?php echo $people["FirstName"]; ?>
        <?php if ($people["MiddleInitialName"] != NULL) { ?>
          <b class="PeopleName"><?php echo $people["MiddleInitialName"]; ?></b>
        <?php } ?>
        <?php echo $people["LastName"]; ?></h1>
      <?php }
      elseif ($people["MusicianName"] != NULL) { ?>
        <h1 class="PeopleName"><?php echo $people["MusicianName"]; ?></h1>
      <?php } ?>

      <table class="IndividualPeopleTable">
        <?php if ($people["BirthName"] !== NULL) { ?>
          <tr class="peopleDataPointRow">
            <td class="peopleData peopleDataDesc">Birth Name</td>
            <td class="peopleData"><?php echo $people["BirthName"]; ?></td>
          </tr>
        <?php
        }
        ?>
        <?php if ($people["BirthDate"] !== NULL) { ?>
          <tr class="peopleDataPointRow">
            <td class="peopleData peopleDataDesc">Birthdate</td>
            <td class="peopleData"><?php $date = date_create($people["BirthDate"]); echo date_format($date, "F d, Y"); ?></td>
          </tr>
        <?php
        }
        ?>
        <?php if ($people["DeathDate"] !== NULL) { ?>
          <tr class="peopleDataPointRow">
            <td class="peopleData peopleDataDesc">Death Date</td>
            <td class="peopleData"><?php $date = date_create($people["DeathDate"]); echo date_format($date, "F d, Y"); ?></td>
          </tr>
          <tr class="peopleDataPointRow">
            <td class="peopleData peopleDataDesc">Death Age</td>
            <td class="peopleData">
            <?php
              $bday = date_create($people["BirthDate"]); // Actors Birtdate for Db
              $dday = date_create($people["DeathDate"]);
              /*$dday = new DateTime(date('m/d/Y'));*/ // Todays Date
              $diff = $dday->diff($bday); // Calculate Age
              printf(' %d years, %d months, %d days', $diff->y, $diff->m, $diff->d); // Display Age in Years, Months, Days
            ?>
            </td>
          </tr>
        <?php
        } elseif ($people["BirthDate"] != NULL) {
        ?>
          <tr class="peopleDataPointRow">
            <td class="peopleData peopleDataDesc">Age</td>
            <td class="peopleData">
            <?php
              $bday = date_create($people["BirthDate"]); // Actors Birtdate from Db
              $today = new DateTime(date('m/d/Y')); // Todays Date
              $diff = $today->diff($bday); // Calculate Age
              printf(' %d years, %d months, %d days', $diff->y, $diff->m, $diff->d); // Display Age in Years, Months
            } ?>
            </td>
          </tr>
          <tr class="peopleDataPointRow">
            <td class="peopleData peopleDataDesc">Birth Place</td>
            <td class="peopleData">
            <?php
            if ($people["city_links"] !== NULL and $people["people_links"] !== NULL) { ?>
              <a href="<?php echo $people["city_links"]; ?>"><?php echo $people["city"]; ?></a>,
            <?php } else { ?>
              <?php echo $people["city"]; ?>,
            <?php } ?>
              <?php echo $people["StateProvince"] . ", " . $people["country"]; ?>
            </td>
          </tr>
        <?php if ($people["height"] != NULL) { ?>
          <tr class="peopleDataPointRow">
            <td class="peopleData peopleDataDesc">Height</td>
            <td class="peopleData"><?php echo $people["height"]; ?></td>
          </tr>
        <?php
        }
        ?>
        <?php if ($people["SportKnownFor"] != NULL) { ?>
          <tr class="peopleDataPointRow">
            <td class="peopleData peopleDataDesc">Sport Known For</td>
            <td class="peopleData"><?php echo $people["SportKnownFor"]; ?></td>
          </tr>
        <?php
        }
        ?>
      </table>
    </main>

<?php
  }

  // 4. Release returned data
  mysqli_free_result($result);

  //link to footer-->
  footerTemp();
?>