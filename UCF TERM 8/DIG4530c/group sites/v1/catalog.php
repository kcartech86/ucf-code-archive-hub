<?php
// Check to see the URL variable is set and that it exists in the database
if (isset($_GET['id'])) {
    // Connect to the MySQL database  
    include "include/session.php"; 
	$id = preg_replace('/^[^\d]*$/', '', $_GET['id']);
        //process  rating submission
        if ($_POST['submit'])
        {
                $id_post = $id;
                $rating_post = $_POST['rating'];
                
                $get = mysql_query("SELECT * FROM products WHERE id='$id_post'");	
                $get = mysql_fetch_assoc($get);
                $get = $get['rating'];
                
                if ($get==0)
                        $newrating = $get + $rating_post;
                else
                        $newrating = ($get + $rating_post)/2;
                
                $update = mysql_query("UPDATE products SET rating='$newrating' WHERE id='$id_post'");
                
        }
        if ($id=='1'){
            include('guestbook_nike_basketball.php');
        }else if($id=='2'){
            include('guestbook_nike_football.php');
        }else if ($id=='3'){
            include('guestbook_wilson_football.php');
        }else if($id=='4'){
            include('guestbook_schutt_helmet.php');
        }else if ($id=='5'){
            include('guestbook_reebok_zig.php');
        }else if($id=='6'){
            include('guestbook_ua_crew.php');
        }else if ($id=='7'){
            include('guestbook_ua_hoody.php');
        }else if($id=='8'){
            include('guestbook_ua_pant.php');
        }else if ($id=='9'){
            include('guestbook_ua_hat.php');
        }else if($id=='10'){
            include('guestbook_nike_mouthguard.php');
        }
	// Use this var to check to see if this ID exists, if yes then get the product 
	// details, if no then exit this script and give message why
	$sql = mysql_query("SELECT * FROM products WHERE id='$id' LIMIT 1");
	$productCount = mysql_num_rows($sql); // count the output amount
    if ($productCount > 0) {
		// get all the product details
		while($row = mysql_fetch_array($sql)){ 
			 $product_name = $row["Product_Name"];
			 $price = $row["Price"];
			 $details = $row["Description"];
			 $category = $row["Category"];
			 $subcategory = $row["SubCategory"];
                         $product_image = $row["Product Image"];
                         $rating = $row["rating"];
			 $date_added = strftime("%b %d, %Y", strtotime($row["date_added"]));
                }           
		 
    } else {
		echo "That item does not exist.<br />";
                echo "<a href='home.php'>Go Back to Home Page</a>";
	    exit();
    }
		
} else if (!isset($_GET['category'])) {
        // Connect to the MySQL database 
        include "include/session.php"; 
        $dynamicList="";
	$sql = mysql_query("SELECT Category, cat_id FROM products");
	$productCount = mysql_num_rows($sql); // count the output amount
        if ($productCount > 0) {
		// get all the product details
		while($row = mysql_fetch_array($sql)){
                    $category_id = $row["cat_id"];
                    $category = $row["Category"];
                    if ($category!=$prevcategory){
                        $prevcategory = $category;
                        $dynamicList .= '
                        <div class="grid_3 prefix_1">
                          <div><h1 class="cat_header">' . $category . '</h1><br />
                            <a href="catalog.php?category=' . $category_id . '"><img class="featured" src="img/'.$category.'.png" alt="' . $category . '" /></a><br />
                            <a href="catalog.php?category=' . $category_id . '">View Category</a></div>
                            <br />
                        </div>';
                    }
                }
        }
} else if (isset($_GET['category'])) {
        // Connect to the MySQL database
        include "include/session.php"; 
	$category_id = preg_replace('/^[^\d]*$/', '', $_GET['category']); 
	// Use this var to check to see if this ID exists, if yes then get the product 
	// details, if no then exit this script and give message why 
        $dynamicList="";
	$sql = mysql_query("SELECT * FROM products WHERE cat_id='$category_id'");
	$productCount = mysql_num_rows($sql); // count the output amount
        if ($productCount > 0) {
                while($row = mysql_fetch_array($sql)){
                    $id = $row["id"];
                    $product_name = $row["Product_Name"];
                    $price = $row["Price"];
                    $details = $row["Description"];
                    $category = $row["Category"];
                    $subcategory = $row["Sub-Category"];
                    $product_image = $row["Product Image"];
                    $date_added = strftime("%b %d, %Y", strtotime($row["date_added"]));
                    $dynamicList .= '
                <div class="grid_3 prefix_1">
                  <div><a href="catalog.php?id=' . $id . '"><img class="featured" src="'.$product_image.'" alt="' . $product_name . '" /></a></div>
                  <div><h3>' . $product_name . '</h3>
                    $' . $price . '<br />
                    <a href="catalog.php?id=' . $id . '">View Product Details</a></div>
                    <br />
                </div>';
            }
        } else {
                $dynamicList = "We have no products listed in our store yet";
        }
}
mysql_close();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />        
        <title>Sportopia Catalog</title>
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
                                    <input id="searchSubmit" type="submit" name="searchSubmit" value="Search"/>
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
                        <div class="content_bg">
                            <?php
                            if (isset($_GET['id'])) {
                            ?>
                                <h1><?php echo $product_name; ?></h1>
                                <img src="<?php echo $product_image; ?>" class="catalog_img" alt="<?php echo $product_name; ?>" /><br />
                                <a href="<?php echo $product_image; ?>" target="_blank">View Full Size Image</a><br />
                                    <br />
                                    <p>
                                        <?php echo "Price: $".$price; ?><br />
                                        <br />
                                        <?php echo "Category: ".$category. "<br />SubCategory: " .$subcategory; ?> <br />
                                        <br />
                                        <?php echo "Description: ".$details; ?> <br />
                                        <br />
                                        <?php echo 'Rating: '; printf("%0.1f",$rating); echo '/5'; ?> <br />
                                        <br />
                                    </p>
                                    <?php
                                    if($session->logged_in){
                                        include("rate.php");
                                    }else{
                                        echo "<span class='bold'>Login to Rate!</span>";
                                    }
                                    ?>
                                        <br />
                                        <br />
                                  <form id="form1" name="form1" method="post" action="cart.php">
                                    <input type="hidden" name="pid" id="pid" value="<?php echo $id; ?>" />
                                    <input type="submit" name="button" id="button" value="Add to Shopping Cart" />
                                  </form>
                                  <br />
                                    <?php
                                        if ($product_name=="Nike Pro Basketball"){
                                            echo $nikebasketball_post;
                                        }else if($product_name=="Nike Pro Football"){
                                            echo $nikefootball_post;
                                        }else if($product_name=="Wilson TDJ Junior Composite Leather Football"){
                                            echo $wilsonfootball_post;
                                        }else if($product_name=="Schutt Youth Football Helmet"){
                                            echo $schutthelmet_post;
                                        }else if($product_name=="Reebok Men's ZigDynamic Running Shoes"){
                                            echo $reebokshoe_post;
                                        }else if($product_name=="Under Armour Men's Bolt Football Crew"){
                                            echo $uacrew_post;
                                        }else if($product_name=="Under Armour Men's AF Schoolyard Hoody II"){
                                            echo $uahoody_post;
                                        }else if($product_name=="Under Armour Men's Transit Woven Pant"){
                                            echo $uapant_post;
                                        }else if($product_name=="Under Armour Attain Plaid Hat"){
                                            echo $uahat_post;
                                        }else if($product_name=="Nike Intake Convertible Mouthguard"){
                                            echo $nikemouthguard_post;
                                        }
                                    if($session->logged_in){
                                        include('guestbook.php');
                                    }else{
                                        echo "<br/><span class='bold'>Login to Comment!</span>";
                                    }
                                    ?>
                            <?php
                            }else{
                                echo $dynamicList;
                            }
                            ?>
                        <br />
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