<?php
  function cityQuery($cityLinkSlug) {
    global $newconnection;

    // 2. Perform database query
    $query = $newconnection->prepare("SELECT * FROM `citiescounty` INNER JOIN cities ON cities.CityID = citiescounty.CityID INNER JOIN county ON county.CountyID = citiescounty.CountyID WHERE CityLinks = ? ");

    $query->bind_param("s", $cityLinkSlug);
    $query->execute();

    //Result variable with an error check
    $result = $query->get_result()
      or die("Database query failed.");

    return $result;
} ?>

<?php
  function cityFilmedMovieTableQuery($city) {
    global $newconnection, $rows;

    // 2. Perform database query
    $query = $newconnection->prepare("SELECT * FROM moviesfilminglocation INNER JOIN movies ON movies.MovieID = moviesfilminglocation.MovieID INNER JOIN cities ON cities.CityID = moviesfilminglocation.CityID WHERE City = ? ORDER BY MovieTitle ASC ");

    $query->bind_param("s", $city);
    $query->execute();

    //Result variable with an error check
    $result = $query->get_result()
      or die("Database query failed.");

    $rows = mysqli_num_rows($result);
?>
  <?php
    if ($rows >= 1) {
  ?>

      <tr class="cityDataPointRow">
        <td class="cityData cityDataDesc">Movies Filmed in <?= $city; ?></td>
        <td class="cityData">
<?php
      // 3. Use returned data (if any)
      while ($movies = mysqli_fetch_assoc($result)) {
        // output data from each row
?>

        <div class="movieTheaters"><a href= "<?= $movies["MoviePageLink"]; ?>" target="_blank"><?= $movies["MovieTitle"]; ?></a></div>

  <?php
      }
  ?>
        </td>
      </tr>
  <?php
    }
  ?>

  <?php

      // 4. Release returned data
      mysqli_free_result($result);
  }
?>

<?php
  function cityAttractionQuery($city, $attractionType) {
    global $newconnection;

    // 2. Perform database query
    $query = $newconnection->prepare("SELECT * FROM attractionscity INNER JOIN attractions ON attractions.AttractionID = attractionscity.AttractionID INNER JOIN cities ON cities.CityID = attractionscity.CityID WHERE City = ? AND AttractionType = ? ORDER BY AttractionName ASC ");

    $query->bind_param("ss", $city, $attractionType);
    $query->execute();

    //Result variable with an error check
    $result = $query->get_result()
      or die("Database query failed.");

    // 3. Use returned data (if any)
    while ($attractions = mysqli_fetch_assoc($result)) {
      // output data from each row
?>

      <li class="SMTElements"><a href= "<?php echo $attractions["AttractionLink"]; ?>"><?php echo $attractions["AttractionName"]; ?></a></li>

  <?php
    }

      // 4. Release returned data
      mysqli_free_result($result);
  }
?>

<?php
  function cityAttractionTableQuery($city, $attractionType) {
    global $newconnection, $rows;

    // 2. Perform database query
    $query = $newconnection->prepare("SELECT * FROM attractionscity INNER JOIN attractions ON attractions.AttractionID = attractionscity.AttractionID INNER JOIN cities ON cities.CityID = attractionscity.CityID WHERE City = ? AND AttractionType = ? ORDER BY AttractionName ASC ");

    $query->bind_param("ss", $city, $attractionType);
    $query->execute();

    //Result variable with an error check
    $result = $query->get_result()
      or die("Database query failed.");

    $rows = mysqli_num_rows($result);
?>
  <?php
    if ($rows >= 1) {
  ?>

      <tr class="cityDataPointRow">
        <td class="cityData cityDataDesc"><?= $attractionType; ?></td>
        <td class="cityData">
<?php
    // 3. Use returned data (if any)
    while ($attractions = mysqli_fetch_assoc($result)) {
      // output data from each row
?>

        <div class="movieTheaters"><a href= "<?= $attractions["AttractionLink"]; ?>"><?= $attractions["AttractionName"]; ?></a></div>

  <?php
    }
  ?>
        </td>
      </tr>
  <?php
    }
  ?>

  <?php
      // 4. Release returned data
      mysqli_free_result($result);
  }
?>