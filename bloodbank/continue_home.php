<?php

// php select option value from database
ob_start();
session_start();
require_once 'dbconnect.php';

if(isset($_POST['blood'])){
$blood= $_POST['blood'];
$address = $_POST['address'];


$queryb = mysql_query ("SELECT * FROM `blood_group` where blood_group='$blood'");
$querya = mysql_query("SELECT * FROM `address` where donar_address='$address'");



while($row1 = mysql_fetch_array($queryb)){
    $bid=$row1['blood_group_id'];


}
while($row2 = mysql_fetch_array($querya))
{
      $aid=$row2['address_id'];



}


$select="SELECT * from donor where blood_group_id='$bid' and address_id='$aid'";
$selectquery=mysql_query($select);

$fname='';
?>



<!DOCTYPE html>

<html>

    <head>

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
    <center>
	<h2><caption>Information</caption></h2>
  </center>
	<table style="width:100%">
    <tr>
    <th>Donor Name</th>
    <th>Donor Phone No</th>
	<th>Donor Email Id</th>
	</tr>


  <br>
  <center>
  <h3>
<?php
while($row=mysql_fetch_array($selectquery)){

$fname=$row['donor_name'];
					echo '<tr>';
			     echo '<th>'.$fname.'</th>';
					echo '<th>'.$row['donor_phone'].'</th>';
					echo '<th>'.$row['user_email'].'</th>';
					echo '<tr>';


}

if ($fname==''){
	echo ('Sorry!! Not donor found');
}



}

?>
</h3>
</center>
</table>
    </body>

</html>
