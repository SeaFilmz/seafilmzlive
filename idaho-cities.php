<!--link to the start of a seafilmz general webpage template-->
<?php
  $title = 'Idaho State Cities - SeaFilmz';
  $mDesc = 'List of important Idaho cities.';
  $body = 'MainBody';
  require_once 'sftemplate.php';
  headerTemp();
?>

    <h1 class="IdahoCitiesHeader"><b>Idaho State Cities</b></h1>

    <div class="IdahoCitiesContent">


      <?php
        require_once 'queryfunctions/statecitiesfunction.php';
        stateCitiesQuery("Idaho");
      ?>

    </div>

<?php
  // footer display function
  footerTemp();
?>