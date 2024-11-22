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