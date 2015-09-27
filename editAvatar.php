
<!DOCTYPE HTML>
<html>
<html>
<head>
<title> Edit Avatar</title>
<link rel = "stylesheet" href = "style/try.css" media = "all" />
<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
</head>
<body>
<form method = "POST" action="" enctype="multipart/form-data">

<div class="login-block">
    <h1>Edit Your Avatar</h1>
    <input type = "file" id = "avatar" name = "avatar" <br/>
   <input id='mybutton' type = "submit" name = "update" value= "Update"/>
    </form>



<?php
session_start();
$con = mysqli_connect('localhost', 'root', '', 'csen');

if (isset ($_POST['update'])) {

  if (isset ($_SESSION['id'])) {
  	  $email = $_SESSION['email'];
  	$avatar = $_FILES['avatar'] ['name'];
  	$avatartemp = $_FILES['avatar'] ['tmp_name'];
			$editavatar = "UPDATE customer SET avatar = '$avatar' WHERE email = '$email'";
			$run = mysqli_query($con , $editavatar);
  			if($run){
  	  		move_uploaded_file($avatartemp, "avatars/$avatar");
  			echo "<script>alert('Avatar Successfully Updated!')</script>";
			header('location:info.php');

}
else {
  echo "ERROR!";
}
}
}

?>
</div>
</body>
</html>