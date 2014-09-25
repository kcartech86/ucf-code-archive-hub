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
			$insert = "INSERT INTO `reebokshoe` VALUES ('','$time','$guestbook_name','$guestbook_email','$guestbook_message')";
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

		
	$reebokshoe = mysql_query("SELECT `timestamp`, `name`, `email`, `message` FROM `reebokshoe` ORDER BY `timestamp` DESC");
	$reebokshoe_post="";
	if (mysql_num_rows($reebokshoe)==0){
	$reebokshoe_post.= 'No comments on this product, yet.';
	} else {
		while ($reebokshoe_row = mysql_fetch_assoc($reebokshoe)) {
			$reebokshoe_timestamp = date('M, Y',  $reebokshoe_row['timestamp']);
			$reebokshoe_name = $reebokshoe_row['name'];
			$reebokshoe_email = $reebokshoe_row['email'];
			$reebokshoe_message = $reebokshoe_row['message'];
			
			$reebokshoe_post.='<hr><p><i>Posted by</i> <strong><u>'.$reebokshoe_name.'</u> ('.$reebokshoe_email.')</strong> <i>on</i> <strong>'.$reebokshoe_timestamp.'</i>:</strong><br>'.$reebokshoe_message.' </p>';
			
		}
	}
	


?>