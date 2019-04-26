<?php
ob_start();
session_start();
require_once 'dbconnect.php';

if(isset($_POST['emailid'])){
    $emailid=$_POST['emailid'];
	$username=$_POST['username'];
	$password=$_POST['password'];
     $count='';
			
	  $qued="Select * from user";
	    $resultd = mysql_query($qued);
        while($row = mysql_fetch_array($resultd)){
		$count=$count+2;
	       }
	       $cid="USER".$count;
		   
	$que = "SELECT * FROM user WHERE user_email='$emailid'";
	$result = mysql_query($que);
	$row=mysql_fetch_array($result);
	if($row){
		echo "Provided Email is already in use.";
	}else{
	    $query = "INSERT INTO user(user_id,user_name,user_email,user_password) VALUES('$cid','$username','$emailid','$password')";
		$res = mysql_query($query);
       echo "You are registered";
	}
}
?>

<html>
<head
<meta charset="UTF-8">
<title>Login</title>
<style>

.register{
  width: 360px;
  margin: 50px auto;

  padding: 10px, 40px, 25px;
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
  cursor:pointer;
  border radius: 5px;
  margin-bottom: 15px;
}
</style>
 </head>
    <body>
      <div class="Register">
        <h1 align="center">Register</h1>
		 <form method="post" action="register.php" style="text-align center">
		Username:<input  type= "text" name="username" required /><br></br>
		Email-id:<input  type= "text" name="emailid" required/><br></br>
		Password:<input  type= "password" name="password" required/><br></br>
			<input type="submit" name="submit" value="log in"/>
      	<a href="index.php">Sign in Here...</a>
      </body>
</html>
