<?
/**
 * Register.php
 * 
 * Displays the registration form if the user needs to sign-up,
 * or lets the user know, if he's already logged in, that he
 * can't register another name.
 */
include("include/session.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />        
        <title>Sportopia Register</title>
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
                        <?
                        /**
                         * The user is already logged in, not allowed to register.
                         */
                        if($session->logged_in){
                           echo "<h1>Registered</h1>";
                           echo "<p>We're sorry <b>$session->username</b>, but you've already registered. "
                               ."<a href=\"home.php\">Home</a>.</p>";
                        }
                        /**
                         * The user has submitted the registration form and the
                         * results have been processed.
                         */
                        else if(isset($_SESSION['regsuccess'])){
                           /* Registration was successful */
                           if($_SESSION['regsuccess']){
                              echo "<h1>Registered!</h1>";
                              echo "<p>Thank you <b>".$_SESSION['reguname']."</b>, your information has been added to the database, "
                                  ."you may now <a href=\"home.php\">log in</a>.</p>";
                           }
                           /* Registration failed */
                           else{
                              echo "<h1>Registration Failed</h1>";
                              echo "<p>We're sorry, but an error has occurred and your registration for the username <b>".$_SESSION['reguname']."</b>, "
                                  ."could not be completed.<br/>Please try again at a later time.</p>";
                           }
                           unset($_SESSION['regsuccess']);
                           unset($_SESSION['reguname']);
                        }
                        /**
                         * The user has not filled out the registration form yet.
                         * Below is the page with the sign-up form, the names
                         * of the input fields are important and should not
                         * be changed.
                         */
                        else{
                        ?>
                        
                        <h1>Register</h1>
                        <?
                        if($form->num_errors > 0){
                           echo "<div class=\"error\">".$form->num_errors." error(s) found</div>";
                        }
                        ?>
                        <form action="process.php" method="post">
                            <div>
                                <div>Username:</div>
                                <div><input type="text" name="user" maxlength="30" value="<? echo $form->value("user"); ?>" /></div>
                                <div><? echo $form->error("user"); ?></div>
                            </div>
                            <div>
                                <div>Password:</div>
                                <div><input type="password" name="pass" maxlength="30" value="<? echo $form->value("pass"); ?>" /></div>
                                <div><? echo $form->error("pass"); ?></div>
                            </div>
                            <div>
                                <div>Email:</div>
                                <div><input type="text" name="email" maxlength="50" value="<? echo $form->value("email"); ?>" /></div>
                                <div><? echo $form->error("email"); ?></div>
                            </div>
                            <div>
                                <input type="hidden" name="subjoin" value="1" />
                                <input type="submit" value="Join!" />
                            </div>
                        </form>
                        
                        <?
                        }
                        ?>
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
