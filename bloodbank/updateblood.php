<?php

ob_start();
session_start();
require_once 'dbconnect.php';

 $query = "SELECT * FROM `address`" ;
 $result1= mysql_query($query);

 $queryQ = "SELECT * FROM `blood_inventory`" ;
 $resultQ= mysql_query($queryQ);


 if(isset($_POST['newid'])){
    $newid=$_POST['newid'];
	$newprice= $_POST['newprice'];






	$query ="UPDATE price SET price='$newprice' where blood_group_id='$newid'";
	$res = mysql_query($query);
	header("Location: bloodinventory.php");

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
 <h2 align="center">Update Price</h2>
 <form method="post" action="updateblood.php">
              Blood Group Id:<select name='newid' >
                                <?php while($rowQ= mysql_fetch_array ($resultQ)):;?>
        						<option><?php echo $rowQ[0];?></option>
        						<?php endwhile;?>
                          </select><br></br>
		    Price:<input  type= "text" name="newprice" placeholder="Price.." /><br></br>



					<input type="submit" name="submit" value="submit"/>

          </form>
        </div>
	</body>
  </html>
