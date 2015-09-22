<?php

$cfgProgDir = 'phpSecurePages/';
include($cfgProgDir . "secure.php");

//Establish GET & POST variables
import_request_variables("gp");
$PHP_SELF = $_SERVER['PHP_SELF'];

if ( isset($_GET['id']) )
{
	$id = $_GET['id'];
}

if ( isset($_POST['submit']) and $_POST['submit'] == 'Delete')
{
	//connect to database
	require ("dbconn.php");
	
	$id = $_POST['id'];

	// delete record 
    $sql = "DELETE FROM bike_ride WHERE id=".$id." LIMIT 1";
   
    if (@mysql_query($sql)) {
   		if (@mysql_affected_rows($dbcnx) == 1) {
			$msg = "Item has been deleted.";
	    } else {
			$error = "Error deleting item: " . mysql_error()."<br>
			The query being run was: " . $sql . "";
	    }

    }
	else
	{
		print '<p class = "Colors_and_font">fail mysql_query (inside submit) because: ' . mysql_error(). '</p>
				  <p class = "Colors_and_font">running from query: ' . $sql . '</p>';
	}
}
?>
	
	<!doctype html>
	<html>
	<head>
	<meta charset="utf-8">
	<title>Delete Item Page</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
	</head>
	
	<body style=" background-color:#E2EEFB; font-family:Arial, Helvetica, sans-serif;font-size:12px">
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
		//connect to database
		require ("dbconn.php");
		$sql = "SELECT * FROM bike_ride WHERE id=".$id."";
		if( $result = @mysql_query($sql) )
		{
			$row = mysql_fetch_array($result);
		}
		else
		{
			print '<p class = "Colors_and_font">fail mysql_query because: ' . mysql_error(). '</p>
				   <p class = "Colors_and_font">running from query: ' . $sql . '</p>';
		}
	?>
    
   	<form action="<?php echo $PHP_SELF; ?>" method="post" name="edit_item_registration">
                                                            
                                        <p align="left"><em>Required fields indicated by *</em></p>
                                        <p>*Date Registered: <input type="text" name="date_registered" size="20" value="<?php echo $row['register_date']; ?>"/></p>
                      <p>*Last Name: <input type="text" name="last_name" size="42" value="<?php echo $row['last_name']; ?>"/></p>
											<p>*First Name: <input type="text" name="first_name" size="42" value="<?php echo $row['first_name']; ?>"/></p>
											<p>*Street Address: <input type="text" name="street_address" size="35" value="<?php echo $row['street_address']; ?>"/></p>
											<p>*City: <input type="text" name="City" size="35" value="<?php echo $row['city']; ?>"/></p>
											<p>*State: <input type="text" name="State" size="1" value="<?php echo $row['state']; ?>"/></p>
											<p>*Zip: <input type="text" name="Zip" size="25" value="<?php echo $row['zip']; ?>"/></p>
											<p>*Phone: <input type="text" name="Phone" size="25" value="<?php echo $row['phone']; ?>"/></p>
											<p>*Email Address: <input type="text" name="email" size="25" value="<?php echo $row['email']; ?>"/></p>
                                            <p>*Confirm Email Address: <input type="text" name="email2" size="25" value="<?php echo $row['email']; ?>"/></p>
											<p>*T-Shirt
											 <input type="text" name="email2" size="25" value="<?php echo $row['t_shirt_size']; ?>"/></p>
                                             <p>*Distance
											 <input type="text" name="email2" size="25" value="<?php echo $row['distance']; ?>"/></p>
											<p>Emergency Contact: <input type="text" name="emergency_contact" size="35" value="<?php echo $row['emergency_contact']; ?>"/></p>
                                            <p>Emergency Phone: <input type="text" name="emergency_phone" size="35" value="<?php echo $row['emergency_contact']; ?>"/></p>
                                            <p>*Payment: <input type="text" name="payment" size="1" value="<?php echo $row['payment']; ?>"/></p>
	  <p align="left"><input type="submit" name="submit" value="Delete" onclick="return confirm('Are you sure you want to delete the data ?');"/> <input type="hidden" name="id" value="<? echo $id; ?>"></p>
	</form>
	</body>
	</html>