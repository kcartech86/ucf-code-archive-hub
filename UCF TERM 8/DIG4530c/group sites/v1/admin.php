<?
/**
 * Admin.php
 *
 * This is the Admin Center page. Only adminisdivators
 * are allowed to view this page. This page displays the
 * database table of users and banned users. Admins can
 * choose to delete specific users, delete inactive users,
 * ban users, update user levels, etc.
 */
include("include/session.php");

/**
 * displayUsers - Displays the users database table in
 * a nicely formatted html table.
 */
function displayUsers(){
   global $database;
   $q = "SELECT username,userlevel,email,timestamp "
       ."FROM ".TBL_USERS." ORDER BY userlevel DESC,username";
   $result = $database->query($q);
   /* Error occurred, return given name by default */
   $num_rows = mysql_numrows($result);
   if(!$result || ($num_rows < 0)){
      echo "Error displaying info";
      return;
   }
   if($num_rows == 0){
      echo "Database table empty";
      return;
   }
   /* Display table contents */
   echo "<div class=\"table\">";
   echo "<div><span class=\"user_column\"><b>Username</b></span><span class=\"user_level_column\"><b>Level</b></span><span class=\"user_column\"><b>Email</b></span><span class=\"user_column\"><b>Last Active</b></span></div><br/>";
   for($i=0; $i<$num_rows; $i++){
      $uname  = mysql_result($result,$i,"username");
      $ulevel = mysql_result($result,$i,"userlevel");
      $email  = mysql_result($result,$i,"email");
      $time   = mysql_result($result,$i,"timestamp");

      echo "<div><span class=\"user_column\">$uname</span><span class=\"user_level_column\">$ulevel</span><span class=\"user_column\">$email</span><span class=\"user_column\">$time</span></div><br/>";
   }
   echo "</div><br/>";
}

/**
 * displayBannedUsers - Displays the banned users
 * database table in a nicely formatted html table.
 */
function displayBannedUsers(){
   global $database;
   $q = "SELECT username,timestamp "
       ."FROM ".TBL_BANNED_USERS." ORDER BY username";
   $result = $database->query($q);
   /* Error occurred, return given name by default */
   $num_rows = mysql_numrows($result);
   if(!$result || ($num_rows < 0)){
        echo "<div class=\"table\">";
        echo "<p>Error displaying info</p>";
        echo "</div><br />";
        return;
   }
   if($num_rows == 0){
        echo "<div class=\"table\">";
        echo "<p>Database table empty</p>";
        echo "</div><br />";
        return;
   }
   /* Display table contents */
   echo "<div class=\"table\">";
   echo "<div><span class=\"column\"><b>Username</b></span><span class=\"column\"><b>Time Banned</b></span></div><br/>";
   for($i=0; $i<$num_rows; $i++){
      $uname = mysql_result($result,$i,"username");
      $time  = mysql_result($result,$i,"timestamp");

      echo "<div><span class=\"column\">$uname</span><span class=\"column\">$time</span></div>";
   }
   echo "</div><br />";
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
                        <!--<span>Logged in as: <h1><? echo $session->username; ?></h1></span><br /><br />-->
                        <h1>Admin Center</h1><br />
                        <?
                        if($form->num_errors > 0){
                           echo "<span class=\"error\">"
                               ."!*** Error with request, please fix</span><br /><br />";
                        }
                        ?>
                        <?
                        if($session->userlevel == ADMIN_LEVEL || $session->username == ADMIN_NAME){
                        ?>
                        <a href="inventory_list.php" title="Manage Inventory">Manage Inventory</a>
                            <div class="table">
                                    <?
                                    /**
                                     * Display Users Table
                                     */
                                    ?>
                                    <h3>Users Table Contents:</h3>
                                    <?
                                    displayUsers();
                                    ?>
                            </div>
                                <br />
                                <?
                                /**
                                 * Update User Level
                                 */
                                ?>
                            <div class="table">
                                <h3>Update User Level</h3>
                                <div class="table">
                                    <? echo $form->error("upduser"); ?>
                                    <form action="adminprocess.php" method="post">
                                    <span>Username:</span>
                                    <input type="text" name="upduser" maxlength="30" value="<? echo $form->value("upduser"); ?>"/>
                                    <span>Level:</span>
                                    <select name="updlevel">
                                        <option value="1">1</option>
                                        <option value="5">5</option>
                                        <option value="9">9</option>
                                    </select>
                                    <br />
                                    <input type="hidden" name="subupdlevel" value="1"/>
                                    <input type="submit" value="Update Level"/>
                                    </form>
                                </div>
                            </div>
                                <br />
                                <?
                                /**
                                 * Delete User
                                 */
                                ?>
                            <div class="table">
                                <h3>Delete User</h3>
                                <div class="table">
                                    <? echo $form->error("deluser"); ?>
                                    <form action="adminprocess.php" method="post">
                                    Username:<br />
                                    <input type="text" name="deluser" maxlength="30" value="<? echo $form->value("deluser"); ?>"/>
                                    <input type="hidden" name="subdeluser" value="1"/>
                                    <input type="submit" value="Delete User"/>
                                    </form>
                                </div>
                            </div>
                                <br />
                                <?
                                /**
                                 * Delete Inactive Users
                                 */
                                ?>
                            <div class="table">
                                <h3>Delete Inactive Users</h3>
                                <div class="table">
                                    <p>This will delete all users (not administrators), who have not logged in to the site<br />
                                    within a certain time period. You specify the days spent inactive.</p><br />
                                    <form action="adminprocess.php" method="post">
                                    Days:<br />
                                    <select name="inactdays">
                                        <option value="3">3</option>
                                        <option value="7">7</option>
                                        <option value="14">14</option>
                                        <option value="30">30</option>
                                        <option value="100">100</option>
                                        <option value="365">365</option>
                                    </select>
                                    <br />
                                    <input type="hidden" name="subdelinact" value="1"/>
                                    <input type="submit" value="Delete All Inactive"/>
                                    </form>
                                </div>
                            </div>
                                <br />
                                <?
                                /**
                                 * Ban User
                                 */
                                ?>
                            <div class="table">
                                <h3>Ban User</h3>
                                <div class="table">
                                    <? echo $form->error("banuser"); ?>
                                    <form action="adminprocess.php" method="post">
                                    <span>Username:</span><br />
                                    <input type="text" name="banuser" maxlength="30" value="<? echo $form->value("banuser"); ?>"/>
                                    <input type="hidden" name="subbanuser" value="1"/>
                                    <input type="submit" value="Ban User"/>
                                    </form>
                                </div>
                            </div>
                                <br/>
                                <?
                                /**
                                 * Display Banned Users Table
                                 */
                                ?>
                            <div class="table">
                                <h3>Banned Users Table Contents:</h3>
                                    <?
                                    displayBannedUsers();
                                    ?>
                            </div>
                                <br />
                                <?
                                /**
                                 * Delete Banned User
                                 */
                                ?>
                            <div class="table">
                                <h3>Delete Banned User</h3>
                                <div class="table">
                                    <? echo $form->error("delbanuser"); ?>
                                    <form action="adminprocess.php" method="post">
                                    Username:<br />
                                    <input type="text" name="delbanuser" maxlength="30" value="<? echo $form->value("delbanuser"); ?>"/>
                                    <input type="hidden" name="subdelbanned" value="1"/>
                                    <input type="submit" value="Delete Banned User"/>
                                    </form>
                                </div>
                            </div>
                        <?
                        }else{
                        ?>
                            <a href="inventory_list.php" title="Manage Inventory">Manage Inventory</a>
                        <?php
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
<?
}
?>

