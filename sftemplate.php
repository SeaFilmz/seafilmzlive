<?php
  function headerTemp() {
?>   
    <?php require_once("db_connection.php"); ?>
    <!DOCTYPE html>
    <html lang="en">

      <head>
        <title><?php global $title; echo $title; ?></title>
        <meta name="description" content="<?php global $mDesc; echo $mDesc; ?>">
        <meta charset="utf-8">
        <link type="text/css" rel="stylesheet" href="sfcssmain2.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="sfmain.js" defer></script>

        <!--Connection to Google Analytics.-->
        <?php include "googleanalytics_connection.php"; ?>
        
      </head>

      <body class=<?php global $body; echo $body; ?>>

        <!--link to header-->
    <?php require_once("sfheader.php"); ?>
<?php
  }

  function footer() {
?>     
    <footer>
      <nav class="NavFooter">
          <p class="NavFooterMobile"><a href="#goToTopLink">Go to Top</a></p>

          <p class="NavFooterMobile"><a href="sfabout">About</a></p>

          <p class="NavFooterMobile"><a href="sfcontact">Contact</a></p>

          <p class="NavFooterMobile"><a href="sfservices">Services</a></p>
      </nav>
    </footer>
<?php
  }
?>