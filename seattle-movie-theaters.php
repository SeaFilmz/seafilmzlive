<!--link to the start of a seafilmz general webpage template-->
<?php
  $title = "Seattle Movie Theaters - SeaFilmz";
  $mDesc = "List of the movie theaters in the city of Seattle.";
  $ogTitle = 'Seattle Movie Theaters - SeaFilmz';
  $ogURL = 'https://seafilmz.com/seattle-movie-theaters';
  $body = 'MainBody';
  require_once 'templates/main-page-structure.php';
  headerTemp();
?>

		<h1 class="SeattleMTHeader">Seattle Movie Theaters</h1>
		<div class="SeattleMTContent">
      <ul class="SMTList">
        <?php
          require_once 'queryfunctions/cityfunctions.php';
          cityAttractionQuery('Seattle', 'Movie Theater');
        ?>
      </ul>
    </div>

    <!--link to footer-->
<?php
  footerTemp();
?>