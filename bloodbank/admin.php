<?php
ob_start();
session_start();
require_once 'dbconnect.php';


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
	</body>
	    <h3 style="text-align: center">WELCOME ADMIN</h3>

</html>
