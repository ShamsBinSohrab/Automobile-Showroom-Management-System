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
	
	require_once("../../data/admin/data_add_emp.php");
	require_once("../connection.php");
		
	if(isset($_REQUEST['emp_id']) && isset($_REQUEST['emp_name']) && isset ($_REQUEST['emp_department']) && isset($_REQUEST['emp_designation']) && isset($_REQUEST['emp_phone']) && isset($_REQUEST['emp_email'])
		)
	{
		$id = $_REQUEST['emp_id'];
		$name = $_REQUEST['emp_name'];
		$department = $_REQUEST['emp_department'];
		$designation = $_REQUEST['emp_designation'];
		$phone = $_REQUEST['emp_phone'];
		$email = $_REQUEST['emp_email'];
		$data = error_add($db,$id);
		$result = false;
		
        if($data == 0)
		{
			$result = add_emp($db,$id,$name,$department,$designation,$phone,$email);
            $result_login = add_login($db,$id,$department);

			if($result && $result_login)
			{	
				echo "Record Added Successfully";
			}

			else
			{
				echo "Failed";
			}
		}

		else
		{
			echo "ID already exists";
		}

		
	}

?>