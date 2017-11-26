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
	require_once("../../data/accounts/data_delete_recandpay.php");
	require_once("../connection.php");
	

	function delete_paypur_entry_id($entry_id)
	{
        global $db;
		return value_retrieve_pay($db,$entry_id);
	}
	function delete_paypur_chassis_no($entry_id)
	{
        global $db;
		return value_retrieve_pur($db,$entry_id);
	}
	function delete_recsold_entry_id($entry_id)
	{
        global $db;
		return value_retrieve_rec($db,$entry_id);
	}
	function delete_recsold_chassis_no($entry_id)
	{
        global $db;
		return value_retrieve_sold($db,$entry_id);
	}
	if($_SERVER['REQUEST_METHOD']=="POST")
	{
	$entry_id=$_REQUEST['entry_id'];
	
	$result_pay=delete_payment($db,$entry_id);
	$result_purc=delete_purchase($db,$entry_id);
	$result_rec=delete_received($db,$entry_id);
	$result_sold=delete_sold($db,$entry_id);
	$result_expense=delete_expense($db,$entry_id);
	
	//for performing the yess button
	if($result_rec && $result_sold)
	{
		if($_REQUEST['source'] == "rec_pay")
			{
				header("location:../../view/accounts/receivedandpayment.php");
			}
			else
			{
				header("location:../../view/accounts/purchaseandsold.php");
			}
	}
	if($result_pay && $result_purc)
	{
		if($_REQUEST['source'] == "rec_pay")
			{
				header("location:../../view/accounts/receivedandpayment.php");
			}
			else
			{
				header("location:../../view/accounts/purchaseandsold.php");
			}
	}
	if($result_pay && $result_expense)
	{	
		header("location:../../view/accounts/receivedandpayment.php");	
	}
	}
	
?>