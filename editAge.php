<!DOCTYPE HTML>
<html>
<html>
<head>
<title> Edit Age</title>
<link rel = "stylesheet" href = "style/try.css" media = "all" />
<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
</head>
<body>
<form method = "POST" action="" enotype = "multipart/form-data">

<div class="login-block">
    <h1>Edit Your Age</h1>
    <input type = "text" placeholder = "Age" id="username" name = "newAge" <br/>
   <input id='mybutton' type = "submit" name = "update" value= "Update"/>
    </form>


<?php
session_start();
$con = mysqli_connect('localhost', 'root', '', 'csen');

if (isset ($_POST['update'])) {

  if (isset ($_SESSION['id'])) {
  $newAge = $_POST['newAge'];
  $email = $_SESSION['email'];
$editage = "UPDATE customer SET Age = '$newAge' WHERE email = '$email'";
$run = mysqli_query($con , $editage);
  if($run){
  echo "<script>alert('Age Successfully Updated!')</script>";
header('location:info.php');

}
else {
  echo "ERROR!";
}
}
}

?>
