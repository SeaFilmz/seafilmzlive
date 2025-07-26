<?php
  function headerTemp() {
    global $title, $mDesc, $ogTitle, $ogURL, $body;
    require_once 'new_db_connection.php';
?>
    <!DOCTYPE html>
    <html lang="en">

      <head>
        <title><?php echo $title; ?></title>
        <meta name="description" content="<?php echo $mDesc; ?>">
        <meta charset="utf-8">
        <link type="text/css" rel="stylesheet" href="css/main.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="js/mobile-nav.js" defer></script>

        <!-- Open Graph Meta Tags for Social Media -->
        <meta property="og:title" content="<?php echo $ogTitle; ?>">
        <meta property="og:description" content="<?php echo $mDesc; ?>">
        <meta property="og:url" content="<?php echo $ogURL; ?>">
        <meta property="og:type" content="website">
      </head>

      <body class=<?php echo $body; ?>>

        <!--link to header-->
<?php
        require_once 'templates/header.php';
  }

  function footerTemp() {
?>
    <footer>
      <div class="FollowFooter">
        <span class="SocialMediaInfo">
          <a href="https://www.twitch.tv/seafilmz" target="_blank" class="socialMediaLink">
            <img src="/images/twitch-purple-logo.png" alt="Twitch Icon" class="TwitchLogoImage" />
          </a>
        </span >
        <span class="SocialMediaInfo">
          <a href="https://instagram.com/seafilmz" target="_blank" class="socialMediaLink">
            <img src="/images/instagram-color-logo.png" alt="instagram logo" class="InstagramLogoColorImage">
          </a>
        </span>
        <span class="SocialMediaInfo">
          <a href="https://twitter.com/SeaFilmz" target="_blank" class="socialMediaLink">
            <img src="/images/x-black-logo.png" alt="X Icon" class="XLogoImage" />
          </a>
        </span>
      </div>

      <nav class="NavFooter">
          <p class="NavFooterMobile"><a href="#goToTopLink">Go to Top</a></p>

          <p class="NavFooterMobile"><a href="about">About</a></p>

          <p class="NavFooterMobile"><a href="contact">Contact</a></p>

          <p class="NavFooterMobile"><a href="built-with">Built With</a></p>

          <p class="NavFooterMobile"><a href="services">Services</a></p>
      </nav>
    </footer>

    <!--Connection to Manual Google AdSense.-->
    <div class="MainPageManualAds"><?php include 'googleadsense-manualconnection.php'; ?></div>

  </body>

</html>

<?php
    // 5. Close database connection
    global $newConnection;
    mysqli_close($newConnection);
  }
?>