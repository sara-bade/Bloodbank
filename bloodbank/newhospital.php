<?php

ob_start();
session_start();
require_once 'dbconnect.php';
 $query = "SELECT * FROM `address`" ;
 $result1= mysql_query($query);
 $queryH = "SELECT * FROM `hospitals`" ;
 $resultH= mysql_query($queryH);

if(isset($_POST['newid'])){
    $newid=$_POST['newid'];
	$newname= $_POST['newname'];
	$newaddress= $_POST['newaddress'];
	$newphone= $_POST['newphone'];

	$que="Select * from address where donar_address='$newaddress'";
	$result = mysql_query($que);
	while($row1= mysql_fetch_array($result)){
	$add = $row1['address_id'];
}

  $query ="UPDATE hospitals SET  hospital_name='$newname',address_id='$add',hospital_phone='$newphone' where hospital_id='$newid'";
	$res = mysql_query($query);
	header("Location: hospital.php");


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
  <div class="updatedhospital">

   <form method="post" action="newhospital.php" style="text-align center">
                Hospital ID:<select name='newid' >
                                  <?php while($rowH= mysql_fetch_array ($resultH)):;?>
          						<option><?php echo $rowH['hospital_id'];?></option>
          						<?php endwhile;?>
                            </select><br></br>
  		      Hospital Name:<input  type= "text" name="newname" placeholder="Name.." /><br></br>
  			Hospital Address:<select name='newaddress' >
                          <?php while($row1= mysql_fetch_array ($result1)):;?>
  						<option><?php echo $row1[1];?></option>
  						<?php endwhile;?>
                    </select><br></br>
  			Hospital Phone no:<input  type= "text" name="newphone" placeholder="Phone NO.." /><br></br>
  					<input type="submit" name="submit" value="submit"/>
            </form>
          </div>
  	</body>
