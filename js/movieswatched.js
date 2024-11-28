//Movies Watched Feature
const watchedText = document.querySelector("#watchedText");

function movieWatchedButton(city){
  const moviesChecked = document.querySelectorAll('.movieCheckboxes:checked').length;
  const totalMovies = document.querySelectorAll('.movieCheckboxes').length;

  watchedText.innerHTML = moviesChecked + " " + city + " Filmed Movies Watched" + "<br>" + "You have watched " + (((moviesChecked)/(totalMovies))*100).toFixed(1) + "% of movies from this table.";
}