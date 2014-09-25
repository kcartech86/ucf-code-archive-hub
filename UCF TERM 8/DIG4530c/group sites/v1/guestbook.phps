<hr>
<br />
<?php echo $form_error ?>
<br />
<form action="<?php echo htmlentities('catalog.php?id='.$id); ?>" method="post">
	<strong>Tell Us What You Think About This Product</strong><br/>
	Name:<br/><input type="text" name="guestbook_name" maxlength="25" value="<?php echo $session->username; ?>"><br/>
	Email:<br/><input type="text" name="guestbook_email" maxlength="255" value="<?php echo $session->email; ?>"><br/>
	Comment:<br/><textarea name="guestbook_message" rows="5" cols="45" maxlength="255"></textarea><br/>
	<input type="submit" value="Submit Your Comment">
</form>