<?php
// Database connection variables
$db_host = 'localhost';
$db_username = 'railstot_railsto';
$db_password = 'RaI13T0T';
$db_name = 'railstot_bike_ride';

// Connect to the database server and Select the database
$dbcnx = mysql_connect("$db_host", "$db_username", "$db_password") or die("<p>Unable to connect to the database at this time.</p>");
mysql_select_db("$db_name") or die("<p>Unable to locate the database at this time.</p>");
?>
