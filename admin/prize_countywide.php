<?php

$cfgProgDir = 'phpSecurePages/';
include($cfgProgDir . "secure.php");

//Establish GET & POST variables
import_request_variables("gp");
$PHP_SELF = $_SERVER['PHP_SELF'];

//connect to database
require ("dbconn.php");

//Set Defualt Query and variables
$zip = "'33604', '34428' ,'34429', '34431', '34433', '34434', '34436', '34442', '34446', '34448', '34450', '34451', '34452', '34453', '34461', '34465'";
$row = array();
$min = 1;
$r = 1;

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Select County Wide Prize Winners</title>
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

if(isset($_POST['submit']) )
{
	
	$number_of_loops = $_POST['number_of_prize'];
	//Set Query to get all records of riders with specific zip code
	$sql = "SELECT * FROM bike_ride WHERE zip IN (".$zip.")";
	
	if( $result = @mysql_query($sql) )
	{
		while($results = mysql_fetch_array($result))
		{
			$row[$r] = $results;
			$r++;
		}
		
		?>
        <form action="<?php echo $PHP_SELF; ?>" method="post">
		How many county prize winners do you wish to select? <input type="number" name="number_of_prize">
		<input name="submit" type="submit" value="submit">
        &nbsp;&nbsp;&nbsp;Total county records in database: <? echo mysql_num_rows($result); ?>
		</form><br>
        <?php
		echo "<table width='100%' border='0' cellspacing='3' cellpadding='3' style='background-color:#E2EEFB;font-family:Arial, Helvetica, sans-serif;font-size:16px'>";
		echo "<tr align='center' height='60' style='color:#00F'>";
		echo "<td>ID</td>";
		echo "<td>Date register</td>";
		echo "<td>First Name</td>";
		echo "<td>Last Name</td>";
		echo "<td>Street Address</td>";
		echo "<td>City</td>";
		echo "<td>State</td>";
		echo "<td>Zip</td>";
		echo "<td>Email</td>";
		echo "<td>Phone</td>";
		echo "<td>Shirt Size</td>";
		echo "<td>Payment</td>";
		echo "</tr>";
		for($i = 1; $i <= $number_of_loops; $i++)
		{
			
			$winner = rand($min,$r);
			
			if ( empty($row[$winner])   )
			{
				$i = $i - 1;
			}
			else
			{
				echo "<tr align='center' height='60'>";
				echo "<td>".$row[$winner]['id']."</td>";
				echo "<td>".$row[$winner]['register_date']."</td>";
				echo "<td>".$row[$winner]['first_name']."</td>";
				echo "<td>".$row[$winner]['last_name']."</td>";
				echo "<td>".$row[$winner]['street_address']."</td>";
				echo "<td>".$row[$winner]['city']."</td>";
				echo "<td>".$row[$winner]['state']."</td>";
				echo "<td>".$row[$winner]['zip']."</td>";		
				echo "<td>".$row[$winner]['email']."</td>";
				echo "<td>".$row[$winner]['phone']."</td>";
				echo "<td>".$row[$winner]['t_shirt_size']."</td>";
				echo "<td>".$row[$winner]['payment']."</td>";
				echo "</tr>";
			}
		
		}
		echo "</table>";
	}
	else
	{
		echo "fail mysql_query because: " . mysql_error();
		echo "running from query: " . $sql;
	}
			
}
else
{
	$sql = "SELECT * FROM bike_ride WHERE zip IN (".$zip.")";
	?>
 	<form action="<?php echo $PHP_SELF; ?>" method="post">
	How many county prize winners do you wish to select? <input type="number" name="number_of_prize">
	<input name="submit" type="submit" value="submit">
    &nbsp;&nbsp;&nbsp;Total county records in database: 
	<?php if( $result = @mysql_query($sql) ) {echo mysql_num_rows($result);} ?>
	</form>
<?php }?>
</body>
</html>