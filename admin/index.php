<?php
//$cfgProgDir = 'phpSecurePages/';
//include($cfgProgDir . "secure.php");

//Establish GET & POST variables
import_request_variables("gp");
$PHP_SELF = $_SERVER['PHP_SELF'];

$content_dir = '../content/';

if (isset($_POST['FCKeditor1'])) {
	 if (get_magic_quotes_gpc()) {
	    $postedValue = stripslashes($_POST['FCKeditor1']);
	 } else {
	    $postedValue = $_POST['FCKeditor1'];
	 }

   //Update the file & reload with page redisplayed
   $fh = fopen($content_dir.$page, 'w+');
   if (fwrite($fh, $postedValue)) {
      header("Location: ".$PHP_SELF."?updated=1&page=".$page);
      exit();
   } else {
      echo "<p align=\"center\"><font face=\"Arial,Helvetica,Geneva,Swiss,SunSans-Regular\" size=\"2\" color=\"#FF0000\">\n";
      echo "There was an error when updating $page; if this problem persists, please contact <a href=\"mailto:webadmin@naturecoastdesign.net\">support</a>.\n";
      echo "</font></p>\n";
   }
   fclose($fh);

} Else {
include("fckeditor/fckeditor.php") ;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
  <meta http-equiv="content-type" content="text/html;charset=ISO-8859-1">
  <title>Content Editor</title>
	<link href="fckeditor.css" rel="stylesheet" type="text/css" />
</head>
<body>
<!-- Show Page Selection -->
<form action="<?php echo $PHP_SELF; ?>" method="POST" name="pageselect">
Select the page you would like to edit: <select name="page" id="page" size="1">
<?php
/*Get list of files from Content folder*/
if (is_dir($content_dir)) {
   //echo "$content_dir is a directory.<br>\n";
   if ($dh = opendir($content_dir)) {
       //echo "I can open $dir.<br>\n";
       while (($file = readdir($dh)) !== false) {
           //echo "I found a file.<br>\n";
           if (is_file($content_dir."/".$file)) {
		   	  //echo "$file is a file.<br>\n";
		   	  $filename_parts = pathinfo($file);
		   	  echo "<option value=\"$file\">" . ucwords($filename_parts['basename']) . "</option>\n";
	    }
       }
       closedir($dh);
   }
}
?>
    </select> <input type="submit" name="submit" id="submit" value="GO">
   <a href="bike_ride_index.php">Click here for Bike Ride database</a>
</form>
<!-- End Page Selection -->
   <hr width="90%">
<?php
//$page = 'home_info.txt';
if (!empty($updated)) {
   echo "<p align=\"center\"><font face=\"Arial,Helvetica,Geneva,Swiss,SunSans-Regular\" size=\"2\" color=\"#0000FF\">\n";
   echo "Your page has been updated.\n";
   echo "</font></p>\n";
}
echo "<div style='width: 600px;'>\n";
if (!empty($page)) {
   //Check if the page exists and is writable
   if (is_writable($content_dir.$page)) {
      //Let's get some content
		 $content = file_get_contents($content_dir.$page);
		 echo "<form action=\"$PHP_SELF\" method=\"POST\" name=\"editform\">\n";
		 echo "File opened: ".ucwords($page)."<br>\n<input type=\"hidden\" name=\"page\" id=\"page\" value=\"$page\">\n";
$oFCKeditor = new FCKeditor('FCKeditor1') ;
$oFCKeditor->BasePath	= '/admin/fckeditor/' ;
$oFCKeditor->ToolbarSet = 'NCDesignUser';
$oFCKeditor->Height = 450;
$oFCKeditor->Value		= $content ;
$oFCKeditor->Create() ;
		 echo "<br>\n";
		 echo "<input type=\"submit\" name=\"submit\" id=\"submit\" value=\"Update\">  <input type=\"reset\" name=\"reset\" id=\"reset\">\n";
		 echo "</form>\n";
   }
}
echo "</div>\n";
echo "</body>";
echo "</html>";
}
?>
