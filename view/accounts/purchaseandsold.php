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
                              
                              url: "../../service/accounts/service_all_purchase.php",
                              dataType: "html",
                              success: function(Result){
                                  $('#purchase').html(Result)
                              }
                          })
        
                            $.ajax({
                              
                              url: "../../service/accounts/service_all_sold.php",
                              dataType: "html",
                              success: function(Result){
                                  $('#sold').html(Result)
                              }
                          })
        
                       $('#search').click(function(event){

                        event.preventDefault();

                         $.ajax({

                              url: "../../service/accounts/service_search_purchase.php",
                              method: "post",
                              data: $('#search_form').serialize(),
                              dataType: "html",
                              success: function(Result){
                                  $('#purchase').html(Result)
                              }
                          })
                            
                        $.ajax({

                              url: "../../service/accounts/service_search_sold.php",
                              method: "post",
                              data: $('#search_form').serialize(),
                              dataType: "html",
                              success: function(Result){
                                  $('#sold').html(Result)
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
	
	<body class="no_bg pur_sold">
		<hr/>
		<h2 align = "center">Dashboard - Accounts</h2>
		<hr/>

<?php require_once("ext/ext_buttons.php"); ?>  
<?php require_once("ext/ext_search.php"); ?> 

        <table align="center" class="table">
        	<tr>
        		<td>
        			<table>
					<thead>
						<h3 align="center">Purchased Vehicles</h3>
        				<tr>
        					<th>Date</th>
        					<th>Chassis No</th>
        					<th>Importer</th>
							<th>Status</th>
        					<th>Edit OR Delete</th>
        				</tr>
						</thead>
						 <tbody id = "purchase">

                        </tbody>
        			</table>
        		</td>
        		<td>
        			<table>
					<thead>
					
        				<h3 align="center">Sold Vehicles</h3>
        				<tr>
        					<th>Date</th>
        					<th>Chassis no</th>
        					<th>Customer</th>
							<th>Edit OR Delete</th>
        				</tr>
						</thead>
						<tbody id = "sold">

                        </tbody>
        			</table>
        		</td>
        	</tr>
        </table>

    </body>
</html>

