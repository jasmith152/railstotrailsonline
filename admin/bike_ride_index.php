<?php

$cfgProgDir = 'phpSecurePages/';
include($cfgProgDir . "secure.php");

//Establish GET & POST variables
import_request_variables("gp");
$PHP_SELF = $_SERVER['PHP_SELF'];

if ( isset($_POST['msg']) )
{
	$msg = $_POST['msg'];
}
if ( isset($_POST['msg']) )
{
	$msg = $_GET['msg'];
}

if ( isset($_POST['error']) )
{
	$error = $_POST['error'];
}
if ( isset($_GET['error']) )
{
	$error = $_GET['error'];
}


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

//SQL queries to display data in asc or desc order via the nav bar
if ( isset($_GET['nav_sort']) )
{
	switch($_GET['nav_sort']) {
	case 1:
		
		$asc_desc_id = $_GET['asc_desc_id']; 		
		if ($asc_desc_id == "ASC")
		{
			$asc_desc_id = "DESC";
		} 
		else 
		{
			$asc_desc_id = "ASC";
		}	
		//Set Query
		$sql = "SELECT * FROM bike_ride ORDER BY id ".$asc_desc_id."";
	break;
	case 2:
		$asc_desc_date = $_GET['asc_desc_date']; 		
		if ($asc_desc_date == "ASC")
		{
			$asc_desc_date = "DESC";
		} 
		else 
		{
			$asc_desc_date = "ASC";
		}	
		//Set Query
		$sql = "SELECT * FROM bike_ride ORDER BY register_date ".$asc_desc_date."";	
	break;
	case 3:
		$asc_desc_first = $_GET['asc_desc_first']; 		
		if ($asc_desc_first == "ASC")
		{
			$asc_desc_first = "DESC";
		} 
		else 
		{
			$asc_desc_first = "ASC";
		}	
		//Set Query
		$sql = "SELECT * FROM bike_ride ORDER BY first_name ".$asc_desc_first."";		
	break;
	case 4:
		$asc_desc_last = $_GET['asc_desc_last']; 		
		if ($asc_desc_last == "ASC")
		{
			$asc_desc_last = "DESC";
		} 
		else 
		{
			$asc_desc_last = "ASC";
		}	
		//Set Query
		$sql = "SELECT * FROM bike_ride ORDER BY last_name ".$asc_desc_last."";		
	break;
	case 5:
		$asc_desc_street = $_GET['asc_desc_street']; 		
		if ($asc_desc_street == "ASC")
		{
			$asc_desc_street = "DESC";
		} 
		else 
		{
			$asc_desc_street = "ASC";
		}	
		//Set Query
		$sql = "SELECT * FROM bike_ride ORDER BY street_address ".$asc_desc_street."";		
	break;
	case 6:
		$asc_desc_city = $_GET['asc_desc_city']; 		
		if ($asc_desc_city == "ASC")
		{
			$asc_desc_city = "DESC";
		} 
		else 
		{
			$asc_desc_city = "ASC";
		}	
		//Set Query
		$sql = "SELECT * FROM bike_ride ORDER BY city ".$asc_desc_city."";	
	break;
	case 7:
		$asc_desc_state = $_GET['asc_desc_state']; 		
		if ($asc_desc_state == "ASC")
		{
			$asc_desc_state = "DESC";
		} 
		else 
		{
			$asc_desc_state = "ASC";
		}	
		//Set Query
		$sql = "SELECT * FROM bike_ride ORDER BY state ".$asc_desc_state."";			
	break;
	case 8:
		$asc_desc_zip = $_GET['asc_desc_zip']; 		
		if ($asc_desc_zip == "ASC")
		{
			$asc_desc_zip = "DESC";
		} 
		else 
		{
			$asc_desc_zip = "ASC";
		}	
		//Set Query
		$sql = "SELECT * FROM bike_ride ORDER BY zip ".$asc_desc_zip."";			
	break;
	case 9:
		$asc_desc_email = $_GET['asc_desc_email']; 		
		if ($asc_desc_email == "ASC")
		{
			$asc_desc_email = "DESC";
		} 
		else 
		{
			$asc_desc_email = "ASC";
		}	
		//Set Query
		$sql = "SELECT * FROM bike_ride ORDER BY email ".$asc_desc_email."";				
	break;
	case 10:
		$asc_desc_phone = $_GET['asc_desc_phone']; 		
		if ($asc_desc_phone == "ASC")
		{
			$asc_desc_phone = "DESC";
		} 
		else 
		{
			$asc_desc_phone = "ASC";
		}	
		//Set Query
		$sql = "SELECT * FROM bike_ride ORDER BY phone ".$asc_desc_phone."";				
	break;
	case 11:
		$asc_desc_shirt = $_GET['asc_desc_shirt']; 		
		if ($asc_desc_shirt == "ASC")
		{
			$asc_desc_shirt = "DESC";
		} 
		else 
		{
			$asc_desc_shirt = "ASC";
		}	
		//Set Query
		$sql = "SELECT * FROM bike_ride ORDER BY t_shirt_size ".$asc_desc_shirt."";			
	break;
	case 12:
		$asc_desc_distance = $_GET['asc_desc_distance']; 		
		if ($asc_desc_distance == "ASC")
		{
			$asc_desc_distance = "DESC";
		} 
		else 
		{
			$asc_desc_distance = "ASC";
		}	
		//Set Query
		$sql = "SELECT * FROM bike_ride ORDER BY distance ".$asc_desc_distance."";			
	break;
	case 13:
		$asc_desc_EMname = $_GET['asc_desc_EMname']; 		
		if ($asc_desc_EMname == "ASC")
		{
			$asc_desc_EMname = "DESC";
		} 
		else 
		{
			$asc_desc_EMname = "ASC";
		}	
		//Set Query
		$sql = "SELECT * FROM bike_ride ORDER BY emergency_contact ".$asc_desc_EMname."";				
	break;
	case 14:
		$asc_desc_EMphone = $_GET['asc_desc_EMphone']; 		
		if ($asc_desc_EMphone == "ASC")
		{
			$asc_desc_EMphone = "DESC";
		} 
		else 
		{
			$asc_desc_EMphone = "ASC";
		}	
		//Set Query
		$sql = "SELECT * FROM bike_ride ORDER BY emergency_phone ".$asc_desc_EMphone."";			
	break;
	case 15:
		$asc_desc_pay = $_GET['asc_desc_pay']; 		
		if ($asc_desc_pay == "ASC")
		{
			$asc_desc_pay = "DESC";
		} 
		else 
		{
			$asc_desc_pay = "ASC";
		}	
		//Set Query
		$sql = "SELECT * FROM bike_ride ORDER BY payment ".$asc_desc_pay."";		
	break;
	}
}
if ( !isset($_GET['nav_sort']) && !isset($_GET['range']) )
{
	//Set Defualt Query
	$sql = 'SELECT * FROM bike_ride ORDER BY id ASC';
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Content Editor</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<?php
	if (!empty($msg)) 
	{
    	echo "<p style='color: blue;'>$msg</p>\n";
	}
	if (!empty($error))
	{
    	echo "<p style='color: red;'>$error</p>\n";
	}
	if( $result = @mysql_query($sql) )
	{
?>
<a href="index.php" style="color:#00F">Back to home page</a>&nbsp;&nbsp;&nbsp;<a href="<?php echo $PHP_SELF; ?>" style="color:#00F">Refresh database</a>
<table align="left" width="100%" border="0" cellspacing="3" cellpadding="3" style="background-color:#E2EEFB; font-family:Arial, Helvetica, sans-serif;font-size:12px">
   <tr align="center">
    <td colspan="2" style="color:#00F">Total records in database: <? echo mysql_num_rows($result); ?></td> 
    <td></td> 
    <td><a href="add_item.php" style="color:#00F">Add</a></td>
    <td><a href="<?php echo $PHP_SELF."?range=1"; ?>" style="color:#00F">A - D</a></td>
    <td><a href="<?php echo $PHP_SELF."?range=2"; ?>" style="color:#00F">E - L</a></td>
    <td><a href="<?php echo $PHP_SELF."?range=3"; ?>" style="color:#00F">M - R</a></td>
    <td><a href="<?php echo $PHP_SELF."?range=4"; ?>" style="color:#00F">S - Z</a></td>
    <td><a href="<?php echo $PHP_SELF."?range=5"; ?>" style="color:#00F">All</a></td>
    <td><a href="print.php" style="color:#00F">Print</a></td>
    <td colspan="2"><a href="sort_shirt.php" style="color:#00F">Sort Shirt Size</a></td> 
    <td><a href="prize_index.php" style="color:#00F">Prize</a></td>
    <td></td>
    <td></td>
  </tr>
  <tr align="center">
    <td><a href="<?php echo $PHP_SELF."?nav_sort=1&asc_desc_id=".$asc_desc_id.""; ?>" style="color:#00F">ID</a></td>
    <td><a href="<?php echo $PHP_SELF."?nav_sort=2&asc_desc_date=".$asc_desc_date.""; ?>" style="color:#00F">Date Registered</a></td>
    <td><a href="<?php echo $PHP_SELF."?nav_sort=3&asc_desc_first=".$asc_desc_first.""; ?>" style="color:#00F">First Name</a></td>
    <td><a href="<?php echo $PHP_SELF."?nav_sort=4&asc_desc_last=".$asc_desc_last.""; ?>" style="color:#00F">Last Name</a></td>
    <td><a href="<?php echo $PHP_SELF."?nav_sort=5&asc_desc_street=".$asc_desc_street.""; ?>" style="color:#00F">Street Address</a></td>
    <td><a href="<?php echo $PHP_SELF."?nav_sort=6&asc_desc_city=".$asc_desc_city.""; ?>" style="color:#00F">City</a></td>
    <td><a href="<?php echo $PHP_SELF."?nav_sort=7&asc_desc_state=".$asc_desc_state.""; ?>" style="color:#00F">State</a></td>
    <td><a href="<?php echo $PHP_SELF."?nav_sort=8&asc_desc_zip=".$asc_desc_zip.""; ?>" style="color:#00F">Zip Code</a></td>
    <td><a href="<?php echo $PHP_SELF."?nav_sort=9&asc_desc_email=".$asc_desc_email.""; ?>" style="color:#00F">Email Address</a></td>
    <td><a href="<?php echo $PHP_SELF."?nav_sort=10&asc_desc_phone=".$asc_desc_phone.""; ?>" style="color:#00F">Phone Number</a></td>
    <td><a href="<?php echo $PHP_SELF."?nav_sort=11&asc_desc_shirt=".$asc_desc_shirt.""; ?>" style="color:#00F">Shirt Size</a></td>
    <td><a href="<?php echo $PHP_SELF."?nav_sort=12&asc_desc_distance=".$asc_desc_distance.""; ?>" style="color:#00F">Distance</a></td>
    <td><a href="<?php echo $PHP_SELF."?nav_sort=13&asc_desc_EMname=".$asc_desc_EMname.""; ?>" style="color:#00F">Emergency Name</a></td>
    <td><a href="<?php echo $PHP_SELF."?nav_sort=14&asc_desc_EMphone=".$asc_desc_EMphone.""; ?>" style="color:#00F">Emergency Phone</a></td>
    <td><a href="<?php echo $PHP_SELF."?nav_sort=15&asc_desc_pay=".$asc_desc_pay.""; ?>" style="color:#00F">Payment</a></td>
    <td></td>
  </tr>
  <?php
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
			echo "<td>".$row['distance']."</td>";
			echo "<td>".$row['emergency_contact']."</td>";
			echo "<td>".$row['emergency_phone']."</td>";
			echo "<td>".$row['payment']."</td>";
			echo "<td><a href='edit_item.php?id=".$row['id']."' style='color:#00F'>Edit</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href='delete_item.php?id=".$row['id']."' style='color:#00F'>Delete</a></td>";
			echo "<td></td>";
			echo "</tr>";
		}
	}
	else
	{
		$error = "fail mysql_query because: " . mysql_error();
		$msg = "running from query: " . $sql;
	}
?> 
</table>
</body>
</html>
<? mysql_close();?>