<?php
ob_start();
session_start();
require_once 'dbconnect.php';
 $query = "SELECT * FROM `address`" ;
 $result1= mysql_query($query);

if(isset($_POST['name'])){
	$name= $_POST['name'];
	$address= $_POST['address'];
	$phone= $_POST['phone'];
    $count='';

	$que="Select * from address where donar_address='$address'";

	$qued="Select * from blood_bank";
	$resultd = mysql_query($qued);
    while($row = mysql_fetch_array($resultd)){
		$count=$count+2;
	}
	 $id="BGB".$count;

	$result = mysql_query($que);
	while($row1= mysql_fetch_array($result)){
	$add = $row1['address_id'];

		$query = "INSERT INTO blood_bank(bloodbank_id,bloodbank_name,address_id,bloodbank_phone) VALUES('$id','$name','$add','$phone')";
	$res = mysql_query($query);

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
		<li><a href="hospital.php">Hospital Info</a></li>
    <li><a href="bloodbank.php">Bloodbank Info</a></li>
		<li><a href="staff.php">Staff Information</a></li>
		<li><a href="transaction.php">Transaction</a></li>
		<li><a href="bloodinventory.php">Blood Inventory</a></li>
    <li><a href="logout.php">Logout</a></li>
    <h3>
	</ul>
</div><br></br>



     <div class="bloodbank">

		 <form method="post" action="bloodbank.php" style="text-align center">
		  bloodbank Name:<input  type= "text" name="name" placeholder="Name.." /><br></br>
			bloodbank Address:<select name='address' >
        <<option value=""></option>
                <?php while($row1= mysql_fetch_array ($result1)):;?>
						<option><?php echo $row1[1];?></option>
						<?php endwhile;?>
                  </select><br></br>
			bloodbank Phone no:<input  type= "text" name="phone" placeholder="Phone NO.." /><br></br>
					<input type="submit" name="submit" value="submit"/>

</form>
</div>

          <hr>
    <center>
    <caption><h2> Bloodbank Information</h2></caption>
  </center>
  <table style="width:100%">
    <tr>
	<th> bloodbank Id</th>
	   		<th> bloodbank Name</th>
		<th>bloodbank Address</th>
		<th> bloodbank Phone No</th>

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
					echo '<th>'.$row1['bloodbank_id'].'</th>';
					echo '<th>'.$row1['bloodbank_name'].'</th>';
					echo '<th>'.$address.'</th>';
					echo '<th>'.$row1['bloodbank_phone'].'</th>';

				echo '</tr>';
	}

		?>
		</table>

		<form method="post" action="newbloodbank.php">
			<input type="submit" name="submit" value="update"/>
		</form>

</body>
</html>
