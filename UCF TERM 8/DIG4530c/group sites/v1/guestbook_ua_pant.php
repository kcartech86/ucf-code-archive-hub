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
			$insert = "INSERT INTO `uapant` VALUES ('','$time','$guestbook_name','$guestbook_email','$guestbook_message')";
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

		
	$uapant = mysql_query("SELECT `timestamp`, `name`, `email`, `message` FROM `uapant` ORDER BY `timestamp` DESC");
	
	if (mysql_num_rows($uapant)==0){
	echo 'No comments on this product, yet.';
	} else {
                $uapant_post="";
		while ($uapant_row = mysql_fetch_assoc($uapant)) {
			$uapant_timestamp = date('M, Y',  $uapant_row['timestamp']);
			$uapant_name = $uapant_row['name'];
			$uapant_email = $uapant_row['email'];
			$uapant_message = $uapant_row['message'];
			
			$uapant_post.='<hr><p><i>Posted by</i> <strong><u>'.$uapant_name.'</u> ('.$uapant_email.')</strong> <i>on</i> <strong>'.$uapant_timestamp.'</i>:</strong><br>'.$uapant_message.' </p>';
			
		}
	}
	


?>
