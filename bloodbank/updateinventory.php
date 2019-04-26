<?php

ob_start();
session_start();
require_once 'dbconnect.php';
$queryI = "SELECT * FROM `inventory`" ;
$resultI= mysql_query($queryI);

if(isset($_POST['newid'])){
    $newid=$_POST['newid'];
	$newname= $_POST['newname'];
	$newquantity= $_POST['newquantity'];



	$query ="UPDATE inventory SET item_name ='$newname',item_quantity='$newquantity' where item_no='$newid'";
	$res = mysql_query($query);
	header("Location: inventory.php");
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
  </h3>
	</ul>
	</div>

<div class="upinvent">
 <form method="post" action="updateinventory.php">
              Item No:<select name='newid' >
                                <?php while($rowI= mysql_fetch_array ($resultI)):;?>
        						<option><?php echo $rowI[0];?></option>
        						<?php endwhile;?>
                          </select><br></br>
		    Item Name:<input  type= "text" name="newname" placeholder="Name.." /><br></br>
			Item  quantity:<input  type= "text" name="newquantity" placeholder="Quantity.." /><br></br>

					<input type="submit" name="submit" value="submit"/>

          </form>
	</body>
