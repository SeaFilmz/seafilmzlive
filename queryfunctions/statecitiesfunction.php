<?php
  function stateCitiesQuery($state) {
    global $newconnection;

    // 2. Perform database query
    $query = $newconnection->prepare("SELECT * FROM `cities` WHERE StateProvince = ? ");

    $query->bind_param("s", $state);
    $query->execute();
  
    //Result variable with an error check
    $result = $query->get_result()
      or die("Database query failed.");

    while($city = mysqli_fetch_assoc($result)) { ?>
        <?php if ($city["CityLinks"] !== NULL) { ?>
            <p class="WashingtonCitiesLink"><a href= "<?= $city["CityLinks"]; ?>"><?= $city["City"];
        }
    }
    
    mysqli_free_result($result);

  }
?>