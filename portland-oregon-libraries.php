<?php
  $title = 'Portland, Oregon Libraries - SeaFilmz';
  $mDesc = 'List of Libraries in the city of Portland, Oregon.';
  $body = 'MainBody';
  /*link to the start of a seafilmz general webpage template*/
  require_once 'templates/main-page-structure.php';
  headerTemp();
?>

    <h1 class="SeattleMTHeader">Portland, Oregon Libraries</h1>

	<div class="SeattleMTContent">
      <ul class="SMTList">
        <?php
          require_once 'queryfunctions/cityfunctions.php';
          cityAttractionQuery('Portland', 'Library');
        ?>
      </ul>
	</div>

    <!--link to footer-->
<?php
  footerTemp();
?>