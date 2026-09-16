<?php
  // link to the start of a seafilmz general webpage template
  $title = 'Where to Watch Seattle Movies - SeaFilmz';
  $mDesc = 'This is a list of streaming services that might have Seattle movies you can watch.';
  $body = 'MainBody';
  $ogTitle = 'Where to Watch Seattle Movies - SeaFilmz';
  $ogURL = 'https://seafilmz.com/streaming-services';
  require_once 'templates/main-page-structure.php';
  headerTemp();
?>

  <main>

    <h1>Where to Watch Seattle Movies:</h1>
    <h3 class="subheader">List of Major Streaming Services</h3>

    <ul class="StreamingServices">
      <?php
        $streamingServices = [
          ["https://www.amazon.com/Amazon-Video/b?ie=UTF8&node=2858778011", "Amazon Prime Video"],
          ["https://www.apple.com/apple-tv-plus/", "Apple TV+"],
          ["https://www.discoveryplus.com", "Discovery+"],
          ["https://www.disneyplus.com", "Disney+"],
          ["https://www.hbomax.com/", "HBO Max"],
          ["https://www.hulu.com/welcome", "Hulu"],
          ["https://www.netflix.com", "Netflix"],
          ["https://www.paramountplus.com", "Paramount+"],
          ["https://www.peacocktv.com", "Peacock"],
          ["https://www.starz.com/us/en/", "Starz"],
          ["https://tubitv.com", "Tubi"],
        ];

        for ($i = 0; $i < count($streamingServices); $i++) { ?>
          <li class="StreamingServicesName">
            <a href="<?= $streamingServices[$i][0]; ?>" target="_blank">
              <?= $streamingServices[$i][1]; ?>
            </a>
          </li>
        <?php };
      ?>
    </ul>

  </main>

<!--link to footer-->
<?php footerTemp(); ?>