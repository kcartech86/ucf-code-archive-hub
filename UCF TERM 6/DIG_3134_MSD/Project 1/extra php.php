<?php
//Make sure the high and low aren't equal.
//If they are then make a new random number.
//Its a good idea to make sure the new number isn't equal too.
if ($card1==$card2)
	{
		$test=$card2;
		do {
			$newcard=rand(1,14);
			$card2=$newcard;
			}
		while($card2==$test);
	}
	
//low number is less than or equal to high number	
if($card1<=$card2)
	{
		$lowcard=$card1;
		$highcard=$card2;
	}
else
	{
		$lowcard=$card2;
		$highcard=$card1;
	}
	
	
	
	
//Arrange the low and high cards accordingly	
if ($card1<$card2)
	{
		$lowcard=$card1;
		$highcard=$card2;
	}
else
	{
		$lowcard=$card2;
		$highcard=$card1;
	}

$guess=$_POST['guessvalue'];
$target=$_SESSION['targetvalue'];
		
if ($target==$guess)
{
	print "AWESOME! You got it right! Good job.";
	exit;// we're done
}
else
{
	if ($target>$guess)
		print "Too low.";
	else
		print "too high.";
		
	print "Enter your next guess: <br />";
	print "<input type='text' name='guessvalue'><br />";
}

print "<input type='submit' name='dowhat' value='BET'>";
print "<input type='submit' name='dowhat' value='PASS'>";

}
else
print "Error 666: clickaction=$clickaction, pigs are flying and robot-ninjas rule the earth.";
		
	


?>