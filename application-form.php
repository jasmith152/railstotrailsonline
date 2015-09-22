<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="content-type" content="text/html;charset=ISO-8859-1" />
  <meta name="description" content="" />
  <title>Rails to Trails Online registration Form</title>
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
					 <p align="center"><em>For a printable version, <a href="images/membership.pdf" target="_blank">Click Here</a></em></p>
					 <form action="formmail_recaptcha.php" method="post" name="annual-ride-registration">
            <input type="hidden" name="recipient" value="richg37s@tampabay.rr.com" />
            <input type="hidden" name="subject" value="Online Membership Application" />
            <input type="hidden" name="required" value="Name,email,email2,recaptcha_response_field" />
            <input type="hidden" name="redirect" value="http://www.railstotrailsonline.com/thankyou-application.html" />
            <p>The primary function of this Citizen's Support Organization is to assist the Division of Recreation and Parks in its effort to develop, maintain, and promote the Withlacoochee, Inc. State Trail.  Members volunteer their time and labor on projects such as building trail amenities, fund raising, trail maintenance, and public education on trail related issues.  Rails to Trails of the Withlacoochee, Inc. is a not-for-profit, charitable organization as qualified under Section 501 (c)(3) of the Internal Revenue Code. Donations are tax deductible to the extent permitted by law.</p>
            <p><strong>MEMBERS RECEIVE:</strong><br />
             &nbsp; &nbsp; Our monthly newsletter - <a href="http://groups.yahoo.com/group/railstotrails" target="_blank">sign up here</a>.<br />
             &nbsp; &nbsp; Organization voting privileges</p>
            <p><strong>YOUR DUES PAY FOR:</strong><br />&nbsp; &nbsp; Organizational expenses</p>
            <p><strong>DONATIONS ACCEPTED FOR:</strong><br />
             &nbsp; &nbsp; Equipment for the trail<br />
             &nbsp; &nbsp; Trail amenities<br />
             &nbsp; &nbsp; Endowment Fund</p>
						<p>Name: <input type="text" name="Name" size="42" /></p>
  					<p>Mailng Address: <input type="text" name="Mailing Address" size="35" /></p>
						<p>City: <input type="text" name="City" size="35" /></p>
						<p>State: <input type="text" name="State" size="2" /></p>
						<p>Zip: <input type="text" name="Zip" size="25" /></p>
						<p>Phone: <input type="text" name="Phone" size="25" /></p>
						<p>Email Address: <input type="text" name="email" size="25" /></p>
                        <p>Confirm Email Address: <input type="text" name="email2" size="25" /></p>
						<p><input type="radio" name="App Type" value="New Membership" />New Membership or <input type="radio" name="App Type" value="Renewal" />Renewal</p>
						<p>
             <input type="checkbox" name="Membership Type" value="Individual" />Individual ----------------------- $5.00<br />
             <input type="checkbox" name="Membership Type" value="Family" />Family -------------------------- $10.00<br />
             <input type="checkbox" name="Membership Type" value="Group" />Group --------------------------- $25.00<br />
             <input type="checkbox" name="Membership Type" value="Corporate" />Corporate ---------------------- $50.00<br />
             <input type="checkbox" name="Membership Type" value="Donation" />Donation amount: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <input type="text" name="Donation amt" size="6" /><br />
             <input type="checkbox" name="Membership Type" value="Endowment Fund" />Endowment Fund amount: <input type="text" name="Endowment amt" size="6" /><br />
						</p>
						<p></p>
						<p></p>
						<p></p>
						<table cellspacing="2" cellpadding="2" border="0"><tr>
						 <td align="left" valign="top">
						  I am interested in:<br />
              <input type="checkbox" name="Interest" value="Hiking" />Hiking<br />
						  <input type="checkbox" name="Interest" value="Jogging" />Jogging<br />
						  <input type="checkbox" name="Interest" value="Nature Study" />Nature Study<br />
						  <input type="checkbox" name="Interest" value="Other" />Other: <input type="text" name="Other Interest" size="20" /><br />
             </td>
						 <td align="left" valign="top">
						  <br />
						  <input type="checkbox" name="Interest" value="Bicycling" />Bicycling<br />
						  <input type="checkbox" name="Interest" value="Horses" />Horses<br />
						  <input type="checkbox" name="Interest" value="Skating" />Skating<br />
             </td>
						</tr></table>
						<p>I would like to help by volunteering for:<br /><textarea name="Volunteer" rows="3" cols="40"></textarea></p>
                        <p><?php
require_once('recaptchalib.php');
  $publickey = "6LddRt8SAAAAAKJaCx5BxFvaxYQdj7SLc9kJK_LW"; 
  echo recaptcha_get_html($publickey);
?></p>
						<p>&nbsp;</p>
            <p align="center"><input type="submit" name="submit" value="Send" /></p>
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
   <td align="left" valign="top">&copy;<?php echo date("Y"); ?>, Rails to Trails of the Withlacoochee, Inc.<br />All rights reserved. <br />Reproduction in whole or in part without permission is prohibited.
   </td>
   <td align="right" valign="top">
    This site Hosted by <br /><a href="http://www.naturecoastdesign.net" target="_blank">Nature Coast Web Design & Marketing</a>
   </td>
  </tr>
 </table>
 </div>
</body>
</html>