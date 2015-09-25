<?php
session_start();

if(!$_SESSION['email']){
	header("location: login.php");
}


?>
<!DOCTYPE html>
<html>
<head>
<title> Profile page </title>
</head>

<style type ='text/css'>
body{


	background: url('eShop.jpg');
}


</style>


<body> <b>Welcome: </b><br>

<font color='black' size='6' > 
<?php echo $_SESSION['email'];?>  </font>




	<h1 align='right' style='margin-right:50px; margin-top:50px;'>

<h1 ><a href='logout.php'> Logout </a></h1>

</div>
</body>
</html>



