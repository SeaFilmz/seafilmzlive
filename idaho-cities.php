<!--link to the start of a seafilmz general webpage template-->
<?php
  $title = 'Idaho State Cities - SeaFilmz'; 
  $mDesc = 'List of important Idaho cities.';
  $body = 'MainBody';
  require_once 'sftemplate.php';
  headerTemp();
?>




    <h2 class="IdahoCitiesHeader"><b>Idaho State Cities</b></h2>

    <div class="IdahoCitiesContent">

      <p class="IdahoCitiesLink"><a href="boise-idaho">Boise</a></p>

      <p class="IdahoCitiesLink"><a href="moscow-idaho">Moscow</a></p>

      <p class="IdahoCitiesLink"><a href="meridian-idaho">Meridian</a></p>

      <p class="IdahoCitiesLink"><a href="garden-city-idaho">Garden City</a></p>

      <p class="IdahoCitiesLink"><a href="eagle-idaho">Eagle</a></p>

      <p class="IdahoCitiesLink"><a href="pocatello-idaho">Pocatello</a></p>

      <p class="IdahoCitiesLink"><a href="coeurdalene-idaho">Coeur d'Alene</a></p>

    </div>

    
<?php
  // footer display function
  footerTemp();
?>