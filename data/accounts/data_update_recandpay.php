<?php
	function value_retrieve_rec($db,$entry_id)
	{
		$query="select * from accounts_received where entry_id like '$entry_id'";
		$result=mysqli_query($db,$query) or die("Query Error");
		$row=mysqli_fetch_assoc($result);
		return $row;
	}
	function value_retrieve_sold($db,$entry_id)
	{
		$query="select * from accounts_vehicle_sold where entry_id like '$entry_id'";
		$result=mysqli_query($db,$query) or die("Query Error");
		$row=mysqli_fetch_assoc($result);
		return $row;
	}
		function value_retrieve_pay($db,$entry_id)
	{
		$query="select * from accounts_payment where entry_id like '$entry_id'";
		$result=mysqli_query($db,$query) or die("Query Error");
		$row=mysqli_fetch_assoc($result);
		return $row;
	}
	function value_retrieve_pur($db,$entry_id)
	{
		$query="select * from accounts_vehicle_purchase where entry_id like '$entry_id'";
		$result=mysqli_query($db,$query) or die("Query Error");
		$row=mysqli_fetch_assoc($result);
		return $row;
	}
	
	function update_received($db,$entry_id,$amount,$description,$date)
	{
       	$query="update accounts_received set amount='$amount',particulars='$description',date='$date' where entry_id like '$entry_id'" ;
		$result = mysqli_query($db,$query);
		
		return $result;
	}
	function update_sold($db,$entry_id,$amount,$description,$chassis_no,$date)
	{
       	$query="update accounts_vehicle_sold set amount='$amount',customer_name='$description',chassis_no='$chassis_no',date='$date' where entry_id like '$entry_id'" ;
       	$result = mysqli_query($db,$query);
		
		return $result;
	}
	function update_payment($db,$entry_id,$amount,$description,$date)
	{
       	$query="update accounts_payment set amount='$amount',particulars='$description',date='$date' where entry_id like '$entry_id'" ;
		$result = mysqli_query($db,$query);
		
		return $result;
	}
	function update_purchase($db,$entry_id,$amount,$description,$chassis_no,$date)
	{
       	$query="update accounts_vehicle_purchase set amount='$amount',importer_name='$description',chassis_no='$chassis_no',date='$date' where entry_id like '$entry_id'" ;
		$result = mysqli_query($db,$query);
		
		return $result;
	}
	function update_expense($db,$entry_id,$amount,$description,$date)
	{
       	$query="update accounts_expense set amount='$amount',particulars='$description',date='$date' where entry_id like '$entry_id'" ;
		$result = mysqli_query($db,$query);
		
		return $result;
	}
?>