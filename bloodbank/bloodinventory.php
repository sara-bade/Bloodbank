<?php
ob_start();
session_start();
require_once 'dbconnect.php';
?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
	<style>
    table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
     }
     padding: 2px;
    text-align: right;
}
</style>
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
</div><br></br>



        <center>
        <h2><caption> Blood Information</caption></h2>
				</center>


		  	<table style="width:100%">
    <tr>
    <th>Blood Group Id</th>
    <th>Blood Type</th>
	  <th>Pints</th>
	  <th>Prices per unit</th>
		</tr>

	<?php
		$result = mysql_query("SELECT * FROM blood_inventory");
		while($row=mysql_fetch_array($result)){
		$bloodid=$row['blood_group_id'];

		 $resultblood=mysql_query("SELECT * FROM blood_group where blood_group_id='$bloodid'");
		 $blood=mysql_fetch_array($resultblood);
		 $resultp=mysql_query("SELECT * FROM price where blood_group_id='$bloodid'");
		 $price=mysql_fetch_array($resultp);

				echo '<tr>';
					echo '<th>'.$row['blood_group_id'].'</th>';
					echo '<th>'.$blood['blood_group'].'</th>';
					echo '<th>'.$row['pints'].'</th>';
					echo '<th>'.$price['price'].'</th>';


				echo '</tr>';
	}

		?>
	</table>


		  <form method="post" action="updateblood.php">
			<input type="submit" name="submit" value="update"/>
		</form>




      </body>
</html>
