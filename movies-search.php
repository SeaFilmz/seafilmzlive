<?php
  $title = 'Search - SeaFilmz';
  $mDesc = 'Search Results - SeaFilmz';
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
			"SELECT movie_title AS DisplayName, '' AS MusicianName, year_released AS YearReleased, movie_page_link AS Link, '' AS Job, 1 AS SortPriority FROM movies
				WHERE REPLACE(movie_title, ' ', '') LIKE ?
			UNION
			SELECT CONCAT_WS(' ', first_name, middle_initial_name, last_name) AS DisplayName, musician_name AS MusicianName, 'N/A' AS YearReleased, people_links AS Link, job AS Job, 2 AS SortPriority FROM peoples_jobs INNER JOIN peoples ON peoples.people_id = peoples_jobs.people_id INNER JOIN jobs ON jobs.job_id = peoples_jobs.job_id INNER JOIN cities ON peoples.birth_city_id = cities.city_id
        WHERE job IN ('actor', 'musician', 'athlete')
					AND (REPLACE(CONCAT(first_name, IFNULL(middle_initial_name, ''), last_name), ' ', '') LIKE ?
					OR last_name LIKE ?
					OR middle_initial_name LIKE ?
					OR musician_name LIKE ?)
					AND state_province IN ('Washington', 'Oregon', 'Idaho','Alaska')
					ORDER BY SortPriority ASC, DisplayName ASC
		");

		$query->bind_param("sssss", $movieTitle, $peopleName, $peopleName, $peopleName, $peopleName);

		$query->execute();

		$result = $query->get_result()
		or die("Database query failed.");

		$queryResults = mysqli_num_rows($result);
		?>

		<?php
			if ($searchRemoveWhitespaceAll !== "") {
		?>

				<h2 class="OverallSearchResultTitle">Results for "<?php echo htmlspecialchars(stripslashes($search)); ?>"</h2>

		<?php
		}

			if ($queryResults > 0 and $searchRemoveWhitespaceAll !== "") {
				while ($row = mysqli_fetch_assoc($result)) {
		?>

					<div class="SearchResult">

						<?php if ($row["SortPriority"] == 1) { ?>
							<div class="MoviePersonSearchResult"><a href= "<?= $row["Link"]; ?>" class="InternalSearchLink"><?= $row["DisplayName"]; ?></a></div>
							<div>Movie &bull; <?= $row["YearReleased"]; ?> </div>
						<?php } elseif ($row["Job"] == 'actor') { ?>
							<div class="MoviePersonSearchResult"><a href= "<?= $row["Link"]; ?>" class="InternalSearchLink"><?= $row["DisplayName"]; ?></a></div>
							<div>Actor</div>
						<?php } elseif ($row["Job"] == 'athlete') { ?>
							<div class="MoviePersonSearchResult"><a href= "<?= $row["Link"]; ?>" class="InternalSearchLink"><?= $row["DisplayName"]; ?></a></div>
							<div>Athlete</div>
						<?php } elseif ($row["Job"] == 'musician') { ?>
							<div class="MoviePersonSearchResult"><a href= "<?= $row["Link"]; ?>" class="InternalSearchLink"><?= $row["MusicianName"]; ?></a></div>
							<div>Musician</div>
						<?php } else {
							echo "There are no results matching your search!";
						} ?>
					</div>
				<?php
				}
			}
			if ($searchRemoveWhitespaceAllLower === "seattle") { ?>
				<div class="MoviePersonSearchResult"><a href= "seattle-washington" class="InternalSearchLink">Seattle</a></div>
				<div>City</div>
			<?php
			} elseif ($searchRemoveWhitespaceAllLower === "portland") { ?>
				<div class="MoviePersonSearchResult"><a href= "portland-oregon" class="InternalSearchLink">Portland, Oregon</a></div>
				<div>City</div>
			<?php
			}
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
?>

</main>

<?php
  // footer display function
  footerTemp();
?>