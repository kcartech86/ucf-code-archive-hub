<?
/**
 * UserEdit.php
 *
 * This page is for users to edit their account information
 * such as their password, email address, etc. Their
 * usernames can not be edited. When changing their
 * password, they must first confirm their current password.
 */
include("include/session.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-type" content="text/html;charset=UTF-8" />        
        <title>Sportopia Client Edit</title>
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
                         * User has submitted form without errors and user's
                         * account has been edited successfully.
                         */
                        if(isset($_SESSION['useredit'])){
                           unset($_SESSION['useredit']);
                           
                           echo "<h1>User Account Edit Success!</h1>";
                           echo "<p><b>$session->username</b>, your account has been successfully updated. "
                               ."Back to <a class=\"button\" href=\"home.php\">Home</a></p>";
                        }
                        else{
                        ?>
                        
                        <?
                        /**
                         * If user is not logged in, then do not display anything.
                         * If user is logged in, then display the form to edit
                         * account information, with the current email address
                         * already in the field.
                         */
                        if($session->logged_in){
                        ?>
                        
                        <h1>User Account Edit : <? echo $session->username; ?></h1>
                        <?
                        if($form->num_errors > 0){
                           echo "<span class=\"error\">".$form->num_errors." error(s) found</span>";
                        }
                        ?>
                        <form id="user_form_input" action="process.php" method="post">
                        <div class="grid_5">
                            <span>Current Password:</span>
                            <input type="password" name="curpass" maxlength="30" value="<? echo $form->value("curpass"); ?>"/>
                            <span><? echo $form->error("curpass"); ?></span>
                        </div>
                        <br />
                        <div class="grid_5">
                            <span>New Password:</span>
                            <input type="password" name="newpass" maxlength="30" value="<? echo $form->value("newpass"); ?>"/>
                            <span><? echo $form->error("newpass"); ?></span>
                        </div>
                        <br />
                        <div class="grid_5">
                            <span>Email:</span>
                            <input type="text" name="email" maxlength="50" value="<?
                            if($form->value("email") == ""){
                               echo $session->userinfo['email'];
                            }else{
                               echo $form->value("email");
                            }
                            ?>"/>
                            <span><? echo $form->error("email"); ?></span>
                        </div>
                        <br />
                        <div class="grid_5">
                            <input type="hidden" name="subedit" value="1"/>
                            <input type="submit" value="Edit Account"/>
                        </div>
                        </form>
                        
                        <?
                        }
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
