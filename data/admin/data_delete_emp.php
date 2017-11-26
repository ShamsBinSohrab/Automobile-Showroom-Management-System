<?php
	
	function delete_emp($id)
	{
		require_once("../connection.php");
		$query = "delete from emp_list where emp_id like '$id'";
		$result = mysqli_query($db,$query) or die($query);

		return $result;
	}
	


?>