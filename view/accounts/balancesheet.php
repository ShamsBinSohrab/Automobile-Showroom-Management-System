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

<script language="JavaScript" type="text/javascript" src="../js/jquery-3.2.1.js"></script>
<script>
   
    $(document).ready(function(){     
                          $.ajax({
                              url: "../../service/accounts/service_all_balancesheet.php",
                              dataType: "html",
                              success: function(Result){
                                  $("#balancesheet").html(Result)
                              }
                          })
						   event.preventDefault();

                         $.ajax({

                              url: "abc.php",
                              method: "post",
                              data: $('#search_form').serialize(),
                              dataType: "html",
                              success: function(Result){
                                  $('#balancesheet').html(Result)
                              }
                          })

                    })   
  
</script>

<html>
	<head>
		<title>System Dashboard</title>
        <link rel="stylesheet" href="../css/style.css">
	</head>
	
	<body class="no_bg balance_sheet">
        
		<hr/>
		<h2 align = "center">Dashboard - Accounts</h2>
		<hr/>

        <?php require_once("ext/ext_buttons.php"); ?>  
        <?php require_once("ext/ext_search.php"); ?> 
        
		<table align="center" class="balancesheet">
		<thead>
            <tr>
                <th>Date</th>
                <th>Vehicle Description</th>
                <th>Chassis No</th>
                <th>Purchase Ammount</th>
                <th>Sold Ammount</th>
                <th>Profit</th>
                <th>Loss</th>
                <th>Remarks</th>
            </tr>
			</thead>
            <tbody id = "balancesheet">
			
			</tbody>
        </table>
    </body>
</html>

