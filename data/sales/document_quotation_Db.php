<?php 
	require_once("../../data/connection.php");
	function document_quotation__Db($chassis_no)
	{
		global $db;
		$query="select * from vehicle_inventory where chassis_no like '$chassis_no'";
		$result=mysqli_query($db,$query);
		$row=mysqli_fetch_assoc($result);
		return $row;
	}
	function document_quotation_options_Db($chassis_no)
	{
		global $db;
		$options_query="select * from vehicle_options where chassis_no like '$chassis_no'";
		$options_result=mysqli_query($db,$options_query);
		$options_row=mysqli_fetch_assoc($options_result);
		return $options_row;
	}
		
	function document_quotation_options_other_Db($chassis_no)
	{
		global $db;
		$option_other_query="select * from vehicle_other_options where chassis_no like '$chassis_no'";
		$options_other_result=mysqli_query($db,$option_other_query);
		$options_other_row=mysqli_fetch_assoc($options_other_result);
		return $options_other_row;
	}
 ?>