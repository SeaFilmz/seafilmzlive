//Popsicle Picture Alert in JavaScript
function popsicleAnswer() {
  alert("On the Corner of Fourth and Blanchard in the Belltown Neighbourhood of Seattle, Washington");
}

//Mobile Menu Toggle
function onClickMenu() {
	document.querySelector(".mobile-menu").classList.toggle("change");
  document.querySelector(".MobileNav").classList.toggle("change");
}

//Title Stand For Button on About Page
const websiteHeader = document.querySelector("#headerStandFor");

function headerSwitchText() {
  if (websiteHeader.innerHTML === "SeaFilmz") {
    websiteHeader.innerHTML = "Seattle Filmz";
  }
  else {
    websiteHeader.innerHTML = "SeaFilmz";
  }
}

//Home Page Movie Quiz
const falseButton = [document.querySelector("#falseAnswer1"), document.querySelector("#falseAnswer2"), document.querySelector("#falseAnswer3"), document.querySelector("#falseAnswer4")];

const trueButton = [document.querySelector("#trueAnswer1"), document.querySelector("#trueAnswer2"), document.querySelector("#trueAnswer3"), document.querySelector("#trueAnswer4")];

const qWrong = ['Wrong - The highest grossing movie filmed in Seattle is The Ring.', 'Wrong - The Ring was released in 2002.', 'Wrong - 10 Things I Hate About You cast does not include Naomi Watts.', 'Wrong - Bianca Kajlich was born in Seattle.'];

const qCorrect = ['Correct - The highest grossing movie filmed in Seattle is The Ring.', 'Correct - The Ring was released in 2002.', 'Correct - 10 Things I Hate About You cast does not include Naomi Watts.', 'Correct - Bianca Kajlich was born in Seattle.'];

const answerText = document.querySelector("#answerText");

function resultAnswer(answer){
  answerText.innerHTML += answer + "<br>";
}

function buttonNotchecked(){
  for (var i = 0; i < trueButton.length; i++) {
    if (!trueButton[i].checked && !falseButton[i].checked){
      answerText.innerHTML = "Please answer all questions for quiz results.";
      return;
    }
  }
}

function quizButton() {
  if (trueButton[0].checked){
    answerText.innerHTML = qWrong[0] + '<br>';
  }
  if (falseButton[0].checked){
    answerText.innerHTML = qCorrect[0] + '<br>';
  }
  if (trueButton[1].checked){
    resultAnswer(qCorrect[1]);
  }
  if (falseButton[1].checked){
    resultAnswer(qWrong[1]);
  }
  if (trueButton[2].checked){
    resultAnswer(qWrong[2]);
  }
  if (falseButton[2].checked){
    resultAnswer(qCorrect[2]);
  }
  if (trueButton[3].checked){
    resultAnswer(qWrong[3]);
  }
  if (falseButton[3].checked){
    resultAnswer(qCorrect[3]);
  }
  buttonNotchecked();
}

//Movie Watched Count
const countText = document.querySelector("#countText");

function movieCountButton(){
  const moviesChecked = document.querySelectorAll('.movieCheckbox:checked').length

  countText.innerHTML = moviesChecked + " Seattle Filmed Movies Watched" + "<br>" + "You have watched " + (((moviesChecked)/(document.querySelectorAll('.movieCheckbox').length))*100).toFixed(1) + "% of movies from this table.";
}