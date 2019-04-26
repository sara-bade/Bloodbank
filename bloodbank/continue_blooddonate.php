<?php
ob_start();
session_start();
require_once 'dbconnect.php';

if(isset($_POST['pints'])){
	$pints= $_POST['pints'];
	$email= $_POST['email'];
	$type= $_POST['type'];

	$id='';

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
		$querytime = "SELECT * FROM blood_info where donor_id=$id";
		$resulttime = mysql_query($querytime);

			while($row2=mysql_fetch_array($resulttime)){
           $pint=$row2['pints'];

					$time=$row2['times'];
		}

if($time=='')
{
	$queryup = "INSERT INTO blood_info(donor_id,blood_group_id,blood_added_date,pints,times) VALUES('$id','$bloodid',current_timestamp,'$pints',1)";
	 $resup = mysql_query($queryup);


}

	else{
		$queryup = "UPDATE blood_info SET pints='$pints'+'$pint', blood_added_date = current_timestamp,times=$time+1 WHERE donor_id=$id";

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
		header("Location: admin.php");

	 }
	 else
	 {
	     $query_bloodinventory = "UPDATE  blood_inventory SET pints=pints+'$pints'where blood_group_id='$bloodid'";
	     $result_bloodinventory = mysql_query($query_bloodinventory);
		 header("Location: admin.php");

	 }



}
}
?>