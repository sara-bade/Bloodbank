<?php

// php select option value from database
ob_start();
session_start();
require_once 'dbconnect.php';

// mysql select query
$query1 = "SELECT * FROM `blood_group`";
$query = "SELECT * FROM `address`";

// for method 1

$result1 = mysql_query($query1);

// for method 2

$result2 = mysql_query($query);

$options = "";
$option = "";
$blood="";

while($row2 = mysql_fetch_array($result2))
{
    $options = $options."<option>$row2[donar_address]</option>";


}
while($row1 = mysql_fetch_array($result1)){

  $option = $option."<option>$row1[blood_group]</option>";
}



?>

<!DOCTYPE html>

<html>
    <head>
      <link rel="stylesheet" type="text/css" href="style.css">

<style>


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
</div>

        <div class="searchby">
        <form action="continue_home.php" method="POST">
        <h2>Search By Blood Group:</h2>
        <!--Method One-->
        Bloodgroup: <select name="blood">
           <option value=""></option>
            <?php echo $option;

            ;?>
        </select><br><br>


        Address: <select name="address">
            <option value=""></option>
            <?php echo $options;?>
        </select><br><br>


 <input type="submit" value="submit">

 </form>
    </body>

</html>
