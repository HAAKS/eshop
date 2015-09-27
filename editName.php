<!DOCTYPE HTML>
<html>
<html>
<head>
<title> Edit Name</title>
<link rel = "stylesheet" href = "style/try.css" media = "all" />
<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
</head>
<body>
<form method = "POST" action="" enotype = "multipart/form-data">

<div class="login-block">
    <h1>Edit Your Name</h1>
    <input type = "text" placeholder="New Name" id="username" name = "newName" <br/>
   <input id='mybutton' type = "submit" name = "update" value= "Update"/>
    </form>


<?php
session_start();
$con = mysqli_connect('localhost', 'root', '', 'csen');

if (isset ($_POST['update'])) {

  if (isset ($_SESSION['id'])) {
  $newName = $_POST['newName'];
  $email = $_SESSION['email'];
$editname = "UPDATE customer SET name = '$newName' WHERE email = '$email'";
$run = mysqli_query($con , $editname);
  if($run){
  echo "<script>alert('Name Successfully Updated!')</script>";
header('location:info.php');

}
else {
  echo "ERROR!";
}
}
}

?>


