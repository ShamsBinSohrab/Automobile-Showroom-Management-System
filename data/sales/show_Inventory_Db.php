<?php
	function show_inventory_Db()
	{
		require_once("../../data/connection.php");
		$query="select * from vehicle_inventory";
		$result=mysqli_query($db,$query) or die("Query Error");
		
		return $result;
	}
 ?>