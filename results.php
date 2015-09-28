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
	while($ppp_price = mysqli_fetch_array($run_product_price)) {

$product_price = array($ppp_price['Price']);

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

<?php
if(isset($_GET['search'])){
	$search_query = $_GET['user_query'];
    $con = mysqli_connect('localhost', 'root', '', 'csen');

$get_products = "select *  FROM product WHERE NAME LIKE '%$search_query%'";

$run_products = mysqli_query($con , $get_products);

while ($row_products = mysqli_fetch_array($run_products)) {
	$pid = $row_products['id'];
	$NAME = $row_products['NAME'];
	$Quantity = $row_products['Quantity'];
	$type = $row_products['type'];
	$Summary = $row_products['Summary'];
	$Price = $row_products['Price'];
	$ProductImage = $row_products['ProductImage'];
if (isset($_SESSION['name'])) {
	if ($Quantity <= 0) { 

echo "

<div id = 'singleProduct'>
<h2 style = 'float: cnter;'>$NAME </h2>
<img src = 'admin/productImages/$ProductImage' width = '500' height = '500; />'
<br>
<h3 style = 'float:center'>Price: £$Price </h3>
<p style = 'float:center'>$Summary </p>  
<br>
<br>
<br>
<a href = ''><button class = 'myButton' name = 'soldout' style = 'float:center;'>SOLD OUT!</button></a>
<div> <a href = 'index.php' style = 'float:center; color:black;'>Go Back</a> </div>


";

} else {
echo "

<div id = 'singleProduct'>
<h2 style = 'float: cnter;'>$NAME </h2>
<img src = 'admin/productImages/$ProductImage' width = '500' height = '500; />'
<br>
<h3 style = 'float:center'>Price: £$Price </h3>
<p style = 'float:center'>$Summary </p>  
<br>
<br>
<br>
<a href = 'index.php?add_cart=$pid'><button class = 'myButton' name = 'addtocart' style = 'float:center;'>Add to Cart</button></a>
<div> <a href = 'index.php' style = 'float:center; color:black;'>Go Back</a> </div>


";
}
}
else {
	echo "

<div id = 'singleProduct'>
<h2 style = 'float: cnter;'>$NAME </h2>
<img src = 'admin/productImages/$ProductImage' width = '500' height = '500; />'
<br>
<h3 style = 'float:center'>Price: £$Price </h3>
<p style = 'float:center'>$Summary </p>  
<br>
<br>
<br>
<a href = 'login.php'><button class = 'myButton' style = 'float:center;'>Add to Cart</button></a>
<div> <a href = 'index.php' style = 'float:center; color:black;'>Go Back</a> </div>

</div>

";
}
if (isset($_GET["add_cart"])){
$pid = $_GET["add_cart"];
$cid = $_SESSION['id'];

$insert_product = "INSERT INTO cart (cid, pid) VALUES ($cid, $pid)";
$run_pro = mysqli_query($con, $insert_product);


if ($run_pro) {
	echo "<script>alert('Product added to cart.')</script>";
}

}




}
}
?>




	</div>
	</div>
	<div class = "footer"> </div>





</div>
</body>
</html>
