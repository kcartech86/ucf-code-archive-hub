<?php 
include ("include/session.php"); // Start session first thing in script
// Script Error Reporting
error_reporting(E_ALL);
ini_set('display_errors', '1');
// Connect to the MySQL database   
?>
<?php 
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//       Section 1 (if user attempts to add something to the cart from the catalog page)
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if (isset($_POST['pid'])) {
    $pid = $_POST['pid'];
	$wasFound = false;
	$i = 0;
	// If the cart session variable is not set or cart array is empty
	if (!isset($_SESSION["cart_array"]) || count($_SESSION["cart_array"]) < 1) { 
	    // RUN IF THE CART IS EMPTY OR NOT SET
		$_SESSION["cart_array"] = array(0 => array("SKU" => $pid, "quantity" => 1));
	} else {
		// RUN IF THE CART HAS AT LEAST ONE ITEM IN IT
		foreach ($_SESSION["cart_array"] as $each_item) { 
		      $i++;
		      while (list($key, $value) = each($each_item)) {
				  if ($key == "SKU" && $value == $pid) {
					  // That item is in cart already so let's adjust its quantity using array_splice()
					  array_splice($_SESSION["cart_array"], $i-1, 1, array(array("SKU" => $pid, "quantity" => $each_item['quantity'] + 1)));
					  $wasFound = true;
				  } // close if condition
		      } // close while loop
	       } // close foreach loop
		   if ($wasFound == false) {
			   array_push($_SESSION["cart_array"], array("SKU" => $pid, "quantity" => 1));
		   }
	}
	header("location: cart.php"); 
    exit();
}
?>
<?php 
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//       Section 2 (if user chooses to empty their shopping cart)
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if (isset($_GET['cmd']) && $_GET['cmd'] == "emptycart") {
    unset($_SESSION["cart_array"]);
}
?>
<?php 
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//       Section 3 (if user chooses to adjust item quantity)
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if (isset($_POST['item_to_adjust']) && $_POST['item_to_adjust'] != "") {
    // execute some code
	$item_to_adjust = $_POST['item_to_adjust'];
	$quantity = $_POST['quantity'];
	$quantity = preg_replace('/^[^\d]*$/', '', $quantity); // filter everything but numbers
	if ($quantity >= 100) { $quantity = 99; }
	if ($quantity < 1) { $quantity = 1; }
	if ($quantity == "") { $quantity = 1; }
	$i = 0;
	foreach ($_SESSION["cart_array"] as $each_item) { 
		      $i++;
		      while (list($key, $value) = each($each_item)) {
				  if ($key == "SKU" && $value == $item_to_adjust) {
					  // That item is in cart already so let's adjust its quantity using array_splice()
					  array_splice($_SESSION["cart_array"], $i-1, 1, array(array("SKU" => $item_to_adjust, "quantity" => $quantity)));
				  } // close if condition
		      } // close while loop
	} // close foreach loop
}
?>
<?php 
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//       Section 4 (if user wants to remove an item from cart)
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if (isset($_POST['index_to_remove']) && $_POST['index_to_remove'] != "") {
    // Access the array and run code to remove that array index
 	$key_to_remove = $_POST['index_to_remove'];
	if (count($_SESSION["cart_array"]) <= 1) {
		unset($_SESSION["cart_array"]);
	} else {
		unset($_SESSION["cart_array"]["$key_to_remove"]);
		sort($_SESSION["cart_array"]);
	}
}
?>
<?php 
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//       Section 5  (render the cart for the user to view on the page)
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$cartOutput = "";
$cartTotal = "";
$pp_checkout_btn = '';
$product_id_array = '';
if (!isset($_SESSION["cart_array"]) || count($_SESSION["cart_array"]) < 1) {
    $cartOutput = "";
} else {
	// Start PayPal Checkout Button
	$pp_checkout_btn .= '<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
        <input type="hidden" name="cmd" value="_cart"/>
        <input type="hidden" name="upload" value="1"/>
        <input type="hidden" name="business" value="frank@knights.ucf.edu"/>';
	// Start the For Each loop
	$i = 0; 
    foreach ($_SESSION["cart_array"] as $each_item) { 
		$item_id = $each_item['SKU'];
		$sql = mysql_query("SELECT * FROM products WHERE SKU='$item_id' LIMIT 1");
		while ($row = mysql_fetch_array($sql)) {
			$product_name = $row["Product_Name"];
			$price = $row["Price"];
			$details = $row["Description"];
                        $product_image = $row["Product Image"];
		}
		$pricetotal = $price * $each_item['quantity'];
		$cartTotal = $pricetotal + $cartTotal;
		setlocale(LC_MONETARY, "en_US");
                $pricetotal = money_format("%10.2n", $pricetotal);
		// Dynamic Checkout Btn Assembly
		$x = $i + 1;
		$pp_checkout_btn .= '<input type="hidden" name="item_name_' . $x . '" value="' . $product_name . '"/>
                <input type="hidden" name="amount_' . $x . '" value="' . $price . '"/>
                <input type="hidden" name="quantity_' . $x . '" value="' . $each_item['quantity'] . '"/>  ';
		// Create the product array variable
		$product_id_array .= "$item_id-".$each_item['quantity'].","; 
		// Dynamic table row assembly
		$cartOutput .= "<div class=\"table\">";
		$cartOutput .= '<span class="column"><a href="catalog.php?id=' . $item_id . '">' . $product_name . '</a><br /><img src="' . $product_image . '" alt="' . $product_name. '" class="cart_img" /></span>';
		$cartOutput .= '<span class="column">' . $details . '</span>';
		$cartOutput .= '<span class="column">$' . $price . '</span>';
		$cartOutput .= '<div class="column"><form action="cart.php" method="post">
		<input name="quantity" type="text" value="' . $each_item['quantity'] . '" size="1" maxlength="2" />
		<input name="adjustBtn' . $item_id . '" type="submit" value="change" />
		<input name="item_to_adjust" type="hidden" value="' . $item_id . '" />
		</form></div>';
		//$cartOutput .= '<span class="column">' . $each_item['quantity'] . '</span>';
		$cartOutput .= '<span class="column">$' . $pricetotal . '</span>';
		$cartOutput .= '<div class="column"><form action="cart.php" method="post"><input name="deleteBtn' . $item_id . '" type="submit" value="X" /><input name="index_to_remove" type="hidden" value="' . $i . '" /></form></div><br/>';
		$cartOutput .= '</div>';
		$i++; 
    } 
	setlocale(LC_MONETARY, "en_US");
        $cartTotal = money_format("%10.2n", $cartTotal);
	$cartTotal = "<div class='cart_total'>Cart Total : ".$cartTotal." USD</div>";
    // Finish the Paypal Checkout Btn
	$pp_checkout_btn .= '<input type="hidden" name="custom" value="' . $product_id_array . '"/>
	<input type="hidden" name="notify_url" value="https://www.sulley.dm.ucf.edu/~dig4530c_group04/v1/my_ipn.php"/>
	<input type="hidden" name="return" value="https://www.sulley.dm.ucf.edu/~dig4530c_group04/v1/checkout_complete.php"/>
	<input type="hidden" name="rm" value="2"/>
	<input type="hidden" name="cbt" value="Return to The Store"/>
	<input type="hidden" name="cancel_return" value="https://www.sulley.dm.ucf.edu/~dig4530c_group04/v1/paypal_cancel.php"/>
	<input type="hidden" name="lc" value="US"/>
	<input type="hidden" name="currency_code" value="USD"/>
	<input type="image" src="http://www.paypal.com/en_US/i/btn/x-click-but01.gif" name="submit" alt="Make payments with PayPal - its fast, free and secure!"/>
	</form>';
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />        
        <title>Sportopia Cart</title>
        <style type="text/css">
            @import url("css/reset.css");
            @import url("css/960.css");
            @import url("css/styles.css");
        </style>
        <link rel="icon" href="img/favicon.png" />
    </head>
    <body>
        <div id="wrapper" class="container_16 clearfix">
            <div id="super-nav">
                <div class="container_16 clearfix">
                    <div class="grid_6 prefix_10">
                        <?php
                        if($session->logged_in){
                            echo "<p>Welcome $session->username, you are logged in.</p>"
                               ."<a class=\"button\" href=\"client.php?user=$session->username\">My Account</a>";
                            if($session->isAdmin()){
                                echo "<a class=\"button\" href=\"admin.php\">Admin Center</a>";
                            }
                            echo "<a class=\"button\" href=\"process.php\">Logout</a>";
                        
                        }else{
                            echo "<p>Welcome $session->username, you are not logged in.</p>";
                            echo "<a class=\"button\" href=\"login.php\">Login</a>";
                        } ?>
                        <a class="button" href="cart.php">Cart: <?php if (!isset($_SESSION["cart_array"])){ echo "0"; }else{echo count($_SESSION["cart_array"]);} ?></a>
                    </div>
                </div>
            </div>
            <div id="header">
                <div class="container_16 clearfix">
                        <div class="grid_4">
                            <div id="logo">
                                <h1>
                                    <a rel="home" title="Sportopia&copy;" href="home.php">Sportopia&copy;</a> 
                                </h1>
                            </div>
                        </div>
                        <div class="grid_12">
                            <div id="search">
                                 <form action="search.php" method="post">
                                       <input id="searchInput" type="text" name="searchText"/>
                                       <input id="searchSubmit" type="submit"  value="Search"/>
                                 </form>
                            </div>
                        </div>
                </div>
            </div>
            <div id="content">
                <div class="container_16 clearfix">
                    <div id="sidebar" class="grid_2">
                        <div id="navigation">
                            <ul>
                                <li><a href="home.php">Home</a></li>
                                <li><a href="catalog.php">Catalog</a></li>
				<li><a href="background.php">Background</a></li>
                                <li><a href="policy.php">Policies</a></li>
                                <!--<li><a href="#">Basketball</a>
                                    <ul>
                                        <li><a href="#">Hats</a></li>
                                        <li><a href="#">Shirts</a></li>
                                        <li><a href="#">Basketballs</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Baseball</a>
                                    <ul>
                                        <li><a href="#">Hats</a></li>
                                        <li><a href="#">Shirts</a></li>
                                        <li><a href="#">Baseballs</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Contact Us</a></li>-->
                            </ul>
                        </div>
                    </div>
                    <div class="grid_14">

                        <div class="table">
                            <div class="table">
                                <span class="column"><span class="bold">Product</span></span>
                                <span class="column"><span class="bold">Description</span></span>
                                <span class="column"><span class="bold">Unit Price</span></span>
                                <span class="column"><span class="bold">Quantity</span></span>
                                <span class="column"><span class="bold">Total</span></span>
                                <span class="column"><span class="bold">Remove</span></span>
                            </div>
                            <br/>
                        <?php
                        if (!isset($_SESSION["cart_array"]) || count($_SESSION["cart_array"]) < 1) {
                            echo "<h2 class=\"center\">Your shopping cart is empty</h2>";
                            echo "<br/>";
                        } else{
                        ?>
                            <?php echo $cartOutput; ?>
                            <br/>
                            <br/>
                            <?php echo $cartTotal; ?>
                            <br/>
                            <br/>
                            <?php echo $pp_checkout_btn; ?>
                            <br/>
                            <br/>
                        <?php
                        }
                        ?>
                            <a href="cart.php?cmd=emptycart">Click Here to Empty Your Shopping Cart</a>
                        </div>
                    </div>
                </div>
            </div>
            <div id="footer" class="container_16 clearfix">
                <div class="grid_8">
                        <p>&copy; Copyright 2011 <span class="bold">Sportopia</span>.  All Rights Reserved.</p>
                </div>
                <div class="grid_4">
                        <p>This site is not official and is an assignment for a UCF Digital Media Course</p>
                </div>
                <div class="grid_4">
                        <p>Designed by Group04</p>
                </div>
            </div>
        </div>
    </body>
</html>