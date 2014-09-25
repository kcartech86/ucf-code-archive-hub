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
			$insert = "INSERT INTO `uacrew` VALUES ('','$time','$guestbook_name','$guestbook_email','$guestbook_message')";
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

		
	$uacrew = mysql_query("SELECT `timestamp`, `name`, `email`, `message` FROM `uacrew` ORDER BY `timestamp` DESC");
	
	if (mysql_num_rows($uacrew)==0){
	echo 'No comments on this product, yet.';
	} else {
                $uacrew_post="";
		while ($uacrew_row = mysql_fetch_assoc($uacrew)) {
			$uacrew_timestamp = date('M, Y',  $uacrew_row['timestamp']);
			$uacrew_name = $uacrew_row['name'];
			$uacrew_email = $uacrew_row['email'];
			$uacrew_message = $uacrew_row['message'];
			
			$uacrew_post.='<hr><p><i>Posted by</i> <strong><u>'.$uacrew_name.'</u> ('.$uacrew_email.')</strong> <i>on</i> <strong>'.$uacrew_timestamp.'</i>:</strong><br>'.$uacrew_message.' </p>';
			
		}
	}
	


?>