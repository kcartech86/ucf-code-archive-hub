<?php
		$time = time();
		$errors = array();
		
	if (isset($_POST['guestbook_name'], $_POST['guestbook_email'], $_POST['guestbook_message'])) {
		
		$guestbook_name = mysql_real_escape_string(htmlentities($_POST['guestbook_name']));
		$guestbook_email = mysql_real_escape_string(htmlentities($_POST['guestbook_email']));
		$guestbook_message = mysql_real_escape_string(htmlentities($_POST['guestbook_message']));
		
		if (empty($guestbook_name) || empty($guestbook_email) || empty($guestbook_message)) {
			$errors[] = 'All Fields are Required.';
		}
		
		if (strlen($guestbook_name)>25 || strlen($guestbook_email)>255 || strlen($guestbook_message)>255) {
		$errors[] = 'One or more fields exceeded the character limit.';
		}
		
		if (empty($errors)) {
			$insert = "INSERT INTO `uahoody` VALUES ('','$time','$guestbook_name','$guestbook_email','$guestbook_message')";
			if (mysql_query($insert)) {
			header('Location: '.$_SERVER['PHP_SELF']);
			} else {
			$errors[] = 'Something Went Wrong, Please Try Again Soon.';
			}
		
		} else {
			foreach($errors as $error) {
			$form_error='<p class="error"><strong>'.$error.'</strong></p>';
			}
		
		}
		
		
	}

		
	$uahoody = mysql_query("SELECT `timestamp`, `name`, `email`, `message` FROM `uahoody` ORDER BY `timestamp` DESC");
	
	if (mysql_num_rows($uahoody)==0){
	echo 'No comments on this product, yet.';
	} else {
                $uahoody_post="";
		while ($uahoody_row = mysql_fetch_assoc($uahoody)) {
			$uahoody_timestamp = date('M, Y',  $uahoody_row['timestamp']);
			$uahoody_name = $uahoody_row['name'];
			$uahoody_email = $uahoody_row['email'];
			$uahoody_message = $uahoody_row['message'];
			
			$uahoody_post='<hr><p><i>Posted by</i> <strong><u>'.$uahoody_name.'</u> ('.$uahoody_email.')</strong> <i>on</i> <strong>'.$uahoody_timestamp.'</i>:</strong><br>'.$uahoody_message.' </p>';
			
		}
	}
	


?>