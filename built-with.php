<?php
  $title = 'SeaFilmz Built With';
  $mDesc = 'A list of the tools used to build the SeaFilmz website.';
  $body = 'MainBody';
  $ogTitle = 'SeaFilmz Built With';
  $ogMDesc = 'A list of the tools used to build the SeaFilmz website.';
  $ogURL = 'https://seafilmz.com/built-with';
  /*link to the start of a seafilmz general web page template*/
  require_once 'sftemplate.php';
  headerTemp();
?>

  <main>
    <h1 class="BuiltWithHeader">SeaFilmz Built With</h1>
    <ul class="BuiltWith">
      <li class="BuiltWithTool">HTML</li>
      <li class="BuiltWithTool">CSS</li>
      <li class="BuiltWithTool">JavaScript</li>
      <li class="BuiltWithTool">PHP</li>
      <li class="BuiltWithTool">SQL</li>
      <li class="BuiltWithTool">MariaDB</li>
    </ul>

    <p class='BuildWithMoreInfo'>Currently the SeaFilmz website uses no frameworks and libraries.</p>
  </main>

<?php
  // footer display function
  footerTemp();
?>