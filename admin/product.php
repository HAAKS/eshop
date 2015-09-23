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
<body bgcolor="#D3D3D3">

<form method = "post" action="product.php" enctype="multipart/form-data">
<table width = "700" align= "center" border = "1" bgcolor="#FFBB36">
	<tr align="center"> 



<td colspan="2"><h2>Insert New Product:</h2></td>
	</tr>
	<tr>
	<td align="right"><b> Product Name </b></td>
	<td> <input type= "text" name= "NAME" size="50"/></td>
	</tr>
	<tr>
		<td align="right"><b> Product Quantity </b></td>
	<td> <input type= "text" name= "Quantity" size="50"/></td>
	</tr>
	<tr>
		<td align="right"><b> Product Type </b></td>
	<td> <input type= "text" name= "type" size="50"/></td>
	</tr>
	<tr>
		<td align="right"><b> Product Description </b></td>

	<td> <textarea name= "Summary" cols="40" rows="10"/></textarea></td>
	</tr>
	<tr>
		<td align="right"><b> Product Price </b></td>

	<td> <input type= "text" name= "Price" size="50"/></td>
	</tr>
	<tr>
		<td align="right"><b> Product Image </b></td>

	<td> <input type= "file" name= "ProductImage" size="50"/></td>
	</tr>
	<tr align="center">
	<td colspan="2"> <input type= "submit" name= "product" value = "Insert Product"/></td>
	</tr>


</form>
</body>
</html>

<?php

if(isset($_POST['product'])) {
$NAME = $_POST['NAME'];
$Quantity = $_POST['Quantity'];
$type = $_POST['type'];
$Summary = $_POST['Summary'];
$Price = $_POST['Price'];
$ProductImage = $_FILES['ProductImage'] ['name'];
$ProductImagetemp = $_FILES['ProductImage'] ['tmp_name'];



if($NAME == '' OR $Quantity == '' OR $type == '' OR $Summary == '' OR $Price == '' OR $ProductImage == ''){
echo "<script>alert('Please fill in all the fields.')</script>";
exit();
}
else {
		$insertProduct = "INSERT INTO product (NAME, Quantity, type, Summary, Price, ProductImage) VALUES ('$NAME', '$Quantity', '$type', '$Summary', '$Price', '$ProductImage')";
		move_uploaded_file($ProductImagetemp, "productImages/$ProductImage");
}
    $con = mysqli_connect('localhost', 'root','', 'csen');
$run_product = mysqli_query($con, $insertProduct);

if($run_product){
	echo "<script>alert('Product inserted successfully')";
}
}



?>
