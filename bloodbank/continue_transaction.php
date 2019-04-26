<?php
ob_start();
session_start();
require_once 'dbconnect.php';


if(isset($_POST['name'])){
   
	$name= $_POST['name'];
	$bloodgroup= $_POST['bloodgroup'];
	$pints= $_POST['pints'];
     
	$count='';
			
			$qued="Select * from transaction";
	    $resultd = mysql_query($qued);
        while($row = mysql_fetch_array($resultd)){
		$count=$count+2;
	       }
	        $cid="TRAN".$count;
		

	$query_bloodgroup= "SELECT * FROM blood_group WHERE blood_group='$bloodgroup'";
	$result_bloodgroup = mysql_query($query_bloodgroup);
	
	while($row=mysql_fetch_array($result_bloodgroup)){
		
	$bloodid=$row['blood_group_id'];
	}
	
	
	
	$query_availinventory="SELECT * FROM blood_inventory where blood_group_id='$bloodid'";
	$result_availinventory = mysql_query($query_availinventory);
	
	$blood_count=0;
	while($row=mysql_fetch_array($result_availinventory)){
		
	$blood_count = $row['pints'];
	}
	
	if($blood_count==0  )
	{
	  echo "Blood not available";
	}
	else if (($blood_count-$pints)<0){
		echo "Not Enough Blood";
	}
	else
	{

	$query_bloodinventory = "UPDATE  blood_inventory SET pints=pints-'$pints'where blood_group_id='$bloodid'";
	$result_bloodinventory = mysql_query($query_bloodinventory);
	
	
		$result=mysql_query("SELECT * FROM price where blood_group_id='$bloodid'");
		while($row=mysql_fetch_array($result)){
		 $price=$row['price'];
		 $pricep= $pints * $price;
		 echo "$name must pay $pricep for $pints pint blood";
		 		}
		
		
		
	
	$query ="INSERT INTO transaction(transaction_id,recipient_name,blood_group_id,pints,cost) VALUES('$cid','$name','$bloodid','$pints','$pricep')";
	$res = mysql_query($query);
	//header("Location: admin.php");
	
	}	 
     
	
}
?>