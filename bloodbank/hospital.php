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

	$qued="Select * from hospitals";
	$resultd = mysql_query($qued);
    while($row = mysql_fetch_array($resultd)){
		$count=$count+2;
	}
	 $id="HOPT".$count;

	$result = mysql_query($que);
	while($row1= mysql_fetch_array($result)){
	$add = $row1['address_id'];

		$query = "INSERT INTO hospitals(hospital_id,hospital_name,address_id,hospital_phone) VALUES('$id','$name','$add','$phone')";
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



     <div class="hospital">

		 <form method="post" action="hospital.php" style="text-align center">
		  Hospital Name:<input  type= "text" name="name" placeholder="Name.." /><br></br>
			Hospital Address:<select name='address' >
        <<option value=""></option>
                <?php while($row1= mysql_fetch_array ($result1)):;?>
						<option><?php echo $row1[1];?></option>
						<?php endwhile;?>
                  </select><br></br>
			Hospital Phone no:<input  type= "text" name="phone" placeholder="Phone NO.." /><br></br>
					<input type="submit" name="submit" value="submit"/>

</form>
</div>

          <hr>
    <center>
    <caption><h2> Hospital  Information</h2></caption>
  </center>
  <table style="width:100%">
    <tr>
	<th> Hospital Id</th>
	   		<th> Hospital Name</th>
		<th>Hospital Address</th>
		<th> Hospital Phone No</th>

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
					echo '<th>'.$row1['hospital_id'].'</th>';
					echo '<th>'.$row1['hospital_name'].'</th>';
					echo '<th>'.$address.'</th>';
					echo '<th>'.$row1['hospital_phone'].'</th>';

				echo '</tr>';
	}

		?>
		</table>

		<form method="post" action="newhospital.php">
			<input type="submit" name="submit" value="update"/>
		</form>

</body>
</html>
