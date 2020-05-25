<?php require_once("db_connection.php"); ?>
<!DOCTYPE html>
<html lang="en"> 

  <head>
    <!--Connection to Google Analytics.-->
    <?php include "googleanalytics_connection.php"; ?>

    <meta charset="utf-8">
    <meta name="description" content="List of movies filmed fully or partly in the city of Seattle organized by title.">
    <title>Seattle Movies by Title - SeaFilmz</title>
    <link type="text/css" rel="stylesheet" href="sfcss.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="sfmain.js" defer></script>
  </head>
    
  <body>
    <header id="MovieTitleTop" class="banner">	
      <h1><a href="index.php">SeaFilmz</a></h1>
      <b class="solgan">Your Seattle Film and Data Connection</b>

    <!--link to mobile menu-->
<?php require_once("sfmobilemenu.php"); ?>

      <nav class="navigation">
        <div class="dropdown">
          <span class="NavMobile">Movies Filmed in Seattle</span><div class="upsideDownTriangle"></div>
          <div class="dropdown-content">
            <p><a href="sfseattlemovies.php">by Title</a></p>
            <p><a href="sfseattlemoviesyear.php">by Year Released</a></p>
            <p><a href="sfseattlemoviesruntime.php">by Runtime</a></p>
            <p><a href="sfseattlemoviesgross.php">by Total Worldwide Gross</a></p>
          </div>
        </div>
        <div class="dropdown">
          <span class="NavMobile">Seattle Born</span><div class="upsideDownTriangle"></div>
          <div class="dropdown-content">
            <p><a href="sfseattleactors.php">Actors</a></p>
            <p><a href="sfseattlemusicians.php">Musicians</a></p>
            <p><a href="sfseattleathletes.php">Athletes</a></p>
          </div>
        </div>
        <div class="dropdown">
          <span class="NavMobile">City Facts</span><div class="upsideDownTriangle"></div>
          <div class="dropdown-content">
            <p><a href="seattlefunfacts.php">Seattle</a></p>
            <p><a href="shoreline.php">Shoreline</a></p>
            <p><a href="lfp.php">Lake Forest Park</a></p>
            <p><a href="tukwila.php">Tukwila</a></p>
            <p><a href="burien.php">Burien</a></p>
            <p><a href="seatac.php">SeaTac</a></p>
            <p><a href="mercerisland.php">Mercer Island</a></p>
            <p><a href="medina.php">Medina</a></p>
            <p><a href="bellevue.php">Bellevue</a></p>
          </div>
        </div>
      </nav>
    </header>

        <h2 class="MoviesPageHeader"><b>Movies Filmed in Seattle by Title</b></h2>
        
        <div class="MTTable">
        <table class="MovieTitlesTable">
          <tr>
            <th class="MovieTitlesColumnHeader1">Title</th>
            <th class="MovieTitlesColumnHeader2">Year</th>
          </tr>
        
        <?php
          // 2. Perform database query
          $query = "SELECT * ";
          $query .= "FROM movies ";
          $query .= "ORDER BY MovieTitle ASC ";
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
           while($movies = mysqli_fetch_assoc($result)) {
            // output data from each row
        ?>
            
          <div class="MovieTitleMainContent">
            <tr class="MoviesContent"> 
              <td class="MovieTitlesContent"><b><a href= "<?php echo $movies["MoviePageLink"]; ?>"><?php echo $movies["MovieTitle"]; ?></a></b></td>
              <td class="MovieYearContent"><?php echo $movies["YearReleased"]; ?></td>
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

        <!--link to Total Movie Count-->
<?php require("sfmoviescount.php"); ?>  

    <footer>
      <nav class="navigation">
        <ul>
          <li class="NavFooterMobile"><a href="#MovieTitleTop">Go to Top</a></li>

          <!--link to Part of Footer Menu-->
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