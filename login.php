
<?php
session_start();
?>

<html>
<head>
<title> Login Page</title>
</head>

<style type ='text/css'>

body{
	background: url('register.jpg');
	background-size: 100% 100%;
	background-repeat: no-repeat;

}
html , body{
	height: : 100%;
	font-style: italic;
}


#mytable{
	vertical-align: middle;
	display: table-cell;
	height: 100%;
	font-style: italic;
}

#textbox{
	height: 50px;
	width: 300px;
	font-size: 14pt;
	font-style: oblique;
	
}
#button{
	background-color: #000000;
	color : #FFFFFF;
	float: center;
    padding: 10px;
    border-radius: 10px;

}


</style>
<body>
<form method='post' action ='login.php'>

 <table id="mytable" height='200' width='500' align='center'>
 	
<tr>

<td align ='center'colspan='5'><h1>Login to your account: </h1></td>
<td></td>

</tr>


<td align ='center'><b><h2>Email :</h2></b></td>
<td><input id="textbox" type='text' name='email'/></td>

</tr>



<tr>
<td align ='center'><b><h2>Password :</h2></b></td>
<td> <input id="textbox" type='password' name= 'pass'/></td>
</tr>


<tr>
<td colspan='5' align='center'><input id="button" type='submit' name='submit' value='Login' /></td>
</tr>


 </table>

</form>

<center><font color= 'black' size='6' ><b><h3> Not registered yet ?</h3> </b> </font><a href='register.php' ><h3>Sign up</h3> </a> </center>


</body>
</html>

<?php
mysql_connect("localhost", "root", "");
mysql_select_db("eshop");


if(isset($_POST['submit'])){

	
	$email=$_POST['email'];
	$password =$_POST['pass'];

	$check_user="select * from customers where  email = '$email' AND password = '$password'";
	$run = mysql_query($check_user);
	$count =mysql_num_rows($run);



      if( $count >0 ){

      	$_SESSION['email'] = $email;


      	echo"<script> window.open('profile.php','_self')</script>";
      } else {

      	echo "<script> alert('Email or password is invalid')</script>";
      }
}


?>
