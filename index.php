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
		<li><a href = "#">Login/Sign Up</a></li>
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
						} ?><b style= "color:yellow">Shopping Cart:</b> Total Items - Total Price: <a href="shoppingcart.php" style= "color:yellow">Go to cart</a> </span>

		</div>

	</div>
	<div id = "productsBox">
<?php
    $con = mysqli_connect('localhost', 'root', '', 'csen');


$get_products = "SELECT *  FROM product LIMIT 0,20";

$run_products = mysqli_query($con , $get_products);
while ($row_products = mysqli_fetch_array($run_products)) {
	$id = $row_products['id'];
	$NAME = $row_products['NAME'];
	$Quantity = $row_products['Quantity'];
	$type = $row_products['type'];
	$Summary = $row_products['Summary'];
	$Price = $row_products['Price'];
	$ProductImage = $row_products['ProductImage'];
if (isset($_SESSION['name'])) {
echo "

<div id = 'singleProduct'>
<h3>$NAME </h3>
<img src = 'admin/productImages/$ProductImage' width = '180' height = '180 />'
<br>
<h4 style = 'float:center'>Price: £$Price </h4> 
<a href = 'description.php?id=$id' style = 'float:center; color:black;'>Product Description</a>
<br>
<a href = 'index.php?id=$id'><button class = 'myButton' style = 'float:center;'>Add to Cart</button></a>

</div>

";
}
else {
	echo "

<div id = 'singleProduct'>
<h3>$NAME </h3>
<img src = 'admin/productImages/$ProductImage' width = '180' height = '180 />'
<br>
<h4 style = 'float:center'>Price: £$Price </h4> 
<a href = 'description.php?id=$id' style = 'float:center; color:black;'>Product Description</a>
<br>
<a href = 'login.php'><button class = 'myButton' style = 'float:center;'>Add to Cart</button></a>

</div>

";
}




}

?>


	</div>


	</div>
	</div>
	<div class = "footer"> </div>





</div>
</body>
</html>
