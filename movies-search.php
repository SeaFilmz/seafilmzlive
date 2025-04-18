<?php
  $title = 'Search - SeaFilmz';
  $mDesc = 'SeaFilmz movie title search results.';
  $body = 'MainBody';
  /*link to the start of a seafilmz general web page template*/
  require_once 'sftemplate.php';
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
				WHERE REPLACE(MovieTitle, ' ', '') LIKE ?
				ORDER BY MovieTitle ASC
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

					<div class="movieTitleYear"><a href= "<?php echo $row["MoviePageLink"]; ?>" class="movieTitleLink"><?php echo $row["MovieTitle"]; ?></a>, <?php echo $row["YearReleased"]; ?></div>
					<div>Movie</div>

				</div>

				<?php
			}
		} else {
			echo "There are no results matching your search!";
		}
	}
?>

</main>

<?php
  // footer display function
  footerTemp();
?>