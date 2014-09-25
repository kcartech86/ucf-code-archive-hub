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
			$insert = "INSERT INTO `nikefootball` VALUES ('','$time','$guestbook_name','$guestbook_email','$guestbook_message')";
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

		
	$nikefootball = mysql_query("SELECT `timestamp`, `name`, `email`, `message` FROM `nikefootball` ORDER BY `timestamp` DESC");
	
	if (mysql_num_rows($nikefootball)==0){
	echo 'No comments on this product, yet.';
	} else {
                $nikefootball_post="";
		while ($nikefootball_row = mysql_fetch_assoc($nikefootball)) {
			$nikefootball_timestamp = date('M, Y',  $nikefootball_row['timestamp']);
			$nikefootball_name = $nikefootball_row['name'];
			$nikefootball_email = $nikefootball_row['email'];
			$nikefootball_message = $nikefootball_row['message'];
			
			$nikefootball_post.='<hr><p><i>Posted by</i> <strong><u>'.$nikefootball_name.'</u> ('.$nikefootball_email.')</strong> <i>on</i> <strong>'.$nikefootball_timestamp.'</i>:</strong><br>'.$nikefootball_message.' </p>';
			
		}
	}
	


?>