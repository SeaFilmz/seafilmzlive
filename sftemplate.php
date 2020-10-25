<?php
  function headerTemp() {
   
    require_once("db_connectiontest.php"); 
?>
    <!DOCTYPE html>
    <html lang="en">

      <head>
        <title><?php global $title; echo $title; ?></title>
        <meta name="description" content="<?php echo $mDesc; ?>">
        <meta charset="utf-8">
        <link type="text/css" rel="stylesheet" href="newsfcssmain.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="sfmain.js" defer></script>

        <!--Connection to Google Analytics.-->
        <?php include "googleanalytics_connection.php"; ?>
        
      </head>

      <body class=<?php global $body; echo $body; ?>>

        <!--link to header-->
<?php 
        require_once("sfheader.php");

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