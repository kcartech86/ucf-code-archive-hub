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
<title>Sportopia Cart - Kyle Cartechine</title>
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
            <div id="items_list">
            	<h3 class="margin_bot">In Your Cart: </h3>
				<?
				$select_query = "SELECT prod_name, description, sku, price, thumb_img, stock, rank FROM products"; 
				$select_result = $mysqli->query($select_query);
				if($mysqli->error) {
					print "Select query error!  Message: ".$mysqli->error;
				}
				while($row = $select_result->fetch_object()) {?>
                <div class="product">
					<table class="product_table">
						<tr>
							<td rowspan="4" class="product_thumb">
								<?if(empty($row->thumb_img)){print"No Image";}else{print '<img src="'.$row->thumb_img.'" alt="product image" />';}?>
							</td>
							<td colspan="2" class="product_name">
								<?if(empty($row->prod_name)){print"No Name";}else{print $row->prod_name;}?>
							</td>
						</tr>
						<tr>
							<td class="product_price">
								<p class="label">Price:</p><p class="inline"><?if(empty($row->price)){print" No Price Listed";}else{print " \$".sprintf("%.2f",$row->price);}?></p>
							</td>
							<td class="product_stock">
								<p class="label">Stock:</p><p class="inline"><?if(empty($row->stock)){print" Unknown Stock";}else{print " ".$row->stock;}?></p>
							</td>
						</tr>
						<tr>
							<td colspan="2" class="product_description">
								<?if(empty($row->description)){print"No Description";}else{print $row->description;}?>
							</td>
						</tr>
						<tr>
							<td>
								<p class="label">Rank: </p>
								<?
									if(empty($row->rank)){print"Not Yet Ranked";}
									else if ($row->rank == 1) {?>
										<img src="img/goldstar.png" alt="goldstar" /><?
									}else if ($row->rank == 2) {?>
										<img src="img/goldstar.png" alt="goldstar" />
										<img src="img/goldstar.png" alt="goldstar" /><?
									}else if ($row->rank == 3) {?>	
										<img src="img/goldstar.png" alt="goldstar" />
										<img src="img/goldstar.png" alt="goldstar" />
										<img src="img/goldstar.png" alt="goldstar" /><?
									}else if ($row->rank == 4) {?>	
										<img src="img/goldstar.png" alt="goldstar" />
										<img src="img/goldstar.png" alt="goldstar" />
										<img src="img/goldstar.png" alt="goldstar" />
										<img src="img/goldstar.png" alt="goldstar" /><?
									}else if ($row->rank == 5) {?>	
										<img src="img/goldstar.png" alt="goldstar" />
										<img src="img/goldstar.png" alt="goldstar" />
										<img src="img/goldstar.png" alt="goldstar" />
										<img src="img/goldstar.png" alt="goldstar" />
										<img src="img/goldstar.png" alt="goldstar" />
									<? } ?>
							</td>
							<td class="atc_form"> 
								<form name="cart_edit_<?$row->product_id;?>" action="atc.php" method="post">
								<input type="text" name="edit_quantity" value="1" size="3" />
								<input type="submit" name="cart_edit_submit" value="Edit Quantity" />
								</form>
							</td>
						</tr>
						<tr>
							<td colspan="3">
								<hr />
							</td>
						</tr>
					</table>
                </div>
				<? } ?>
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