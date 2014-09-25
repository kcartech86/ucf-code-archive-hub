<?php

session_start();

$Gridsize=11;
$Cellwidth=220/$Gridsize;


define('RED', '#660000');
define('GREEN','#006600');
define('BLUE','#000066');
define('PURPLE','#663399');
define('ORANGE','#FF6633');
define('YELLOW','#FFFF00');
define('BLACK', '#000000');
define('GREY','#999999');
define('WHITE', '#FFFFFF');

function makeheader()
{ global $Cellwidth;

	print '
	  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title>Project 3 - Wall War -Kyle Cartechine</title>';


	print "	<style type='text/css'>
	
			body
			{
				background-color:#000;	
			}
			table
			{
				border-collapse:collapse;
			}
			table, td
			{
				border:none;
			}
			
			table.mtable
			{
				
				margin-left:auto;
				margin-right:auto;
			}
			.mtable td 
			{
				width:$Cellwidth"."px; 
				height:$Cellwidth"."px;
			}
			#menu
			{	width:400px;
				color:#FFF;
				text-align:center;
				padding: 20px 10px 20px 10px;
				margin-left:auto;
				margin-right:auto;
			}
				
		</style>";

print '</head>
<body><form method="post">';
}

function preparegrid()
{global $Grid, $Gridsize;

	for ($y=1; $y<=$Gridsize; $y++)
	{
		for ($x=1; $x<=$Gridsize; $x++)
		{
			$Grid[$x][$y]=WHITE;
		} # x loop
	} # y loop
} # preparegrid

function drawgrid()
{global $Grid,$Gridsize;

	$result='<table class="mtable">';
	for ($y=1; $y<=$Gridsize; $y++)
	{
		$result.="<tr>";
		for ($x=1; $x<=$Gridsize; $x++)
		{
			$char="&nbsp;";
			$color=$Grid[$x][$y];
			$result.="<td align='center' style='background-color:$color'>$char</td>";
		} # x loop
		$result.="</tr>";
	} # y loop
	$result.="</table>";
	print $result;
} #drawgrid

function color_select()
{global $color;
	print $color;
		
}

function draw_A()
{global $Gridsize, $Grid, $color;
	for ($y=1; $y<=$Gridsize+1; $y++)
	{
		for ($x=1; $x<=$Gridsize+1; $x++)
		{
			if($x==6)
			$Grid[$x][1]=$color;
			if($x==5)
			{
				$Grid[$x][2]=$color;
				$Grid[$x+2][2]=$color;
			}
			if($x==4)
			{
				$Grid[$x][3]=$color;
				$Grid[$x+4][3]=$color;
			}
			if($x==3 && $y>3)
			{
				$Grid[$x][$y]=$color;
				$Grid[$x+6][$y]=$color;
			}
			if($y==6 && 2<$x && $x<9 )
				$Grid[$x][$y]=$color;
			//$Grid[$x][$y]=WHITE;
		} # x loop
	} # y loop
	
}

function draw_B()
{global $Gridsize, $Grid, $color;
	for ($y=1; $y<=$Gridsize+1; $y++)
	{
		for ($x=1; $x<=$Gridsize+1; $x++)
		{
			if($x==3)
				$Grid[3][$y]=$color;
			if(($y==1 || $y==11) && 3<$x && $x<7)
			{
				$Grid[$x][1]=$color;
				$Grid[$x][11]=$color;
			}
			if(($y==6 && 2<$x && $x<8) )
				$Grid[$x][$y]=$color;
			if(($x==7) && ($y==2 || $y==10))
				$Grid[$x][$y]=$color;
			if(($x==8) && ($y==3 || $y==5 || $y==7 || $y==9))
				$Grid[$x][$y]=$color;
			if(($x==9) && ($y==4 || $y==8))
				$Grid[$x][$y]=$color;
		} # x loop
	} # y loop
}

