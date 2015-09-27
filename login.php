<?php
session_start();
?>
<html>
<head>
<title> Login Page</title>
<link rel = "stylesheet" href = "style/try.css" media = "all" />
</head>

<body>
<form method = "post" action="login.php" enctype="multipart/form-data">
<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<div class="logo"></div>
<div class="login-block">
    <h1>Login</h1>
    <input type="text" value="" placeholder="Email" id="username" name='email' />
    <input type="password" value="" placeholder="Password" id="password" name='pass' />
  <input id='mybutton' type='submit' name='submit' value='Login' />
</div>

</form>
      <p class="text--center">Not a member? <a href="register.php">Sign up now</a></b> <span class="fontawesome-arrow-right"></span></p>




</body>
</html>

<?php
    $con = mysqli_connect('localhost', 'root', '', 'csen');
    mysql_connect("localhost", "root" ,"");
    mysql_select_db("csen");

if(isset($_POST['submit'])){
  
  $email=$_POST['email'];
  $password =$_POST['pass'];
  $check_user="SELECT * FROM customer where  email = '$email' AND password = '$password'";
  $run = mysqli_query($con , $check_user);
    $x=mysql_query($check_user);
    $count =mysql_num_rows($x);
  while ($row = mysqli_fetch_array($run)){
  
      if( $count >0 ){
        $_SESSION['email'] = $email;
        $name = $row['name'];
        $avatar = $row['customerImage'];
      $_SESSION['name'] = $name;
     $_SESSION['avatar'] = $avatar;

    header("location:profile.php");     
     } else {
            echo "<script>alert('Email/Password is invalid. Try again!')</script>";
      }

}
}
?>
</div></body></html>