<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="content-type" content="text/html;charset=ISO-8859-1" />
  <meta name="description" content="" />
  <title>Title</title>
  <link rel="stylesheet" type="text/css" media="screen" href="styles.css" />
</head>

<body topmargin="10" marginheight="10">
 <div align="center">
 <table id="topnav" width="800" height="61" cellpadding="0" cellspacing="0" border="0">
  <tr>
   <td align="center" valign="bottom"><a href="index.php">Home</a></td>
   <td align="center" valign="bottom"><img src="images/topnav-sep.jpg" width="10" height="61" /></td>
   <td align="center" valign="bottom"><a href="trail-map.html">Trail Map</a></td>
   <td align="center" valign="bottom"><img src="images/topnav-sep.jpg" width="10" height="61" /></td>
   <td align="center" valign="bottom"><a href="photos-videos.html">Photos / Videos</a></td>
   <td align="center" valign="bottom"><img src="images/topnav-sep.jpg" width="10" height="61" /></td>
   <td align="center" valign="bottom"><a href="contact-us.html">Contact Us</a></td>
   <td align="center" valign="bottom"><img src="images/topnav-sep.jpg" width="10" height="61" /></td>
   <td align="center" valign="bottom"><a href="comments.php">Comments</a></td>
   <td align="center" valign="bottom"><img src="images/topnav-sep.jpg" width="10" height="61" /></td>
   <td align="center" valign="bottom"><a href="news.html">News</a></td>
   <td align="center" valign="bottom"><img src="images/topnav-sep.jpg" width="10" height="61" /></td>
   <td align="center" valign="bottom"><a href="club-merchandise.html">Merchandise</a></td>
   <td align="center" valign="bottom"><img src="images/topnav-sep.jpg" width="10" height="61" /></td>
   <td align="center" valign="bottom"><a href="links.html">Links</a></td>
  </tr>
 </table>
 <div id="header"><img src="images/header.jpg" alt="Rails to Trails of the Withlacoochee - 352-726-2251 or 352-344-1640 - Greenways and trails 1-877-822-5208" width="800" height="215" /></div>
 <table id="content" width="550" cellpadding="0" cellspacing="0" border="0">
  <tr>
   <td id="main-col" valign="top">
   <h1>Comments</h1>
   <form action="formmail_recaptcha.php" method="post" name="comments">
   <input type="hidden" name="recipient" value="kriscycl@infionline.net" />
    <!--<input type="hidden" name="recipient" value="john@naturecoastdesign.net" />-->
    <input type="hidden" name="subject" value="Online Comments" />
    <input type="hidden" name="redirect" value="http://www.railstotrailsonline.com" />
    <input type="hidden" name="required" value="recaptcha_response_field" />
    <input type="hidden" name="email" value="info@railstotrailsonline.com" />
    <input type="hidden" name="email2" value="info@railstotrailsonline.com" />
    
   <p align="left">What brings you to the area?<br /><textarea name="What brings you to the area" rows="3" cols="40"></textarea></p>
   <p align="left">How did you find our trail?<br /><textarea name="How did you find our trail" rows="3" cols="40"></textarea></p>
   <p align="left">What improvements would you like to see on the trail?<br /><textarea name="What improvements would you like to see" rows="3" cols="40"></textarea></p>
   <p><?php
require_once('recaptchalib.php');
  $publickey = "6LddRt8SAAAAAKJaCx5BxFvaxYQdj7SLc9kJK_LW"; 
  echo recaptcha_get_html($publickey);
?></p>
    <input type="submit" name="submit" value="Send" />
   </form>
   </td>
  </tr>
 </table>
 <table id="footer" width="800" cellpadding="0" cellspacing="0" border="0">
  <tr>
   <td colspan="2" align="center">
    <p align="center"><strong>Rails to Trails of the Withlacoochee, Inc.</strong><br />P.O. Box 807, Inverness, FL 34451-0807<br /></p>
   </td>
  </tr>
  <tr>
   <td align="left" valign="top">
    &copy;2010, Rails to Trails of the Withlacoochee, Inc.<br />All rights reserved. <br />Reproduction in whole or in part without permission is prohibited.
   </td>
   <td align="right" valign="top">
    This site Hosted by <br /><a href="http://www.naturecoastdesign.net" target="_blank">Nature Coast Web Design & Marketing</a>
   </td>
  </tr>
 </table>
 </div>
</body>
</html>
