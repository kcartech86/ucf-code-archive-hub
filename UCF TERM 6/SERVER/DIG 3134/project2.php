<?php   //Kyle Cartechine - Gold #4 Team
		//Wheel of Fortune - Project 2 - DIG 3134 Media Software Design
		
	session_start();
	
	$testnumber=2;
	function logprint ($what,$num)
	{global $testnumber;
		if ($num==$testnumber)
			print "LP:$what <br />";
	}
	
	function readTxtFile($whichfile)
	{
		if (!file_exists($whichfile))
		{
			print "Sorry, can't find $whichfile.";
			exit;
		}
		else
		{
			$theFile = fopen($whichfile, "r"); 
			$i=1;
			while (!feof($theFile))
			{
				$textarray[$i] = fgets($theFile);
				$i++;	
			}
			fclose($theFile);
			return $textarray;
		}
	}
	
	function makeheader( )
	{
		print '
		<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"            																																																														         "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Wheel of Fortune - Kyle Cartechine - Gold #4</title>
	
		<style type="text/css">
			.mtable td 
			{
				width:50px;
			}
		</style>
	
		</head>
		
		<center>
		<body>
		
		<form method="post">
		';
	}
	
	function makefooter ()
	{
		print "</form></body></center></html>";
	}
	
	#display: Draws the Jeopardy table
	function display($visible, $letters)
	{
		
			$letterlength=count($letters);
			print "<table class='mtable' border=1><tr>";
			for ($i=1; $i<$letterlength; $i++)
			{
				logprint("i=$i,vi=".$visible[$i]." ltr=".$letters[$i],1);
				
				//print "i=$i,visible=".$visible[$i]."<br />";
				if ($letters[$i]==' ')
					print "<td><strong><center>*</center></strong></td>";
				else if ($visible[$i])
				 {
					print "<td><center>".$letters[$i]."</center></td>";
				 }
				else
					print "<td>&nbsp;</td>";
			}
			print "</tr></table>";
	}
	#drawinputscreen: Asks for input.
	function drawinputscreen($guesses)
	{
		print "<center><input type='text' name='guessletter'>";
		print "Guess a letter. You have $guesses guesses left.";
		print "<input type='submit' name='action' value='GUESS'>";
		print "<input type='submit' name='next' value='NEXT PHRASE'>";
		print "<input type='submit' name='reveal' value='REVEAL'></center>";
	}
	
	function clickCount()
	{
		$cliche_count = ("clichecount.txt");
		$cliches_read = file($cliche_count);
		$cliches_read[0] ++;
		$fp = fopen($cliche_count, "w");
		fwrite($fp , "$cliches_read[0]");
		fclose($fp);
		$current_cliche =  $cliches_read[0];
		return $current_cliche;
	}

	function resetCount()
	{
		$cliche_count = ("clichecount.txt");
		$cliches_read = file($cliche_count);
		$cliches_read[0]=0;
		$fp = fopen($cliche_count, "w");
		fwrite($fp, "$cliches_read[0]");
		fclose($fp);
		$current_cliche =  $cliches_read[0];
		return $current_cliche;
	}
	
	function nextcliche()
	{
		global $clicheArray;
		$counter=clickCount();
		if ($counter<=15)
		{
			 $text = $clicheArray[$counter];
			 $text=trim($text);
			 return $text;					 
		}			
		else{
			$counter=resetCount();
			$text = "No more phrases are available.";
			$text=trim($text);
			return $text;
		}
	
	}
	
	function clichenumber()
	{
		$cliche = fopen("clichecount.txt","r");
		$number = fgets($cliche);
		fclose($cliche);
		return $number;
	}
	
	/////////////////////////////MAIN PROGRAM/////////////////////////////
	
	makeheader();
	
	$clicheArray=readTxtFile("cliches.txt");
	$clicheindex = clichenumber();
	$text=$clicheArray[$clicheindex];
	$text = trim($text);
	
	for ($i=0; $i<=strlen($text);$i++)
	{
		$letters[$i+1]= strtoupper($text[$i]);	
	}
	
	$letterlength=count($letters);

	$visible=$_SESSION['visible'];
	$guesses=$_SESSION['guesses'];
	
	$act=$_POST['action'];
	$next=$_POST['next'];
	$reveal=$_POST['reveal'];
	
	if($next=="NEXT PHRASE")
	{
		$endoffile = "No more phrases are available.";
		$text = nextcliche();
		if($text!=$endoffile)
		{
			$text = trim($text);
			for ($i=0; $i<=strlen($text);$i++)
			{
				$letters[$i+1]= strtoupper($text[$i]);	
			}
		
			$letterlength=count($letters);
		}
		else
		{
			$text=trim($text);
			$showphrase=trim(strtoupper($text));
			print "<table class='mtable' border=1><tr>";
			for ($i=0; $i<=strlen($showphrase);$i++)
			{
				if ($showphrase[$i]==' ')
					print "<td><strong><center>*</center></strong></td>";
				else 
					print "<td><center>".$showphrase[$i]."</center></td>";
				 
			}
			print "</tr></table>";
			drawinputscreen($guesses);
				
			$_SESSION['visible']=$visible;
			$_SESSION['guesses']=$guesses;	
			makefooter();
			break;
		}
	
	}	

	if (!$act)
	{
		logprint("noact",1);
		
		for ($i=1; $i<=$letterlength; $i++)
			$visible[$i]=0;
			
		$guesses=10;
	} # initialization block
	else
	{ // main repeated action. Get a guessletter, scan the array.
		$guessletter=strtoupper($_POST['guessletter']); // a-> A, etc. uppercase
		logprint("gp=$guessletter",1);
		
		for ($i=1; $i<=$letterlength; $i++)
		{
			$ll=$letters[$i];
			if ($guessletter==$letters[$i])
			{
				logprint("setting visible $i",1);
				$visible[$i]=1;
			}
		}
		$guesses=$guesses-1;
	} #repeated action block
	
	if($reveal=="REVEAL")
	{
		$text=trim($text);
		$showphrase=strtoupper($text);
		$showphrase=trim($showphrase);
		print "<table class='mtable' border=1><tr>";
		for ($i=0; $i<strlen(trim($showphrase));$i++)
		{
			if ($showphrase[$i]==' ')
				print "<td><strong><center>*</center></strong></td>";
			else 
			 	print "<td><center>".$showphrase[$i]."</center></td>";
			 
		}
		print "</tr></table>";
		drawinputscreen($guesses);
			
		$_SESSION['visible']=$visible;
		$_SESSION['guesses']=$guesses;	
		makefooter();
		
	}
	else
	{
		display($visible,$letters);
		drawinputscreen($guesses);
			
		$_SESSION['visible']=$visible;
		$_SESSION['guesses']=$guesses;	
		makefooter();
	}
?>