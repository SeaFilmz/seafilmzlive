<?php
  function movieSearchForm() {
?>

	<form action="movies-search" method="GET" class="MovieSearchForm">
		<input type="text" name="search" placeholder="Movie Title or Actor Name or Musician Name or Athlete Name" id="Search" aria-label="search by movie title for movies filmed in Seattle, Washington or Portland, Oregon">
		<button type="submit" id="SearchButton">Search</button>
	</form>

<?php
  }
?>