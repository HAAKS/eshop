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

<tr>
<td colspan="3" id = "msg">
Are you sure you want to buy this/these product(s)? </td>
</tr>



	<tr id= "table_head" align="center">
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

<td> <?php echo $product_name; ?> <br>

<img src = "admin/productImages/<?php echo $product_image ?>" width="80" height = "80" />
</td>
<td> <?php echo "£".$single_price; ?></td>
</tr>

<?php } } ?>

<tr align = "right">
<td id = "table_head" colspan="3"><b>Total Price: <?php echo "£".$total;?></b></td>
<td colspan="3">  </td> 
</tr>
<tr align="center">
<td><input class = "myButton" type="submit" name = "edit" value="Edit Cart"/></td> </th>
<td><input class = "myButton" type="submit" name = "continue" value="Continue Shopping"/></td>
</tr>
<tr align="right"> 
<td><input class = "myButton" type="submit" name = "buy" value="BUY NOW"/></td>
</tr> 
</table>


</form>

<?php
    $con = mysqli_connect('localhost', 'root', '', 'csen');
    $customerID = $_SESSION['id'];

if (isset ($_POST['buy'])) {

$products_in_cart= "SELECT * FROM cart where  cid = $customerID";
$run_products_in_cart = mysqli_query($con , $products_in_cart);
while ($pro = mysqli_fetch_array($run_products_in_cart)) {
	$pid = $pro['pid'];
	//decrement quantity
	//get product id from buy 
	//select from product those with the same id
	//decrement the quantity by 1
	
	$dec_quantity = "SELECT * FROM product WHERE id = $pid";
	$run_product_quantity = mysqli_query($con,$dec_quantity);
	while($qqq = mysqli_fetch_array($run_product_quantity)) {

$product_quantity= $qqq['Quantity'];
$product_quantity = $product_quantity - 1;
$update_quantity = "UPDATE product SET Quantity= $product_quantity WHERE id = $pid";
	$run_update_quantity = mysqli_query($con,$update_quantity);
}

	

	$insert_in_buy = "INSERT INTO buy (cid, pid) VALUES ('$customerID','$pid')";
	$run_insert_in_buy = mysqli_query($con, $insert_in_buy);
if($run_insert_in_buy) {
	

		echo"<script>window.open('confirmationmsg.php','_self')</script>";
	

}
}
}



if (isset($_POST['continue'])) {
		echo"<script>window.open('index.php','_self')</script>";
}

if (isset($_POST['edit'])) {
		echo"<script>window.open('shoppingcart.php','_self')</script>";
}



?>

</div>
	</div>
	<div class = "footer"> </div>





</div>
</body>
</html>