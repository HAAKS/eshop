<?php
include("includes/db.php");
session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content= "text/html; charset=utf-8">
<title>eShop</title>
<link rel = "stylesheet" href = "style/style.css" media = "all" />
</head>
<body>


<div class= "page">


	
	<div class = "header_part">
	<img src="images/logo.png" style="float:left;">
		<img src="images/2.jpg" style="float:right;">

		
	</div>
	<div id= "bar">
		<ul id = "menu">
		<li><a href = "index.php">Products</a></li>
		<li><?php if (isset($_SESSION['name'])){ ?>
					<a href = "profile.php">My Account</a>
					<?php 
				}
					else { ?>
						<a href = "login.php"> My Account</a>
						<?php

						} ?></li>
<li><?php if (isset($_SESSION['name'])){ ?>
					<a href = "logout.php">Logout</a>
					<?php 
				}
					else { ?>
						<a href = "login.php"> Login/Signup</a>
						<?php

						} ?></li>
		<li><a href = "contactus.html">Contact Us</a></li>



		</ul>

		<div id = "form">
		<form method = "get" action="results.php" enotype = "multipart/form-data">
		<input type = "text" name = "user_query" placeholder = "Search for a Product"/>
		<input type = "submit" name = "search" value= "Search"/>
		</form>

		</div>


	</div>
	<div class = "content"> 


	<div id = "whatsInside"> 
		<div id= "head">

				<div id= "headContent">
				
				<span style = "float:right; font-size: 18px; padding:5px;line-height: 40px;">
				Welcome <?php if (isset($_SESSION['name'])){
					echo $_SESSION['name']."! ";
					}
					else {
						echo "Guest! ";
						} ?><b style= "color:yellow">Shopping Cart:</b> Total Items: 
						<?php 
    $con = mysqli_connect('localhost', 'root', '', 'csen');
        mysql_connect("localhost", "root" ,"");
    mysql_select_db("csen");
    $customerID = $_SESSION['id'];
$countProducts= "SELECT * FROM cart where  cid = $customerID";
$run_items = mysqli_query ($con, $countProducts);
    $x=mysql_query($countProducts);

    $countp =mysql_num_rows($x);
    echo $countp ."; "; 



						?> Total Price: 
	
					<?php 
    $con = mysqli_connect('localhost', 'root', '', 'csen');
    $total = 0;
    $customerID = $_SESSION['id'];
$price= "SELECT * FROM cart where  cid = $customerID";
$run_price = mysqli_query ($con, $price);
while($p = mysqli_fetch_array($run_price)) {
	$pid = $p['pid'];
	$pprice = "SELECT * FROM product WHERE id = $pid";
	$run_product_price = mysqli_query($con,$pprice);
	while($pp_price = mysqli_fetch_array($run_product_price)) {

$product_price = array($pp_price['Price']);

$sumprice = array_sum($product_price);
$total += $sumprice;

	}
}

    echo "£".$total."; "; 



						?> 


						 <a href="shoppingcart.php" style= "color:yellow">Go to cart</a> </span>

		</div>

	</div>
	<div id = "productsBox">
<form action= "" method = "post" enctype ="multipart/form-data">
<table align = "center" width = "700">
<tr align = "center">
<br>
<br>
<br>
	</tr>
	<tr id= "table_head" align="center">
	<th>Remove</th>
	<th>Product (s)</th>
	<th>Price</th>
	</tr>
	
	<?php


    $con = mysqli_connect('localhost', 'root', '', 'csen');
    $total = 0;
    $customerID = $_SESSION['id'];
$price= "SELECT * FROM cart where  cid = $customerID";
$run_price = mysqli_query ($con, $price);
while($p = mysqli_fetch_array($run_price)) {
	$pid = $p['pid'];
	$pprice = "SELECT * FROM product WHERE id = $pid";
	$run_product_price = mysqli_query($con,$pprice);
	while($pp_price = mysqli_fetch_array($run_product_price)) {

$product_price = array($pp_price['Price']);
$product_name = $pp_price['NAME'];
$product_image = $pp_price['ProductImage'];
$single_price = $pp_price['Price'];

$sumprice = array_sum($product_price);
$total += $sumprice;

	?>


<tr id = "table_data" align="center">



<td><input type = "checkbox" name = "remove[]" value= "<?php echo $pid;?>"/></td>
<td> <?php echo $product_name; ?> <br>

<img src = "admin/productImages/<?php echo $product_image ?>" width="80" height = "80" />
</td>
<td> <?php echo "£".$single_price; ?></td>
</tr>

<?php } } ?>

<tr align = "right">
<td id = "table_head" colspan="4"><b>Total Price: <?php echo "£".$total;?></b></td>
<td colspan="4">  </td> 
</tr>

<tr align="center">

<td><input class = "myButton" type="submit" name = "update_cart" value="Update Cart"/></td>
<td><input class = "myButton" type="submit" name = "continue" value="Continue Shopping"/></td>
<td><input class = "myButton" type="submit" name = "checkout" value="CHECKOUT"/></td>





</tr>

</table>
</form>

<?php
    $con = mysqli_connect('localhost', 'root', '', 'csen');
    $customerID = $_SESSION['id'];

if (isset ($_POST['update_cart'])) {
foreach ($_POST['remove'] as $remove_id) {
	$delete_product = "DELETE FROM cart WHERE pid = '$remove_id' AND cid = '$customerID'";
	$run_delete = mysqli_query($con, $delete_product);
	if ($run_delete) {
		echo"<script>window.open('shoppingcart.php','_self')</script>";
	}
}


}

if (isset($_POST['continue'])) {
		echo"<script>window.open('index.php','_self')</script>";
}
if (isset($_POST['checkout'])) {
		echo"<script>window.open('checkout.php','_self')</script>";
}


?>

</div>
	</div>
	<div class = "footer"> </div>





</div>
</body>
</html>