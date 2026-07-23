<?php
	// Set content type to XML
	header('Content-Type: application/xml; charset=utf-8');

	// Database connection
	require_once 'new_db_connection.php';

	// Base URL
	$baseURL = 'https://seafilmz.com';

	// Start XML
	echo '<?xml version="1.0" encoding="UTF-8"?>';
?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

	<!-- Static pages -->
	<url>
		<loc><?= $baseURL; ?>/</loc>
		<priority>1.0</priority>
	</url>
	<url>
		<loc><?= $baseURL; ?>/seattle-movies</loc>
		<priority>0.85</priority>
	</url>
	<url>
		<loc><?= $baseURL; ?>/seattle-movies-runtime</loc>
		<priority>0.85</priority>
	</url>
	<url>
		<loc><?= $baseURL; ?>/seattle-movies-gross</loc>
		<priority>0.85</priority>
	</url>
	<url>
		<loc><?= $baseURL; ?>/seattle-actors</loc>
		<priority>0.85</priority>
	</url>
	<url>
		<loc><?= $baseURL; ?>/seattle-musicians</loc>
		<priority>0.85</priority>
	</url>
	<url>
		<loc><?= $baseURL; ?>/washington-cities</loc>
		<priority>0.85</priority>
	</url>
	<url>
		<loc><?= $baseURL; ?>/oregon-cities</loc>
		<priority>0.85</priority>
	</url>
	<url>
		<loc><?= $baseURL; ?>/idaho-cities</loc>
		<priority>0.85</priority>
	</url>
	<url>
		<loc><?= $baseURL; ?>/alaska-cities</loc>
		<priority>0.85</priority>
	</url>
	<url>
		<loc><?= $baseURL; ?>/streaming-services</loc>
		<priority>0.85</priority>
	</url>
	<url>
		<loc><?= $baseURL; ?>/about</loc>
		<priority>0.85</priority>
	</url>
	<url>
		<loc><?= $baseURL; ?>/contact</loc>
		<priority>0.85</priority>
	</url>
	<url>
		<loc><?= $baseURL; ?>/built-with</loc>
		<priority>0.85</priority>
	</url>
	<url>
		<loc><?= $baseURL; ?>/services</loc>
		<priority>0.85</priority>
	</url>
	<url>
		<loc><?= $baseURL; ?>/seattle-movies-beta</loc>
		<priority>0.64</priority>
	</url>
	<url>
		<loc><?= $baseURL; ?>/seattle-actors-beta</loc>
		<priority>0.64</priority>
	</url>
	<url>
		<loc><?= $baseURL; ?>/seattle-athletes-beta</loc>
		<priority>0.64</priority>
	</url>
	<url>
		<loc><?= $baseURL; ?>/seattle-movie-theaters</loc>
		<priority>0.64</priority>
	</url>
	<url>
		<loc><?= $baseURL; ?>/tacoma-washington-actors</loc>
		<priority>0.64</priority>
	</url>
	<url>
		<loc><?= $baseURL; ?>/tacoma-washington-athletes</loc>
		<priority>0.64</priority>
	</url>
	<url>
		<loc><?= $baseURL; ?>/bellevue-washington-actors</loc>
		<priority>0.64</priority>
	</url>
	<url>
		<loc><?= $baseURL; ?>/bellevue-washington-athletes</loc>
		<priority>0.64</priority>
	</url>
	<url>
		<loc><?= $baseURL; ?>/portland-oregon-movie-theaters</loc>
		<priority>0.64</priority>
	</url>
	<url>
		<loc><?= $baseURL; ?>/portland-oregon-movies</loc>
		<priority>0.64</priority>
	</url>
	<url>
		<loc><?= $baseURL; ?>/portland-oregon-actors</loc>
		<priority>0.64</priority>
	</url>
	<url>
		<loc><?= $baseURL; ?>/portland-oregon-athletes</loc>
		<priority>0.64</priority>
	</url>
	<url>
		<loc><?= $baseURL; ?>/bar-graph-visualizer</loc>
		<priority>0.64</priority>
	</url>
	<url>
		<loc><?= $baseURL; ?>/tacoma-washington-actors-beta</loc>
		<priority>0.51</priority>
	</url>
	<url>
		<loc><?= $baseURL; ?>/tacoma-washington-athletes-beta</loc>
		<priority>0.51</priority>
	</url>
	<url>
		<loc><?= $baseURL; ?>/tacoma-washington-athletes-dataviz</loc>
		<priority>0.51</priority>
	</url>
	<url>
		<loc><?= $baseURL; ?>/bellevue-washington-actors-beta</loc>
		<priority>0.51</priority>
	</url>
	<url>
		<loc><?= $baseURL; ?>/bellevue-washington-athletes-beta</loc>
		<priority>0.51</priority>
	</url>
	<url>
		<loc><?= $baseURL; ?>/bellevue-washington-athletes-dataviz</loc>
		<priority>0.51</priority>
	</url>
	<url>
		<loc><?= $baseURL; ?>/portland-oregon-movies-beta</loc>
		<priority>0.51</priority>
	</url>
	<url>
		<loc><?= $baseURL; ?>/portland-oregon-actors-beta</loc>
		<priority>0.51</priority>
	</url>
	<url>
		<loc><?= $baseURL; ?>/portland-oregon-athletes-beta</loc>
		<priority>0.51</priority>
	</url>
	<url>
		<loc><?= $baseURL; ?>/portland-oregon-athletes-dataviz</loc>
		<priority>0.51</priority>
	</url>

	<?php
		// Dynamic movie URLs from SQL
		$stmtM = $newConnection->prepare("SELECT movie_page_link FROM movies WHERE movie_page_link IS NOT NULL AND movie_page_link != ''");
		$stmtM->execute();
		$resultM = $stmtM->get_result();

		while ($row = $resultM->fetch_assoc()) {
			$urlM = $baseURL . '/' . htmlspecialchars($row['movie_page_link']);

	?>
		<url>
			<loc><?= $urlM ?></loc>
			<priority>0.75</priority>
		</url>
	<?php
		}
	?>

	<?php
		// Dynamic people URLs from SQL
		$stmtP = $newConnection->prepare("SELECT people_links FROM peoples WHERE people_links IS NOT NULL");
		$stmtP->execute();
		$resultP = $stmtP->get_result();

		while ($row = $resultP->fetch_assoc()) {

			$urlP = $baseURL . '/' . htmlspecialchars($row['people_links']);

	?>

		<url>
			<loc><?= $urlP ?></loc>
			<priority>0.75</priority>
		</url>
	<?php
		}
	?>

	<?php
		// Dynamic people URLs from SQL
		$stmtC = $newConnection->prepare("SELECT city_links FROM cities WHERE city_links IS NOT NULL");
		$stmtC->execute();
		$resultC = $stmtC->get_result();

		while ($row = $resultC->fetch_assoc()) {

			$urlC = $baseURL . '/' . htmlspecialchars($row['city_links']);

	?>

		<url>
			<loc><?= $urlC ?></loc>
			<priority>0.75</priority>
		</url>
	<?php
		}
	?>

</urlset>