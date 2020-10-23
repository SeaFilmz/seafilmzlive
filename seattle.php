<!--link to the start of a seafilmz general webpage template-->
<?php
  $title = "Seattle Fun Facts - SeaFilmz"; 
  $mDesc = "Fact page about the city of Seattle.";
  $body = "MainBody";
  require_once "sftemplate.php";
  headerTemp();
?>


    <h2 class="SeattleFFHeader">Seattle Fun Facts</h2>

    <div class="SeattleFFContent">
      <p><b>Officially Became a City:</b> December 2, 1869</p>
      <p><b>Country:</b> <a href="https://www.usa.gov/">United States of America</a></p>
      <p><b>State:</b> <a href="http://access.wa.gov/">Washington</a></p>
      <p><b>County:</b> <a href="http://www.kingcounty.gov/">King</a></p>
      <p><b>City Website:</b> <a href="http://www.seattle.gov/">seattle.gov</a></p>
      <p><b>Movies Filmed in Seattle:</b> <a href="sfseattlemovies">List of Movies Filmed in Seattle</a>
      <p><b>Movie Theaters in Seattle:</b> <a href="seattlemovietheaters">List of Movie Theaters in Seattle</a></p>
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
      <p><b>Libraries:</b> <a href="https://www.spl.org/hours-and-locations">List of Libraries in Seattle</a></p>
      <p><b>Board Game Hangout Places:</b>
        <a href="https://www.moxboardinghouse.com/">Mox Boarding House</a>,
        <a href="http://www.bluehighwaygames.com/">Blue Highway Games</a>,
        <a href="http://www.gammaraygamestore.com/">Gamma Ray Games</a>,
        <a href="http://phoenixseattle.com/">Phoenix Comics & Games</a>,
        <a href="http://meeplesgames.com/">Meeples Games</a>
      </p>
      <p><b>Bowling Alley:</b> <a href="https://www.garagebilliards.com/">Garage</a>, <a href="http://www.wsbowl.com/">West Seattle Bowl</a></p>
      <p><b>Golf Courses:</b>
        <a href="http://premiergc.com/-jackson-park-golf-course">Jackson Park Golf Course</a>,
        <a href="http://www.greenlakegolfcourse.com/">Green Lake Golf Course</a>,
        <a href="http://www.premiergc.com/-interbay-golf-center">The Links at Interbay</a>,
        <a href="https://broadmoorgolfclub.com/">Broadmoor Golf Club</a>,
        <a href="http://premiergc.com/-jefferson-park-golf-course">Jefferson Park Golf Course</a>,
        <a href="http://premiergc.com/-west-seattle-golf-course">West Seattle Golf Course</a>,
        <a href="https://www.rainiergolfcc.com/">Rainier Golf and Country Club</a>,
        <a href="https://www.glenacresgolf.com/">Glen Acres Golf & Country Club</a>
      </p>
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

    <!--link to footer-->
<?php
  require_once "sftemplate.php";
  footer();
?>

  </body>

</html>

<?php
    // 5. Close database connection
    mysqli_close($connection);
?>