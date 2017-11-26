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
	require_once("../../data/accounts/data_update_recandpay.php");
	require_once("../connection.php");
	
	function update_recsold_entry_id($entry_id)
	{  
        global $db;
		return value_retrieve_rec($db,$entry_id);
	}
	function update_recsold_chassis_no($entry_id)
	{
        global $db;
		return value_retrieve_sold($db,$entry_id);
	}
	function update_paypur_entry_id($entry_id)
	{
        global $db;
		return value_retrieve_pay($db,$entry_id);
	}
	function update_paypur_chassis_no($entry_id)
	{
        global $db;
		return value_retrieve_pur($db,$entry_id);
	}
	if($_SERVER['REQUEST_METHOD']=="POST")
	{
	$entry_id=$_REQUEST['entry_id'];
	$amount=$_REQUEST['amount'];
	$description=$_REQUEST['description'];
	$chassis_no=$_REQUEST['chassis_no'];
	$date=$_REQUEST['date'];
	
	
	$result_rec = update_received($db,$entry_id,$amount,$description,$date);
	$result_sold = update_sold($db,$entry_id,$amount,$description,$chassis_no,$date);
	
	$result_pay = update_payment($db,$entry_id,$amount,$description,$date);
	$result_purchase = update_purchase($db,$entry_id,$amount,$description,$chassis_no,$date);
	$result_expense= update_expense($db,$entry_id,$amount,$description,$date);
	
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
	
	if($result_pay && $result_purchase)
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