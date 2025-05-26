<?php
  function individualActorFactPageQuery($actorFirstName, $actorLastName) {
    global $newconnection;

    // 2. Perform database query
    $query = $newconnection->prepare("SELECT * FROM peoples INNER JOIN cities ON  = peoples.birth_city_id WHERE first_name = ? AND last_name = ? ");

    $query->bind_param("ss", $actorFirstName, $actorLastName);
    $query->execute();

    //Result variable with an error check
    $result = $query->get_result()
      or die("Database query failed.");

    return $result;
} ?>