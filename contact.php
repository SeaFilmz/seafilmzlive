<?php
  $title = "Contacts - SeaFilmz"; 
  $mDesc = "Contact info for the founder/ devloper of SeaFilmz.";
  $body = "MainBody";
  /*link to the start of a seafilmz general web page template*/
  require_once "sftemplate.php";
  headerTemp();
?>

              <div class="contact">
                <h2>Contact Info</h2>            
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
  require_once "sftemplate.php";
  footerTemp();
?>