<?php
	session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Project 1: Acey Ducey  -Kyle Cartechine -Gold 4 Team</title>
</head>

<style type="text/css">
h1{ 
	color: #CCC;
	text-align:center;
	size:20px;
	font-family:Tahoma, Geneva, sans-serif;
}

h2{
	width:300px;
	margin-left:auto;
	margin-right:auto;
	float:inherit;
	text-align:center;
	font-family: Tahoma, Geneva, sans-serif;
	font-size:30px;
	border:3px groove #999;
	color:#000;
	background-color: #fff;
	}
h3{
	width:240px;
	text-align:center;
	font-family: Arial, Helvetica, sans-serif;
	font-size:18px;
	line-height:26px;	
	color:#000;
	background-color:#C60;
	border:4px solid #000;
	padding-left:16px;
	
}

p {
	text-align:center;
	font-family:Verdana, Geneva, sans-serif;
	font-size:14px;
	line-height:40px;
	border:3px groove #999;
	color:#FFF;
	background-color: #333;
	}
p#extras{
	font-family: Arial, Helvetica, sans-serif;
	font-size:10px;
	line-height:16px;
	border:none;
	color:#FFF;
	background-color: #000;
}

body {
	width:800px;
	height:800px;
	margin-left:auto;
	margin-right:auto;
	background-color:#000;
		}
		
div{
	text-align:center;
	margin-left:auto;
	margin-right:auto;
	display:block;
}
	
</style>


<body>

<form method="post">
  <?php
$clickaction=$_POST['dowhat'];
$cardface=array ('X',
				 "<img src='ace_b.jpg' alt='#' />",
				 "<img src='two_b.jpg' alt='#' />",
				 "<img src='three_b.jpg' alt='#' />",
				 "<img src='four_b.jpg' alt='#' />",
				 "<img src='five_b.jpg' alt='#' />",
				 "<img src='six_b.jpg' alt='#' />",
				 "<img src='seven_b.jpg' alt='#' />",
				 "<img src='eight_b.jpg' alt='#' />",
				 "<img src='nine_b.jpg' alt='#' />",
				 "<img src='ten_b.jpg' alt='#' />",
				 "<img src='jack_b.jpg' alt='#' />",
				 "<img src='queen_b.jpg' alt='#' />",
				 "<img src='king_b.jpg' alt='#' />",
				 "<img src='ace_b.jpg' alt='#' />");

$randteam=array ('XXX','BLACK','GOLD','BLACK','GOLD',
				 'BLACK','GOLD','BLACK','GOLD','BLACK',
				 'GOLD','BLACK','GOLD','BLACK','GOLD',
				 'BLACK','GOLD');

if (!$clickaction)
	{
	//If no buttons are clicked then we must print screen 1
	/////////////
	///SCREEN 1  
	/////////////
	//Generate the cards in screen 1
	$card1=rand(1,14);
	$card2=rand(1,14);
	$midcard=rand(1,14);
	
	//Properly generate a high and low value.
	//If they are equal then try a new random card to replace one old one.
	while  ( ($card1==$card2) )    
		{                                                                        
			$newcard=rand(1,14);
			if ( ($newcard-2 == $card2) || ($newcard+2 == $card2) )
				$card1=$newcard;
		}	
	
	if($card1<$card2)
		{
			$lowcard=$card1;
			$highcard=$card2;
		}
	else
		{
			$lowcard=$card2;
			$highcard=$card1;
		}
	//store card values for later
	$_SESSION['midvalue']=$midcard;
	$_SESSION['lowvalue']=$lowcard;
	$_SESSION['highvalue']=$highcard;
	
	
	
	print "<h1>WELCOME TO <em>ACEY-DUCEY!</em></h1>";
	print "<p id='extras'>EXTRA FEATURES: Graphical Cards, No Suit, Ace through King </p>";
	print "<p>This is a card guessing game.";
	print "<br />Three random cards will be drawn. A high and low card will be drawn first.
			  <br />You can bet on if the third card will fall between the first two.<br /> ";
	print "GOLD team must start the game: choose BET or PASS.<br />";
	
	print "Low Card<br />$cardface[$lowcard]<br />High Card<br />$cardface[$highcard]<br />";
	
	print "<input type='submit' name='dowhat' value='BET'> &nbsp;&nbsp;&nbsp;";
	print "<input type='submit' name='dowhat' value='PASS'>";
	print "<br /><input type='hidden' name='midval' value=$midcard></p>";
	}
	
else if ( ($clickaction=="PASS") || ($clickaction=="NEXT DRAW") )
	{
		
		$card1=rand(1,14);
		$card2=rand(1,14);
		$midcard=rand(1,14);
		
		while  ( ($card1==$card2) )    
		{                                                                        
			$newcard=rand(1,14);
			if ( ($newcard-2 == $card2) || ($newcard+2 == $card2) )
				$card1=$newcard;
		}
		
		if($card1<$card2)
			{
				$lowcard=$card1;
				$highcard=$card2;
			}
		else
			{
				$lowcard=$card2;
				$highcard=$card1;
			}
				
		$_SESSION['midvalue']=$midcard;
		$_SESSION['lowvalue']=$lowcard;
		$_SESSION['highvalue']=$highcard;
				
		print "<p>New Low Card<br />$cardface[$lowcard]<br /><br />New High 
		Card<br />$cardface[$highcard]<br />";
			
		print "<input type='submit' name='dowhat' value='BET'> &nbsp;&nbsp;&nbsp;";
		print "<input type='submit' name='dowhat' value='PASS'><br /></p>";
		print "<br /><input type='hidden' name='lowvalue' value=$lowcard>";
		print "<br /><input type='hidden' name='midval' value=$midcard>";
		print "<br /><input type='hidden' name='highvalue' value=$highcard>";
	}
	
else if ($clickaction=="BET")
	{
	////////////////
	///SCREEN TWO
	////////////////
	
	$lowcard=$_SESSION['lowvalue'];
	$midcard=$_POST['midval'];
	$highcard=$_SESSION['highvalue'];
	
	
	if ( (($midcard>$lowcard)  && ($midcard<$highcard)) /*|| ($midcard==$lowcard) 
		|| ($midcard==$highcard) */)
		{
			print "<p>Low Card<br />$cardface[$lowcard]<br />Middle Card<br />$cardface[$midcard]
			<br />High Card<br />$cardface[$highcard]<br />";
			print "<h2>YOU WIN!</h2>";
			print "<br /><input type='hidden' name='midval' value=$midcard>";
			print "</p><div><input id='next' type='submit' name='dowhat' value='NEXT DRAW'></div>";
	
		}
	else if (($midcard>$highcard)||($midcard<$lowcard)|| ($midcard==$lowcard) 
			|| ($midcard==$highcard))
		{
			$midcard=$_POST['midval'];
			
			print "<p>Low Card<br />$cardface[$lowcard]<br />Middle Card<br />$cardface[$midcard]
				   <br />High Card<br />$cardface[$highcard]<br />";
			print "<h2>YOU LOSE!</h2>";	
			print "<br /><input type='hidden' name='midval' value=$midcard>";
			print "</p><div><input id='next' type='submit' name='dowhat' value='NEXT DRAW'></div>";
		}
	}

?>
  
</form>
</body>
</html>