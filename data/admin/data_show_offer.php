<?php

	function get_offers()
	{
		require_once("../connection.php");
		$query = "select * from offer_table";

		$result = mysqli_query($db,$query) or die($query);

		return $result;
	}

?>

