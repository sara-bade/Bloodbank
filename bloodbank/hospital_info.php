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
	    <h2>
	</ul>






</div><br></br>









    <h2><caption> Hospital  Information</caption></h2>
  <table style="width:100%">
    <tr>

	   		<th> Hospital Name</th>
		<th>Hospital Address</th>
		<th> HospitalPhone No</th>

	</tr>
	<?php
	$address='';
	 	$result = mysql_query("SELECT * FROM hospitals");
			while($row1=mysql_fetch_array($result)){

		     $add=$row1['address_id'];
		$result1=mysql_query("SELECT * FROM address where address_id='$add'");
          while($row=mysql_fetch_array($result1)){
		   $address=$row['donar_address'];


		}
				echo '<tr>';

					echo '<th>'.$row1['hospital_name'].'</th>';
					echo '<th>'.$address.'</th>';
					echo '<th>'.$row1['hospital_phone'].'</th>';

				echo '</tr>';
	}

		?>
		</table>



</body>
</html>
