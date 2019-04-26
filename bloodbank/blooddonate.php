<?php
ob_start();
session_start();
require_once 'dbconnect.php';

if(isset($_POST['pints'])){
	$pints= $_POST['pints'];
	$email= $_POST['email'];
	$type= $_POST['type'];

	$id='';
	$time="";


	$query = "SELECT * FROM donor WHERE user_email='$email'";
	$result = mysql_query($query);



	while($row=mysql_fetch_array($result)){

		$id=$row['donor_id'];
		$blood=$row['blood_group_id'];

	}



	$query_bloodgroup= "SELECT * FROM blood_group WHERE blood_group='$type'";
	$result_bloodgroup = mysql_query($query_bloodgroup);
	while($row=mysql_fetch_array($result_bloodgroup)){
		$bloodid=$row['blood_group_id'];
	}

	if($id=='' or $blood != $bloodid){
	$errormsg = "Sorry!! Invalid credentials";
	echo ($errormsg );
	}
	else{
		$querytime = "SELECT * FROM blood_info where donor_id='$id'";
		$resulttime = mysql_query($querytime);

			while($row2=mysql_fetch_array($resulttime)){
           $pint=$row2['pints'];

					$time=$row2['times'];
		}


if($time=='')
{	echo $time;
	$queryup = "INSERT INTO blood_info(donor_id,blood_group_id,blood_added_date,pints,times) VALUES('$id','$bloodid',current_timestamp,'$pints',1)";
	 $resup = mysql_query($queryup);


}

	else{
		$queryup = "UPDATE blood_info SET pints='$pints'+'$pint', blood_added_date = current_timestamp,times=$time+1 WHERE donor_id='$id'";

		$resup = mysql_query($queryup);

}



	$query_bloodamount= "SELECT * FROM blood_inventory WHERE blood_group_id='$bloodid'";
	$result_bloodamount = mysql_query($query_bloodamount);
	$counter=0;
	while($row=mysql_fetch_array($result_bloodamount)){
		$counter++;
}

	echo $counter;
	 if($counter==0)
	 {
	 	$query_bloodinventory = "INSERT INTO blood_inventory(blood_group_id,pints) VALUES('$bloodid','$pints')";
	    $result_bloodinventory = mysql_query($query_bloodinventory);
		//header("Location: admin.php");

	 }
	 else
	 {
	     $query_bloodinventory = "UPDATE  blood_inventory SET pints=pints+'$pints'where blood_group_id='$bloodid'";
	     $result_bloodinventory = mysql_query($query_bloodinventory);
		 //header("Location: admin.php");

	 }



}
}

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

		<div class="donate"><br>
			<h2 align="center">Donate</h2>
			<form action="blooddonate.php" target="blank" method="post">
			Email-id:	<input type="text" name="email" type="text" placeholder="Email..." required><br><br>
			Bloodgroup:	<select name="type">
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
				Pints:<select name="pints">
					<option value=""></option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7</option>
						<option value="8">8</option></select><br><br>


				<input type="submit" value="Donate"><br><br>
			</form>


		</div>
		<hr>
		<table style="width:100%">
          <caption><h2>Information</h2></caption>
    <tr>

    <th Donor Name</th>
    <th>Blood Type</th>
	<th> Recent Donation Date</th>
	<th>Total Pints</th>
	<th>Times Donated</th>

	  </tr>



	  <?php
		$blood_group='';
		$result = mysql_query("SELECT * FROM  donor INNER JOIN blood_info ON blood_info.donor_id = donor.donor_id ORDER BY donor.donor_name ASC;");
		while($row=mysql_fetch_array($result)){
				$blood_group_id=$row['blood_group_id'];
				$queryb = mysql_query ("SELECT * FROM `blood_group` where blood_group_id='$blood_group_id'");
				while($row1 = mysql_fetch_array($queryb)){
						$blood_group=$row1['blood_group'];
				}
				echo '<tr>';
					echo '<th>'.$row['donor_name'].'</th>';
					echo '<th>'.$blood_group.'</th>';
					echo '<th>'.$row['blood_added_date'].'</th>';
					echo '<th>'.$row['pints'].'</th>';
                    echo '<th>'.$row['times'].'</th>';


				echo '</tr>';
	}

		?>



	</body>

</html>
