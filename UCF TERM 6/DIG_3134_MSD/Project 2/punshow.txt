<?php // punshow.php

// Punshow: a demonstration of text file handling  & Dynamic HTML
//  DIG 3134 - J. M. Moshell - February 2011

	$Testnumber=1;
	
	# A standard diagnostic tool
	function logprint ($what,$num)
	{global $Testnumber;
		if ($num==$Testnumber)
			print "LP:$what <br />";
	}
	
	#makeheader:
	function makeheader( )
	{
		print '
		<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Punshow</title>
	
		</head>
		
		<body>
		<h1>Moshell\'s Punshow</h1>
		<form method="post">
		';
	} # makeheader
	
	#makefooter:
	function makefooter ()
	{
		print "</form></body></html>";
	}

	#display: Draws the Pun selection table
	function displayPunTable($pundex)
	{
		print "<table border=1>";
		$row=0;
		foreach ($pundex as $punline)
		{
			$punitems=explode("\t",$punline);
			// The items in the puntable are separated by tabs
			if (!empty($punitems[0]))
			{
				
				if ($row>0)
					$buttonitem="<input type='radio' name='punselect' value=$row>";
				else
					$buttonitem='';
					
				print "<tr><td>$buttonitem</td><td>".$punitems[0]."</td></tr>";
			}
			$row++;
		}
		print "</tr></table>";
	}
		
	#textloader: reads the named file into an array, one line per cell.
	function textloader($whatfile)
	{
		if (!file_exists($whatfile))
		{
			print ("<h3>Sorry, textloader cannot find $whatfile.</h3>");
			exit;
		}
		else
		{
			$textarray=file($whatfile);
			return $textarray;
		}
	}#textloader
	
	#textloader2: a more detailed way to read a file into an array.
	#	This function is provided only to illustrate fopen, feof, fgets, fclose.
	
	function textloader2($whatfile)
	{
		$theFile = fopen($whatfile, "r"); 
		$i=1;
		while (!feof($theFile))
		{
			$textarray[$i] = fgets($theFile);
			$i++;

		}
		fclose($theFile);
		return $textarray;
	}# textloader
	
	######## MAIN PROGRAM ##########
	
	makeheader();
	
	$Pundex=textloader('pundex.txt');
	
	$act=$_POST['action'];
	if ((!$act)||($act=="Continue"))
	{
		print '<h3>Please select one pun and click "GO" to see it.</h3>';

		displayPunTable($Pundex);
		
		print "<input type='submit' name='action' value='GO'>";
	} # initialization block
	
	else if ($act=="GO")
	
	{ // deliver the pun if we have it.
		$row=0;
		foreach ($Pundex as $punline)
		{
			$puninfo[$row]=explode("\t",$punline); // so each item in puninfo is a small array of 3 parts.
			$row++;
		}
		$punselect=$_POST['punselect']; // Which radio button was clicked?
		$mypun=$puninfo[$punselect];	// Grab the three items (title, text, image)
		
		$puntitle=$mypun[0];			// First, get the title
		$puntextfile="texts/".$mypun[1];	// now make a 'handle' for the text file
		$punimage=$mypun[2];					// For use in the table below.
		
		$puntextarray=textloader($puntextfile); // suck the pun into an array
		$puntext=implode(' ',$puntextarray);	// make it into one long text.
		
		print "<h2>$puntitle</h2>";
		
		print "<table border=1><tr>";
		print "<td>$puntext</td><td><img src='images/$punimage'></td></tr></table>";
				
		print "<input type='submit' name='action' value='Continue'>";
	} #pun delivery block
	else
		print "I do not understand the command $act.";
		
	
	makefooter();
?>
