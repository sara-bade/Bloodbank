<?php

ob_start();
session_start();
require_once 'dbconnect.php';

 $query = "SELECT * FROM `address`" ;
 $result1= mysql_query($query);

if(isset($_POST['newposition'])){
    $newposition=$_POST['newposition'];
	$newsalary= $_POST['newsalary'];






	$query ="UPDATE staff_salary SET salary='$newsalary' where position='$newposition'";
	$res = mysql_query($query);

	header("Location: staff.php");

}
?>
<html>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>

  <div id="nav_wrapper">
  	<ul>
      <h3>
        <li><a href="donor.php">Donor Information</a></li>
    		<li><a href="inventory.php">Inventory</a></li>
    		<li><a href="hospital.php">Hospital Info</a></li>
        <li><a href="bloodbank.php">Bloodbank Info</a></li>
    		<li><a href="staff.php">Staff Information</a></li>
    		<li><a href="transaction.php">Transaction</a></li>
    		<li><a href="bloodinventory.php">Blood Inventory</a></li>
        <li><a href="logout.php">Logout</a></li>
      <h2>
  	</ul>
  	</div>


<div class="upprice">
 <h2 align="center">Update Salary</h2>
 <form method="post" action="updatesalary.php">
           	Position:<select name="newposition">
          <option value=""></option>
					<option value="Manager">Manager</option>
					<option value="Assistant Manager">Assistant Manager</option>
					<option value="Doctor">Doctor</option>
					<option value="Lab Assistant">Lab Assistant</option>
					<option value="Lab Technitian">	Lab Technitian</option>
					<option value="Manager">Manager</option>
					<option value="Nurse">Nurse</option>

				</select><br></br>
				  Salary:<input  type= "text" name="newsalary" placeholder="Salary.."required /><br></br>


					<input type="submit" name="submit" value="submit"/>

          </form>
        </div>
	</body>
  </html>
