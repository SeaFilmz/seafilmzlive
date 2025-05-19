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

    <?php function streamingServiceList($link, $name) { ?>
      <li class="StreamingServicesName"><a href="<?= $link; ?>" target="_blank"><?= $name; ?></a></li>
    <?php } ?>

    <h1>Where to Watch Seattle Movies:</h1>
    <h3 class="subheader">List of Major Streaming Services</h3>

    <ul class="StreamingServices">
    <?php
        streamingServiceList("https://tubitv.com", "Tubi");

        streamingServiceList("https://www.starz.com/us/en/", "Starz");

        streamingServiceList("https://www.peacocktv.com", "Peacock");

        streamingServiceList("https://www.paramountpluswithshowtime.com/", "Paramount+ with Showtime");

        streamingServiceList("https://www.paramountplus.com", "Paramount+");

        streamingServiceList("https://www.netflix.com", "Netflix");

        streamingServiceList("https://www.max.com/", "Max");

        streamingServiceList("https://www.hulu.com/welcome", "Hulu");

        streamingServiceList("https://www.amazon.com/gp/video/splash/freevee_finduse", "Freevee");

        streamingServiceList("https://www.disneyplus.com", "Disney+");

        streamingServiceList("https://www.discoveryplus.com", "Discovery+");

        streamingServiceList("https://www.apple.com/apple-tv-plus/", "Apple TV+");

        streamingServiceList("https://www.amazon.com/Amazon-Video/b?ie=UTF8&node=2858778011", "Amazon Prime Video");
      ?>
    </ul>

  </main>

<!--link to footer-->
<?php footerTemp(); ?>