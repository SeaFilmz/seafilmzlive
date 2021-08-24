<!--link to the start of a seafilmz general webpage template-->
<?php
  $title = 'Shoreline - SeaFilmz'; 
  $mDesc = 'Fact page about the city of Shoreline (northwest bordering city of Seattle).';
  $body = 'MainBody';
  require_once 'sftemplate.php';
  headerTemp();
?>


    <h2 class="CityPageHeader">City of Shoreline (Northwest Bordering City of Seattle)</h2>

		<div class="CityPageContent">
      <p><b>Officially Became a City:</b> August 31, 1995</p>
		  <p><b>Country:</b> <a href="https://www.usa.gov/">United States of America</a></p>
		  <p><b>State:</b> <a href="http://access.wa.gov/">Washington</a></p>
		  <p><b>County:</b> <a href="http://www.kingcounty.gov/">King</a></p>
		  <p><b>City Website:</b> <a href="http://www.shorelinewa.gov/">shorelinewa.gov</a></p>
      <p><b>College:</b> <a href="http://www.shoreline.edu/">Shoreline Community College</a></p>
      <p><b>Libraries:</b>
        <a href="https://kcls.org/locations/1535/">Shoreline Library</a>,
        <a href="https://kcls.org/locations/1532/">Richmond Beach Library</a>
      </p>
		  <p><b>Movies Filmed in Shoreline:</b> <a href="movie-laggies">Laggies</a></p>
      <p><b>Movie Theaters in Shoreline:</b> <a href="https://www.landmarktheatres.com/seattle/crest-cinema-center">Landmark Crest Cinema Center</a></p>
      <p><b>Bowling Alley:</b> <a href="http://spinalleybowling.com">Spin Alley</a></p>
      <p><b>Golf Course:</b> <a href="https://www.seattlegolfclub.com/">Seattle Golf Club</a></p>
		</div>

<?php
  // footer display function
  footerTemp();
?>