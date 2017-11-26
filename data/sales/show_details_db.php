<?php 
	require_once("../../data/connection.php");
	function show_Details_Db($chassis_no)
	{
		global $db;
		$query="select * from vehicle_inventory where chassis_no like '$chassis_no'";
		$result=mysqli_query($db,$query);
		$row=mysqli_fetch_assoc($result);
		return $row;
	}
	function show_Details_Options_Db($chassis_no)
	{
		global $db;
		$options_query="select * from vehicle_options where chassis_no like '$chassis_no'";
		$options_result=mysqli_query($db,$options_query);
		$options_row=mysqli_fetch_assoc($options_result);
		return $options_row;
	}
		
	function show_Details_Other_Options_Db($chassis_no)
	{
		global $db;
		$option_other_query="select * from vehicle_other_options where chassis_no like '$chassis_no'";
		$options_other_result=mysqli_query($db,$option_other_query);
		$options_other_row=mysqli_fetch_assoc($options_other_result);
		return $options_other_row;
	}
 ?>