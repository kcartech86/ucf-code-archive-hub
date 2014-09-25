<?php
include("include/session.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />        
        <title>Sportopia Policies</title>
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
                        <div class="content_bg">
                            <h1>Business Policies</h1>    
                            <br />
			    <p>
				Sportopia is a new e-Commerce site that is looking to provide a quality service to all customers and guests.  The policies that Sportopia will adhere to are in interest in providing that service and also to prevent any fraud that may harm the business or our customers.
				<br />
				<br />
				<h2 class="policies">Shipping Rate Charges</h2>
				<br />
				Sportopia will charge a shipping rate that will vary on the weight of the order.  This shipping rate will be calculated once the customer chooses to proceed with the order.  The rate will start at a flat fee of $3.00 and increase from there based on the weight of the order.  
				<br />
				<br />
				<h2 class="policies">Tax Policy</h2>
				<br />
				A sales tax will be applied based on the state to where the order is being shipped.
				<br />
				<br />
				<h2 class="policies">Return Policy</h2>
				<br />
				Sportopia will have strict NO RETURN policy.  All product sales are final and may not be returned after they have been purchased.  Being an Internet only company we do not have a store to which these items may be returned which is why returns are not accepted at Sportopia.
				<br />
				<br />
				<h2 class="policies">Privacy Policy</h2>
				<br />
				Sportopia strives to keep all customer information private and secure.  Any information collected from the site will not be shared with any 3rd party businesses.
				<br />
                                By opening an account on Sportopia you are agreeing to give your name and shipping address. Your account data will not be shared with anyone.  The data you provide us with is only for us to store to allow easier access for you, our customer.  Should the time come when you have forgotten your password you will be  able to have it emailed to you by entering your email address into the proper location.  
				<br />
				<br />
				<h2 class="policies">Security Statement</h2>
				<br />
				E-commerce is all about trust and we at Sportopia will strive to earn that trust by keeping your information completely private.  We plan to keep all the information we take in extremely private and will not release any information to any other parties.  Our goal is to prevent any  information from being hacked or intercepted and will employ the proper strategies to do this.  The only circumstance in which we will release information is to cooperate with the Government of the United States or affiliated authorities. 
			    </p>
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