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

	require_once("../../data/admin/data_delete_offer.php");

	$id = $_REQUEST['id'];

	$result = delete_offer($id);

	if($result)
	{
		header("location: ../../view/admin/show_offer.php");
	}

	else
	{
		echo "Error Occured !!!!";	
	}
?>