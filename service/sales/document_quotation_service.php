<?php 
	require_once("../../data/sales/document_quotation_Db.php");
	function document_quotation_service($chassis_no)
	{
		return document_quotation__Db($chassis_no);	
	}
	function document_quotation_options_service($chassis_no)
	{
		return document_quotation_options_Db($chassis_no);	
	}
	function document_quotation_options_other_service($chassis_no)
	{
		return document_quotation_options_other_Db($chassis_no);	
	}

	
 ?>