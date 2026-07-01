<?php
  function movieSearchForm() {
?>

	<form action="movies-search" method="GET" class="MovieSearchForm">
		<input type="text" name="search" placeholder="Movie Title or Actor Name or Musician Name or Athlete Name" id="Search" aria-label="Search by movie title for movies filmed in Northwest United States or by actor name for actors born in the Northwest United States or by musician name for musicians born in the Northwest United States or by athlete name for athletes born in the Northwest United States">
		<button type="submit" id="SearchButton">Search</button>
	</form>

<?php
  }
?>