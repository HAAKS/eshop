<?php
include("includes/db.php");
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
	<img src="images/3.jpg" style="float:left;">
		<img src="images/1.gif" style="float:right;">

		
	</div>
	<div id= "bar">
		<ul id = "menu">
		<li><a href = "#">All Products</a></li>
		<li><a href = "#">My Acount</a></li>
		<li><a href = "#">Sign Up</a></li>
		<li><a href = "#">Contact Us</a></li>



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
				<b>Welcome!</b>
				<b style = "color: orange;"</b>
				<span>Shopping Cart Items:  - Price: </span>

		</div>

	</div>
	<div id = "productsBox">
<?php
    $con = mysqli_connect('localhost', 'root', '', 'csen');
$get_products = "select *  FROM product LIMIT 0,20";

$run_products = mysqli_query($con , $get_products);

while ($row_products = mysqli_fetch_array($run_products)) {
	$id = $row_products['id'];
	$NAME = $row_products['NAME'];
	$Quantity = $row_products['Quantity'];
	$type = $row_products['type'];
	$Summary = $row_products['Summary'];
	$Price = $row_products['Price'];
	$ProductImage = $row_products['ProductImage'];

echo "

<div id = 'singleProduct'>
<h3>$NAME </h3>
<img src = 'admin/productImages/$ProductImage' width = '180' height = '180 />'
<br>
<h4 style = 'float:center'>Price: £$Price </h4> 
<a href = 'index.php?add_cart=$id'><button class = 'myButton' style = 'float:center;'>Add to Cart</button></a>
</div>


";



}

?>


	</div>


	</div>
	</div>
	<div class = "footer"> Footer Area </div>





</div>
</body>
</html>
