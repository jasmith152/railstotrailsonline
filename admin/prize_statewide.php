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
<title>Select State Wide Prize Winners</title>
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
	$where = 'WHERE ';
	//Set Query to get a count of records in db
	$sql1 = 'SELECT id FROM bike_ride';
	if( $result1 = @mysql_query($sql1) )
	{
		$min = 26;
		$max = mysql_num_rows($result1);
		$max = $max + $min;
		?>
		<form action="<?php echo $PHP_SELF; ?>" method="post">
		How many state prize winners do you wish to select? <input type="number" name="number_of_prize">
		<input name="submit" type="submit" value="submit">
   		&nbsp;&nbsp;&nbsp;Total state records in database: <?php echo mysql_num_rows($result1); ?>
		</form>
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
			$winner = rand($min,$max);
			//Set Query for winners sql2
			$sql2 = "SELECT * FROM bike_ride WHERE id=".$winner."";
			
			if( $result2 = @mysql_query($sql2) )
			{
				$row = mysql_fetch_array($result2);
				if ( empty($row['id'])   )
				{
					$i = $i - 1;
				}
				else
				{
					echo "<tr align='center' height='60'>";
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
		
		}
		echo "</table>";
	}
		
}
else
{
	$sql = "SELECT id FROM bike_ride";
	?>
 	<form action="<?php echo $PHP_SELF; ?>" method="post">
	How many state prize winners do you wish to select? <input type="number" name="number_of_prize">
	<input name="submit" type="submit" value="submit">
    &nbsp;&nbsp;&nbsp;Total state records in database: 
	<?php if( $result = @mysql_query($sql) ) {echo mysql_num_rows($result);} ?>
	</form>
<?php }?>
</body>
</html>