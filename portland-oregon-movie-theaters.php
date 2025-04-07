<?php
  $title = 'Portland, Oregon Movie Theaters - SeaFilmz';
  $mDesc = 'List of movie theaters in the city of Portland, Oregon.';
  $body = 'MainBody';
  $ogTitle = 'Portland, Oregon Movie Theaters - SeaFilmz';
  $ogURL = 'https://seafilmz.com/portland-oregon-movie-theaters';
  /*link to the start of a seafilmz general webpage template*/
  require_once 'templates/sftemplate.php';
  headerTemp();
?>

		<h1 class="SeattleMTHeader">Portland, Oregon Movie Theaters</h1>
		<div class="SeattleMTContent">
      <ul class="SMTList">
        <?php
          require_once 'queryfunctions/cityfunctions.php';
          cityAttractionQuery('Portland', 'Movie Theater');
        ?>
      </ul>
		</div>

    <!--link to footer-->
<?php
  footerTemp();
?>