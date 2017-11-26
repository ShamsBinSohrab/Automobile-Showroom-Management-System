<?php
   
    if(!isset($_SESSION))
    {
        session_start();
        
        if($_SESSION['user'] != "Account")
        {
            if($_SESSION['user'] != "Admin")
            {
                header("location: ../../index.php");
            }
            
        }
    }
    
?>

<script language="JavaScript" type="text/javascript" src="../js/jquery-3.2.1.js"></script>
<script>
   
    $(document).ready(function(){     
                          $.ajax({
                              url: "../../service/accounts/service_all_profitloss.php",
                              dataType: "html",
                              success: function(Result){
                                  $("#pro").html(Result)
                              }
                          })

                    })   
  
</script>

<html>
	<head>
		<title>System Dashboard</title>
        <link rel="stylesheet" href="../css/style.css">
	</head>
	<body class="no_bg profit_loss">

        <hr/>
        <h2 align = "center">Dashboard - Accounts</h2>
        <hr/>

        <?php 
            
            if($_SESSION['user'] == "Account")
            {
               require_once("ext/ext_buttons.php");   
            }
        ?>    
        <?php require_once("ext/ext_search.php"); ?> 
		
        <table align="center" class="profitloss">
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
			<tbody id = "pro">
			
			</tbody>
        </table>
		
	</body>
</html>