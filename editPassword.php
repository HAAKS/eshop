<!DOCTYPE HTML>
<html>
<html>
<head>
<title> Edit Password</title>
<link rel = "stylesheet" href = "style/try.css" media = "all" />
<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
</head>
<body>
<form method = "POST" action="" enotype = "multipart/form-data">

<div class="login-block">
    <h1>Enter New Password</h1>
   <input type = "password" placeholder = "password" id="password"  name = "newPassword" <br/>
   <input id='mybutton' type = "submit" name = "update" value= "Update"/>
    </form>




<?php
session_start();
$con = mysqli_connect('localhost', 'root', '', 'csen');

if (isset ($_POST['update'])) {

  if (isset ($_SESSION['id'])) {
  $newPassword = $_POST['newPassword'];
  $email = $_SESSION['email'];
$editpassword = "UPDATE customer SET password = '$newPassword' WHERE email = '$email'";
$run = mysqli_query($con , $editpassword);
  if($run){
   	echo "<script>alert('Password updated.')</script>";
header('location:info.php');

}
else {
  echo "ERROR!";
}
}
}

?>
