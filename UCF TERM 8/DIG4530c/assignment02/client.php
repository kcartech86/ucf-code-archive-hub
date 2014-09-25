<?
$mysqli = new mysqli("localhost", ky775779, '$ull3y**', ky775779);
	if($mysqli->error) {
		print "Error connecting! Message:".$mysqli->error;
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sportopia Client - Kyle Cartechine</title>
<style type="text/css">
	@import url("css/resetstyles.css");
	@import url("css/styles.css");
</style>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
<script type="text/javascript" src="js/sportopia_script.js"></script>
</head>
<body>
	<div id="container">
		<div id="header">
			<img src="img/logo.png" alt="Sportopia" />
			<form name="log_in" action="log_in.php" method="post">
			<div id="login">
				<div id="username">
					<label>Username</label>
					<input name="username" type="text" />
				</div>
				<div id="password">
					<label>Password</label>
					<input type="password" name="password" />
				</div>
			</div>
			<div id="sign_on">
				<input id="submit" type="submit" name="submit" value="Sign On" />
			</div>
			</form>
		</div><!-- end header -->
		<div id="content">
        	<div id="navigation">
            	<ul>
                	<li><a href="home.php">Home</a></li>
                    <li><a href="catalog.php">Catalog</a></li>
                    <li><a href="client.php">My Account</a></li>
					<li><a href="admin.php">Admin</a></li>
                </ul>
				<div id="search_box">
				<form name="search_box" method="post" action="search.php">
					<input type="text" name="search_input"  />
					<input type="submit" name="search_submit" value="Search"  />
				</form>
				</div>
			</div>
            <div id="sidebar">
                <div id="cart">
					<p><a href="cart.php"> Cart</a></p>
					<hr />
					<p>0 Items</p>
                </div>
                <div id="sub_navigation">
					<p>Browse Our Sporting Goods</p>
					<hr />
                	<ul>
						<li>Fitness</li>
                    	<li>Leisure</li>
                        <li>Sports</li>
 						<li>All</li>
                    </ul>
                </div>
            </div>
            <div id="account_settings">
			<h3>My Account Settings</h3>
			<table id="account_settings_table">
				<tr>
					<td>
						Username:
					</td>
					<td>
					</td>
					<td>
						<a href="edit_account.php">Edit</a>
					</td>
				</tr>
				<tr>
					<td>
						Password:
					</td>
					<td>
					</td>
					<td>
						<a href="edit_account.php">Edit</a>
					</td>
				</tr>
				<tr>
					<td>
						Name:
					</td>
					<td>
					</td>
					<td>
						<a href="edit_account.php">Edit</a>
					</td>
				</tr>
				<tr>
					<td>
						Address:
					</td>
					<td>
					</td>
					<td>
						<a href="edit_account.php">Edit</a>
					</td>
				</tr>
				<tr>
					<td>
						Phone:
					</td>
					<td>
					</td>
					<td>
						<a href="edit_account.php">Edit</a>
					</td>
				</tr>
			</table>
           	</div>
        </div>
		<div id="footer">
			<p>This site is not official and is an assignment for a UCF Digital Media course.  Designed by Kyle Cartechine.</p>
            <p>
    <a href="http://validator.w3.org/check?uri=referer"><img
      src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Transitional" height="31" width="88" /></a>
  </p>
  
		</div>
	</div>
</body>
</html>

<? $mysqli->close(); ?>