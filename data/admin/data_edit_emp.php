<?php
	
	function edit_emp($id, $name,$department, $designation, $phone, $email)
	{
		require_once("../connection.php");
		$query = "UPDATE emp_list SET emp_name='$name', emp_department='$department', emp_designation='$designation', emp_phone='$phone', emp_email='$email' WHERE emp_id like '$id' ";
		$result = mysqli_query($db,$query) or die($query);

		return $result;
	}
	


?>