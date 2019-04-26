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
        <h3>
    		<li><a href="donor.php">Donor Information</a></li>
    		<li><a href="inventory.php">Inventory</a></li>
    		<li><a href="hospital.php">Hospital Information</a></li>
    		<li><a href="staff.php">Staff Information</a></li>
    		<li><a href="transaction.php">Transaction</a></li>
    		<li><a href="bloodinventory.php">Blood Inventory</a></li>
    		<li><a href="logout.php">Logout</a></li>
          </h3>
    	</ul>
    	</div>


		<div class="search"><br>
      <link rel="stylesheet" type="text/css" href="style.css">
      <h2 align="center">New Donor</h2>
			<form action="add.php" target="blank" method="post" style="text-align center">
				Email-id: <input type="text" name="email" type="text" placeholder="E-Mail-id,.."required ><br></br>
				Name: <input type="text" name="name" type="text" placeholder="Name..."required ><br><br>
				Address: <select name='address' >
                <?php while($row1= mysql_fetch_array ($result1)):;?>
						<option><?php echo $row1[1];?></option>
						<?php endwhile;?>
                  </select><br><br>
				Phone: <input type="text" name="phone" type="text" placeholder="Phone..." required ><br><br>
				Sex: <select name="sex" >
        <option value=""></option>
				<option value="Male">Male</option>
				<option value="Female">Female</option>
				</select><br><br>
				DOB: <input type="text" name="dob" type="text" placeholder="YYYY-MM-DD" required ><br><br>
				Weight: <input type="text" name="weight" type="text" placeholder="Weight..." required ><br><br>
				Bloodgroup: <select name="bloodgroup">
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
				Disease:<select name="disease">
        <option value=""></option>
        <option value="Yes">Yes</option>
        <option value="No">No</option>
      </select><br></br>
				<input type="submit" name="submit" value="Add">
     </form>
		</div>
		<hr>
		<table style="width:100%">
          <caption>Information</caption>

    <tr>
		<th>Donor Id</th>
		<th>Name</th>
		<th>Phone</th>
		<th>Email</th>
		<th>Sex</th>
		<th>DOB</th>
		<th>Weight</th>
		<th>Blood Group</th>

		<th>Disease</th>
	</tr>
	<?php

			$bloodgroup='';
		$result = mysql_query("SELECT * FROM  donor");
		while($row1=mysql_fetch_array($result)){

		$blood=$row1['blood_group_id'];
		$result1=mysql_query("SELECT * FROM blood_group where blood_group_id='$blood'");
          while($row=mysql_fetch_array($result1)){
		   $bloodgroup=$row['blood_group'];


		}

			 echo '<tr>';
				echo '<th>'.$row1['donor_id'].'</th>';
				echo '<th>'.$row1['donor_name'].'</th>';
				echo '<th>'.$row1['donor_phone'].'</th>';
				echo '<th>'.$row1['user_email'].'</th>';
				echo '<th>'.$row1['donor_sex'].'</th>';
				echo '<th>'.$row1['donor_DOB'].'</th>';
				echo '<th>'.$row1['donor_weight'].'</th>';
				echo '<th>'.$bloodgroup.'</th>';
				echo '<th>'.$row1['disease'].'</th>';



				echo '</tr>';




		}

		?>
	<table>
	</body>

</html>
