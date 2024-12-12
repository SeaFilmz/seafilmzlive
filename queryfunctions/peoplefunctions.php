<?php
  function newIndividualPeopleFactPageQuery($peopleSLUG) {
    global $newconnection;

    // 2. Perform database query
    $query = $newconnection->prepare("SELECT * FROM peoples INNER JOIN cities ON cities.CityID = peoples.BirthCityID WHERE PeopleLinks = ? ");
    
    $query->bind_param("s", $peopleSLUG);
    $query->execute();

    //Result variable with an error check
    $result = $query->get_result()
      or die("Database query failed.");

    return $result;
} ?>