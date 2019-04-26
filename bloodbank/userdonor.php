<?php
ob_start();
session_start();
require_once 'dbconnect.php';


 $query = "SELECT * FROM `address`" ;

 $result1= mysql_query($query);

 $queryb = "SELECT * FROM blood_group" ;

 $resultb= mysql_query($queryb);




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
    <h2>
<li><a href="home.php">Home</a></li>
	<li><a href="userdonor.php">Donate</a></li>
		<li><a href="Aboutus.php">About us</a></li>
		<li><a href="hospital_info.php">Hospital Information</a></li>
		<li><a href="bloodbank_info.php">Blood Bank Information</a></li>
		<li><a href="logout.php">LOG OUT</a></li>
  </h2>
	</ul>






</div><br>




			<div class="usdnr">
			<form action="useradd.php" target="blank" method="post">
			
				Name: <input type="text" name="name" type="text" placeholder="Name..." required><br><br>
				Address: <select name='address' >
                <?php while($row1= mysql_fetch_array ($result1)):;?>
						<option><?php echo $row1[1];?></option>
						<?php endwhile;?>
          </select><br><br>
				Phone number:<input type="text" name="phone" type="text" placeholder="Phone..."required ><br><br>
				Sex:<select name="sex" ><br><br>
        <<option value=""></option>
				<option value="Male">Male</option>
				<option value="Female">Female</option>
      </select><br><br>
				DOB:<input type="text" name="dob" type="text" placeholder="YYYY-MM-DD" required><br><br>
				Weight:<input type="text" name="weight" type="text" placeholder="Weight..." ><br><br>

				Bloodgroup:<select name="bloodgroup">
          <option value=""></option>
					<option value="O+">O+</option>
					<option value="O-">O-</option>
					<option value="AB+">AB+</option>
					<option value="AB-">AB-</option>
					<option value="A+">A+</option>
					<option value="A-">A-</option>
					<option value="B+">B+</option>
					<option value="B-">B-</option>
				</select>
				<br><br>
				Disease:<select name="disease" >
          <<option value=""></option>
				<option value="Yes">Yes</option>
				<option value="No">No</option>
				</select><br><br>

				<input type="submit" name="submit" value="Add"><br>
			</form>




		</div>



	</body>

</html>
