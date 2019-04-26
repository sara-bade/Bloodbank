<?php
ob_start();
session_start();
require_once 'dbconnect.php';

if(isset($_POST['emailid'])){
    $emailid=$_POST['emailid'];
	$password=$_POST['password'];

	if($emailid=="admin@gmail.com" and $password=="admin")
	{
	header("Location: admin.php");
	}
   else{
	$que = "SELECT * FROM user WHERE user_email='$emailid' and user_password='$password'";
	$result = mysql_query($que);
	$row=mysql_fetch_array($result);
	if($row){
	header("Location: home.php");
	$_SESSION["email"] = $emailid;

	}

	else{
	    echo"Invalid";
	}
}
}


?>

<html>
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <style>

  .login{
    width: 380px;
    margin: 469px;
    padding: 50px, 40px, 25px;
    margin-top: 70px;
    font:Cambria, "Hoefler Text", "Liberation Serif", Times, "Times New Roman", serif;

  }

  input[type=text], input[type=password]{
    width:99%;
    padding: 10px;
    margin-top: 8px;
    border: 1px solid #ccc;
    padding-left:5px;
    font-size:16px;
    font-family:Cambria, "Hoefler Text", "Liberation Serif", Times, "Times New Roman", serif;
  }

input[type=submit]{
  width: 20%;
  background-color:#3c3d42;
  color:#fff;
  border: 2px solid ;
  padding: 10px
  cursor:pointer;
  border radius: 5px;
  margin-bottom: 15px;
}
</style>
 </head>
    <body>
    <div class="login">
      <h1 align="center">Login</h1>
  		 <form method="post" action="index.php" style="text-align center">
			Email-id:<input  type= "text" name="emailid" /><br></br>
			Password:<input  type= "password" name="password" /><br></br>
			<input type="submit" name="submit" value="log in"/>
      	<a href="register.php">Sign up Here...</a>
      </div>
       </body>
</html>
