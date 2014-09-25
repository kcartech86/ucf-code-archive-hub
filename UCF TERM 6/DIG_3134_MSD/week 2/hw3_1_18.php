<?php

	$price['umbrella']=14.95;
	$price['raincoat']=19.99;
	$price['boots']=24.99;
	
	$inventory['umbrella']=1;	
	$inventory['raincoat']=3;	
	$inventory['boots']=6;
	
	$item='raincoat';
	
	
	if($inventory[$item]>0)
		Print 'The price of raincoats is ' .$price['raincoat']. '. We have ' .$inventory['raincoat']. '.';
	
	else {
		if($inventory[$item]==0)
		Print 'Sorry, we are out of raincoats.';
	}
?>