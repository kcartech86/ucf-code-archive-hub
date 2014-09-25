<?php
//Start Session and Connect to Database
include("include/session.php");

// Script Error Reporting
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>
<?php
// Delete Item Question to Admin, and Delete Product if they choose
if (isset($_GET['deleteid'])) {
	echo 'Do you really want to delete product with ID of ' . $_GET['deleteid'] . '? <a href="inventory_list.php?yesdelete=' . $_GET['deleteid'] . '">Yes</a> | <a href="inventory_list.php">No</a>';
	exit();
}
if (isset($_GET['yesdelete'])) {
	// remove item from system and delete its picture
	// delete from database
	$id_to_delete = $_GET['yesdelete'];
        $product_name= mysql_query("SELECT Product_Name FROM products WHERE id='$id_to_delete' LIMIT 1") or die (mysql_error());
	$sql = mysql_query("DELETE FROM products WHERE id='$id_to_delete' LIMIT 1") or die (mysql_error());
	// unlink the image from server
	// Remove The Pic -------------------------------------------
        $pictodelete = ("../img/$product_name.png");
    if (file_exists($pictodelete)) {
       		    unlink($pictodelete);
    }
	header("location: inventory_list.php"); 
    exit();
}
?>
<?php
// Parse the form data and add inventory item to the system
if (isset($_POST['Product_Name'])) {
	
        $product_name = mysql_real_escape_string($_POST['Product_Name']);
	$price = mysql_real_escape_string($_POST['Price']);
        $brand = mysql_real_escape_string($_POST['Brand']);
	$category = mysql_real_escape_string($_POST['Category']);
        $cat_id = mysql_real_escape_string($_POST['cat_id']);
	$subcategory = mysql_real_escape_string($_POST['SubCategory']);
        $sku = mysql_real_escape_string($_POST['SKU']);
        $stock = mysql_real_escape_string($_POST['Stock']);
        $cost = mysql_real_escape_string($_POST['Cost']);
	$details = mysql_real_escape_string($_POST['Description']);
	// See if that Product Name is an identical match to another product in the system
	$sql = mysql_query("SELECT id FROM products WHERE Product_Name='$product_name' LIMIT 1");
	$productMatch = mysql_num_rows($sql); // count the output amount
    if ($productMatch > 0) {
		echo 'Sorry you tried to place a duplicate "Product Name" into the system, <a href="inventory_list.php">click here</a>';
		exit();
	}
	// Add this product into the database now
	$sql = mysql_query("INSERT INTO products (Product_Name, Price, Description, Category, SubCategory, Brand, cat_id, SKU, Stock, Cost, date_added) 
        VALUES('$pid', '$product_name','$price','$details','$category','$subcategory','$brand','$cat_id','$sku','$stock','$cost',now())") or die (mysql_error());
	// Place image in the folder 
	$newname = "$product_name.png";
	move_uploaded_file( $_FILES['fileField']['tmp_name'], "../img/$newname");
	header("location: inventory_list.php"); 
    exit();
}

// This block grabs the whole list for viewing
$product_list = "";
$sql = mysql_query("SELECT * FROM products ORDER BY date_added DESC");
$productCount = mysql_num_rows($sql); // count the output amount
if ($productCount > 0) {
	while($row = mysql_fetch_array($sql)){ 
            $id = $row["id"];
	    $product_name = $row["Product_Name"];
            $price = $row["Price"];
	    $date_added = strftime("%b %d, %Y", strtotime($row["date_added"]));
	    $product_list .= "Product ID: $id - <strong>$product_name</strong> - $$price - <em>Added $date_added</em> &nbsp; &nbsp; &nbsp; <a href='inventory_edit.php?pid=$id'>edit</a> &bull; <a href='inventory_list.php?deleteid=$id'>delete</a><br />";
    }
} else {
	$product_list = "You have no products listed in your store yet";
}

/**
 * User not an administrator or privileged, redirect to main page
 * automatically.
 */
if(!$session->isAdmin()){
   header("Location: home.php");
}
else{
/**
 * Administrator is viewing page, so display all
 * forms.
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />        
        <title>Sportopia Admin Page</title>
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
                        <div class="align_right"><a href="inventory_list.php#inventoryForm">+ Add New Inventory Item</a></div>
                          <h2>Inventory list</h2>
                          <?php echo $product_list; ?>
                        <br/>
                        <hr />
                        <a name="inventoryForm" id="inventoryForm"></a>
                        <h3 class="center">&darr; Add New Inventory Item Form &darr;</h3>
                        <form action="inventory_list.php" enctype="multipart/form-data" name="myForm" id="myform" method="post">
                            <label>Product Name</label>
                            <input name="Product_Name" type="text" id="Product_Name" size="64" />
                                <br />
                            <label>Brand</label>
                            <input name="Brand" type="text" id="Brand" size="30" />
                                <br />
                            <label>Product Price</label>
                            <span>$</span><input name="Price" type="text" id="Price" size="12" />
                                <br />
                            <label>Cost</label>
                            <span>$</span><input name="Cost" type="text" id="Cost" size="12" />
                                <br />
                            <label>Stock</label>
                            <input name="Stock" type="text" id="Stock" size="12" />
                                <br />
                            <input name="SKU" type="hidden" id="SKU" size="12" value="<?php echo $id+1 ?>" />
                            <label>Category</label>
                              <select name="Category" id="Category">
                              <option value="Baseball">Baseball</option>
                              <option value="Basketball">Basketball</option>
                              <option value="Equipment">Equipment</option>
                              <option value="Football">Football</option>
                              <option value="Hockey">Hockey</option>
                              <option value="Men's Apparel">Men's Apparel</option>
                              <option value="Men's Footwear">Men's Footwear</option>
                              </select>
                                <br />
                            <label>Category ID</label>
                              <select name="cat_id" id="cat_id">
                              <option value="6">Baseball</option>
                              <option value="1">Basketball</option>
                              <option value="5">Equipment</option>
                              <option value="2">Football</option>
                              <option value="7">Hockey</option>
                              <option value="4">Men's Apparel</option>
                              <option value="3">Men's Footwear</option>
                              </select>
                                <br />
                            <label>Subcategory</label>
                            <select name="SubCategory" id="SubCategory">
                                <option value=""></option>
                                <option value="Athletic/Training">Athletic/Training</option>
                                <option value="Basketballs">Basketballs</option>
                                <option value="Footballs">Footballs</option>
                                <option value="Mouthguards">Mouthguards</option>
                                <option value="Hats">Hats</option>
                                <option value="Helmets">Helmets</option>
                                <option value="Running">Running</option>
                                <option value="Pants">Pants</option>
                                <option value="Shirts">Shirts</option>
                                <option value="Sweatshirts/Hoodies">Sweatshirts/Hoodies</option>
                            </select>
                                <br />
                            <label>Product Details</label>
                            <textarea name="Description" id="Description" cols="64" rows="5"></textarea>
                                <br />
                            <label>Product Image</label>
                            <input type="file" name="fileField" id="fileField" />
                                <br/>      
                            <label>&nbsp;</label>
                              <input type="submit" name="button" id="button" value="Add This Item Now" />
                                <br />
                        </form>
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
<?php
}
?>