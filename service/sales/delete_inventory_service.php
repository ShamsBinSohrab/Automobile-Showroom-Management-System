<?php 
	require_once("../../data/sales/delete_inventory_Db.php");

	function delete_inventory($chassis_no)
	{
		return delete_inventory_db($chassis_no);
	}
			
 ?>