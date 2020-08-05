<!--link to the start of a seafilmz general webpage template-->
<?php
  $title = "SeaFilmz - Greater Seattle Film, Media, Data"; 
  $mDesc = "SeaFilmz is your Seattle media connection with a focus on film.";
  $body = "HomePage";  
  require_once "sftemplate.php";
?>


        <?php
            // 4. Release returned data
            //mysqli_free_result($result);
        ?>

    <main class="HomePageContent">

      <p class="HomePageAbout">SeaFilmz is a Seattle media and data tool with a focus on movies.</p>

      <p class="SeattleMoviesMain"><a href="sfseattlemovies">Movies Filmed in Seattle by Title</a></p>

      <p class="SeattleMoviesMain"><a href="sfseattlemoviesyear">Movies Filmed in Seattle by Year Released</a></p>

      <p class="SeattleMoviesMain"><a href="sfseattlemoviesruntime">Movies Filmed in Seattle by Runtime</a></p>

      <p class="SeattleMoviesMain"><a href="sfseattlemoviesgross">Movies Filmed in Seattle by Total Worldwide Gross</a></p>

      <p class="SeattleActorsMain"><a href="sfseattleactors">Actors Born in Seattle by First Name</a></p>

      <p class="SeattleActorsMain"><a href="sfseattleactorsbirthdate">Actors Born in Seattle by Birthdate</a></p>

      <p class="SeattleMusiciansMain"><a href="sfseattlemusicians">Musicians Born in Seattle</a></p>

      <p class="SeattleAthletesMain"><a href="sfseattleathletes">Athletes Born in Seattle</a></p>

      <p class="SeattleFunFactsMain"><a href="seattle">Seattle Fun Facts</a></p>

      <p class="SeattleBorderCitiesMain"><a href="washingtoncities">Other Washington State Cities</a></p>
    

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

    </main>

    <!--link to footer-->
<?php require_once("sffooter.php"); ?>

  </body>

</html>

<?php
    // 5. Close database connection
    mysqli_close($connection);
?>