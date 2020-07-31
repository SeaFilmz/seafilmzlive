<!--link to the start of a seafilmz general webpage template-->
<?php
  $title = "Shoreline - SeaFilmz"; 
  $mDesc = "Fact page about the city of Shoreline (northwest bordering city of Seattle).";
  $body = "MainBody";
  require_once "sftemplate.php";
?>


    <h2 class="CityPageHeader">City of Shoreline (Northwest Bordering City of Seattle)</h2>

		<div class="CityPageContent">
		  <p><b>Officially Became a City:</b> August 31, 1995</p>
		  <p><b>County:</b> <a href="http://www.kingcounty.gov/">King</a></p>
		  <p><b>State:</b> <a href="http://access.wa.gov/">Washington</a></p>
		  <p><b>Country:</b> <a href="https://www.usa.gov/">United States of America</a></p>
		  <p><b>Website:</b> <a href="http://www.shorelinewa.gov/">www.shorelinewa.gov</a></p>
      <p><b>College:</b> <a href="http://www.shoreline.edu/">Shoreline Community College</a></p>
      <p><b>Libraries:</b>
        <a href="https://kcls.org/locations/1535/">Shoreline Library</a>,
        <a href="https://kcls.org/locations/1532/">Richmond Beach Library</a>
      </p>
		  <p><b>Movies Filmed in Shoreline:</b> <a href="sflaggies.php">Laggies</a></p>
      <p><b>Movie Theaters in Shoreline:</b> <a href="https://www.landmarktheatres.com/seattle/crest-cinema-center">Landmark Crest Cinema Center</a></p>
      <p><b>Bowling Alley:</b> <a href="http://spinalleybowling.com">Spin Alley</a></p>
		</div>

        <?php     
            // 4. Release returned data
            mysqli_free_result($result);
        ?>

    <!--link to footer-->
<?php require_once("sffooter.php"); ?>

</html>

<?php
    // 5. Close database connection
    mysqli_close($connection);
?>