<?php 
require_once("../../data/connection.php");
function delete_inventory_db($chassis_no)
	{
		global $db;
		$query0="DELETE FROM vehicle_inventory WHERE chassis_no like '$chassis_no'" ;
		mysqli_query($db,$query0);

		$query1="DELETE FROM vehicle_options WHERE chassis_no like '$chassis_no'" ;
		mysqli_query($db,$query1);

		$query2="DELETE FROM vehicle_other_options WHERE chassis_no like '$chassis_no'" ;
		mysqli_query($db,$query2);		
		return true;
	}

 ?>