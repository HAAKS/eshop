<?php
include("includes/db.php");
?>
<!DOCTYPE HTML>
<html>
<html>
<head>
<title> Registeration form</title>
<link rel = "stylesheet" href = "style/try.css" media = "all" />
<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
</head>
<body>
<form method = "post" action="register.php" enctype="multipart/form-data">

<div class="login-block">
    <h1>Sign Up</h1>
    <input type="text" value="" placeholder="Username" id="username" name="cusname"/>
        <input type="text" value="" placeholder="Email" id="username" name= "email" />
    <input type="password" value="" placeholder="Password" id="password" name="password"/>
     <input type="text" value="" placeholder="Age" id="username" name= "Age" />
		<textarea name= "Bio" placeholder="Bio" cols="40" rows="10"/></textarea>
		<input type= "file" name= "avatar" id = "avatar" size="50"/>
  <input id='mybutton' type='submit' name='submit' value='Signup' />
</div>
</form>
      <p class="text--center">Already have an account? <a href="login.php">Login now</a></b> <span class="fontawesome-arrow-right"></span></p>

</body>
</html>

<?php

mysql_connect("localhost", "root" ,"");
mysql_select_db("csen");

if(isset($_POST['submit'])) {
$name = $_POST['cusname'];
$email = $_POST['email'];
$password = $_POST['password'];
$Age = $_POST['Age'];
$Bio = $_POST['Bio'];
$avatar = $_FILES['avatar'] ['name'];
$avatartemp = $_FILES['avatar'] ['tmp_name'];



if($name == '' OR $password == '' OR $email == '' OR $Age == '' OR $Bio == ''  OR $avatar == ''){
echo "<script>alert('Please fill in all the fields.')</script>";
exit();
}
 $check_email = "SELECT * FROM customer WHERE email ='$email'";
   $run = mysql_query($check_email);
   if(mysql_num_rows ($run) >0){
   	echo "<script>alert('Email $email already exists, please choose another one')</script>";
   	exit();
  	}
else {
		$signup = "INSERT INTO customer (name, email, password, avatar, Age, Bio) VALUES ('$name', '$email', '$password', '$avatar', '$Age', '$Bio')";
		move_uploaded_file($avatartemp, "avatars/$avatar");
}
    $con = mysqli_connect('localhost', 'root','', 'csen');
$run = mysqli_query($con, $signup);

if($run){
	echo "<script>alert('You successfully registered. Please login!')</script>";

}
}



?>
