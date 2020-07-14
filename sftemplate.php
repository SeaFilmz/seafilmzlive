<?php require_once("db_connection.php"); ?>
<!DOCTYPE html>
<html lang="en">

  <head>
    <title><?php echo $title; ?></title>
    <meta name="description" content="<?php echo $mDesc; ?>">
    <meta charset="utf-8">
    <link type="text/css" rel="stylesheet" href="sfcss.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="sfmain.js" defer></script>

    <!--Connection to Google Analytics.-->
    <?php include "googleanalytics_connection.php"; ?>
</head>