<?php
ob_start();
session_start();
require_once 'dbconnect.php';

if(isset($_POST['name'])){
	$name= $_POST['name'];
	$quantity= $_POST['quantity'];
	 $count='';


	$qued="Select * from inventory";
	$resultd = mysql_query($qued);
    while($row = mysql_fetch_array($resultd)){
	$count=$count+2;
		}

     $id="ITM".$count;
	$query = "INSERT INTO inventory(item_no,item_name,item_quantity) VALUES('$id','$name','$quantity')";
	$res = mysql_query($query);
	header("Location: admin.php");

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
     <div class="inventory">
		 <form method="post" action="inventory.php">
			Item Name:<input  type= "text" name="name" placeholder="Name.." required /><br></br>
			Item Quantity:<input  type= "text" name="quantity" placeholder="Quantity.."required /><br></br>
						<input type="submit" name="submit" value="submit"/>
          </div>
          </form> <hr>


  <center>
	<caption><h2> Inventory</h2></caption>
  </center>
  <table style="width:100%">
    <tr>
    <th>Item No</th>
    <th>Item Name</th>
	<th>Item Quantity</th>
	</tr>

		<?php
		$result = mysql_query("SELECT * FROM  inventory");

			while($row=mysql_fetch_array($result)){
			echo '<tr>';
			 echo '<th>'.$row['item_no'].'</th>';
					echo '<th>'.$row['item_name'].'</th>';
					echo '<th>'.$row['item_quantity'].'</th>';


				echo '</tr>';
	}




		?>
		</table>
	   	<form method="post" action="updateinventory.php">

					<input type="submit" name="submit" value="update"/>

          </form>

      </body>
</html>
