<?php
  // link to the start of a seafilmz general webpage template
  $title = 'Where to Watch Seattle Movies - SeaFilmz';
  $mDesc = 'This is a list of streaming services that might have Seattle movies you can watch.';
  $body = 'MainBody';
  $ogTitle = 'Where to Watch Seattle Movies - SeaFilmz';
  $ogURL = 'https://seafilmz.com/built-with';
  require_once 'templates/main-page-structure.php';
  headerTemp();
?>

  <main>

    <?php function StreamingServiceList($link, $name) { ?>
      <li class="StreamingServicesName"><a href="<?= $link; ?>" target="_blank"><?= $name; ?></a></li>
    <?php } ?>

    <h1>Where to Watch Seattle Movies:</h1>
    <h3 class="subheader">List of Major Streaming Services</h3>

    <ul class="StreamingServices">
    <?php
        StreamingServiceList("https://tubitv.com", "Tubi");

        StreamingServiceList("https://www.starz.com/us/en/", "Starz");

        StreamingServiceList("https://www.peacocktv.com", "Peacock");

        StreamingServiceList("https://www.paramountpluswithshowtime.com/", "Paramount+ with Showtime");

        StreamingServiceList("https://www.paramountplus.com", "Paramount+");

        StreamingServiceList("https://www.netflix.com", "Netflix");

        StreamingServiceList("https://www.max.com/", "Max");

        StreamingServiceList("https://www.hulu.com/welcome", "Hulu");

        StreamingServiceList("https://www.amazon.com/gp/video/splash/freevee_finduse", "Freevee");

        StreamingServiceList("https://www.disneyplus.com", "Disney+");

        StreamingServiceList("https://www.discoveryplus.com", "Discovery+");

        StreamingServiceList("https://www.apple.com/apple-tv-plus/", "Apple TV+");

        StreamingServiceList("https://www.amazon.com/Amazon-Video/b?ie=UTF8&node=2858778011", "Amazon Prime Video");
      ?>
    </ul>

  </main>

<!--link to footer-->
<?php footerTemp(); ?>