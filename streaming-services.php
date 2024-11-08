<!--link to the start of a seafilmz general webpage template-->
<?php
  $title = 'Where to Watch Seattle Movies - SeaFilmz'; 
  $mDesc = 'This is a list of streaming services that might have Seattle movies you can watch.';
  $body = 'MainBody';
  require_once 'sftemplate.php';
  headerTemp();
?>

  <main>

    <h2>Where to Watch Seattle Movies:</h2>
    <h3 class="subheader">List of Major Streaming Services</h3>

    <ul class="StreamingServices">
      <li class="StreamingServicesName"><a href="https://tubitv.com">Tubi</a></li>

      <li class="StreamingServicesName"><a href="https://www.starz.com/us/en/">Starz</a></li>

      <li class="StreamingServicesName"><a href="https://www.peacocktv.com">Peacock</a></li>
      
      <li class="StreamingServicesName"><a href="https://www.paramountpluswithshowtime.com/">Paramount + with Showtime</a></li>
      
      <li class="StreamingServicesName"><a href="https://www.paramountplus.com">Paramount+</a></li>
      
      <li class="StreamingServicesName"><a href="https://www.netflix.com">Netflix</a></li>
      
      <li class="StreamingServicesName"><a href="https://www.max.com/">Max</a></li>
      
      <li class="StreamingServicesName"><a href="https://www.hulu.com/welcome">Hulu</a></li>
      
      <li class="StreamingServicesName"><a href="https://www.amazon.com/gp/video/splash/freevee_findus">Freevee</a></li>
      
      <li class="StreamingServicesName"><a href="https://www.disneyplus.com">Disney+</a></li>
      
      <li class="StreamingServicesName"><a href="https://www.discoveryplus.com">Discovery+</a></li>
      
      <li class="StreamingServicesName"><a href="https://www.apple.com/apple-tv-plus/">Apple TV+</a></li>
      
      <li class="StreamingServicesName"><a href="https://www.amazon.com/gp/video/storefront">Amazon Prime Video</a></li>
    </ul>

  </main>

<!--link to footer-->
<?php
footerTemp();
?>