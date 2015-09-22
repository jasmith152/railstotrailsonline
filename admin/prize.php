<?php

$cfgProgDir = 'phpSecurePages/';
include($cfgProgDir . "secure.php");

//Establish GET & POST variables
import_request_variables("gp");
$PHP_SELF = $_SERVER['PHP_SELF'];

//connect to database
require ("dbconn.php");

if ( (isset($_GET['display']) && $_GET['display'] == 'ride') || (isset($_POST['display']) && $_POST['display'] == 'ride') )
{
	$winner = '';
	//Set Defualt Query
	$sql = 'SELECT * FROM bike_ride ORDER BY id ASC';
?>
     
	<!doctype html>
    <html>
    <head>
    <meta charset="utf-8">
    <title>Select a county prize winner</title>
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
    <?php
  	if( $result = @mysql_query($sql) )
	{
		while( $row = mysql_fetch_array($result) )
		{
			echo "<tr align='center'>";
			echo "<td>".$row['id']."</td>";
			echo "<td>".$row['register_date']."</td>";
			echo "<td>".$row['first_name']."</td>";
			echo "<td>".$row['last_name']."</td>";
			echo "<td>".$row['street_address']."</td>";
			echo "<td>".$row['city']."</td>";
			echo "<td>".$row['state']."</td>";
			echo "<td>".$row['zip']."</td>";		
			echo "<td>".$row['email']."</td>";
			echo "<td>".$row['phone']."</td>";
			echo "<td>".$row['t_shirt_size']."</td>";
			echo "<td>".$row['payment']."</td>";
			echo "</tr>";
		}
	}
	else
	{
		$error = "fail mysql_query because: " . mysql_error();
		$msg = "running from query: " . $sql;
	}
 
	echo "<tr>";
	echo "<td colspan='12' align='center'>";
    echo "<form action='$PHP_SELF' method='post'><input name='prize' type='submit' value='winner'><input type='hidden' name='display' value='ride'></form></td>";
   	echo "</tr>";
    echo "</table>";
  
    if( isset($_POST['prize']) && $_POST['prize'] == 'winner')
	{
		//Set Defualt Query
		$sql = 'SELECT id FROM bike_ride';
		if( $result = @mysql_query($sql) )
		{
			echo "count is".mysql_num_rows($result)."";
			$max = mysql_num_rows($result);
			$min = 0;
			$winner = rand($min,$max);
			if(in_array($winner, $result))
			{			
				echo "<table width='100%' border='0' cellspacing='3' cellpadding='3'>";
				echo "<tr>";
				echo "<td>the winner is: ".$winner."</td>";
				echo "</tr>";
				echo "</table>";
			}
		}
		else
		{
			$error = "fail mysql_query because: " . mysql_error();
			$msg = "running from query: " . $sql;
		}
		
		}
		echo "</body>";
		echo "</html>";
}
elseif ( isset($_GET['display']) && $_GET['display'] == 'county' )
{

}
else
{?>
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
        <td><a href="<?php echo $PHP_SELF."?display=ride"; ?>">Bike Ride Prize</a></td>
        <td><a href="<?php echo $PHP_SELF."?display=county"; ?>">County Prize</a></td>        
      </tr>
    </table>
    
    </body>
    </html>
<? }?>