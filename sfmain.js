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
const falseButton = [document.querySelector("#falseAnswer1"), document.querySelector("#falseAnswer2"), document.querySelector("#falseAnswer3")];

const trueButton = [document.querySelector("#trueAnswer1"), document.querySelector("#trueAnswer2"), document.querySelector("#trueAnswer3")];

const qWrong = ['Wrong - The highest grossing movie filmed in Seattle is The Ring.', 'Wrong - The Ring was released in 2002.', 'Wrong - 10 Things I Hate About You cast does not include Naomi Watts.'];

const qCorrect = ['Correct - The highest grossing movie filmed in Seattle is The Ring.', 'Correct - The Ring was released in 2002.', 'Correct - 10 Things I Hate About You cast does not include Naomi Watts.'];

const answerText = document.querySelector("#answerText");

function quizButton() {
  if ((!trueButton[0].checked && !falseButton[0].checked) || (!trueButton[1].checked && !falseButton[1].checked) || (!trueButton[2].checked && !falseButton[2].checked)) {
    answerText.innerHTML = "Please answer all questions for quiz results.";
    return;
  }
  if (trueButton[0].checked){
    answerText.innerHTML = qWrong[0] + '<br>';
  }
  if (falseButton[0].checked){
    answerText.innerHTML = qCorrect[0] + '<br>';
  }
  if (trueButton[1].checked){
    answerText.innerHTML += qCorrect[1] + '<br>';
  }
  if (falseButton[1].checked){
    answerText.innerHTML += qWrong[1] + '<br>';
  }
  if (trueButton[2].checked){
    answerText.innerHTML += qWrong[2] + '<br>';
  }
  if (falseButton[2].checked){
    answerText.innerHTML += qCorrect[2] + '<br>';
  }
}