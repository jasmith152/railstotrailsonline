<?php

$cfgProgDir = 'phpSecurePages/';
include($cfgProgDir . "secure.php");

//Establish GET & POST variables
import_request_variables("gp");
$PHP_SELF = $_SERVER['PHP_SELF'];

//connect to database
require ("dbconn.php");
?>

<!doctype html>
    <html>
    <head>
    <meta charset="utf-8">
    <title>Select a winner</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
    </head>
    
    <body>
    <a href="bike_ride_index.php" style="color:#00F">Back to Database</a>
        <?php
            if (!empty($msg)) 
            {
                echo "<p style='color: blue;'>$msg</p>\n";
            }
            if (!empty($error))
            {
                echo "<p style='color: red;'>$error</p>\n";
            }
        ?>
    <table width="100%" border="0" cellspacing="3" cellpadding="3" style=" background-color:#E2EEFB; font-family:Arial, Helvetica, sans-serif;font-size:16px">
      <tr align="center" height="60">
        <td><a href="prize_statewide.php">State Wide Prize</a></td>
        <td><a href="prize_countywide.php">County Prize</a></td>        
      </tr>
    </table>
    
    </body>
    </html>