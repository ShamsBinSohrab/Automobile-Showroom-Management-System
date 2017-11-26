<?php
   
    if(!isset($_SESSION))
    {
        session_start();
        
        if($_SESSION['user'] != "Sales")
        {
            if($_SESSION['user'] != "Admin")
            {
                header("location: ../../index.php");
            }
            
        }
    }
    
?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
    <link rel="stylesheet" href="../css/style.css">
	<script language = "javascript" type="text/javascript" src="../js/jquery-3.2.1.js"></script>

	<script>
		$(document).ready(function()
		{
			$.ajax(
			{
				url: "../../service/sales/show_Inventory_Service.php",
				dataType: "html",
				success: function(Result){
					$('#inventory').html(Result)
				}
			})
            
            $('#maker').on('keyup',function(){
                
                $.ajax({
                    url: "../../service/sales/search_inventory_service.php",
                    method: "post",
                    data: $('#search_form').serialize(),
                    dataType: "html",
                    success: function(Result){
                        $('#inventory').html(Result)
                    }
                })
            })
            
             $('#model').on('keyup',function(){
                
                $.ajax({
                    url: "../../service/sales/search_inventory_service.php",
                    method: "post",
                    data: $('#search_form').serialize(),
                    dataType: "html",
                    success: function(Result){
                        $('#inventory').html(Result)
                    }
                })
            })
            
            $('#grade').on('keyup',function(){
                
                $.ajax({
                    url: "../../service/sales/search_inventory_service.php",
                    method: "post",
                    data: $('#search_form').serialize(),
                    dataType: "html",
                    success: function(Result){
                        $('#inventory').html(Result)
                    }
                })
            })
            
            $('#model_year').on('keyup',function(){
                
                $.ajax({
                    url: "../../service/sales/search_inventory_service.php",
                    method: "post",
                    data: $('#search_form').serialize(),
                    dataType: "html",
                    success: function(Result){
                        $('#inventory').html(Result)
                    }
                })
            })
            
            $('#color').on('keyup',function(){
                
                $.ajax({
                    url: "../../service/sales/search_inventory_service.php",
                    method: "post",
                    data: $('#search_form').serialize(),
                    dataType: "html",
                    success: function(Result){
                        $('#inventory').html(Result)
                    }
                })
            })
            
            $('#search_button').click(function(event){
                
                event.preventDefault();
                
                $.ajax({
                    url: "../../service/sales/search_inventory_service.php",
                    method: "post",
                    data: $('#search_form').serialize(),
                    dataType: "html",
                    success: function(Result){
                        $('#inventory').html(Result)
                    }
                })
            })
            
            
    })
	</script>


</head>
<body class="car_inventory no_bg">
	<fieldset>
		<legend align = "center"><h2>Stock List</h2></legend>
		<?php require_once("ext/ext_search_bar.php") ?>
		<p id = "a"> </p>
        <?php 
            
            if($_SESSION['user'] == "Sales")
            {
               require_once("ext/ext_buttons.php");   
            }
        ?>  
		<table align = "center" class="stock">
			<thead>
				<tr>
					<td align = "center"><b>Maker</b></td>
					<td align = "center"><b>Model</b></td>
					<td align = "center"><b>Grade</b></td>
					<td align = "center"><b>Color</b></td>
					<td align = "center"><b>Model Year</b></td>
					<td align = "center"><b>Chassis No</b></td>
					<td align = "center"><b>Engine No</b></td>
					<td align = "center" colspan="2"><b>Edit/Delete/Show</b></td>
				</tr>
			</thead>
			<tbody id="inventory">
			</tbody>
		</table>
	</fieldset>	
</body>
</html>