function draw_C()
{global $Gridsize,$Grid,$color;
	for ($y=1; $y<=$Gridsize+1; $y++)
	{
		for ($x=1; $x<=$Gridsize+1; $x++)
		{
			if($x==3 && (2<$y && $y<10) )
				$Grid[3][$y]=$color;
			if(($y==1 || $y==11) && (4<$x && $x<8) )
				$Grid[$x][$y]=$color;
			if(($x==4) && ($y==2 || $y==10))
				$Grid[$x][$y]=$color;
			if(($x==8) && ($y==2 || $y==10))
				$Grid[$x][$y]=$color;
		} # x loop
	} # y loop
}

function draw_D()
{global $Gridsize, $Grid, $color;
	for ($y=1; $y<=$Gridsize+1; $y++)
	{
		for ($x=1; $x<=$Gridsize+1; $x++)
		{
			if($x==3)
				$Grid[3][$y]=$color;
			if(($y==1 || $y==11) && 3<$x && $x<7)
			{
				$Grid[$x][1]=$color;
				$Grid[$x][11]=$color;
			}
			if(($x==7) && ($y==2 || $y==10))
				$Grid[$x][$y]=$color;
			if(($x==8) && ($y==3 || $y==9))
				$Grid[$x][$y]=$color;
			if(($x==9) && (3<$y && $y<9))
				$Grid[$x][$y]=$color;
			
			
		//$Grid[$x][$y]=WHITE;
		} # x loop
	} # y loop
}

function draw_E()
{global $Gridsize,$Grid,$color;
	for ($y=1; $y<=$Gridsize+1; $y++)
	{
		for ($x=1; $x<=$Gridsize+1; $x++)
		{
			if($x==3)
				$Grid[3][$y]=$color;
			if(($y==1 || $y==11) && 3<$x && $x<10)
			{
				$Grid[$x][1]=$color;
				$Grid[$x][11]=$color;
			}
			if(($y==6 && 2<$x && $x<8) )
				$Grid[$x][$y]=$color;
		} # x loop
	} # y loop
}

function draw_F()
{global $Gridsize,$Grid,$color;
	for ($y=1; $y<=$Gridsize+1; $y++)
	{
		for ($x=1; $x<=$Gridsize+1; $x++)
		{
			if($x==3)
				$Grid[3][$y]=$color;
			if(($y==1)  && 3<$x && $x<10)
			{
				$Grid[$x][1]=$color;
			}
			if(($y==6 && 2<$x && $x<8) )
				$Grid[$x][$y]=$color;
			
			
		//$Grid[$x][$y]=WHITE;
		} # x loop
	} # y loop
}


function drawinputs()
{
	print "	<div id='menu'> Color:<select id='color' name='color_action' />
				      <option value='RED'>Red</option>
				      <option value='GREEN'>Green</option>
				      <option value='BLUE'>Blue</option>
					  <option value='PURPLE'>Purple</option>
					  <option value='ORANGE'>Orange</option>
					  <option value='YELLOW'>Yellow</option>
					  <option value='BLACK'>Black</option>
				      <option value='GREY'>Grey</option>
                  </select> <br />
			<input type='submit' name='action' value='A'>	
			<input type='submit' name='action' value='B'>
			<input type='submit' name='action' value='C'>
			<input type='submit' name='action' value='D'>
			<input type='submit' name='action' value='E'>
			<input type='submit' name='action' value='F'><br />
			<input type='submit' name='action' value='CLEAR'>

			</div>";
	

}

/////// MAIN PROGRAM ///////
	makeheader();
	$Grid=$_SESSION['Grid'];
	$action=$_POST['action'];
	$color = $_POST['color_action'];
	
	
	//stuff goes here
	if ((!$action)||($action=='CLEAR'))
	{
		preparegrid();
	}
	else if($action=='A')
	{
		preparegrid();
		draw_A();
	}
	else if($action=='B')
	{
		preparegrid();
		draw_B();
	}
	else if($action=='C')
	{
		preparegrid();
		draw_C();
	}
	else if($action=='D')
	{
		preparegrid();
		draw_D();
	}
	else if($action=='E')
	{
		preparegrid();
		draw_E();
	}
	else if($action=='F')
	{
		preparegrid();
		draw_F();
	}
	
	drawgrid();
	drawinputs();
	
	$_SESSION['Grid']=$Grid; // Store the grid for the next cycle
	
?>
</form>
</body>
</html>
