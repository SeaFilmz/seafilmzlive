<?php
  $title = 'Search - SeaFilmz';
  $mDesc = 'SeaFilmz movie title search results.';
  $body = 'MainBody';
  /*link to the start of a seafilmz general web page template*/
  require_once 'templates/main-page-structure.php';
  headerTemp();
?>


<main class="HomePageContent">

<?php
	if (isset($_GET['search'])) {
		$search = mysqli_real_escape_string($newconnection, $_GET['search']);
		$searchWhitespaceTrim = trim($search);

		$searchRemoveWhitespaceAll = str_replace(" ", "", $search);
		$searchRemoveWhitespaceAllLower = strtolower($searchRemoveWhitespaceAll);

		$movieTitle ="%$searchRemoveWhitespaceAll%";

		$query = $newconnection->prepare(
			"SELECT * FROM movies
				WHERE REPLACE(movie_title, ' ', '') LIKE ?
				ORDER BY movie_title ASC
		");

		$query->bind_param("s", $movieTitle);

		$query->execute();

		$result = $query->get_result()
		or die("Database query failed.");

		$queryResults = mysqli_num_rows($result);
		?>

		<?php
			if ($searchRemoveWhitespaceAll !== "") {
		?>

				<h1>Movie Results for "<?php echo htmlspecialchars(stripslashes($search)); ?>"</h1>

		<?php
		}

		if ($queryResults > 0 and $searchRemoveWhitespaceAll !== "") {
			while ($row = mysqli_fetch_assoc($result)) {
		?>

				<div class="movieResult">

					<div class="movieTitleYear"><a href= "<?php echo $row["movie_page_link"]; ?>" class="movieTitleLink"><?php echo $row["movie_title"]; ?></a></div>
					<div><?php echo $row["year_released"]; ?></div>
					<div>Movie</div>

				</div>

				<?php
			}
		} else {
			echo "There are no results matching your search!";
		}
		?>

		<div class="numberOfSearcResults">
			<?php
				if ($searchRemoveWhitespaceAll === "" or $queryResults === 0) {
			?>
				Movie Result: 0
			<?php
			} elseif ($queryResults === 1) {
			?>
				Movie Result: 1
			<?php
			} else {
			?>
				Movie Results:
			<?php echo "{$queryResults}";
			}
			?>
    </div>
	<?php
	}
?>

</main>

<?php
  // footer display function
  footerTemp();
?>