<?php
  $title = 'SeaFilmz - 6 Degrees of Seattle'; 
  $mDesc = 'SeaFilmz is a resource for Seattle movies, actors, musicans and athletes.';
  $body = 'HomePage';
  /*link to the start of a seafilmz general web page template*/
  require_once 'sftemplate.php';
  headerTemp();
?>


    <main class="HomePageContent">

      <p class="HomePageAbout">SeaFilmz is a greater Seattle area media and data tool with a focus on movies.</p>

      <p class="SeattleMoviesMain"><a href="seattle-movies">Movies Filmed in Seattle by Title or Year Released</a></p>

      <p class="SeattleMoviesMain"><a href="seattle-movies-runtime">Movies Filmed in Seattle by Runtime</a></p>

      <p class="SeattleMoviesMain"><a href="seattle-movies-gross">Movies Filmed in Seattle by Total Worldwide Gross</a></p>

      <p class="SeattleActorsMain"><a href="seattle-actors">Actors Born in Seattle by First Name or Birthdate</a></p>

      <p class="SeattleMusiciansMain"><a href="seattle-musicians">Musicians Born in Seattle</a></p>

      <p class="SeattleAthletesMain"><a href="seattle-athletes">Athletes Born in Seattle</a></p>

      <p class="SeattleFunFactsMain"><a href="seattle">Seattle Fun Facts</a></p>

      <p class="SeattleBorderCitiesMain"><a href="washingtoncities">Other Washington State Cities</a></p>


      <div class="sfQuizBackground">

        <h2 class="sfQuizHeader">SeaFilmz Quiz</h2>

        <form class="sfQuiz">

          <div class="sfQText"><p class="sfQ"><b>Sleepless in Seattle is the highest grossing movie filmed in Seattle.</b></p></div>

            <input type="radio" name="answer1" value="true" id="trueAnswer1">
            <label for="trueAnswer1"> True</label><br>
            
            <input type="radio" name="answer1" value="false" id="falseAnswer1">
            <label for="falseAnswer1"> False</label><br>

          <p class="sfQ"><b>The Ring was released in 2002.</b></p> 

            <input type="radio" name="answer2" value="true" id="trueAnswer2">
            <label for="trueAnswer2"> True</label><br>

            <input type="radio" name="answer2" value="false" id="falseAnswer2">
            <label for="falseAnswer2"> False</label><br>

          <p class="sfQ"><b>10 Things I Hate About You cast included Naomi Watts.</b></p>

            <input type="radio" name="answer3" value="true" id="trueAnswer3">
            <label for="trueAnswer3"> True</label><br>

            <input type="radio" name="answer3" value="false" id="falseAnswer3">
            <label for="falseAnswer3"> False</label><br>      

          <p class="sfQ"><b>Bianca Kajlich was not born in Seattle.</b></p>

            <input type="radio" name="answer4" value="true" id="trueAnswer4">
            <label for="trueAnswer4"> True</label><br>

            <input type="radio" name="answer4" value="false" id="falseAnswer4">
            <label for="falseAnswer4"> False</label><br>     

        </form>

        <div class="sfQuizButton">
          <button onclick="quizButton()" class="sfQuizButton"><b>Answer</b></button>
        </div>

        <p id="answerText" class="answerText"></p>
      </div>

      <div class="follow">
        <h2 class="followTitle">Follow SeaFilmz</h2>
        <b class="contactTitle">SeaFilmz Twitch</b> :
        <a href="https://www.twitch.tv/seafilmz" class="contactInfo">twitch.tv/seafilmz</a>
        <p></p>
        <b class="contactTitle">SeaFilmz Twitter</b> :
        <a href="https://twitter.com/seafilmz" class="contactInfo">@SeaFilmz</a>
        <p></p>
        <b class="contactTitle">SeaFilmz Instagram</b> :
        <a href="https://instagram.com/seafilmz" class="contactInfo">@SeaFilmz</a>
      </div>

    </main>

<?php
  // footer display function
  footerTemp();
?>