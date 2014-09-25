<?php
	$negarray[1][1] = -9;
	$negarray[1][2] = 25;
	$negarray[1][3] = 9;
	$negarray[2][1] = 9;
	$negarray[2][2] = 9;
	$negarray[2][3] = -9;
	$negarray[3][1] = 9;
	$negarray[3][2] = -9;
	$negarray[3][3] = 9;
	
	for($i=1; $i<=9; $i++)
	{
		for($j=1;$j<=9; $j++)
		{
			if($negarray[$i][$j] <0)
				$x = $x+1;
		}
	}
	if($x==0)
		print "no negative numbers were found";
	else
		print "$x";
?>