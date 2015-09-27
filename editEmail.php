<!DOCTYPE HTML>
<html>
<html>
<head>
<title> Edit Email</title>
<link rel = "stylesheet" href = "style/try.css" media = "all" />
<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
</head>
<body>
<form method = "POST" action="" enotype = "multipart/form-data">

<div class="login-block">
    <h1>Edit Your Email</h1>
<input type = "text" placeholder = "Email" id="username" name = "newEmail" <br/>
   <input id='mybutton' type = "submit" name = "update" value= "Update"/>
    </form>

<?php
session_start();
$con = mysqli_connect('localhost', 'root', '', 'csen');

if (isset ($_POST['update'])) {

  if (isset ($_SESSION['id'])) {
  $newEmail = $_POST['newEmail'];
  $id = $_SESSION['id'];
$editemail = "UPDATE customer SET email = '$newEmail' WHERE id = '$id'";
$run = mysqli_query($con , $editemail);
  echo "<script>alert('Email Successfully Updated!')</script>";
header('location:info.php');


}
}

?>
