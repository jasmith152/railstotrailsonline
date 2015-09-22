<?php
/* Copyright (c) 2002 Eli Sand */

	########################################################################
	#                                                                      #
	#                      PHP FormMail v2.0 20030305                      #
	#                                                                      #
	########################################################################
	#
	# Settings
	#

	# Initialize variables
	#
	$auth = NULL;
	$deny = NULL;
	$must = NULL;
	$post = NULL;
	$http = NULL;
	$form = NULL;
	$list = NULL;

	# Fix for pre PHP 4.1.x versions
	#
	if (!isset($_POST)) {
		$_POST = &$HTTP_POST_VARS;
	}
	if (!isset($_SERVER)) {
		$_SERVER = &$HTTP_SERVER_VARS;
	}
	if (!function_exists('array_key_exists')) {
		function array_key_exists($key, $array) {return in_array($key, array_keys($array)) ? true : false;}
	}

	# Fix for magic quotes when enabled
	#
	if (get_magic_quotes_gpc()) {
		foreach ($_POST as $key => $value) {
			$_POST["$key"] = stripslashes($value);
		}
	}

	# Detect any Windows operating system
	#
	if (strstr(php_uname(), 'Windows')) {
		$IS_WINDOWS = TRUE;
	}
	
	# Get the referring domain name
	#
	$referer_domain = get_domain_referer($_SERVER['HTTP_REFERER']);

	########################################################################
	#                                                                      #
	#                      USER CONFIGURABLE SETTINGS                      #
	#                                                                      #
	########################################################################

	# Authorized email address masks that can be used as the recipient
	#
	$auth = "*@127.0.0.1, *@localhost";
	$auth .= "*@mychurchserver.com, kriscycl@infionline.net,*@naturecoastdesign.net, richg37s@tampabay.rr.com, *@railstotrailsonline.com";

	# Authorize all email addresses to the current domain
	#
	# If you want strict email account authorization, comment this out and
	# the script will only authorize the masks in the list defined above.
	#
	$auth .= ", *@" . get_domain($_SERVER['SERVER_NAME']);

	# Email address masks that will be rejected if in the email field
	#
	$deny = "nobody@*, anonymous@*, postmaster@*";
	
	# Authorized domain referers
	#
	$auth_domains = "mychurchserver.com, railstotrailsonline.com, infionline.net, naturecoastdesign.net";

	# Set the possible reCaptcha private key by domain
	#
	switch ($referer_domain) {
    case 'mychurchserver.com':
      $privatekey = "6LdadwEAAAAAACkrD620MkFpD2JCoiaQSSw-FNEN";
    break;
    case 'railstotrailsonline.com':
      $privatekey = "6LddRt8SAAAAALMSGOKCjLjUHd58_6Pi5tfzCVQp";
    break;
	case 'naturecoastdesign.net':
      $privatekey = "6LdIiAAAAAAAAI0r3ZNwakWMnfdAK-BY4o0lMcB1";
    break;
    default:
    break;
  }

	# The following allow you to set some default settings
	#
	# These are commented out by default and when used, either override or
	# append to any values.  This allows you to ensure that hackers don't
	# post their own values to certain fields, making you miss out on
	# important data that you want to ensure is included in the email.
	#
	#$must['required']                = "env_report";
	$must['env_report']              = "SERVER_NAME,HTTP_REFERER,REMOTE_ADDR";
	#$must['redirect']                = "http://my.domain.com/ok.html";
	#$must['error_redirect']          = "http://my.domain.com/error.html";
	#$must['missing_fields_redirect'] = "http://my.domain.com/missing.html";

	#
	########################################################################

	########################################################################
	#                                                                      #
	#                 DO NOT EDIT ANYTHING PAST THIS POINT                 #
	#                                                                      #
	########################################################################

	########################################################################
	#
	# Functions
	#

	# Trim leading and trailing white space from array values
	#
	function array_trim(&$value, $key) {
		$value = trim($value);
	}

	# Return the top level domain of a hostname
	#
	function get_domain($string) {
		if (preg_match("/\.?([a-zA-Z0-9\-]+\.?[a-zA-Z0-9\-]+)$/i", $string, $values)) {
			return $values[1];
		}

		return NULL;
	}
	
	# Return the top level domain of a referer
	#
	function get_domain_referer($string) {
    $referer_domain = parse_url($string);
    return get_domain($referer_domain['host']);
  }

	# Show an error message to the user
	#
	function error_msg($error, $required = FALSE) {
		global $post;

		if (!empty($post['missing_fields_redirect']) && $required) {
			header('Location: ' . $post['missing_fields_redirect']);
		}
		elseif (!empty($post['error_redirect'])) {
			header('Location: ' . $post['error_redirect']);
		}
		else {
			echo "<html>\r\n";
			echo "\t<head>\r\n";
			echo "\t\t<title>Form Error</title>\r\n";
			echo "\t\t<style type=\"text/css\">* {font-family: \"Verdana\", \"Arial\", \"Helvetica\", monospace;}</style>\r\n";
			echo "\t</head>\r\n";
			echo "\t<body>\r\n";
			echo "\t\t<p>${error}</p>\r\n\t\t<p><small>&laquo; <a href=\"javascript: history.back();\">go back</a></small></p>\r\n";
			echo "\t</body>\r\n";
			echo "</html>\r\n";
		}

		exit();
	}

	# Basic pattern matching on an entire array
	#
	function pattern_grep($input, $array) {
		foreach ($array as $value) {
			$value = addcslashes($value, '^.[]$()|{}\\');
			$value = str_replace('*', '.*', $value);
			$value = str_replace('?', '.?', $value);
			$value = str_replace('+', '.+', $value);

			if (eregi('^' . $value . '$', $input)) {
				return TRUE;
			}
		}

		return FALSE;
	}

	#
	########################################################################

	########################################################################
	#
	# Main
	#

	# Check to make sure the info was posted
	#
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
	# Check to make sure it is an acceptable referer
	#
	if (stristr($auth_domains,$referer_domain)) {

		$post = array(
			'recipient'			=> $_POST['recipient'],
			'email'				=> $_POST['email'],
			'email2'				=> $_POST['email2'],
			'subject'			=> $_POST['subject'],
			'realname'			=> $_POST['realname'],
			'required'			=> $_POST['required'],
			'env_report'			=> $_POST['env_report'],
			'sort'				=> $_POST['sort'],
			'redirect'			=> $_POST['redirect'],
			'error_redirect'		=> $_POST['error_redirect'],
			'missing_fields_redirect'	=> $_POST['missing_fields_redirect']
		);
		
		$http = array(
			'REMOTE_USER'			=> $_SERVER['REMOTE_USER'],
			'REMOTE_ADDR'			=> $_SERVER['REMOTE_ADDR'],
			'HTTP_USER_AGENT'		=> $_SERVER['HTTP_USER_AGENT'],
			'HTTP_REFERER'		=> get_domain_referer($_SERVER['HTTP_REFERER']),
			'SERVER_NAME'			=> $_SERVER['SERVER_NAME']
		);

		if (isset($must['required'])) {
			$post['required']			= $must['required'] . ',' . $_POST['required'];
		}
		if (isset($must['env_report'])) {
			$post['env_report']			= $must['env_report'] . ',' . $_POST['env_report'];
		}
		if (isset($must['redirect'])) {
			$post['redirect']			= $must['redirect'];
		}
		if (isset($must['error_redirect'])) {
			$post['error_redirect']			= $must['error_redirect'];
		}
		if (isset($must['missing_fields_redirect'])) {
			$post['missing_fields_redirect']	= $must['missing_fields_redirect'];
		}

		if (($auth = explode(',', $auth))) {
			array_walk($auth, 'array_trim');
		}
		if (($deny = explode(',', $deny))) {
			array_walk($deny, 'array_trim');
		}

    # Check if reCaptcha is required
    #
    if (!empty($post['required']) && stristr($post['required'],'recaptcha_response_field')) {
    # Check for reCaptcha response
    #
    require_once('recaptchalib.php');
    $resp = recaptcha_check_answer ($privatekey,
                                $_SERVER["REMOTE_ADDR"],
                                $_POST["recaptcha_challenge_field"],
                                $_POST["recaptcha_response_field"]);
    
    if (!$resp->is_valid) {
      die ("The reCAPTCHA wasn't entered correctly. Go back and try it again." .
           "(reCAPTCHA said: " . $resp->error . ")");
    }
    }

		// Check for missing required fields
		#
		if ((!empty($post['required'])) && ($list = explode(',', $post['required']))) {
			$list[] = 'recipient';
			$list[] = 'email';
			$list[] = 'email2';

			array_walk($list, 'array_trim');

			foreach ($list as $value) {
				if (!empty($value) && empty($_POST["$value"])) {
					error_msg("You have left a required field ($value) blank.", TRUE);
				}
			}
		}
		

		//	 Check the email addresses submitted
		#
		if (pattern_grep($post['email'], $deny)) {
			error_msg("You have specified a banned email address.");
		}
		if (!preg_match('/^([a-zA-Z0-9\.\_\-]+)\@((([a-zA-Z0-9\-]+)\.)+([a-zA-Z]+))$/', $post['email'])) {
			error_msg("Email 1 - You have specified an invalid email address.");
		}
		if ( isset($post['email2']) ){
			if (!preg_match('/^([a-zA-Z0-9\.\_\-]+)\@((([a-zA-Z0-9\-]+)\.)+([a-zA-Z]+))$/', $post['email2'])) {
				error_msg("Email 2 - You have specified an invalid email address.");
			}
			if( $post['email'] != $post['email2'] )  {
				error_msg("The two email addresses do not match. Please try again");
			}
		}
		if (!$IS_WINDOWS) {
			if (!getmxrr(get_domain($post['email']), $mxhost)) {
				error_msg("You have no mail exchange records for your email address.");
			}
		}
		

		# Check if the recipients email address is authorized
		#
		if ((!empty($post['recipient'])) && ($list = explode(',', $post['recipient']))) {
			array_walk($list, 'array_trim');

			foreach ($list as $value) {
				if (!preg_match('/^([a-zA-Z0-9\.\_\-]+)\@((([a-zA-Z0-9\-]+)\.)+([a-zA-Z]+))$/', $value)) {
					error_msg("The recipients email address is invalid.");
				}
				if (!pattern_grep($value, $auth)) {
					error_msg("The recipients email address is unauthorized.");
				}
			}
		}
		else {
			error_msg("There was an unknown error while checking the recipients email address.");
		}

		# Sort the fields
		#
		if ((!empty($post['sort'])) && ($list = explode(',', $post['sort']))) {
			array_walk($list, 'array_trim');

			foreach ($list as $value) {
				$form["$value"] = $_POST["$value"];
			}
		}
		else {
			$form = $_POST;
		}

		# Create the message
		#
		$subject = empty($post['subject']) ? "Online form" : "Online form: " . $post['subject'];

		$message = "Submitted by: " . $post['realname'] . " <" . $post['email'] . "> on " . date('l, F jS, Y @ g:i:s a (O)') . "\r\n\r\n";

		$message .= "Online Form Fields\r\n";
		$message .= "------------------\r\n";

		foreach ($form as $key => $value) {
			if (!array_key_exists($key, $post) && $key != 'recaptcha_challenge_field' && $key != 'recaptcha_response_field' && $key != 'submit') {
        $message .= "${key}: ${value}\r\n";
			}
		}

		if (!empty($post['env_report'])) {
			if (($list = explode(',', $post['env_report']))) {
				$message .= "\r\nClient Variables\r\n";
				$message .= "----------------\r\n";

				array_walk($list, 'array_trim');

				foreach ($list as $value) {
					if (array_key_exists($value, $http)) {
						$message .= "${value}: " . $http["$value"] . "\r\n";
					}
				}
			}
		}

		# End of message
    $message .= "------------------\r\n";
	
	
	# save data to database
	//connect to database
	require ("admin/dbconn.php");
	
	//creating SQL query
	$sql = "INSERT INTO bike_ride(register_date,first_name, last_name, street_address, city, state, zip, phone, email, t_shirt_size, distance, emergency_contact, emergency_phone, payment) VALUES("; 
	$sql .= "'".date("m-d-Y")."'";
	$sql .= ", '".$_POST['First_Name']."'";	
	$sql .= ", '".$_POST['Last_Name']."'";	
	$sql .= ", '".$_POST['Mailing_Address']."'";	
	$sql .= ", '".$_POST['City']."'";	
	$sql .= ", '".$_POST['State']."'";	
	$sql .= ", '".$_POST['Zip']."'";
	$sql .= ", '".$_POST['Phone']."'";
	$sql .= ", '".$_POST['email']."'";
	$sql .= ", '".$_POST['shirt_size']."'";
	$sql .= ", '".$_POST['Ride_length']."'";
	$sql .= ", '".$_POST['Emergency_Contact']."'";
	$sql .= ", '".$_POST['Emergency_Phone']."'";
	$sql .= ", '?'";
	$sql .= ")";
	
	//creating SQL query
	if (@mysql_query($sql)) {$msg = "Item has been added.";} 	else {$error = "Error adding item: " . mysql_error();
	echo $sql;}

		# Send out the email
		#
		if (mail($post['recipient'], $subject, $message, "From: " . $post['email'] . "\r\nReply-To: " . $post['email'] . "\r\nX-Mailer: PHP FormMail")) {

			if (!empty($post['redirect'])) {
				header('Location: ' . $post['redirect']);
			}
			else {
				echo "<html>\r\n";
				echo "\t<head>\r\n";
				echo "\t\t<title>Thank you</title>\r\n";
				echo "\t\t<style type=\"text/css\">* {font-family: \"Verdana\", \"Arial\", \"Helvetica\", monospace;}</style>\r\n";
				echo "\t</head>\r\n";
				echo "\t<body>\r\n";
				echo "\t\t<p>Thank you for filling out the form.</p>\r\n\t\t<p><small>&laquo; <a href=\"javascript: history.back();\">go back</a></small></p>\r\n";
				echo "\t</body>\r\n";
				echo "</html>\r\n";
			}
		}
		else {
			error_msg("There was an unknown error while sending email.");
		}
	}
	else {
		error_msg("This domain is unauthorized to use this program.");
	}
	}
	else {
		error_msg("Invalid request method used.");
	}

	#
	########################################################################
?>
