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
			$insert = "INSERT INTO `nikebasketball` VALUES ('','$time','$guestbook_name','$guestbook_email','$guestbook_message')";
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
        $nikebasketball = mysql_query("SELECT * FROM `nikebasketball` ORDER BY `timestamp` DESC");
	
	if (mysql_num_rows($nikebasketball)==0){
	echo 'No comments on this product, yet.';
	} else {
                $nikebasketball_post="";
		while ($nikebasketball_row = mysql_fetch_assoc($nikebasketball)) {
			$nikebasketball_timestamp = date('M, Y',  $nikebasketball_row['timestamp']);
			$nikebasketball_name = $nikebasketball_row['name'];
			$nikebasketball_email = $nikebasketball_row['email'];
			$nikebasketball_message = $nikebasketball_row['message'];
			
			$nikebasketball_post.='<hr><p><i>Posted by</i> <strong><u>'.$nikebasketball_name.'</u> ('.$nikebasketball_email.')</strong> <i>on</i> <strong>'.$nikebasketball_timestamp.'</i>:</strong><br>'.$nikebasketball_message.' </p>';
			
		}
	}
?>