<?php require_once("db_connection.php"); ?>
<!DOCTYPE html>
<html lang="en"> 

  <head>
    <!--Connection to Google Analytics.-->
    <?php include "googleanalytics_connection.php"; ?>

    <meta charset="utf-8">
    <meta name="description" content="Fact page about the city of Seattle.">
    <title>Seattle Fun Facts - SeaFilmz</title>
    <link type="text/css" rel="stylesheet" href="sfcss.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="sfmain.js" defer></script>
  </head>
    
  <body>
    <header id="SeattleFFTop" class="banner">	
      <h1><a href="index.php">SeaFilmz</a></h1>
      <b class="solgan">Your Seattle Film and Data Connection</b>

      <!--Link to Mobile Menu-->
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
        
    <h2 class="SeattleFFHeader">Seattle Fun Facts</h2>
        
    <div class="SeattleFFContent">
      <p><b>Officially Became a City:</b> December 2, 1869</p>		      
      <p><b>County:</b> <a href="http://www.kingcounty.gov/">King</a></p>
      <p><b>State:</b> <a href="http://access.wa.gov/">Washington</a></p>
      <p><b>Country:</b> <a href="https://www.usa.gov/">United States of America</a></p>
      <p><b>Website:</b> <a href="http://www.seattle.gov/">www.seattle.gov</a></p>
      <p><b>Movies Filmed in Seattle:</b> <a href="sfseattlemovies.php">List of Movies Filmed in Seattle</a>
      <p><b>Movie Theaters in Seattle:</b> <a href="seattlemovietheaters.php">List of Movie Theaters in Seattle</a></p>
      <p><b>Professional Sports Teams:</b> 
        <a href="http://www.seahawks.com/">Seattle Seahawks</a> (men's football), 
        <a href="http://storm.wnba.com/">Seattle Storm</a> (women's basketball), 
        <a href="https://www.mlb.com/mariners">Seattle Mariners</a> (men's baseball), 
        <a href="https://www.soundersfc.com/">Seattle Sounders FC</a> (men's soccer), 
        <a href="https://www.reignfc.com/">Seattle Reign FC</a> (women's soccer),
        <a href="https://www.xfl.com/en-US/teams/seattle">Seattle Dragons</a> (men's football)
      </p>
      <p><b>Universities or Colleges:</b> 
        <a href="https://www.washington.edu/">University of Washington</a>,
        <a href="https://www.seattleu.edu/">Seattle University</a>, 
        <a href="http://spu.edu/">Seattle Pacific University</a>, 
        <a href="https://www.northseattle.edu/">North Seattle College</a>, 
        <a href="http://www.seattlecentral.org/">Seattle Central College</a>, 
        <a href="http://www.southseattle.edu/">South Seattle College</a>
      </p>
      <p><b>Libraries in Seattle:</b> <a href="https://www.spl.org/hours-and-locations">List of Libraries in Seattle</a></p>
      <p><b>Board Game Hangout Places in Seattle:</b>
        <a href="https://www.moxboardinghouse.com/">Mox Boarding House</a>,
        <a href="http://www.bluehighwaygames.com/">Blue Highway Games</a>,
        <a href="http://www.gammaraygamestore.com/">Gamma Ray Games</a>,
        <a href="http://phoenixseattle.com/">Phoenix Comics & Games</a>,
        <a href="http://meeplesgames.com/">Meeples Games</a>
      </p>
      <p><b>Bowling Alley:</b> <a href="https://www.garagebilliards.com/">Garage</a>, <a href="http://www.wsbowl.com/">West Seattle Bowl</a></p>
    </div>
		  
		<div class="SeattleFFImage">
		  <p class="PopsicleText">Where in Seattle is this popsicle locationed?</p>
		  <img class="PopsicleSculpture" src="popsiclesculpture.JPG" alt="Giant red popsicle located in the city of Seattle">
		</div>
        
        <?php       
            // 4. Release returned data
            mysqli_free_result($result);
        ?>

    <div id="imageAnswer">
      <button onclick="popsicleAnswer();">Answer</button>
    </div>

    <footer>
      <nav class="navigation"> 
        <ul>
          <li class="NavFooterMobile"><a href="#SeattleFFTop">Go to Top</a></li>

          <!--Link to Part of Footer Menu-->
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