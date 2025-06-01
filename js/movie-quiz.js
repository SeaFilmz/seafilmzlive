function startQuizButton() {
  document.querySelector(".sfStartQuizButton").style.display = "none";
  document.querySelector(".sfQuizBackground").style.display = "block";
}

//Home Page Movie Quiz
const falseButton = [
  document.querySelector("#falseAnswer1"),
  document.querySelector("#falseAnswer2"),
  document.querySelector("#falseAnswer3"),
  document.querySelector("#falseAnswer4"),
	document.querySelector("#falseAnswer5"),
];

const trueButton = [
  document.querySelector("#trueAnswer1"),
  document.querySelector("#trueAnswer2"),
  document.querySelector("#trueAnswer3"),
  document.querySelector("#trueAnswer4"),
	document.querySelector("#trueAnswer5"),
];

const qWrong = [
  'Wrong - The highest grossing movie filmed in Seattle is The Ring.',
  'Wrong - The Ring was released in 2002.',
  'Wrong - 10 Things I Hate About You cast does not include Naomi Watts.',
  'Wrong - Bianca Kajlich was born in Seattle.',
	'Wrong - Megyn Price is an actress.',
];

const qCorrect = [
  'Correct - The highest grossing movie filmed in Seattle is The Ring.',
  'Correct - The Ring was released in 2002.',
  'Correct - 10 Things I Hate About You cast does not include Naomi Watts.',
  'Correct - Bianca Kajlich was born in Seattle.',
	'Correct - Megyn Price is an actress.',
];

const answerText = document.querySelector("#answerText");

function resultAnswer(answer){
  answerText.innerHTML += answer + "<br>";
}

function buttonNotchecked(){
  for (let i = 0; i < trueButton.length; i++) {
    if (!trueButton[i].checked && !falseButton[i].checked){
      answerText.textContent = "Please answer all questions for quiz results.";
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
	if (trueButton[4].checked){
    resultAnswer(qCorrect[4]);
  }
  if (falseButton[4].checked){
    resultAnswer(qWrong[4]);
  }
  buttonNotchecked();
}