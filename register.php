
<html>
<head>
<title> Registeration form</title>
</head>
<style>

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
.right{
position: absolute;
right: 0;
width: 300;
padding: 10px;
margin-left: 800px;

}
span{
	margin-left: 800px;
}
table{
	border: 1px solid black;
}
td{
	padding: 15px;
}

</style>

<body>
<form method='post' action ='register.php'>

 <table id= "mytable" width='700'  align='center'>
 	
<tr>

<td align ='center'colspan='5'><h1>create your account</h1></td>
<td></td>

</tr>

<tr>

<td align ='center'><b><h2>Username:</h2></b></td>
<td><input id="textbox" type='text' name='name'/></td>

</tr>


<tr>

<td align ='center'><b><h2>Password :</h2></b></td>
<td> <input  id="textbox" type='password' name= 'pass'/></td>

</tr>



<tr>

<td align ='center'><b><h2>E-mail Address :</h2></b></td>
<td><input  id="textbox" type='text' name='email'/></td>

</tr>

<tr>
 <td align ='center'><b><h2> Profile Picture:</h2> </b></td>
 <td> <input  id="textbox" type= "file" name= "ProfilePicture" size="50"/></td>
	</tr>

<tr>

<td colspan='5' align='center'><input id="button" type='submit' name='submit' value='Sign up' /></td>


</tr>

 </table>

</form>

<center><font color= 'black' size='6'  ><h2> Already a user ? </h2> </font><a href='login.php' ><h2>Login</h2> </a> </center>


</body>
</html>


<?php

mysql_connect("localhost", "root" ,"");
mysql_select_db("eshop");

 if(isset($_POST['submit'])){


 	$username =$_POST['name'];
 	$password =$_POST['pass'];
 	$email =$_POST['email'];
 	$ProfilePicture=$_POST['ProfilePicture'];

     
   if ($username =='') {
     echo "<script>alert('please fill in all emtpy fields')</script>";
     exit();
   }

   if ($password =='') {
     echo "<script>alert('please fill in all emtpy fields')</script>";
     exit();
   }

   if ($email =='') {
     echo "<script>alert('please fill in all emtpy fields')</script>";
     exit();
   }



   if ($ProfilePicture =='') {
     echo "<script>alert('please fill in all emtpy fields')</script>";
     exit();
   }



   $check_email = "select * from customers where email ='$email'";

   $run = mysql_query($check_email);

   if(mysql_num_rows ($run) >0){
   	echo "<script>alert('Email $email already exists, please choose another one')</script>";
   	exit();
  	}


  	$query = "insert into customers (name , password, email, customerImage) values ( '$username' , '$password' , '$email', '$userImage') ";
    

    if(mysql_query($query)){
    	echo"<script>window.open('profile.php','_self')</script>";

    	
    }
 }


?>