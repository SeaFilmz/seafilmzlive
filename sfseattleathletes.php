<?php require_once("db_connection.php"); ?>
<!DOCTYPE html>
<html lang="en">

  <head>
    <!--Connection to Google Analytics.-->
    <?php include "googleanalytics_connection.php"; ?>

    <meta charset="utf-8">
    <meta name="description" content="List of atheletes born in the city of Seattle organized by sport then by first name.">
    <title>Seattle Athletes - SeaFilmz</title>
    <link type="text/css" rel="stylesheet" href="sfcss.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="sfmain.js" defer></script>
  </head>

  <body>
    <header id="#SeattleAthletesTop" class="banner">
      <a href="index.php"><h1>SeaFilmz</h1></a>
      <b class="solgan">Your Seattle Film and Data Connection</b>

    <!--link to desktop and mobile menu in header-->
<?php require_once("sfmenu.php"); ?>

    </header>

    <h2 class="AthletesPageHeader"><b>Athletes Born in Seattle</b></h2>

    <div class="ATable">
    <table class="AthletesTable">
      <tr>
        <th class="AthletesColumnHeader1">Name</th>
        <th class="AthletesColumnHeader2">Sport Known For</th>
      </tr>

        <?php
            // 2. Perform database query
            $query = "SELECT * ";
            $query .= "FROM athletes ";
            $query .= "ORDER BY SportKnownFor ASC, FirstName ";
            $result = mysqli_query($connection, $query);
            //Test if there was a query error
            if (!$result) {
                die("Database query failed.");
            }
        ?>

        <?php
            // 3. Use returned data (if any)
            while($athletes = mysqli_fetch_assoc($result)) {
                // output data from each row
        ?>

      <div class="AthletesMainContent">
      <tr class="AthletesContent">
        <td class="AthletesNameContent"> <b class="AthletesPageContent"> <a href= "<?php echo $athletes["AthletePageLink"]; ?>"> <?php echo $athletes["FirstName"]; ?> <?php echo $athletes["LastName"]; ?></a> </b></td>
        <td class="SportPlayed"><?php echo $athletes["SportKnownFor"]; ?></td>
      </tr>
      </div>

        <?php
            }
        ?>

        <?php
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
            $query = "SELECT COUNT(*) ";
            $query .= "FROM athletes ";
            $result = mysqli_query($connection, $query);
            //Test if there was a query error
            if (!$result) {
                die("Database query failed.");
            } /* else {
                echo "Connected";
            } */
        ?>

        <?php
            // 3. Use returned data (if any)
            while($athletes = mysqli_fetch_assoc($result)) {
                // output data from each row
        ?>

        <td class="AthletesCountNumber"><?php echo $athletes["COUNT(*)"]; ?></td>
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

    <footer>
      <nav class="navigation">
        <ul>
          <li class="NavFooterMobile"><a href="#SeattleAthletesTop">Go to Top</a></li>

          <?php require_once("sffootermenu.php"); ?>
        </ul>
      </nav>
    </footer>

  </body>

</html>

<?php
    // 5. Close database connection
    mysqli_close($connection);
?>