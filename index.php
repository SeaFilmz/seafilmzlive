<?php require_once("db_connection.php"); ?>
<!DOCTYPE html>
<html lang="en"> 

  <head>
    <!--Connection to Google Analytics.-->
    <?php include "googleanalytics_connection.php"; ?>
      
    <meta charset="utf-8">
    <meta name="description" content="SeaFilmz is your Seattle media connection with a focus on film.">
    <title>SeaFilmz - Greater Seattle Film, Media, Data</title>
    <link type="text/css" rel="stylesheet" href="sfcss.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="sfmain.js" defer></script>
  </head>
    
  <body class="MainPage">
    <header id="MainTop" class="banner">	
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
          
        <?php         
            // 4. Release returned data
            mysqli_free_result($result);
        ?>
        
    <div class="MainPageContent">
      <p class="MainPageAbout">SeaFilmz is a Seattle media and data tool with a focus on movies.</p>
            
      <p class="SeattleMoviesMain"><a href="sfseattlemovies.php">Movies Filmed in Seattle by Title</a></p>
            
      <p class="SeattleMoviesMain"><a href="sfseattlemoviesyear.php">Movies Filmed in Seattle by Year Released</a></p>
            
      <p class="SeattleMoviesMain"><a href="sfseattlemoviesruntime.php">Movies Filmed in Seattle by Runtime</a></p>
            
      <p class="SeattleMoviesMain"><a href="sfseattlemoviesgross.php">Movies Filmed in Seattle by Total Worldwide Gross</a></p>
            
      <p class="SeattleActorsMain"><a href="sfseattleactors.php">Actors Born in Seattle by First Name</a></p>
            
      <p class="SeattleActorsMain"><a href="sfseattleactorsbirthdate.php">Actors Born in Seattle by Birthdate</a></p>
            
      <p class="SeattleMusiciansMain"><a href="sfseattlemusicians.php">Musicians Born in Seattle</a></p>
            
      <p class="SeattleAthletesMain"><a href="sfseattleathletes.php">Athletes Born in Seattle</a></p>
            
      <p class="SeattleFunFactsMain"><a href="seattlefunfacts.php">Seattle Fun Facts</a></p>
            
      <p class="SeattleBorderCitiesMain"><a href="seattlebordercities.php">Seattle Border Cities</a></p>
    </div>

    <div class="sfQuizBackground">

      <h2 class="sfQuizHeader">SeaFilmz Quiz</h2>
           
      <form class="sfQuiz">        
          
        <div class="sfQText"><p class="sfQ"><b>Sleepless in Seattle is the highest grossing movie flimed in Seattle.</b></p></div>
      
          <input type="radio" name="answer1" value="true" class="trueAnswer1"> True <br>
          <input type="radio" name="answer1" value="false" class="falseAnswer1"> False <br>
            
        <p class="sfQ"><b>The Ring was released in 2002.</b></p>        
      
          <input type="radio" name="answer2" value="true" class="trueAnswer2"> True <br>
          <input type="radio" name="answer2" value="false" class="falseAnswer2"> False <br>
            
        <p class="sfQ"><b>10 Things I Hate About You cast included Naomi Watts.</b></p>        
      
          <input type="radio" name="answer3" value="true" class="trueAnswer3"> True <br>
          <input type="radio" name="answer3" value="false" class="falseAnswer3"> False <br>         
            
      </form>
        
      <div class="sfQuizButton">
        <button onclick="quizButton()" class="sfQuizButton"><b>Answer</b></button>
      </div>
        
      <p id="answerText" class="answerText"></p>
        
    </div>
        
    <footer>
      <nav class="navigation"> 
        <ul>
          <li class="NavFooterMobile"><a href="#MainTop">Go to Top</a></li>
    
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