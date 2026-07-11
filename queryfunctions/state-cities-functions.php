<?php
  function stateCitiesQuery($state) {
    global $newConnection;

    // 2. Perform database query
    $query = $newConnection->prepare("SELECT * FROM `cities` WHERE state_province = ? ");

    $query->bind_param("s", $state);
    $query->execute();

    //Result variable with an error check
    $result = $query->get_result()
      or die("Database query failed.");

    while ($city = mysqli_fetch_assoc($result)) { ?>
        <?php if ($city["city_links"] !== NULL) { ?>
          <p class="StateCitiesLinks">
            <a href= "<?= $city["city_links"]; ?>"><?= $city["city"]; ?></a>
          </p>
        <?php }
    }

    mysqli_free_result($result);
  }
?>