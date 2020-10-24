<!--link to the start of a seafilmz general webpage template-->
<?php
  $title = "Bellevue - SeaFilmz"; 
  $mDesc = "Fact page about the city of Bellevue (eastside of lake washington city).";
  $body = "MainBody";
  require_once "sftemplate.php";
?>


    <h2 class="CityPageHeader">Bellevue (Eastside of Lake Washington City)</h2>

		<div class="CityPageContent">
      <p><b>Officially Became a City:</b> 1953</p>
      <p><b>Country:</b> <a href="https://www.usa.gov/">United States of America</a></p>
 		  <p><b>State:</b> <a href="http://access.wa.gov/">Washington</a></p>     
      <p><b>County:</b> <a href="http://www.kingcounty.gov/">King</a></p>
		  <p><b>City Website:</b> <a href="https://bellevuewa.gov/">bellevuewa.gov</a></p>
      <p><b>College:</b> <a href="https://www.bellevuecollege.edu/">Bellevue College</a>
      <p><b>Libraries:</b>
        <a href="https://kcls.org/locations/1492/">Bellevue Library</a>,
        <a href="https://kcls.org/locations/1522/">Lake Hills Library</a>,
        <a href="https://kcls.org/locations/1499/">Crossroads Library Connection</a>,
        <a href="https://kcls.org/locations/1529/">Newport Way Library</a>
      </p>
      <p><b>Movie Theaters in Bellevue:</b>
        <a href="https://www.cinemark.com/washington/cinemark-reserve-dine-in">Cinemark Reserve Lincoln Square - Dine-In 21+</a>,
        <a href="https://www.cinemark.com/washington/cinemark-lincoln-square">Cinemark Lincoln Square Cinemas</a>,
        <a href="https://www.regmovies.com/theatres/regal-crossroads-bellevue/0905#/">Regal Crossroads - Bellevue</a>,
        <a href="https://www.amctheatres.com/movie-theatres/seattle-tacoma/amc-factoria-8">AMC Factoria 8</a>
      </p>
      <p><b>Board Game Hangout Places:</b>
        <a href="https://www.moxboardinghouse.com/">Mox Boarding House</a>,
        <a href="http://www.unclesgames.com/">Uncle's Games</a>
      </p>
      <p><b>Bowling Alleys:</b> <a href="https://www.luckystrikesocial.com/locations/bellevue/">Lucky Strike</a></p>
      <p><b>Golf Courses:</b>
        <a href="http://bellevuepgc.com/">Bellevue Golf Course</a>,
        <a href="https://www.glendalecc.com/">Glendale Country Club</a>,
        <a href="http://www.bellevuepgc.com/-crossroads-par-3-course">Bellevue Crossroads Par 3 Golf</a>,
        <a href="https://www.tamoshanter.net/">Tam o'Shanter Golf and Country Club</a>
      </p>  
		</div>

        <?php
            // 4. Release returned data
            mysqli_free_result($result);
        ?>

    <!--link to footer-->
<?php require_once "sffooter.php"; ?>

  </body>

</html>

<?php
    // 5. Close database connection
    mysqli_close($connection);
?>