<?php
ob_start();
session_start();
require_once 'dbconnect.php';

?>
<html>
	<head>
		<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="style.css">

		</h1>
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
</div>


<ul>
	      <h3>
				<style="text-align center">
        <div class='newdonor'>
        <a href="registerdonor.php"> New Donor </a>
				<br></br>
				<div>
				<a href="blooddonate.php"> Donate </a>
				<br></br>
				</style>
			</h3>
				</center>

			</ul>


		<hr>



	</body>

</html>
