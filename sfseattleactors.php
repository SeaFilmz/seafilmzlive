<!--link to the start of a seafilmz general webpage template-->
<?php
  $title = 'Seattle Actors by First Name- SeaFilmz'; 
  $mDesc = 'List of actors born is the city of Seattle organized by first name.';
  $body = 'MainBody';
  require_once 'sftemplate.php';
  headerTemp();
?>

    <h2 id="sortByActorName" class="ActorsPageHeader"><b>Actors Born in Seattle by First Name</b></h2>     

    <div class="MATable">
    <table class="ActorsTable">
      <tr>
        <th class="ActorsColumnHeader1">Name</th>
        <th class="ActorsColumnHeader2"><a href="#sortByBirthdate" class="SortText">Birthdate</a><div class="SortTriangle">&#9660</div></th>
      </tr>

        <?php
            // 2. Perform database query
            $query = "SELECT * ";
            $query .= "FROM actors ";
            $query .= "WHERE CityTownBorn = 'Seattle' AND BirthDate IS NOT NULL ";
            $query .= "ORDER BY FirstName ASC ";
            $result = mysqli_query($connection, $query);
            //Test if there was a query error
            if (!$result) {
                die("Database query failed.");
            }
        ?>

        <?php
            // 3. Use returned data (if any)
            while($actors = mysqli_fetch_assoc($result)) {
                // output data from each row
        ?>

      <tr class="ActorsMainContent">
        <td class="ActorsNameContent"><b class="ActorsFirstName"> <a href= "<?php echo $actors["ActorLinks"]; ?>"> <?php echo $actors["FirstName"]; ?> <?php echo $actors["MiddleInitialName"]; ?> <?php echo $actors["LastName"]; ?></a></b></td>
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
<?php require 'sfactorscount.php'; ?>

    <h2 id="sortByBirthdate" class="ActorsPageHeader"><b>Actors Born in Seattle by Birthdate</b></h2>

    <div class="MATable">
    <table class="ActorsTable">
      <tr>
        <th class="ActorsColumnHeader1"><a href="#sortByActorName" class="SortText">Name</a><div class="SortTriangle">&#9650</div></th>
        <th class="ActorsColumnHeader2">Birthdate</th>
      </tr>

        <?php
            // 2. Perform database query
            $query = "SELECT * ";
            $query .= "FROM actors ";
            $query .= "WHERE CityTownBorn = 'Seattle' AND BirthDate IS NOT NULL ";
            $query .= "ORDER BY BirthDate DESC ";
            $result = mysqli_query($connection, $query);
            //Test if there was a query error
            if (!$result) {
                die("Database query failed.");
            }
        ?>

        <?php
            // 3. Use returned data (if any)
            while($actors = mysqli_fetch_assoc($result)) {
                // output data from each row
        ?>

      <tr class="ActorsMainContent">
        <td class="ActorsNameContent"> <b class="ActorsFirstName"> <a href= "<?php echo $actors["ActorLinks"]; ?>"> <?php echo $actors["FirstName"]; ?> <?php echo $actors["MiddleInitialName"]; ?> <?php echo $actors["LastName"]; ?></a></b></td>
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
<?php require 'sfactorscount.php'; ?>

    <!--link to footer-->
<?php
  require_once 'sftemplate.php';
  footer();
?>

  </body>

</html>

<?php
    // 5. Close database connection
    mysqli_close($connection);
?>