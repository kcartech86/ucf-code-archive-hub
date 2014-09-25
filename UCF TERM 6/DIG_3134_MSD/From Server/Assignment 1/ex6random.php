<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Example 6: A random number - ex6random.php - </title>
</head>

<body>

<?php	
	$button=$_POST['dowhat'];
	
	//////////////////////////////////////
	if (!$button || ($button=='Yes')) // If nobody clicked a button to get to this page,
	{								  // OR if the button 'Yes' was clicked
	/////////////
	// SCREEN 1
	/////////////
	
		?>
				<form method='post'>
                <h3>Screen 1</h3>
				<input type='text' name='firstname' />Enter your first name, please.
				<input type='submit' name='dowhat' value='Send the Data' />
				</form>
		<?php
	}
	
	else if ($button=='Send the Data')
	{
		//////////////
		// SCREEN 2
		//////////////
		
		$firstname=$_POST['firstname'];
		$newnumber=rand(1,100);
		
		?>
        
        <form method='post'>
        <h3>Screen 2</h3>
		The dude's first name is <?php print $firstname; ?> <br />
		The button that was clicked, was captioned '<?php print $button; ?>'. <br />
        And your fancy new number is <strong> <?php print $newnumber ?> </strong> <br />
		Want to do it again?
		<input type='submit' name='dowhat' value='Yes' />
		<input type='submit' name='dowhat' value='No' />
		</form>
        
        <?php
	}
	
	///////////////////////////////////////
	// SCREEN 3
	///////////////////////////////////////
	
	else if ($button=='No')
	{
		print "<h3>Screen 3</h3>";
		print "Thanks for playing with our trivial program. Goodbye!";
	}
	
?>
</body>
</html>


