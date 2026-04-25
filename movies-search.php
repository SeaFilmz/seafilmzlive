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
		$search = mysqli_real_escape_string($newConnection, $_GET['search']);
		$searchWhitespaceTrim = trim($search);

		$searchRemoveWhitespaceAll = str_replace(" ", "", $search);
		$searchRemoveWhitespaceAllLower = strtolower($searchRemoveWhitespaceAll);

		$movieTitle ="%$searchRemoveWhitespaceAll%";
		$peopleName ="$searchRemoveWhitespaceAll%";

		$query = $newConnection->prepare(
			"SELECT * FROM movies
				WHERE REPLACE(movie_title, ' ', '') LIKE ?
				ORDER BY movie_title ASC
			UNION
			SELECT CONCAT_WS(' ', first_name, middle_initial_name, last_name) AS DisplayName, 'N/A' AS YearReleased, people_links AS Link, 2 AS SortPriority FROM peoples INNER JOIN cities ON peoples.birth_city_id = cities.city_id
        WHERE REPLACE(CONCAT(first_name, IFNULL(middle_initial_name, ''), last_name), ' ', '') LIKE ?
        OR last_name LIKE ?
        AND state_province IN ('Washington', 'Oregon', 'Idaho','Alaska')
        ORDER BY SortPriority ASC, DisplayName ASC
		");

		$query->bind_param("sss", $movieTitle, $peopleName, $peopleName);

		$query->execute();

		$result = $query->get_result()
		or die("Database query failed.");

		$queryResults = mysqli_num_rows($result);
		?>

		<?php
			if ($searchRemoveWhitespaceAll !== "") {
		?>

				<h2>Results for "<?php echo htmlspecialchars(stripslashes($search)); ?>"</h2>

		<?php
		}

		if ($queryResults > 0 and $searchRemoveWhitespaceAll !== "") {
			while ($row = mysqli_fetch_assoc($result)) {
		?>

				<div class="MovieResult">

					<div class="MovieTitleYear"><a href= "<?php echo $row["Link"]; ?>" class="MovieTitleLink"><?php echo $row["DisplayName"]; ?></a></div>
					<?php if ($row["SortPriority"] == 1) { ?>
    				<div><?php echo $row["YearReleased"]; ?></div>
    				<div>Movie</div>
    			<?php } ?>

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