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
			$insert = "INSERT INTO `wilsonfootball` VALUES ('','$time','$guestbook_name','$guestbook_email','$guestbook_message')";
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

		
	$wilsonfootball = mysql_query("SELECT `timestamp`, `name`, `email`, `message` FROM `wilsonfootball` ORDER BY `timestamp` DESC");
	
	if (mysql_num_rows($wilsonfootball)==0){
	echo 'No comments on this product, yet.';
	} else {
                $wilsonfootball_post="";
		while ($wilsonfootball_row = mysql_fetch_assoc($wilsonfootball)) {
			$wilsonfootball_timestamp = date('M, Y',  $wilsonfootball_row['timestamp']);
			$wilsonfootball_name = $wilsonfootball_row['name'];
			$wilsonfootball_email = $wilsonfootball_row['email'];
			$wilsonfootball_message = $wilsonfootball_row['message'];
			
			$wilsonfootball_post.='<hr><p><i>Posted by</i> <strong><u>'.$wilsonfootball_name.'</u> ('.$wilsonfootball_email.')</strong> <i>on</i> <strong>'.$wilsonfootball_timestamp.'</i>:</strong><br>'.$wilsonfootball_message.' </p>';
			
		}
	}
	


?>