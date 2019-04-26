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

<div class="transaction">
 <form method="post" action="continue_transaction.php">
		      Recipient Name: <input  type= "text" name="name" placeholder="Name..." /><br></br>
          Blood Group: <select name="bloodgroup">
          <option value=""></option>
					<option value="O+">O+</option>
					<option value="O-">O-</option>
					<option value="AB+">AB+</option>
					<option value="AB-">AB-</option>
					<option value="A+">A+</option>
					<option value="A-">A-</option>
					<option value="B+">B+</option>
					<option value="B-">B-</option>
				  </select><br><br>
			 Pints: <select name="pints">
         <option value=""></option>
         <option value="1">1</option>
         <option value="2">2</option>
         <option value="3">3</option>
         <option value="4">4</option>
         <option value="5">5</option>
         <option value="6">6</option>
         <option value="7">7</option>
         <option value="8">8</option>
         </select><br><br>

					<input type="submit" name="submit" value="submit"/>

        </form></div>

      <hr>
      <center>
		  <h2><caption> Transaction</caption></h2>
      </center>
	<table style="width:100%">
    <tr>
    <th>Transaction Id</th>
    <th>Recipient Name</th>
	<th>Blood Group</th>
	<th>Pints</th>
	<th>Cost</th>
	</tr>

		<?php

			$bloodgroup='';
		$result = mysql_query("SELECT * FROM  transaction");
		while($row1=mysql_fetch_array($result)){

		$blood=$row1['blood_group_id'];
		$result1=mysql_query("SELECT * FROM blood_group where blood_group_id='$blood'");
          while($row=mysql_fetch_array($result1)){
		   $bloodgroup=$row['blood_group'];


		}

					echo '<tr>';
			 echo '<th>'.$row1['transaction_id'].'</th>';
					echo '<th>'.$row1['recipient_name'].'</th>';
					echo '<th>'.$bloodgroup.'</th>';
					echo '<th>'.$row1['pints'].'</th>';
					echo '<th>'.$row1['cost'].'</th>';



				echo '</tr>';
	}




		?>
		</table>


	</body>
