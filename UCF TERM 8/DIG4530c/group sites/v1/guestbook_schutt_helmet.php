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
			$insert = "INSERT INTO `schutthelmet` VALUES ('','$time','$guestbook_name','$guestbook_email','$guestbook_message')";
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

		
	$schutthelmet = mysql_query("SELECT `timestamp`, `name`, `email`, `message` FROM `schutthelmet` ORDER BY `timestamp` DESC");
	
	if (mysql_num_rows($schutthelmet)==0){
	echo 'No comments on this product, yet.';
	} else {
                $schutthelmet_post="";
		while ($schutthelmet_row = mysql_fetch_assoc($schutthelmet)) {
			$schutthelmet_timestamp = date('M, Y',  $schutthelmet_row['timestamp']);
			$schutthelmet_name = $schutthelmet_row['name'];
			$schutthelmet_email = $schutthelmet_row['email'];
			$schutthelmet_message = $schutthelmet_row['message'];
			
			$schutthelmet_post.='<hr><p><i>Posted by</i> <strong><u>'.$schutthelmet_name.'</u> ('.$schutthelmet_email.')</strong> <i>on</i> <strong>'.$schutthelmet_timestamp.'</i>:</strong><br>'.$schutthelmet_message.' </p>';
			
		}
	}
	


?>