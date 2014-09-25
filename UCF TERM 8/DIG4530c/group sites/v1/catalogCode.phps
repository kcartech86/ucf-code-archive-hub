<?php

session_start();
//session_destroy();


mysql_connect('localhost', 'dig4530c_group04', 'dig4530cgroup04') or die (mysql_error());
mysql_select_db('dig4530c_group04') or die (mysql_error());

//If "ADD" is clicked
if(isset($_GET['add'])){
  //Must prevent the user from adding more than we have in stock.
  //To prevent sql injection make sure the value is number of type INT
  $quantity = mysql_query('SELECT id, Stock FROM products WHERE id='.mysql_real_escape_string((int)$_GET['add']));
  while($quantity_row = mysql_fetch_assoc($quantity)){
    //Loop through to get the quantity variable (Stock in products table)
    //If the quantity in the database != to quantity already in the shopping cart
    //we can add to cart
   if($quantity_row['Stock']!=$_SESSION['cart_'.(int)$_GET['add']]){
  //Use the id number we passed through our get variable, we concatinate it
  //onto our cart session variable. Click add, id of product is 1, then cart_1
  //session variable is made. Then increment for each added product.
     $_SESSION['cart_'.(int)$_GET['add']]+='1';
   }
  }
}
//The function to grab and show all products (works fast for catalog.php)
function showProducts () {
  $get = mysql_query('SELECT * FROM products WHERE Stock > 0 ');
  if(mysql_num_rows($get)==0)  {
   echo "We currently have no products in stock. Sorry for the inconvenience.";
  }
  else{
    //fetch an associative array for all products then display data in a paragraph
    while($get_row = mysql_fetch_assoc($get)) {
      echo '<p>'.'<img src="'.$get_row['Product Image'].'" alt="Product Image" width="100" /> '.'<br />'.$get_row['Product Name'].'<br />'.$get_row['Description'].'<br /> $'.number_format($get_row['Price'], 2).'<br /><a href="cart2.php?add='.$get_row['id'].'">Add</a></p>';
    }
  }
}

?>