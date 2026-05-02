<?php
  $title = 'SeaFilmz - 6 Degrees of Seattle';
  $mDesc = 'SeaFilmz is a resource for movies, actors, musicians, and athletes connected to Seattle and the Northwest U.S.';
  $ogTitle = 'SeaFilmz - 6 Degrees of Seattle';
  $ogURL = 'https://seafilmz.com';
  $ogImage = 'https://seafilmz.com/images/seafilmz-homepage-screenshot.png';
  $ogImageAlt = 'Screenshot of SeaFilmz homepage';
  $schemaType = 'WebSite';
  $body = 'HomePage';
  /*link to the start of a seafilmz general web page template*/
  require_once 'templates/main-page-structure.php';
  headerTemp();
?>

    <main class="HomePageContent">

      <div class="MainLinks">
        <p class="HomePageAbout">Northwest US cities, movies, actors and more</p>

        <section class="SeattleMovieMainLinks"><h3 class="SeattleMoviesMainHeader">Movies Filmed in Seattle</h3>
          <nav class="SeattleMoviesMain">
            <a href="seattle-movies" class="SeattleMovieMainLinks2">Title</a>,
            <a href="seattle-movies#sortByYear" class="SeattleMovieMainLinks2">Year Released</a>,
            <a href="seattle-movies-runtime" class="SeattleMovieMainLinks2">Runtime</a>,
            <a href="seattle-movies-gross" class="SeattleMovieMainLinks2">Total Worldwide Gross</a>
          </nav>
        </section>

        <section class="SeattlePeopleMainLinks"><h3 class="SeattlePeopleMainHeader">Seattle Born</h3>
          <nav class="SeattlePeopleMain">
            <a href="seattle-actors">Actors</a>,
            <a href="seattle-musicians" class="SeattlePeopleMainLinks2">Musicians</a>,
            <a href="seattle-athletes" class="SeattlePeopleMainLinks2">Athletes</a>
          </nav>
        </section>

        <section class="SeattleFunFactsMainLinks"><h3 class="SeattleFunFactsMainHeader">City Facts</h3>
          <nav class="SeattleFunFactsMain">
            <a href="seattle-washington">Seattle</a>,
            <a href="portland-oregon">Portland OR</a>
          </nav>
        </section>
      </div>

			<div class="quizStartButton">
        <button type="button" onclick="startQuizButton()" class="SFStartQuizButton SFStartQuizButtonHover"><b>Start SeaFilmz Quiz</b></button>
      </div>

      <section class="SFQuizBackground">

				<h2 class="SFQuizBackground">SeaFilmz Quiz</h2>

				<form class="SFQuiz">

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

        <div class="SFQuizButton">
          <button type="button" onclick="quizButton()" class="SFQuizButton"><b>Answer</b></button>
        </div>

        </form>

				<p id="answerText" class="AnswerText"></p>
      </section>

		</main>

		<script src="/js/movie-quiz.js" defer></script>

<?php
  // footer display function
  footerTemp();
?>