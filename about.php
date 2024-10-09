<!--link to the start of a seafilmz general webpage template-->
<?php
  $title = 'About - SeaFilmz'; 
  $mDesc = 'Info about what is seafilmz and who its founder/developer is.';
  $body = 'MainBody';
  require_once 'sftemplate.php';
  headerTemp();
?>


    <section class="aboutpagecontent">
      <h2 class="AboutHeader">About SeaFilmz</h2>

      <div class="AboutDescription">
        <p>Do you enjoy movies, music, or sports? Do you watch movies or sports? Do you listen music? Do you want to learn about Seattle? If you said yes to any of these four questions then this website is for you.</p>
        <p>This website is SeaFilmz which is a media website about Seattle. SeaFilmz is developed by a person who grew up in the greater Seattle area and is a current resident who is into media and is a movie enthusiast.</p>
      </div>
    </section>

    <div class="secondHeader">
      <button onclick="headerSwitchText()" class="secondHeaderButton">SeaFilmz Stand For</button>
    </div>

<?php
  // footer display function
  footerTemp();
?>
