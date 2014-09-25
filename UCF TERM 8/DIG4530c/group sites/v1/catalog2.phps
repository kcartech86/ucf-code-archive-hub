<?php require 'catalogCode.php';?>

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
                            if($session->logged_in){
                               echo "<p>Welcome $session->username, you are logged in.</p>"
                                   ."<a class=\"button\" href=\"client.php?user=$session->username\">My Account</a>"
                                   ."<a class=\"button\" href=\"clientedit.php\">Edit Account</a>";
                               if($session->isAdmin()){
                                  echo "<a class=\"button\" href=\"admin.php\">Admin Center</a>";
                               }
                               echo "<a class=\"button\" href=\"process.php\">Logout</a>";
                            }
                        }else{
                            echo "<p>Welcome $session->username, you are not logged in.</p>";
                            echo "<a class=\"button\" href=\"login.php\">Login</a>";
                        } ?>
                        <a class="button" href="cart.php">Your Cart</a>
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
                                <input id="searchInput" type="text" name="searchText"/>
                                <input id="searchSubmit" type="submit" name="searchSubmit" value="Search"/>
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
                   <!--cart display -->
                    <?php showProducts(); ?>

                    </div>
                </div>
            </div>
            <div id="footer" class="container_16 clearfix">
                <div class="grid_8">
                        <p>&copy; Copyright 2011 <strong>Sportopia</strong>.  All Rights Reserved.</p>
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