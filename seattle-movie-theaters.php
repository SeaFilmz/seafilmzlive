<!--link to the start of a seafilmz general webpage template-->
<?php
  $title = "Seattle Movie Theaters - SeaFilmz";
  $mDesc = "Discover movie theaters in Seattle, from historic cinemas to modern film venues.";
  $ogTitle = 'Seattle Movie Theaters - SeaFilmz';
  $ogURL = 'https://seafilmz.com/seattle-movie-theaters';
  $body = 'MainBody';
  require_once 'templates/main-page-structure.php';
  headerTemp();
?>

		<h2 class="SeattleMTHeader">Seattle Movie Theaters</h2>
		<div class="SeattleMTContent">
      <ul class="SMTList">
        <?php
          require_once 'queryfunctions/city-functions.php';
          cityAttractionQuery('Seattle', 'Movie Theater');
        ?>
      </ul>
    </div>

    <!--link to footer-->
<?php
  footerTemp();
?>