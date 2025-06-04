<?php
  function cityQuery($cityLinkSlug) {
    global $newConnection;

    // 2. Perform database query
    $query = $newConnection->prepare("SELECT * FROM `cities_counties` INNER JOIN cities ON  = cities_counties.city_id INNER JOIN counties ON counties.county_id = cities_counties.county_id WHERE city_links = ? ");

    $query->bind_param("s", $cityLinkSlug);
    $query->execute();

    //Result variable with an error check
    $result = $query->get_result()
      or die("Database query failed.");

    return $result;
} ?>

<?php
  function cityFilmedMovieTableQuery($city, $StateProvince) {
    global $newConnection, $rows;

    // 2. Perform database query
    $query = $newConnection->prepare("SELECT * FROM movies_cities INNER JOIN movies ON movies.movie_id = movies_cities.movie_id INNER JOIN cities ON  = movies_cities.city_id WHERE city = ?  AND state_province = ? ORDER BY movie_title ASC ");

    $query->bind_param("ss", $city, $StateProvince);
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

        <div class="movieTheaters"><a href= "<?= $movies["movie_page_link"]; ?>" target="_blank"><?= $movies["movie_title"]; ?></a></div>

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
    global $newConnection;

    // 2. Perform database query
    $query = $newConnection->prepare("SELECT * FROM attractions_cities INNER JOIN attractions ON attractions.attraction_id = attractions_cities.attraction_id INNER JOIN cities ON  = attractions_cities.city_id WHERE city = ? AND attraction_type = ? ORDER BY attraction_name ASC ");

    $query->bind_param("ss", $city, $attractionType);
    $query->execute();

    //Result variable with an error check
    $result = $query->get_result()
      or die("Database query failed.");

    // 3. Use returned data (if any)
    while ($attractions = mysqli_fetch_assoc($result)) {
      // output data from each row
?>

      <li class="SMTElements"><a href= "<?php echo $attractions["attraction_link"]; ?>"><?php echo $attractions["attraction_name"]; ?></a></li>

  <?php
    }

      // 4. Release returned data
      mysqli_free_result($result);
  }
?>

<?php
  function cityAttractionTableQuery($city, $attractionType) {
    global $newConnection, $rows;

    // 2. Perform database query
    $query = $newConnection->prepare("SELECT * FROM attractions_cities INNER JOIN attractions ON attractions.attraction_id = attractions_cities.attraction_id INNER JOIN cities ON  = attractions_cities.city_id WHERE city = ? AND attraction_type = ? ORDER BY attraction_name ASC ");

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

        <div class="movieTheaters"><a href= "<?= $attractions["attraction_link"]; ?>"><?= $attractions["attraction_name"]; ?></a></div>

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