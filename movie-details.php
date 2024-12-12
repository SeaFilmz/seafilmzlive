<!--link to the start of a seafilmz general webpage template-->
<?php
  require_once 'new_db_connection.php';

  $movieSLUGPart = $_SERVER['REQUEST_URI'];
  $movieSLUGPartFixed = str_replace('/', '', $movieSLUGPart);

  require_once 'queryfunctions/moviefunctions.php';
  $result = individualMovieFactPageQuery(trim($movieSLUGPartFixed));

  // 3. Use returned data (if any)
  if($movies = mysqli_fetch_assoc($result)) {
    // output data from each row
  
  $title = $movies["MovieTitle"] . ' (' . $movies["YearReleased"] . ') - SeaFilmz';
  $mDesc = 'This is the fact page for Seattle movie ' . $movies["MovieTitle"] . ' (' . $movies["YearReleased"] . ').';
  $body = 'MainBody';
  require_once 'sftemplate.php';
  headerTemp();
?>

    <main class="MovieMainFacts">
      <h2 class="MovieTitle"><b><?php echo $movies["MovieTitle"]; ?></b></h2>

      <?php
        $bday = $movies["YearReleased"]; // Movies Year Released from DB
        $today = date('Y'); // Todays Date
        $diff = $today-$bday; // Calculate Age
      ?>

      <table>
        <tr class="movieDataPointRow">
          <td class="movieData movieDataDesc">Year Released</td>
          <td class="movieData"><?php echo $movies["YearReleased"]; ?></td>
        </tr>

        <tr class="movieDataPointRow">
          <td class="movieData movieDataDesc">Movie Age</td>
          <td class="movieData">
            <?php
              echo $diff . ' Years';
            ?>
          </td>
        </tr>

        <tr class="movieDataPointRow">
          <td class="movieData  movieDataDesc">Run Time</td>
          <td class="movieData"><?php echo $movies["RunTime"]; ?> Minutes</td>
        </tr>
        
        <?php if ($movies["TotalWorldGross"] != NULL) { ?>
          <tr class="movieDataPointRow">
            <td class="movieData movieDataDesc">Total Worldwide Gross in US Dollars</td>
            <td class="movieData">$<?php echo number_format($movies["TotalWorldGross"]); ?>
          </tr>
        <?php }
      
  } ?>

      <?php
        $movieActors = individualMoviePeopleFactPageQuery($movieSLUGPartFixed, 'actor');
      ?>
        <tr class="movieDataPointRow">
          <td class="movieData movieDataDesc">Main Actors</td>
          <?php
            while ($actors = mysqli_fetch_assoc($movieActors)) {
          ?>
          <td class="movieDataActor"><?php echo $actors["FirstName"]; ?> <?php if ($actors["MiddleInitialName"] != NULL) { echo $actors["MiddleInitialName"]; } ?> <?php echo $actors["LastName"]; ?></td>
          <?php }
          
          // 4. Release returned data
          mysqli_free_result($movieActors);
          ?>
        </tr>

      <?php
        $movieDirector = individualMoviePeopleFactPageQuery($movieSLUGPartFixed, 'director');
      ?>
        <tr class="movieDataPointRow">
          <td class="movieData movieDataDesc">Director</td>
          <?php
            while ($director = mysqli_fetch_assoc($movieDirector)) {
          ?>
          <td class="movieDataDirector"><?php echo $director["FirstName"]; ?> <?php if ($director["MiddleInitialName"] != NULL) { echo $director["MiddleInitialName"]; } ?> <?php echo $director["LastName"]; ?></td>
          <?php }

          // 4. Release returned data
          mysqli_free_result($movieDirector);
          ?>
        </tr>

      <?php
        $filmLocations = individualMovieFactPageLocationQuery($movieSLUGPartFixed);
      ?>

        <tr class="movieDataPointRow">
          <td class="movieData movieDataDesc">Filming Location</td>
          <?php
            while ($locations = mysqli_fetch_assoc($filmLocations)) {
          ?>
          <td class="movieDataFilmLocations"><a href="<?php echo $locations["CityLinks"]; ?>"><?php echo $locations["City"]; ?></a>, <?php echo $locations["StateProvince"]; ?>, <?php echo $locations["Country"]; ?></td>
          <?php }
          
          // 4. Release returned data
          mysqli_free_result($filmLocations);
          ?>
        </tr>
      </table>

  <?php
  // 4. Release returned data
  mysqli_free_result($result);
  ?>

</main>
 
<?php
  // link to footer
  footerTemp();
?>