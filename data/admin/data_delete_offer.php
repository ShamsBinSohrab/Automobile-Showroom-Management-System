<?php
	
	function delete_offer($id)
	{
		require_once("../connection.php");
		$query = "delete from offer_table where id like '$id'";
		$result = mysqli_query($db,$query) or die($query);

		return $result;
	}
	


?>