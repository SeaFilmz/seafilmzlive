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
const trueButton1 = document.querySelector(".trueAnswer1");
const falseButton1 = document.querySelector(".falseAnswer1");
const trueButton2 = document.querySelector(".trueAnswer2");
const falseButton2 = document.querySelector(".falseAnswer2");
const trueButton3 = document.querySelector(".trueAnswer3");
const falseButton3 = document.querySelector(".falseAnswer3");
const answerTextConnect = document.querySelector("#answerText");

function quizButton() {
  if ((!trueButton1.checked && !falseButton1.checked) || (!trueButton2.checked && !falseButton2.checked) || (!trueButton3.checked && !falseButton3.checked)) {
    answerTextConnect.innerHTML = "Please answer all questions for quiz results.";
  }
  else if (trueButton1.checked && trueButton2.checked && trueButton3.checked) {
    answerTextConnect.innerHTML = "Wrong - The highest grosing movie filmed in Seattle is The Ring. <br> Correct - The Ring was released in 2002. <br> Wrong - 10 Things I Hate About You cast does not included Naomi Watts.";
  }
  else if (falseButton1.checked && falseButton2.checked && falseButton3.checked) {
    answerTextConnect.innerHTML = "Correct - The highest grosing movie filmed in Seattle is The Ring. <br> Wrong - The Ring was released in 2002. <br> Correct - 10 Things I Hate About You cast does not included Naomi Watts.";
  }
  else if (trueButton1.checked && trueButton2.checked && falseButton3.checked) {
    answerTextConnect.innerHTML = "Wrong - The highest grosing movie filmed in Seattle is The Ring. <br> Correct - The Ring was released in 2002. <br> Correct - 10 Things I Hate About You cast does not included Naomi Watts.";
  }
  else if (falseButton1.checked && falseButton2.checked && trueButton3.checked) {
    answerTextConnect.innerHTML = "Correct - The highest grosing movie filmed in Seattle is The Ring. <br> Wrong - The Ring was released in 2002. <br> Wrong - 10 Things I Hate About You cast does not included Naomi Watts.";
  }   
  else if (trueButton1.checked && falseButton2.checked && falseButton3.checked) {
    answerTextConnect.innerHTML = "Wrong - The highest grosing movie filmed in Seattle is The Ring. <br> Wrong - The Ring was released in 2002. <br> Correct - 10 Things I Hate About You cast does not included Naomi Watts.";
  }
  else if (falseButton1.checked && trueButton2.checked && trueButton3.checked) {
    answerTextConnect.innerHTML = "Correct - The highest grosing movie filmed in Seattle is The Ring. <br> Correct - The Ring was released in 2002. <br> Wrong - 10 Things I Hate About You cast does not included Naomi Watts.";
  }
  else if (trueButton1.checked && falseButton2.checked && trueButton3.checked) {
    answerTextConnect.innerHTML = "Wrong - The highest grosing movie filmed in Seattle is The Ring. <br> Wrong - The Ring was released in 2002. <br> Wrong - 10 Things I Hate About You cast does not included Naomi Watts.";
  }
  else if (falseButton1.checked && trueButton2.checked && falseButton3.checked) {
    answerTextConnect.innerHTML = "Correct - The highest grosing movie filmed in Seattle is The Ring. <br> Correct - The Ring was released in 2002. <br> Correct - 10 Things I Hate About You cast does not included Naomi Watts.";
  }
}