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
	$position= $_POST['position'];
		  $count='';

	$que="Select * from address where donar_address='$address'";

		$qued="Select * from staff ";
	$resultd = mysql_query($qued);
  while($row = mysql_fetch_array($resultd)){
		$count=$count+2;
	}
      $id="STAS".$count;
	$result = mysql_query($que);
	while($row1= mysql_fetch_array($result)){
	$add = $row1['address_id'];

	$query = "INSERT INTO staff(staff_id,staff_name,address_id,staff_phone,position) VALUES('$id','$name','$add','$phone','$position')";
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
	</h3>
	</ul>
</div><br></br>



     <div class="staff">

		 <form method="post" action="staff.php" style="text-align center">
			Staff Name:<input  type= "text" name="name" placeholder="Name.."required /><br></br>
			Staff Address:<select name='address' >
            <option value=""></option>
            <?php while($row1= mysql_fetch_array ($result1)):;?>
        		<option><?php echo $row1[1];?></option>
						<?php endwhile;?>
                  </select><br><br>
			Staff Phone no:<input  type= "text" name="phone" placeholder="Phone NO.."required /><br></br>
			Staff Position:<select name="position">
          <option value=""></option>
					<option value="Manager">Manager</option>
					<option value="Assistant Manager">Assistant Manager</option>
					<option value="Doctor">Doctor</option>
					<option value="Lab Assistant">Lab Assistant</option>
					<option value="Lab Technitian">	Lab Technitian</option>
					<option value="Manager">Manager</option>
					<option value="Nurse">Nurse</option>

				</select><br>
			<input type="submit" name="submit" value="Add"/>

          </form>
        </div>


          <hr>



          <h2><caption> Staff  Information</caption></h2>
    <tr>
	<table style="width:100%">

    <th>Staff Id</th>
    <th>Staff Name</th>
	<th>Staff Address</th>
	<th>Staff Phone NO</th>
	<th>Staff Position</th>
	<th>Staff Salary</th>
	  </tr>

	<?php


	       $result1= mysql_query("SELECT * FROM staff_salary");
			while($row2=mysql_fetch_array($result1)){
			   $salary=$row2['salary'];
			}
			$result = mysql_query("SELECT * FROM staff");
			while($row1=mysql_fetch_array($result)){
			   $position=$row1['position'];

			  $result1= mysql_query("SELECT * FROM staff_salary where position='$position'");
			while($row2=mysql_fetch_array($result1)){
			   $salary=$row2['salary'];
			}

		     $add=$row1['address_id'];
		$result1=mysql_query("SELECT * FROM address where address_id='$add'");
          while($row=mysql_fetch_array($result1)){
		   $address=$row['donar_address'];


		}



				echo '<tr>';
					echo '<th>'.$row1['staff_id'].'</th>';
					echo '<th>'.$row1['staff_name'].'</th>';
					echo '<th>'.$address.'</th>';
					echo '<th>'.$row1['staff_phone'].'</th>';
					echo '<th>'.$row1['position'].'</th>';
					echo '<th>'.$salary.'</th>';

				echo '</tr>';
	}

		?>





		  </table>
	   	<form method="post" action="updatestaff.php">

					<input type="submit" name="submit" value="Update Staff_info"/>
		</form>


	    <form method="post" action="updatesalary.php">

		<input type="submit" name="submit" value="Update Salary"/>

          </form>


      </body>
</html>
