<?php
include("include/session.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />        
        <title>Sportopia Background</title>
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
                            <h1>Background Page</h1>    
                            <br />
			    <h2>Tim Paone</h2>
			    <img src="img/tim.png" alt="Timprofile"/>
                            <p>
				Tim was responsible for the management of the group once he was appointed Dictator and Supreme Emperor of Group 04 once Joe Wilson stepped down.  Tim's jobs on the Sportopia e-Commerce site were the Use Cases, Background Page, Business Polices, and of course keeping the group as a whole on task and in contact with one another.  
				
                            </p>
			    <br />
			    <h2>Frank Fitzgerald</h2>
			    <img src="img/frank.png" alt="Frankprofile"/>
			    <p>
                                Frank was the designer of the basis for our website.  His tasks were the login system, CRUD operations, mobile view capabilities and the validation of the site to make it more secure.
				
                            </p>
			    <br />
			    <h2>Kyle Cartechine</h2>
			    <img src="img/kyle.png" alt="Kyleprofile"/>
                            <p>
                                Kyle's tasks included creating the cart system for which all our e-Commerce would be based around.  He then also had to integrate that cart into the site.
				
                            </p>
			    <br />
			    <h2>Joe Wilson</h2>
			    <img src="img/joe.png" alt="Joeprofile"/>
			    <p>
                                Joe's tasks following his overthrow of power became the operations of setting up a rating system as well as the recommendations for the items in the catalog.
				
                            </p>
			    <br />
			    <h2>Brian Shields</h2>
			    <img src="img/brian.png" alt="Joeprofile"/>
			    <p>
                                Brian's tasks included developing a search function for Sportopia as well as integrating Google Analytics and good Quality SEO into Sportopia.
				
                            </p>
			    <br />
			    <h1>Corporate Headquarters</h1>
			    <p>
				Address: 555 East Church St.
				<br />  City:      Orlando FL, 32833
				<br />  email: Sportopia@sportopia.com
				<br />  Phone: 407-555-5555
				<br />  
				
				
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