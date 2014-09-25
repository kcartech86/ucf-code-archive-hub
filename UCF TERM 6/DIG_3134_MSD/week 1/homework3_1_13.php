<?php

Print "<table border=5><tr>";
$n=5;
while ($n<30) {
	
	if($n>16){	
	Print "<td>"."**"."</td>" ;
	}else{
	Print "<td>"."$n"."</td>";
	}
	$n=$n+5;
	
	
}

Print "</tr></table>";

?>