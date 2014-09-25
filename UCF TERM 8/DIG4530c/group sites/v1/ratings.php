<?php

include("include/session.php");

$new = mysql_query("SELECT * FROM products");
while ($row = mysql_fetch_assoc($new))
{
//get data
$id = $row['id'];
$product = $row['Product Name'];
$rating = $row["rating"];
 
echo "$product - ";
printf("%0.1f",$rating);
echo " <a href='rate.php?id=$id'>Rate this product!</a></br>";
 
}

?>