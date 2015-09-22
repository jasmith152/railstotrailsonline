<?php

$cfgProgDir = 'phpSecurePages/';
include($cfgProgDir . "secure.php");

//Establish GET & POST variables
import_request_variables("gp");
$PHP_SELF = $_SERVER['PHP_SELF'];

if ( isset($_POST['id']) )
{
	$id = $_POST['id'];
}
if ( isset($_GET['id']) )
{
	$id = $_GET['id'];
}


if ( isset($_POST['submit']) )
{
	//connect to database
	require ("dbconn.php");
	 // Insert a record
    $sql = "UPDATE bike_ride SET 
            register_date='".$_POST['date_registered']."', 
            first_name='".$_POST['first_name']."', 
            last_name='".$_POST['last_name']."', 
            street_address='".$_POST['street_address']."', 
            city='".$_POST['City']."', 
            state='".$_POST['State']."', 
            zip='".$_POST['Zip']."', 
            phone='".$_POST['Phone']."', 
            email='".$_POST['email']."', 
            t_shirt_size='".$_POST['shirt_size']."', 
			distance='".$_POST['distance']."', 
            emergency_contact='".$_POST['emergency_contact']."', 
            emergency_phone='".$_POST['emergency_phone']."', 
            payment='".$_POST['payment']."'
			WHERE id=$id";
    if (@mysql_query($sql)) {
       $msg = "Item has been added.";
    } else {
       $error = "Error adding item: " . mysql_error();
    }
?>
	
    <!doctype html>
	<html>
	<head>
	<meta charset="utf-8">
	<title>Edit Item Page</title>
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
		$sql = 'SELECT * FROM bike_ride WHERE id='.$id.'';
		if( $result = @mysql_query($sql) )
		{
			$row = mysql_fetch_array($result);
		}
		else
		{
			print '<p style="color:#000; font">fail mysql_query because: ' . mysql_error(). '</p>
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
											<p>*T-Shirt (Please Check One) 
											  <input type="checkbox" name="shirt_size" value="S" />
	  SM <input type="checkbox" name="shirt_size" value="M" />MED <input type="checkbox" name="shirt_size" value="L" />LG <input type="checkbox" name="shirt_size" value="XL" />XL <input type="checkbox" name="shirt_size" value="XXL" />XXL</p>
      <p>*Distance (Please Check One) 
											  <input type="checkbox" name="distance" value="14 miles" />14 miles <input type="checkbox" name="distance" value="30 miles" />30 miles <input type="checkbox" name="distance" value="48 miles" />48 miles <input type="checkbox" name="distance" value="60 miles" />60 miles <input type="checkbox" name="distance" value="100 miles" />100 miles <input type="checkbox" name="distance" value="Other" />Other</p>
											<p>Emergency Contact: <input type="text" name="emergency_contact" size="35" value="<?php echo $row['emergency_contact']; ?>"/></p>
                                            <p>Emergency Phone: <input type="text" name="emergency_phone" size="35" value="<?php echo $row['emergency_phone']; ?>"/></p>
                                            <p>*Payment:  <input type="checkbox" name="payment" value="Y" />
	  Yes <input type="checkbox" name="payment" value="N" />No </p>
	  <p align="left"><input type="submit" name="submit" value="Update Entry" />
      <input type="hidden" name="id" value="<?php echo $id; ?>"/></p>
	</form>
	</body>
	</html>
<?php }
else
{?>
	
	<!doctype html>
	<html>
	<head>
	<meta charset="utf-8">
	<title>Edit Item Page</title>
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
											<p>*T-Shirt (Please Check One) 
											  <input type="checkbox" name="shirt_size" value="S" />
	  SM <input type="checkbox" name="shirt_size" value="M" />MED <input type="checkbox" name="shirt_size" value="L" />LG <input type="checkbox" name="shirt_size" value="XL" />XL <input type="checkbox" name="shirt_size" value="XXL" />XXL</p>
      <p>*Distance (Please Check One) 
											  <input type="checkbox" name="distance" value="14 miles" />14 miles <input type="checkbox" name="distance" value="30 miles" />30 miles <input type="checkbox" name="distance" value="48 miles" />48 miles <input type="checkbox" name="distance" value="60 miles" />60 miles <input type="checkbox" name="distance" value="100 miles" />100 miles <input type="checkbox" name="distance" value="Other" />Other</p>
											<p>Emergency Contact: <input type="text" name="emergency_contact" size="35" value="<?php echo $row['emergency_contact']; ?>"/></p>
                                            <p>Emergency Phone: <input type="text" name="emergency_phone" size="35" value="<?php echo $row['emergency_phone']; ?>"/></p>
                                            <p>*Payment:  <input type="checkbox" name="payment" value="Y" />Yes <input type="checkbox" name="payment" value="N" />No </p>
	  <p align="left"><input type="submit" name="submit" value="Update Entry" />
      <input type="hidden" name="id" value="<?php echo $id; ?>"/></p>
	</form>
	</body>
	</html>
<? }?>
