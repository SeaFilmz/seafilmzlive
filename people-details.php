<!--link to the start of a seafilmz general webpage template-->

<?php
  require_once 'new_db_connection.php';

  $peopleSLUGPart = $_SERVER['REQUEST_URI'];
  $peopleSLUGPartFixed = str_replace('/', '', $peopleSLUGPart);

  require_once 'queryfunctions/peoplefunctions.php';
  $result = newIndividualPeopleFactPageQuery(trim($peopleSLUGPartFixed));

  // 3. Use returned data (if any) 
  if($people = mysqli_fetch_assoc($result)) {
    // output data from each row

  if (($people["FirstName"] and $people["LastName"] and $people["SportKnownFor"]) != NULL) {  
    $title = $people["FirstName"] . ' ' . $people["LastName"] . ' - SeaFilmz'; 
    $mDesc = $people["FirstName"] . ' ' . $people["LastName"] . ' is a Seattle born athlete.';
  }
  else if (($people["FirstName"] and $people["LastName"]) != NULL) {  
    $title = $people["FirstName"] . ' ' . $people["LastName"] . ' - SeaFilmz'; 
    $mDesc = $people["FirstName"] . ' ' . $people["LastName"] . ' is a Seattle born actor.';
  }
  else if ($people["MusicianName"] != NULL) {
    $title = $people["MusicianName"] . ' - SeaFilmz'; 
    $mDesc = $people["MusicianName"] . ' is a Seattle born musician.';
  }
  $body = 'MainBody';
  require_once 'sftemplate.php';
  headerTemp();
?>

    <main class="PeopleMainFacts">
      <?php if (($people["FirstName"] and $people["LastName"]) != NULL) { ?>
        <h2 class="PeopleName"><?php echo $people["FirstName"]; ?>
        <?php if ($people["MiddleInitialName"] != NULL) { ?>
          <b class="PeopleName"><?php echo $people["MiddleInitialName"]; ?></b>
        <?php } ?>
        <?php echo $people["LastName"]; ?></h2>
      <?php } 
      else if ($people["MusicianName"] != NULL) { ?>
        <h2 class="PeopleName"><?php echo $people["MusicianName"]; ?></h2>
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
          <tr class="peopleDataPointRow">
            <td class="peopleData peopleDataDesc">Birth Place</td>
            <td class="peopleData"><!--<a href="seattle">--><?php echo $people["City"]; ?><!--</a>-->, <?php echo $people["StateProvince"]; ?>, <?php echo $people["Country"]; ?></td>
          </tr>
        <?php if ($people["Height"] != NULL) { ?>
          <tr class="peopleDataPointRow">
            <td class="peopleData peopleDataDesc">Height</td>
            <td class="peopleData"><?php echo $people["Height"]; ?></td>
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