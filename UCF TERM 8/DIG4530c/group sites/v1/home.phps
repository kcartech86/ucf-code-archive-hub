<?php
include("include/session.php");
$dynamicList = "";
$sql = mysql_query("SELECT * FROM products ORDER BY date_added DESC LIMIT 1");
$productCount = mysql_num_rows($sql); // count the output amount
if ($productCount > 0) {
    while($row = mysql_fetch_array($sql)){ 
            $id = $row["id"];
            $product_name = $row["Product_Name"];
            $price = $row["Price"];
            $product_image = $row["Product Image"];
            $date_added = strftime("%b %d, %Y", strtotime($row["date_added"]));
            $dynamicList .= '
        <div class="img_featured">
          <div><a href="catalog.php?id=' . $id . '"><img class="featured" src="'.$product_image.'" alt="' . $product_name . '" /></a></div>
          <div class="prod_info"><h2>' . $product_name . '</h2>
            $' . $price . '<br />
            <a href="catalog.php?id=' . $id . '">View Product Details</a></div>
        </div>';
    }
} else {
    $dynamicList = "We have no products listed in our store yet";
}
mysql_close();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />        
        <title>Sportopia Home</title>
        <style type="text/css">
            @import url("css/reset.css");
            @import url("css/960.css");
            @import url("css/styles.css");
        </style>
        <link rel="icon" href="img/favicon.png" />
    <script type="text/javascript">
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-26555737-1']);
        _gaq.push(['_trackPageview']);
        (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
        })();
    </script>
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
                        <a class="button" href="cart.php">Cart: <?php echo count($_SESSION["cart_array"]) ?></a>
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
                            <h1 class="title">Featured Product</h1>    
                            <?php echo $dynamicList; ?><br />
                            <h1 class="title">Welcome to Sportopia</h1>
                            <p class="p_info">
                                Our mission statement at Sportopia is to provide
                                our customers with the best equipment they can buy.
                                We strive to keep our prices competitive and as
                                cheap as possible. We consider ourselves the best in
                                the market for sports, fitness, and training
                                equipment and want to prove that to our customers.
                                We carry all the major sports, fitness, and training
                                equipment on the market. Search for it and we'll
                                have it on our website. We carry football, hockey,
                                basketball, soccer, baseball, and many other
                                sporting equipment goods you need. We also carry
                                every type of equipment in youth, men's, and women's
                                sizes. If you're looking to workout or train we
                                carry the top fitness and training equipment in the
                                industry at the cheapest prices. If you're looking
                                for casual sporting goods we have those too. We
                                carry flag football equipment and street hockey
                                equipment. If we don't carry a product, feel free to
                                send us an e-mail and we'll take into consideration
                                keeping it in stock. We at Sportopia hope to gain
                                your business and trust. We hope you make us your
                                first stop for your sports, fitness, and training
                                equipment needs.
                            </p>
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