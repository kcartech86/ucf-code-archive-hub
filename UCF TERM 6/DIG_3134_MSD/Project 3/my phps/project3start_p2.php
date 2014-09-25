<?php

session_start();
// STARTER KIT for Wall War - DIG 3134 - Spring 2011 - Moshell

$Gridsize=7;
$Cellwidth=350/$Gridsize;

define('BLACK','#000000');
define('GOLD','#AAAA33');
define('BLUE','#0000FF');
define('WHITE','#FFFFFF');

function makeheader()
{ global $Cellwidth;

	print '
	  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Wall War - Starter Kit</title>';


print "	<style type='text/css'>
			.mtable td 
			{
				width:$Cellwidth"."px; height:$Cellwidth"."px;
				color:WHITE
			}
		</style>";

print '</head>
<body><form method="post">
';
}

function preparegrid()
{global $Grid, $Gridsize;

	for ($y=0; $y<=$Gridsize+1; $y++)
	{
		for ($x=0; $x<=$Gridsize+1; $x++)
		{
			if ($x==0) // left margin
			{
				if ($y==($Gridsize+1)/2)
					$Grid[$x][$y]=BLACK;
				else
					$Grid[$x][$y]=BLUE;
			}
			else if ($y==0) // top margin
			{
				if ($x==($Gridsize+1)/2)
					$Grid[$x][$y]=GOLD;
				else
					$Grid[$x][$y]=BLUE;
			}
			else if (($x==$Gridsize+1)||($y==$Gridsize+1))
			{	// right margin and bottom margin
				$Grid[$x][$y]=BLUE;
			}
			else	// fill the dude with white!
				$Grid[$x][$y]=WHITE;
				
		} # x loop
	} # y loop
} # preparegrid

function drawgrid()
{global $Grid,$Gridsize;

	$result='<table class="mtable" border=1>';
	for ($y=0; $y<=$Gridsize+1; $y++)
	{
		$result.="<tr>";
		for ($x=0; $x<=$Gridsize+1; $x++)
		{
			if ($x==0 && ($y>0 && $y<8)) $char=$y;			
			else if ($y==0 && ($x>0 && $x<8)) $char=chr($x+64);
			else if (($x==$Gridsize+1)||($y==$Gridsize+1)||($x==0 && $y==0)) $char="&nbsp;";			
			else $char="<input type='radio' name='fillhere' value='$x.$y'";
			$filled=$_POST['fillhere'];
			if ($filled)
			{
				$filledparts=explode('.',$filled);
				$x=$filledparts[0];
				$y=$filledparts[1];
			}
			
		
			$color=$Grid[$x][$y];
			$result.="<td align='center' style='background-color:$color'>$char</td>";
		} # x loop
		$result.="</tr>";
	} # y loop
	$result.="</table>";
	print $result;
} #drawgrid

function drawinputs()
{
	print "<p>X position(letter):<input type='text' size=2 name='xinput'><br />
	Y position(number):<input type='text' size=2 name='yinput'><br />
	Color:<input type='text' size=2 name='colorinput' <br />
	<input type='submit' name='action' value='CLEAR'>
	<input type='submit' name='action' value='GO'>
	<input type='submit' name='action' value='LIST MOVES'>
	<input type='submit' name='action' value='UNDO'>
	<input type='submit' name='action' value='BLACK'>
	<input type='submit' name='action' value='GOLD'>";
}

function xinputConvert()
{global $x;
	$a = $x;
	$x = ord($a)-64;
	if ($x>8)
	$x = $x-32;
	return $x;
}

function addhistory($x,$y,$color)
{
	$connection = mysql_connect("localhost", "root","")or print "main connect failed";
	mysql_select_db("history", $connection) or print "main select failed";
	
	$q="INSERT INTO history VALUES (null, '$x', '$y','$color')";
	$result = mysql_query ($q, $connection) or print "query '$q' failed";
}

#showhistory:
function showhistory()
{
	$connection=mysql_connect("localhost","root","") or print "main connect failed";
	mysql_select_db("history",$connection) or print "main select failed";
	
	$q="SELECT * FROM history WHERE 1";	
	$result = mysql_query ($q, $connection) or print "query '$q' failed";
	
	$report= "<table>";
	while($row=mysql_fetch_array($result))
							
	{	
			$value0=$row[0];
			$value1=$row[1];
			$value2=$row[2];
							
			$report.="<tr><td align='center'>$value0</td><td align='center'>$value1</td>".
					"<td>$value2</td></tr>";
	}
	
	$report.="</table>";
	if (!$value0)
		print "The history is empty!";
		
	print $report;
} # showhistory	

/////// MAIN PROGRAM ///////
	makeheader();
	$action=$_POST['action'];
	
	if ((!$action)||($action=='CLEAR'))
		preparegrid();
	else if ($action=='GO')
	{
		addhistory($_POST['xinput'],$_POST['yinput'],$_POST['colorinput']);
	}
	else if ($action=='LIST MOVES')
	{
		showhistory();	// Probe for a win.
	}
	else // we must be playing already. So fetch and modify the Grid.
	{
		$Grid=$_SESSION['Grid'];
		$x=$_POST['xinput'];
		$x=xinputConvert();
		$y=$_POST['yinput'];
		$c=$_POST['colorinput'];
		if ($c=='g')
			$color=GOLD;
		else if ($c=='b')
			$color=BLACK;
		else
			$color=WHITE;
		$Grid[$x][$y]=$color;
	} # 
	
	drawgrid();
	drawinputs();
	
	$_SESSION['Grid']=$Grid; // Store the grid for the next cycle
	
?>
</form>
</body>
</html>
