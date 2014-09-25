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
<title>Sportopia Admin - Kyle Cartechine</title>
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
            <div id="admin_content">
				<h3>Administrative Control Page</h3>
				<ul class="admin_ul">
					<li><h4>Insert New Product  </h4><img src="img/plus.png" alt="expand/collaspe button" /></li>
				</ul>
				<div id="insert">
					<form name="insert_item" action="database.php" method="post">
					<div>
						<label>Name:</label>
						<input name="insert_item_name" type="text" />
					</div>
					<div>
						<label>Description:</label>
						<input name="insert_item_description" type="text" />
					</div>
					<div>
						<label>Category:</label>
						<input name="insert_item_category" type="text" />
					</div>
					<div>
						<label>SKU:</label>
						<input name="insert_item_sku" type="text" />
					</div>
					<div>
						<label>Cost:</label>
						<input name="insert_item_cost" type="text" />
					</div>
					<div>
						<label>Price:</label>
						<input name="insert_item_price" type="text" />
					</div>
					<div>
						<label>Image Url:</label>
						<input name="insert_item_image" type="text" />
					</div>
					<div>
						<label>Thumb Url:</label>
						<input name="insert_item_thumb" type="text" />
					</div>
					<div>
						<label>Item Stock:</label>
						<input name="insert_item_stock" type="text" />
					</div>
					<input name="insert_item_submit" type="submit" value="Insert" />
					</form>
				</div>
				<ul class="admin_ul">
					<li><h4>Delete Product  </h4><img src="img/plus.png" alt="expand/collaspe button" /></li>
				</ul>
				<div id="delete">
					<form name="delete_item" action="database.php" method="post">
					<label>Product:</label>
					<select name="item_to_delete">
						<option></option>
					</select>
					<input name="delete_item_submit" type="submit" value="Delete" />
					</form>
				</div>
				<ul class="admin_ul">
					<li><h4>Update Product  </h4><img src="img/plus.png" alt="expand/collaspe button" /></li>
				</ul>
				<div id="update">
					<form name="update_item" action="database.php" method="post">
					<label>Product:</label>
					<select name="item_to_update">
						<option></option>
					</select>
					<input name="update_item_submit" type="submit" value="Update" />
					</form>
				</div>
				<ul class="admin_ul">
					<li><h4>Change the Featured Product  </h4><img src="img/plus.png" alt="expand/collaspe button" /></li>  
				</ul>
				<div id="featured">
					<form name="featured_item" action="database.php" method="post">
					<label>Product:</label>
					<select name="item_to_feature">
						<option></option>
					</select>
					<input name="update_featured_item" type="submit" value="Change" />
					</form>
				</div>
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