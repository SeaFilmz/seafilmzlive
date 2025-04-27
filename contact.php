<?php
  $title = "Contacts - SeaFilmz";
  $mDesc = "Contact info for the founder/ devloper of SeaFilmz.";
  $body = "MainBody";
  $ogTitle = 'Contacts - SeaFilmz';
  $ogURL = 'https://seafilmz.com/contact';
  /*link to the start of a seafilmz general web page template*/
  require_once "templates/main-page-structure.php";
  headerTemp();
?>

              <div class="contact">
                <h1>Contact Info</h1>
                <b class="contactTitle1">Seattle Filmz Email</b> :
                <span class="contactInfo">seafilmz@gmail.com</span>
                <p></p>
                <b class="contactTitle">Seattle Filmz Twitch</b> :
                <a href="https://www.twitch.tv/seafilmz" target="_blank" class="contactInfo">twitch.tv/seafilmz</a>
                <p></p>
                <b class="contactTitle">Seattle Filmz Twitter</b> :
                <a href="https://twitter.com/seafilmz" target="_blank" class="contactInfo">@SeaFilmz</a>
                <p></p>
                <b class="contactTitle">Seattle Filmz Instagram</b> :
                <a href="https://instagram.com/seafilmz" target="_blank" class="contactInfo">@SeaFilmz</a>
              </div>

    <!--link to footer-->
<?php
  footerTemp();
?>