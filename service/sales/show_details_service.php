<?php 
	require_once("../../data/sales/show_Details_Db.php");
	function show_Details_Service($chassis_no)
	{
		return show_Details_Db($chassis_no);	
	}
	function show_Details_Options_Secvice($chassis_no)
	{
		return show_Details_Options_Db($chassis_no);	
	}
	function show_Details_Other_Options_Secvice($chassis_no)
	{
		return show_Details_Other_Options_Db($chassis_no);	
	}
 ?>