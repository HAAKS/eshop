<!DOCTYPE HTML>
<html>
<html>
<head>
<title> Edit Bio</title>
<link rel = "stylesheet" href = "style/try.css" media = "all" />
<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
</head>
<body>
<form method = "POST" action="" enotype = "multipart/form-data">

<div class="login-block">
    <h1>Edit Your Bio</h1>
    		<textarea name= "newBio" placeholder="Bio" cols="40" rows="10"/></textarea>
   <input id='mybutton' type = "submit" name = "update" value= "Update"/>
    </form>

<?php
session_start();
$con = mysqli_connect('localhost', 'root', '', 'csen');

if (isset ($_POST['update'])) {

  if (isset ($_SESSION['id'])) {
  $newBio = $_POST['newBio'];
  $email = $_SESSION['email'];
$editbio = "UPDATE customer SET Bio = '$newBio' WHERE email = '$email'";
$run = mysqli_query($con , $editbio);
  if($run){
  echo "<script>alert('Bio Successfully Updated!')</script>";
header('location:info.php');

}
else {
  echo "ERROR!";
}
}
}

?>

