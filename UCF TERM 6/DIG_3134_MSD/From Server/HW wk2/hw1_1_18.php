<?php

$name="Henry Washington";

if(strlen($name)<20){
	Print "<div align='middle'>$name<div>";
}
else{
	$space=strpos($name," ");
	$before=substr($name,0,$space);
	Print"<div align='middle'>$before</div><br/>";
	$after=substr($name,$space);
	Print"<div align='middle'>$after</div>";
	
}

?>