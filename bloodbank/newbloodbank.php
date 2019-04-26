<?php

ob_start();
session_start();
require_once 'dbconnect.php';
 $query = "SELECT * FROM `address`" ;
 $result1= mysql_query($query);

 $queB="SELECT * FROM `blood_bank`";
 $resultB = mysql_query($queB);


if(isset($_POST['newid'])){
    $newid=$_POST['newid'];
	$newname= $_POST['newname'];
	$newaddress= $_POST['newaddress'];
	$newphone= $_POST['newphone'];

	$que="Select * from address where donar_address='$newaddress'";
	$result = mysql_query($que);
	while($row1= mysql_fetch_array($result)){
	$add = $row1['address_id'];

	$query ="UPDATE blood_bank SET bloodbank_name ='$newname',address_id='$add',bloodbank_phone='$newphone' where bloodbank_id='$newid'";
	$res = mysql_query($query);
	header("Location: bloodbank.php");
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
    		<li><a href="hospital.php">Hospital Info</a></li>
        <li><a href="bloodbank.php">Bloodbank Info</a></li>
    		<li><a href="staff.php">Staff Information</a></li>
    		<li><a href="transaction.php">Transaction</a></li>
    		<li><a href="bloodinventory.php">Blood Inventory</a></li>
        <li><a href="logout.php">Logout</a></li>
  	  <h3>
  	</ul>
  	</div>

<div class="updatedbloodbank">
 <form method="post" action="newbloodbank.php" style="text-align center">
              bloodbank ID:<select name='newid' >
                                <?php while($rowB= mysql_fetch_array ($resultB)):;?>
        						<option><?php echo $rowB['bloodbank_id'];?></option>
        						<?php endwhile;?>
                          </select><br></br>
		      bloodbank Name:<input  type= "text" name="newname" placeholder="Name.." /><br></br>
			bloodbank Address:<select name='newaddress' >
                        <?php while($row1= mysql_fetch_array ($result1)):;?>
						<option><?php echo $row1[1];?></option>
						<?php endwhile;?>
                  </select><br></br>
			bloodbank Phone no:<input  type= "text" name="newphone" placeholder="Phone NO.." /><br></br>
					<input type="submit" name="submit" value="submit"/>
          </form>
        </div>
	</body>
