<?php

ob_start();
session_start();
require_once 'dbconnect.php';

 $query = "SELECT * FROM `address`" ;
 $result1= mysql_query($query);

 $queryS = "SELECT * FROM `staff`" ;
 $resultS= mysql_query($queryS);


if(isset($_POST['newid'])){
    $newid=$_POST['newid'];
	$newname= $_POST['newname'];
	$newaddress= $_POST['newaddress'];
	$newphone= $_POST['newphone'];
	$newposition= $_POST['newposition'];

	$que="Select * from address where donar_address='$newaddress'";

	$result = mysql_query($que);
	while($row1= mysql_fetch_array($result)){
	$add = $row1['address_id'];


	$query ="UPDATE staff SET staff_name='$newname',address_id='$add',staff_phone='$newphone',position='$newposition' where staff_id='$newid'";
	$res = mysql_query($query);
	header("Location: staff.php");
}
}
?>
<html>
<head>

<link rel="stylesheet" type="text/css" href="style.css">

</head>

<body>

  <div id="nav_wrapper">
	<ul>
    <h3>
		<li><a href="donor.php">Donor Information</a></li>
		<li><a href="inventory.php">Inventory</a></li>
		<li><a href="hospital.php">Hospital Information</a></li>
		<li><a href="staff.php">Staff Information</a></li>
		<li><a href="transaction.php">Transaction</a></li>
		<li><a href="bloodinventory.php">Blood Inventory</a></li>
		<li><a href="logout.php">Logout</a></li>
  </h3>
	</ul>
	</div>
<div class="updon">
 <h2 align="center">Update Staff Info</h2>
 <form method="post" action="updatestaff.php">
              Staff Id:<select name='newid' >
                        <?php while($rowS= mysql_fetch_array ($resultS)):;?>
        						<option><?php echo $rowS[0];?></option>
        						<?php endwhile;?>
                  </select><br></br>
		    Staff Name:<input  type= "text" name="newname" placeholder="Name.." /><br></br>
			Staff Address:<select name='newaddress' >
                <?php while($row1= mysql_fetch_array ($result1)):;?>
						<option><?php echo $row1[1];?></option>
						<?php endwhile;?>
          </select><br></br>
			   Staff Phone no:<input  type= "text" name="newphone" placeholder="Phone.." /><br></br>
				Staff Position:<select name="newposition">
          <option value=""></option>
					<option value="Manager">Manager</option>
					<option value="Assistant Manager">Assistant Manager</option>
					<option value="Doctor">Doctor</option>
					<option value="Lab Assistant">Lab Assistant</option>
					<option value="Lab Technitian">	Lab Technitian</option>
					<option value="Manager">Manager</option>
					<option value="Nurse">Nurse</option>

				</select><br>
			<input type="submit" name="submit" value="Update"/>

          </form>
	</body>
