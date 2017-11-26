<?php
   
    if(!isset($_SESSION))
    {
        session_start();
        
        if($_SESSION['user'] == null)
        {
            header("location: ../../index.php");
        }
    }
    
?>
<?php

	require_once("../../data/admin/data_view_emp.php");

	$result = get_emp();

	while($row = mysqli_fetch_assoc($result))
	{
		echo "<tr>
				<td>$row[emp_id]</td>
				<td>$row[emp_name]</td>
				<td>$row[emp_department]</td>
				<td>$row[emp_designation]</td>
				<td>$row[emp_phone]</td>
				<td>$row[emp_email]</td>						
				<td><a href='../../view/admin/edit_user.php?id=$row[emp_id]'>Edit <a></td>					
				<td><a href='../../service/admin/service_delete_emp.php?id=$row[emp_id]'>Delete <a></td>					
			 </tr>";
	}

?>