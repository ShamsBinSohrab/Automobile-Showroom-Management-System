<?php

	function add_emp($db, $id, $name,$department, $designation, $phone, $email)
	{
		$query = "insert into emp_list (emp_id, emp_name, emp_department, emp_designation, emp_phone, emp_email) values ('$id', '$name', '$department', '$designation', '$phone', '$email')";

		$result = mysqli_query($db,$query) or die($query);

		return $result;
	}

	function error_add($db, $id)
	{
		$query = "select emp_id from emp_list where emp_id like '$id'";

		$result = mysqli_query($db,$query) or die($query);

		return mysqli_num_rows($result);

	}

    function add_login($db,$id,$role)
    {
        $password = password_hash('password', PASSWORD_DEFAULT);
        
        $query = "insert into login_table (uname, password, emp_id, role) values ('$id', '$password', '$id', '$role')";

		$result = mysqli_query($db,$query) or die($query);

		return $result;
    }

?>

