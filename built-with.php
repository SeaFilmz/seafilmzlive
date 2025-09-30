<?php
  $title = 'SeaFilmz Built With';
  $mDesc = 'A list of the tools used to build the SeaFilmz website.';
  $body = 'MainBody';
  $ogImage = 'https://seafilmz.com/images/seafilmz-builtwith-screenshot.png';
  $ogImageAlt = 'Screenshot of the main section of the built with webpage that includes a list of tools used to build the SeaFilmz website.';
  /*link to the start of a seafilmz general web page template*/
  require_once 'templates/main-page-structure.php';
  headerTemp();
?>

  <main>
    <h1 class="BuiltWithHeader">SeaFilmz Built With</h1>
    <ul class="BuiltWith">
      <?php
        $tools = ["HTML", "CSS", "JavaScript", "PHP", "SQL", "MariaDB"];

        $count = count($tools);

        for ($i = 0; $i < $count; $i++) {
          echo "<li class='BuiltWithTool'>{$tools[$i]}</li>";
        }
      ?>
    </ul>

    <p class='BuiltWithMoreInfo'>Currently the SeaFilmz website uses no frameworks and libraries.</p>
  </main>

<?php
  // footer display function
  footerTemp();
?>