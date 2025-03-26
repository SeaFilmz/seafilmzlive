<?php
  $title = 'SeaFilmz - 6 Degrees of Seattle';
  $mDesc = 'SeaFilmz is a resource for Seattle movies, actors, musicans and athletes.';
  $ogTitle = 'SeaFilmz - 6 Degrees of Seattle';
  $ogURL = 'https://seafilmz.com';
  $body = 'HomePage';
  /*link to the start of a seafilmz general web page template*/
  require_once 'sftemplate.php';
  headerTemp();
?>

    <main class="HomePageContent">

      <div class="mainLinks">
        <p class="HomePageAbout">Northwest US cities, movies, actors and more</p>

        <p class="SeattleMovieMainLinks"><span class="SeattleMoviesMainHeader">Movies Filmed in Seattle: </span><span class="SeattleMoviesMain"><a href="seattle-movies">Title</a>, <a href="seattle-movies#sortByYear" class="SeattleMovieMainLinks2">Year Released</a>, <a href="seattle-movies-runtime" class="SeattleMovieMainLinks2">Runtime</a>, <a href="seattle-movies-gross" class="SeattleMovieMainLinks2">Total Worldwide Gross</a></span></p>

        <p class="SeattlePeopleMainLinks"><span class="SeattlePeopleMainHeader">Seattle Born: </span><span class="SeattlePeopleMain"><a href="seattle-actors">Actors</a>, <a href="seattle-musicians" class="SeattlePeopleMainLinks2">Musicians</a>, <a href="seattle-athletes" class="SeattlePeopleMainLinks2">Athletes</a></span></p>

        <p class="SeattleFunFactsMainLinks"><span class="SeattleFunFactsMainHeader">City Facts: </span><span class="SeattleFunFactsMain"><a href="seattle-washington">Seattle</a>, <a href="portland-oregon">Portland OR</a></span></p>
      </div>

			<div class="quizStartButton">
        <button type="button" onclick="startQuizButton()" class="sfStartQuizButton"><b>Start SeaFilmz Quiz</b></button>
      </div>

      <div class="sfQuizBackground">

				<h2 class="sfQuizHeader">SeaFilmz Quiz</h2>

				<form class="sfQuiz">

          <div class="sfQText"><p class="sfQ"><b>Sleepless in Seattle is the highest grossing movie filmed in Seattle.</b></p></div>

            <label for="trueAnswer1"> True</label>
            <input type="radio" name="answer1" value="true" id="trueAnswer1"><br>

            <label for="falseAnswer1"> False</label>
            <input type="radio" name="answer1" value="false" id="falseAnswer1"><br>

          <p class="sfQ"><b>The Ring was released in 2002.</b></p>

            <label for="trueAnswer2"> True</label>
            <input type="radio" name="answer2" value="true" id="trueAnswer2"><br>

            <label for="falseAnswer2"> False</label>
            <input type="radio" name="answer2" value="false" id="falseAnswer2"><br>

          <p class="sfQ"><b>10 Things I Hate About You cast included Naomi Watts.</b></p>

            <label for="trueAnswer3"> True</label>
            <input type="radio" name="answer3" value="true" id="trueAnswer3"><br>

            <label for="falseAnswer3"> False</label>
            <input type="radio" name="answer3" value="false" id="falseAnswer3"><br>

          <p class="sfQ"><b>Bianca Kajlich was not born in Seattle.</b></p>

            <label for="trueAnswer4"> True</label>
            <input type="radio" name="answer4" value="true" id="trueAnswer4"><br>

            <label for="falseAnswer4"> False</label>
            <input type="radio" name="answer4" value="false" id="falseAnswer4"><br>

          <p class="sfQ"><b>Megyn Price is an actress.</b></p>

            <label for="trueAnswer5"> True</label>
            <input type="radio" name="answer5" value="true" id="trueAnswer5"><br>

            <label for="falseAnswer5"> False</label>
            <input type="radio" name="answer5" value="false" id="falseAnswer5"><br>

        <div class="sfQuizButton">
          <button type="button" onclick="quizButton()" class="sfQuizButton"><b>Answer</b></button>
        </div>

        </form>

				<p id="answerText" class="answerText"></p>
      </div>

		</main>

		<script src="/js/moviequiz.js" defer></script>

<?php
  // footer display function
  footerTemp();
?>