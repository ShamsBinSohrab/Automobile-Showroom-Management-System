<?php

	function get_emp()
	{
		require_once("../connection.php");
		$query = "select * from emp_list";

		$result = mysqli_query($db,$query) or die($query);

		return $result;
	}

?>

