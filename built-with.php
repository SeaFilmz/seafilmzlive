<?php
  $title = 'SeaFilmz Built With'; 
  $mDesc = 'A list of the tools used to build the SeaFilmz website.';
  $body = 'MainBody';
  /*link to the start of a seafilmz general web page template*/
  require_once 'sftemplate.php';
  headerTemp();
?>

  <main>
    <h2 class="BuiltWithHeader">SeaFilmz Built With</h2>
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