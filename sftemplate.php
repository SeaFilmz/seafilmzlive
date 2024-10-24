<?php
  function headerTemp() {
    global $title, $mDesc, $body;
    require_once 'new_db_connection.php';
?>
    <!DOCTYPE html>
    <html lang="en">

      <head>
        <title><?php echo $title; ?></title>
        <meta name="description" content="<?php echo $mDesc; ?>">
        <meta charset="utf-8">
        <link type="text/css" rel="stylesheet" href="sfcssmain2.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="sfmain.js" defer></script>

        <!--Connection to Google Analytics and AdSense.-->
        <?php include 'googleanalytics_connection.php'; ?>
        <?php include 'googleadsense_connection.php'; ?>
        
      </head>

      <body class=<?php echo $body; ?>>

        <!--link to header-->
<?php 
        require_once 'sfheader.php';

  }

function footerTemp() {
?>     
    <footer>
      <nav class="NavFooter">
          <p class="NavFooterMobile"><a href="#goToTopLink">Go to Top</a></p>

          <p class="NavFooterMobile"><a href="about">About</a></p>

          <p class="NavFooterMobile"><a href="contact">Contact</a></p>

          <p class="NavFooterMobile"><a href="built-with">Built With</a></p>

          <p class="NavFooterMobile"><a href="services">Services</a></p>
      </nav>
    </footer>

  </body>

</html>

<?php
    // 5. Close database connection
    global $newconnection;
    mysqli_close($newconnection);
  }
?>
