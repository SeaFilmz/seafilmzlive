<?php
  function headerTemp() {
    global $title, $mDesc, $ogTitle, $ogURL, $ogImage, $ogImageAlt, $body;
    require_once 'new_db_connection.php';
?>
    <!DOCTYPE html>
    <html lang="en">

      <head>
        <title><?php echo $title; ?></title>
        <meta name="description" content="<?php echo $mDesc; ?>">
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/main.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="js/mobile-nav.js" defer></script>

        <!-- Open Graph Meta Tags for Social Media -->
        <meta property="og:title" content="<?php echo $ogTitle; ?>">
        <meta property="og:description" content="<?php echo $mDesc; ?>">
        <meta property="og:url" content="<?php echo $ogURL; ?>">
        <meta property="og:type" content="website">
        <?php if (empty($ogImage) && empty($ogImageAlt)) { ?>
          <meta property="og:image" content="https://seafilmz.com/images/seafilmz-header-screenshot.png">
          <meta property="og:image:alt" content="Screenshot of SeaFilmz header">
        <?php } else { ?>
          <meta property="og:image" content="<?php echo $ogImage; ?>">
          <meta property="og:image:alt" content="<?php echo $ogImageAlt; ?>">
        <?php } ?>

        <!-- Open Twitter Card Tags for Social Media -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="<?php echo $ogTitle; ?>">
        <meta name="twitter:description" content="<?php echo $mDesc; ?>">
        <?php if (empty($ogImage) && empty($ogImageAlt)) { ?>
          <meta name="twitter:image" content="https://seafilmz.com/images/seafilmz-header-screenshot.png">
          <meta name="twitter:image:alt" content="Screenshot of SeaFilmz header">
        <?php } else { ?>
          <meta name="twitter:image" content="<?php echo $ogImage; ?>">
          <meta name="twitter:image:alt" content="<?php echo $ogImageAlt; ?>">
        <?php } ?>

        <script type="application/ld+json">
          {
            "@context": "https://schema.org"
          }
        </script>
      </head>

      <body class=<?php echo $body; ?>>

        <!--link to header-->
<?php
        require_once 'templates/header.php';
  }

  function footerTemp() {
?>
    <!--Connection to Manual Google AdSense.-->
    <div class="MainPageManualAds"><?php include 'googleadsense-manualconnection.php'; ?></div>

    <footer>
      <div class="FollowFooter">
        <span class="SocialMediaInfo">
          <a href="https://www.twitch.tv/seafilmz" target="_blank" class="socialMediaLink">
            <img src="/images/twitch-purple-logo.png" alt="Twitch Icon" class="TwitchLogoImage" />
          </a>
        </span >
        <span class="SocialMediaInfo">
          <a href="https://instagram.com/seafilmz" target="_blank" class="socialMediaLink">
            <img src="/images/instagram-color-logo-resized.png" alt="instagram logo" class="InstagramLogoColorImage">
          </a>
        </span>
        <span class="SocialMediaInfo">
          <a href="https://twitter.com/SeaFilmz" target="_blank" class="socialMediaLink">
            <img src="/images/x-black-logo.png" alt="X Icon" class="XLogoImage" />
          </a>
        </span>
      </div>

      <nav class="NavFooter">
        <ul class="NavFooterList">
          <li class="NavFooterMobile"><a href="#goToTopLink">Go to Top</a><li>

          <li class="NavFooterMobile"><a href="about">About</a><li>

          <li class="NavFooterMobile"><a href="contact">Contact</a><li>

          <li class="NavFooterMobile"><a href="built-with">Built With</a><li>

          <li class="NavFooterMobile"><a href="services">Services</a><li>
        </ul>
      </nav>
    </footer>
  </body>

</html>

<?php
    // 5. Close database connection
    global $newConnection;
    mysqli_close($newConnection);
  }
?>