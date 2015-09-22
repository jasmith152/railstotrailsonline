<?php

$cfgProgDir = 'phpSecurePages/';
include($cfgProgDir . "secure.php");

//Establish GET & POST variables
import_request_variables("gp");
$PHP_SELF = $_SERVER['PHP_SELF'];

//connect to database
require ("dbconn.php");

if ( isset($_GET['size']) )
{
	
	$size = $_GET['size'];
	if ($size == 'S')
	{
		$size_name = 'small';
	}
	if ($size == 'M')
	{
		$size_name = 'medium';
	}
	if ($size == 'L')
	{
		$size_name = 'large';
	}
	if ($size == 'XL')
	{
		$size_name = 'extra large';
	}
	if ($size == 'XXL')
	{
		$size_name = 'extra extra large';
	}

	//retreving database data
    $sql = "SELECT t_shirt_size FROM bike_ride WHERE t_shirt_size like '$size%'";
    if( $result = @mysql_query($sql) )
    {
        $rows = mysql_num_rows($result);
    }
    else
    {
        return '<p class = "Colors_and_font">fail mysql_query because: ' . mysql_error(). '</p>
                <p class = "Colors_and_font">running from query: ' . $sql . '</p>';
    }?>
     
	<!doctype html>
    <html>
    <head>
    <meta charset="utf-8">
    <title>Sort Shirt Size</title>
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
        <td><a href="<?php echo $PHP_SELF."?size=S"; ?>">Small</a></td>
        <td><a href="<?php echo $PHP_SELF."?size=M"; ?>">Medium</a></td>
        <td><a href="<?php echo $PHP_SELF."?size=L"; ?>">Large</a></td>
        <td><a href="<?php echo $PHP_SELF."?size=XL"; ?>">Extra Large</a></td>
        <td><a href="<?php echo $PHP_SELF."?size=XXL"; ?>">Extra Extra Large</a></td>
      </tr>
      <tr height="84">
        <td colspan="5">Total number of size <? echo "$size_name"; ?> is: <? echo "$rows"; ?></td>
      </tr>
    </table>
    
    </body>
    </html>
<? }
else
{
?>
    <!doctype html>
    <html>
    <head>
    <meta charset="utf-8">
    <title>Sort Shirt Size</title>
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
        <td><a href="<?php echo $PHP_SELF."?size=S"; ?>">Small</a></td>
        <td><a href="<?php echo $PHP_SELF."?size=M"; ?>">Medium</a></td>
        <td><a href="<?php echo $PHP_SELF."?size=L"; ?>">Large</a></td>
        <td><a href="<?php echo $PHP_SELF."?size=XL"; ?>">Extra Large</a></td>
        <td><a href="<?php echo $PHP_SELF."?size=XXL"; ?>">Extra Extra Large</a></td>
      </tr>
      <tr height="84">
        <td colspan="5">Total:</td>
      </tr>
    </table>
    
    </body>
    </html>
<? }?>