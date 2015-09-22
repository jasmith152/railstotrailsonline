<?php

$cfgProgDir = 'phpSecurePages/';
include($cfgProgDir . "secure.php");

//Establish GET & POST variables
import_request_variables("gp");
$PHP_SELF = $_SERVER['PHP_SELF'];

//connect to database
require ("dbconn.php");

//SQL queries to display data range by last name
if ( isset($_GET['range']) )
{
	switch($_GET['range']) {
	case 1:
		//Set Query
		$sql = "SELECT * FROM bike_ride WHERE last_name BETWEEN 'A' AND 'D' ORDER BY last_name ASC";
	break;
	case 2:
		//Set Query
		$sql = "SELECT * FROM bike_ride WHERE last_name BETWEEN 'E' AND 'L' ORDER BY last_name ASC";	
	break;
	case 3:
		//Set Query
		$sql = "SELECT * FROM bike_ride WHERE last_name BETWEEN 'M' AND 'R' ORDER BY last_name ASC";		
	break;
	case 4:
		//Set Query
		$sql = "SELECT * FROM bike_ride WHERE last_name BETWEEN 'S' AND 'Z' ORDER BY last_name ASC";		
	break;
	case 5:
		$sql = 'SELECT * FROM bike_ride ORDER BY last_name ASC';		
	break;
	}
}
else
{
	//Set Defualt Query
$sql = 'SELECT * FROM bike_ride ORDER BY last_name ASC';

}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Print Page</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<a href="bike_ride_index.php" style="color:#00F">Back to Database</a>
<table align="left" width="100%" border="0" cellspacing="3" cellpadding="3" style="background-color:#E2EEFB; font-family:Arial, Helvetica, sans-serif;font-size:12px">
  <tr align="center">

    <td>First Name</td>
    <td>Last Name</td>
    <td>Shirt Size</td>
    <td>Emergency Name</td>
    <td>Emergency Phone</td>
    <td>Payment</td>
  </tr>
  <?php
  if( $result = @mysql_query($sql) )
	{
		while( $row = mysql_fetch_array($result) )
		{
			echo "<tr align='center'>";
			echo "<td>".$row['first_name']."</td>";
			echo "<td>".$row['last_name']."</td>";
			echo "<td>".$row['t_shirt_size']."</td>";
			echo "<td>".$row['emergency_contact']."</td>";
			echo "<td>".$row['emergency_phone']."</td>";
			echo "<td>".$row['payment']."</td>";
			echo "</tr>";
		}
	}
	else
	{
		$error = "fail mysql_query because: " . mysql_error();
		$msg = "running from query: " . $sql;
	}
?> 
<tr align="center">
    <td><a href="<?php echo $PHP_SELF."?range=1"; ?>" style="color:#00F">A - D</a></td>
    <td><a href="<?php echo $PHP_SELF."?range=2"; ?>" style="color:#00F">E - L</a></td>
    <td><a href="<?php echo $PHP_SELF."?range=3"; ?>" style="color:#00F">M - R</a></td>
    <td><a href="<?php echo $PHP_SELF."?range=4"; ?>" style="color:#00F">S - Z</a></td>
    <td><a href="<?php echo $PHP_SELF."?range=5"; ?>" style="color:#00F">All</a></td>
    <td></td>
  </tr>
 <tr align="center">
    <td colspan="6">
        <FORM>
        <INPUT TYPE="button" onClick="window.print()" value="Print this page">
        </FORM>
</table>
</body>
</html>
<? mysql_close();?>