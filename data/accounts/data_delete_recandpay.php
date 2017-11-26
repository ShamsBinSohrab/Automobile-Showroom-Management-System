
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
	function delete_payment($db,$entry_id)
	{
       	$query="DELETE FROM accounts_payment WHERE accounts_payment.entry_id = '$entry_id'";
       	$result=mysqli_query($db,$query);
		return $result;
	}
	function delete_purchase($db,$entry_id)
	{
       	$query="DELETE FROM accounts_vehicle_purchase WHERE accounts_vehicle_purchase.entry_id = '$entry_id'";
		$result=mysqli_query($db,$query);
		return $result;
	}
	function delete_received($db,$entry_id)
	{
       	$query="DELETE FROM accounts_received WHERE accounts_received.entry_id = '$entry_id'";
      	$result=mysqli_query($db,$query);
		return $result;
	}
	function delete_sold($db,$entry_id)
	{
       	$query="DELETE FROM accounts_vehicle_sold WHERE accounts_vehicle_sold.entry_id = '$entry_id'";
       	$result=mysqli_query($db,$query);
		return $result;
	}
	function delete_expense($db,$entry_id)
	{
       	$query="DELETE FROM accounts_expense WHERE accounts_expense.entry_id = '$entry_id'";
       	$result=mysqli_query($db,$query);
		return $result;
	}
?>