<!--link to the start of a seafilmz general webpage template-->
<?php
  $title = 'Seattle Movies by Box Office Gross - SeaFilmz';
  $mDesc = 'Discover movies filmed fully or partly in Seattle — organized by box office gross in US Dollars.';
  $ogTitle = 'Seattle Movies by Box Office Gross - SeaFilmz';
  $ogURL = 'https://seafilmz.com/seattle-movies-gross';
  $body = 'MainBody';
  require_once 'templates/main-page-structure.php';
  headerTemp();
?>

    <p class="MoviesPageHeader">
      <b>
        <a href="seattle-movies-beta">New Movie Data UI Beta</a>
      </b>
    </p>

        <h2 class="MoviesPageHeader"><b>Movies Filmed in Seattle by Total Worldwide Gross</b></h2>

        <div class="MGTable">
        <table class="MovieGrossTable">
          <tr>
            <th class="MovieGrossColumnHeader1">Title</th>
            <th class="MovieGrossColumnHeader2">Total Wordwide Gross (US Dollars)</th>
          </tr>

        <?php
            // 2. Perform database query
            $query = $newConnection->prepare("SELECT * FROM movies_cities INNER JOIN movies ON movies.movie_id = movies_cities.movie_id INNER JOIN cities ON  = movies_cities.city_id WHERE city = ? AND total_world_gross IS NOT NULL ORDER BY total_world_gross DESC ");

            $city = 'Seattle';
            $query->bind_param("s", $city);
            $query->execute();

            //Result variable with an error check
            $result = $query->get_result()
              or die("Database query failed.");

            // 3. Use returned data (if any)
            while ($movies = mysqli_fetch_assoc($result)) {
                // output data from each row
        ?>

          <tr class="MoviesContent">
            <td class="MovieTitlesContent"><b ><a href= "<?php echo $movies["movie_page_link"]; ?>"><?php echo $movies["movie_title"]; ?></a></b></td>
            <td class="MovieGrossContent">$<?php echo number_format($movies["total_world_gross"]); ?></td>
          </tr>

        <?php
            }

            // 4. Release returned data
            mysqli_free_result($result);
        ?>

    </table>
    </div>

<?php
  require_once 'queryfunctions/movie-functions.php';
  cityMovieGrossTotal('Seattle');
  cityMovieHighestGrossTotal('Seattle');
?>

<?php
  // footer display function
  footerTemp();
?>