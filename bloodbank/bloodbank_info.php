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
  <h2>
<li><a href="home.php">Home</a></li>
	<li><a href="userdonor.php">Donate</a></li>
		<li><a href="Aboutus.php">About us</a></li>
		<li><a href="hospital_info.php">Hospital Information</a></li>
		<li><a href="bloodbank_info.php">Blood Bank Information</a></li>
		<li><a href="logout.php">Logout</a></li>
   </h2>
	</ul>






</div><br></br>









    <h2><caption> Blood Bank Information</caption></h2>
  <table style="width:100%">
    <tr>

	   		<th> Blood Bank Name</th>
		<th>Blood Bank Address</th>
		<th> Blood Bank Phone No</th>

	</tr>
	<?php
	$address='';
	 	$result = mysql_query("SELECT * FROM blood_bank");
			while($row1=mysql_fetch_array($result)){

		     $add=$row1['address_id'];
		$result1=mysql_query("SELECT * FROM address where address_id='$add'");
          while($row=mysql_fetch_array($result1)){
		   $address=$row['donar_address'];


		}
				echo '<tr>';
					echo '<th>'.$row1['bloodbank_name'].'</th>';
					echo '<th>'.$address.'</th>';
					echo '<th>'.$row1['bloodbank_phone'].'</th>';

				echo '</tr>';
	}

		?>
		</table>



</body>
</html>
