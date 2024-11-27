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

//Movies Watched Feature
const watchedText = document.querySelector("#watchedText");

function movieWatchedButton(city){
  const moviesChecked = document.querySelectorAll('.movieCheckboxes:checked').length;
  const totalMovies = document.querySelectorAll('.movieCheckboxes').length;

  watchedText.innerHTML = moviesChecked + " " + city + " Filmed Movies Watched" + "<br>" + "You have watched " + (((moviesChecked)/(totalMovies))*100).toFixed(1) + "% of movies from this table.";
}