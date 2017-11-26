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
                              
                              url: "../../service/accounts/service_all_received.php",
                              dataType: "html",
                              success: function(Result){
                                  $('#rec').html(Result)
                              }
                          })
        
                            $.ajax({
                              
                              url: "../../service/accounts/service_all_payment.php",
                              dataType: "html",
                              success: function(Result){
                                  $('#pay').html(Result)
                              }
                          })
        
                        $('#search').click(function(event){

                        event.preventDefault();

                         $.ajax({

                              url: "../../service/accounts/service_search_received.php",
                              method: "post",
                              data: $('#search_form').serialize(),
                              dataType: "html",
                              success: function(Result){
                                  $('#rec').html(Result)
                              }
                          })
                            
                        $.ajax({

                              url: "../../service/accounts/service_search_payment.php",
                              method: "post",
                              data: $('#search_form').serialize(),
                              dataType: "html",
                              success: function(Result){
                                  $('#pay').html(Result)
                              }
                          })
                    })   
    })
    
    
    
     
</script>

<html>
	<head>
		<title>System Dashboard</title>
        <link rel="stylesheet" href="../css/style.css">
	</head>
	
	<body class="no_bg rec_pay">
        <hr/>
		<h2 align = "center">Dashboard - Accounts</h2>
		<hr/>

        <?php require_once("ext/ext_buttons.php"); ?>  
        <?php require_once("ext/ext_search.php"); ?> 
        
		<table align="center" class="table">
			<tr>
				<td>
                    <table align = "left" class="receivedandpayment">
                        <thead>
                            <th colspan="4"><center><h4>Received</h4></center></th>
                        <tr>
                            <th>
                               Date
                            </th>
                             <th>
                               Particulars
                            </th>
                             <th>
                               Ammount(Taka)
                            </th>
							 <th>
                               Edit OR Delete
                            </th>
                        </tr>
                        </thead>
   
                        <tbody id = "rec">

                        </tbody>
                    </table>
                </td>
			     <td>
				    <table align = "right" class="receivedandpayment">
					 <thead>
                            <th colspan="4"><center><h4>Payment</h4></center></th>
                        <tr>
                            <th>
                               Date
                            </th>
                             <th>
                               Particulars
                            </th>
                             <th>
                               Ammount(Taka)
                            </th>
							<th>
                               Edit OR Delete
                            </th>
                        </tr>
                        </thead>
   
                        <tbody id = "pay">

                        </tbody>
                    </table>
                </td>
		</tr>
		</table>
    </body>
</html>