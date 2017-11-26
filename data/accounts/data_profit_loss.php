<?php 
	
	
	function chassisExists($db, $chassis_no)
	{
		$query = "select chassis_no from accounts_vehicle_purchase where chassis_no like '$chassis_no'";
		
		$result = mysqli_query($db, $query);
		
		return mysqli_num_rows($result);
	}
	function status($db, $chassis_no)
	{
		$query = "select status from accounts_vehicle_purchase where chassis_no like '$chassis_no'";
		
		$result = mysqli_query($db, $query) or die($query);
		
		return $result;
	}
	function updatepurchaseaftersold($db, $chassis_no)
	{
		$query = "update accounts_vehicle_purchase set status = 'sold' where chassis_no like '$chassis_no'";
		
		$result = mysqli_query($db, $query) or die($query);
		
		return $result;
	}
	function calculate($db,$chassis_no)
	{
		$query_p = "select amount,status from accounts_vehicle_purchase where chassis_no like '$chassis_no'";
		$query_s = "select * from accounts_vehicle_sold where chassis_no like '$chassis_no'";
		
		$result_p = mysqli_query($db,$query_p);
		$result_s = mysqli_query($db,$query_s);
		
		$row_p = mysqli_fetch_assoc($result_p);
		$row_s = mysqli_fetch_assoc($result_s);
		
		$purchase_amount = $row_p['amount'];
	
		$sold_amount = $row_s['amount'];
		
		
		$amount = $sold_amount - $purchase_amount;
		
		$particulars_array = array("amount" => $amount, "customer" => $row_s['customer_name'], "date" => $row_s['date'], "chassis_no" => $chassis_no, "status" => $row_p['status']);
		
		return $particulars_array;
		
	}

 ?>
