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
	
	require_once("../../data/admin/data_edit_emp.php");

	if(isset($_REQUEST['emp_id']) && isset($_REQUEST['emp_name']) && isset ($_REQUEST['emp_department']) && isset($_REQUEST['emp_designation']) && isset($_REQUEST['emp_phone']) && isset($_REQUEST['emp_email'])
		)
	{
		$id = $_REQUEST['emp_id'];
		$name = $_REQUEST['emp_name'];
		$department = $_REQUEST['emp_department'];
		$designation = $_REQUEST['emp_designation'];
		$phone = $_REQUEST['emp_phone'];
		$email = $_REQUEST['emp_email'];

		$result = edit_emp($id,$name,$department,$designation,$phone,$email);

		if($result)
		{
			echo "Successfully Edited";
		}

		else
		{
			echo "Failed";
		}
	}

	
?>