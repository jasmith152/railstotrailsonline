<?php

$cfgProgDir = 'phpSecurePages/';
include($cfgProgDir . "secure.php");

//Establish GET & POST variables
import_request_variables("gp");
$PHP_SELF = $_SERVER['PHP_SELF'];

if ( isset($_POST['submit']) )
{
	//connect to database
	require ("dbconn.php");
	
	//creating SQL query
	$sql = "INSERT INTO bike_ride(register_date,first_name, last_name, street_address, city, state, zip, phone, email, t_shirt_size, distance, emergency_contact, emergency_phone, payment) VALUES("; 
	$sql .= "'".$_POST['date_registered']."'";
	$sql .= ", '".$_POST['first_name']."'";	
	$sql .= ", '".$_POST['last_name']."'";	
	$sql .= ", '".$_POST['street_address']."'";	
	$sql .= ", '".$_POST['City']."'";	
	$sql .= ", '".$_POST['State']."'";	
	$sql .= ", '".$_POST['Zip']."'";
	$sql .= ", '".$_POST['Phone']."'";
	$sql .= ", '".$_POST['email']."'";
	$sql .= ", '".$_POST['shirt_size']."'";
	$sql .= ", '".$_POST['distance']."'";
	$sql .= ", '".$_POST['emergency_contact']."'";
	$sql .= ", '".$_POST['emergency_phone']."'";
	$sql .= ", '".$_POST['payment']."'";
	$sql .= ")";
	
	//creating SQL query
	if (@mysql_query($sql)) {$msg = "Item has been added.";} 	else {$error = "Error adding item: " . mysql_error();
	echo $sql;}?>
	
    <!doctype html>
	<html>
	<head>
	<meta charset="utf-8">
	<title>Add Item Page</title>
    <link href="style.css" rel="stylesheet" type="text/css" />
	</head>
	
	<body style="background-color:#E2EEFB; font-family:Arial, Helvetica, sans-serif;font-size:12px">
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
       
   	<form action="<?php echo $PHP_SELF; ?>" method="post" name="add_item_registration">
                                                            
                                        <p align="left"><em>Required fields indicated by *</em></p>
                                        <p>*Date Registered: <input type="text" name="date_registered" size="20" style="color:#888;" 
    value="mm-dd-yyyy" onfocus="inputFocus(this)" onblur="inputBlur(this)"/>
    <script type="text/javascript">
                                        function inputFocus(i){
    if(i.value==i.defaultValue){ i.value=""; i.style.color="#000"; }
}
function inputBlur(i){
    if(i.value==""){ i.value=i.defaultValue; i.style.color="#888"; }
}
</script></p>
                      <p>*Last Name: <input type="text" name="last_name" size="42" /></p>
											<p>*First Name: <input type="text" name="first_name" size="42" /></p>
											<p>*Street Address: <input type="text" name="street_address" size="35" /></p>
											<p>*City: <input type="text" name="City" size="35" /></p>
											<p>*State: <input type="text" name="State" size="1" /></p>
											<p>*Zip: <input type="text" name="Zip" size="25" /></p>
											<p>*Phone: <input type="text" name="Phone" size="25" /></p>
											<p>*Email Address: <input type="text" name="email" size="25" /></p>
                                            <p>*Confirm Email Address: <input type="text" name="email2" size="25" /></p>
											<p>*T-Shirt (Please Check One) 
											  <input type="checkbox" name="shirt_size" value="S" />
	  SM <input type="checkbox" name="shirt_size" value="M" />MED <input type="checkbox" name="shirt_size" value="L" />LG <input type="checkbox" name="shirt_size" value="XL" />XL <input type="checkbox" name="shirt_size" value="XXL" />XXL</p>
      <p>*Distance (Please Check One) 
											  <input type="checkbox" name="distance" value="14 miles" />14 miles <input type="checkbox" name="distance" value="30 miles" />30 miles <input type="checkbox" name="distance" value="48 miles" />48 miles <input type="checkbox" name="distance" value="60 miles" />60 miles <input type="checkbox" name="distance" value="100 miles" />100 miles <input type="checkbox" name="distance" value="Other" />Other</p>
											<p>Emergency Contact: <input type="text" name="emergency_contact" size="35" /></p>
                                            <p>Emergency Phone: <input type="text" name="emergency_phone" size="35" /></p>
                                            <p>*Payment:  <input type="checkbox" name="payment" value="Y" />Yes <input type="checkbox" name="payment" value="N" />No </p>
	  <p align="left"><input type="submit" name="submit" value="Add Entry" /></p>
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
	<title>Add Item Page</title>
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
	?>
    
   	<form action="<?php echo $PHP_SELF; ?>" method="post" name="add_item_registration">
                                                            
                                        <p align="left"><em>Required fields indicated by *</em></p>
                                        <p>*Date Registered: <input type="text" name="date_registered" size="20" style="color:#888;" 
    value="mm-dd-yyyy" onfocus="inputFocus(this)" onblur="inputBlur(this)"/>
    <script type="text/javascript">
                                        function inputFocus(i){
    if(i.value==i.defaultValue){ i.value=""; i.style.color="#000"; }
}
function inputBlur(i){
    if(i.value==""){ i.value=i.defaultValue; i.style.color="#888"; }
}
</script></p>
                      <p>*Last Name: <input type="text" name="last_name" size="42" /></p>
											<p>*First Name: <input type="text" name="first_name" size="42" /></p>
											<p>*Street Address: <input type="text" name="street_address" size="35" /></p>
											<p>*City: <input type="text" name="City" size="35" /></p>
											<p>*State: <input type="text" name="State" size="1" /></p>
											<p>*Zip: <input type="text" name="Zip" size="25" /></p>
											<p>*Phone: <input type="text" name="Phone" size="25" /></p>
											<p>*Email Address: <input type="text" name="email" size="25" /></p>
                                            <p>*Confirm Email Address: <input type="text" name="email2" size="25" /></p>
											<p>*T-Shirt (Please Check One) 
											  <input type="checkbox" name="shirt_size" value="S" />
	  SM <input type="checkbox" name="shirt_size" value="M" />MED <input type="checkbox" name="shirt_size" value="L" />LG <input type="checkbox" name="shirt_size" value="XL" />XL <input type="checkbox" name="shirt_size" value="XXL" />XXL</p>
      <p>*Distance (Please Check One) 
											  <input type="checkbox" name="distance" value="14 miles" />14 miles <input type="checkbox" name="distance" value="30 miles" />30 miles <input type="checkbox" name="distance" value="48 miles" />48 miles <input type="checkbox" name="distance" value="60 miles" />60 miles <input type="checkbox" name="distance" value="100 miles" />100 miles <input type="checkbox" name="distance" value="Other" />Other</p>
											<p>Emergency Contact: <input type="text" name="emergency_contact" size="35" /></p>
                                            <p>Emergency Phone: <input type="text" name="emergency_phone" size="35" /></p>
                                            <p>*Payment:  <input type="checkbox" name="payment" value="Y" />Yes <input type="checkbox" name="payment" value="N" />No </p>
	  <p align="left"><input type="submit" name="submit" value="Add Entry" /></p>
	</form>
	</body>
	</html>
<? }?>