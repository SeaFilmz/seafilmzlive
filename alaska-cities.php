<!--link to the start of a seafilmz general webpage template-->
<?php
  $title = 'Alaska State Cities - SeaFilmz'; 
  $mDesc = 'List of important Alaska cities.';
  $body = 'MainBody';
  require_once 'sftemplate.php';
  headerTemp();
?>




    <h2 class="AlaskaCitiesHeader"><b>Alaska State Cities</b></h2>

    <div class="AlaskaCitiesContent">

      <p class="AlaskaCitiesLink"><a href="anchorage-alaska">Anchorage</a></p>

      <p class="AlaskaCitiesLink"><a href="juneau-alaska">Juneau</a></p>

      <p class="AlaskaCitiesLink"><a href="fairbanks-alaska">Fairbanks</a></p>

    </div>

    
<?php
  // footer display function
  footerTemp();
?>