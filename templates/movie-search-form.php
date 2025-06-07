<?php
  function movieSearchForm() {
?>

	<form action="movies-search" method="GET" class="MovieSearchForm">
		<input type="text" name="search" placeholder="Movie Title" id="search" aria-label="search by movie title for movies filmed in Seattle, Washington or Portland, Oregon">
		<button type="submit" id="searchButton">Search</button>
	</form>

<?php
  }
?>