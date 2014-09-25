<?php

$page = 'cart2.php';

session_start();
//session_destroy();

mysql_connect('localhost', 'dig4530c_group04', 'dig4530cgroup04') or die (mysql_error());
mysql_select_db('dig4530c_group04') or die (mysql_error());

//If [+] is clicked in cart
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
  //You want to go back to the page after adding an item
  header('Location: '.$page);
}


//If you want to remove 1 from a quantity of a specific item
if(isset($_GET['remove'])){
  $_SESSION['cart_'.(int)$_GET['remove']]--;
  header('Location: '.$page);
}
//If you want to delete a specific item from the cart
if(isset($_GET['delete'])){
  $_SESSION['cart_'.(int)$_GET['delete']]=0;
  header('Location: '.$page);
}

function paypal_items(){
  $num = 0;
  foreach($_SESSION as $name => $value) {
    if ($value!=0) {
      if(substr($name, 0, 5)=='cart_'){
        $id = substr($name, 5, strlen($name)-5);
        $get = mysql_query('SELECT * FROM products WHERE id='.mysql_real_escape_string((int)$id));
        while ($get_row = mysql_fetch_assoc($get)){
          $num++;
          echo '<input type="hidden" name="item_number_'.$num.' value="'.$id.'" ">';
          echo '<input type="hidden" name="item_name_'.$num.'" value="'.$get_row['Product Name'].'">';
          echo '<input type="hidden" name="amount_'.$num.'" value="'.$get_row['Price'].'">';
          echo '<input type="hidden" name="shipping_'.$num.'" value="'.$get_row['shipping'].'">';
          echo '<input type="hidden" name="shipping2_'.$num.'" value="'.$get_row['shipping'].'">';
          echo '<input type="hidden" name="quantity_'.$num.'" value="'.$value.'">';
        }
      }
    }
  }
}
//Can't Get this working right. It is supposed to be taking
//in the amount and adding it to the cart after a user
//clicks the Update button.
if(isset($_GET['update'])){
  if($amount ==0){
    //if 0 is entered remove item
    $_SESSION['cart_'.(int)$_GET['update']]=0;
    header('Location: '.$page);
  }
  else{
    //if 1 or more is entered udpate the amount of that item
    for ($i=1; $i<=$amount; $i++){
      $quantity = mysql_query('SELECT id, Stock FROM products WHERE id='.mysql_real_escape_string((int)$_GET['add']));
      while($quantity_row = mysql_fetch_assoc($quantity)){
       if($quantity_row['Stock']!=$_SESSION['cart_'.(int)$_GET['add']]){
         $_SESSION['cart_'.(int)$_GET['add']]+='1';
       }
      }
      header('Location: '.$page);
    }
  }
}

function showCart() {
  //For each session cart_1, cart_2, etc get the value for that session
  //meaning the number of items in that session variable
  foreach($_SESSION as $name => $value){
    if ($value>0){
      if(substr($name, 0, 5)=='cart_'){
          //get the id from the cart session and take the exact number from
          //the end of the session variable; cart_3 - first 5 string chars  = 3
          $id = substr($name, 5, (strlen($name)-5));
          //Get and display the data for each item stored in the cart
          $get = mysql_query('SELECT * FROM products WHERE id='.mysql_real_escape_string((int)$id));
          while ($get_row = mysql_fetch_assoc($get)){
            $sub_ttl = $get_row['Price']*$value;
            echo
            '<div class=\"table\">'
                 .'<span class="column">'.
                       '<a href="catalog2.php?id='.$id.'">'.$get_row['Product Name'].'</a>'
                       .'<br />'.
                       '<img src="'.$get_row['Product Image'].'" alt="'.$get_row['Product Name'].'" class="cart_img" />'
                 .'</span>'.
                 '<span class="column">'.$get_row['Description'].'</span>'
                 .'<span class="column">$'.number_format($get_row['Price'], 2).'</span>'.
                 '<div class="column">'
                      .'<form action="cart.php" method="post">'.
/*Must get amount*/         '<input name="update_amount" type="text" value="'.$value.'" size="1" maxlength="2" />'
/*ADD loop here*/           .'<a class="button" href="cart2.php?update='.$id.'"> Update </a>'.
                      '</form>'
                 .'</div>'.
                 //$cartOutput .= '<span class="column">' . $each_item['quantity'] . '</span>';
                 '<span class="column">$'.number_format($sub_ttl, 2).'</span>'
                 .'<div class="column">'.
                      '<a class="button" href="cart2.php?delete='.$id.'"> Remove </a>'
                 .'</div>'.
                 '<br/>'
            .'</div>
            ';

          }
      }
      $total += $sub_ttl;
    }
  }
  if ($total==0) {
    echo "No items in cart.";
  }
  else{
    echo '<p>Total: $'.number_format($total, 2).'</p>';
    
      $amount = $_POST['update_amount'];

    ?>

    <p>
      <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
        <input type="hidden" name="cmd" value="_cart">
        <input type="hidden" name="upload" value="1">
        <input type="hidden" name="business" value="kcartech86@gmail.com">
        <?php paypal_items(); ?>
        <input type="hidden" name="currency_code" value="USD">
        <input type="hidden" name="amount" value="<?php echo $total; ?>">
        <input type="image" src="http://www.paypal.com/en_US/i/btn/x-click-but03.gif" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
      </form>
    </p>
    <?php
    //ABOVE paypal code go to "https://www.paypal.com/cgi-bin/webscr?cmd=p/pdn/howto_checkout-outside" for reference

  }
}
?>
