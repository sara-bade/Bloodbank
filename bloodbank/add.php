<?php
ob_start();
session_start();
require_once 'dbconnect.php';

if(isset($_POST['email'])){
	$email= $_POST['email'];
	$name= $_POST['name'];
	$address= $_POST['address'];
	$phone= $_POST['phone'];
	$sex= $_POST['sex'];
	$dob= $_POST['dob'];
	$weight= $_POST['weight'];
	$bloodgroup= $_POST['bloodgroup'];
	$disease= $_POST['disease'];

	  $add='';
	  $blood='';
	  $count='';

		$qued="Select * from rejected_donor";
	    $resultd = mysql_query($qued);
        while($row = mysql_fetch_array($resultd)){
		$count=$count+2;
	       }
	        $rid="RJD".$count;

	  $now= time();
	$ndob= strtotime ($dob);
	$difference= $now - $ndob;
	$age=floor($difference/31556926);
	echo $age;

	$que="Select * from address where donar_address='$address'";
	$result = mysql_query($que);

	$queb="Select * from blood_group where blood_group='$bloodgroup'";
	$resultb = mysql_query($queb);

	$queemail = "SELECT * FROM donor WHERE user_email='$email'";
	$resultemail = mysql_query($queemail);
	$rowemail=mysql_fetch_array($resultemail);


	while($row = mysql_fetch_array($result)){
		$add = ($row['address_id']);
	}
	while($row = mysql_fetch_array($resultb)){
		$blood = ($row['blood_group_id']);
	}

	if($disease=='Yes' || $age<18)
	{
			$query = "INSERT INTO rejected_donor(rjdonor_id,user_name,phoneno)VALUES('$rid','$name','$phone')";
	$res = mysql_query($query);
	echo "Sorry!! You cant donate..";

	}
	else{

	if($rowemail){
		echo "The user is already registered...";


		}
	else{
		$qued="Select * from donor";
			$resultd = mysql_query($qued);
				while($row = mysql_fetch_array($resultd)){
		   $countr=$countr+2;
				 }

		   $id="DON".$count;

	  	$query = "INSERT INTO donor(donor_id,donor_name,address_id,donor_phone,donor_sex,donor_DOB,donor_weight,blood_group_id,disease,user_email,age)VALUES('$id','$name','$add','$phone','$sex','$dob','$weight','$blood','$disease','$email','$age')";
	$res = mysql_query($query);
		header("Location: donor.php");

	}

	}
}

?>
