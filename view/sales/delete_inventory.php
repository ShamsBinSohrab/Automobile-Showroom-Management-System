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
	require_once("../../service/sales/delete_inventory_service.php");

	$chassis_no=$_REQUEST['chassis_no'];

	if(delete_inventory($chassis_no))
	{
		header("location: inventory.php");
	}
 ?>