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

<style>
*{
	box-sizing: border-box;
	float: center;
}
 
input, select{
    padding: 10px;
    font-weight: bolder;
}
.row{
	width: 60%;
	margin: 0 auto;
}
.col-4{
	width: 25%;
	border-right: 2px solid #000;
	float: left;
	height: 450px;
	display: block;
    word-wrap: break-word;
    padding: 15px;
}
.col-8{
	width: 75%;
	float: right;
	height: 450px;
	display: block;
    word-wrap: break-word;
    padding: 15px;
}


</style>

<script type="text/javascript" src="../js/jquery-3.2.1.js"></script>
<script>
$(document).ready(function(){
	$("#button_offer").click(function(event){
		event.preventDefault();
		$.ajax({
		url: "../../service/admin/service_add_offer.php",
		method: "post",
		data: $('#add_offer').serialize(),
		dataType: "text",
		success: function(Result){
			$('#notify').text(Result)
		}
	})
	})
})
</script>


<html>
<head>
	<title>System Dashboard</title>
	<hr/>
	<h2 align = "center">Dashboard - Admin</h2>
	<hr/>
</head>
<body>
	<div class="row">
		<div class="col-4">

			<?php require_once("ext/ext_buttons.php")  ?>

		</div>
		<div class="col-8">
			<form  method="POST" id="add_offer">
			<table cellpadding="12">
			<tr>
				<tr>
					<td>Offer Title:</td>
					<td><input type="text" name="title" size="50"></td> 
				</tr>
				<tr>
					<td>Car Maker:</td>
					<td><input type="text" name="maker" size="20"></td> 
				</tr>
				<tr>
					<td>Car Model:</td>
					<td><input type="text" name="model" size="20"></td> 
				</tr>
				<tr>
					<td>Model Year:</td>
					<td><input type="text" name="year" size="20"></td> 
				</tr>
				<tr>
					<td>Detail:</td>
					<td><textarea cols="50" rows="4" name="detail"></textarea></td> 
				</tr>
				<tr>
					<td colspan="2" align="center"><input type="submit" value="Publish Offer" id="button_offer"/></td>
				</tr>
			</tr>
			</table>
			<p id="notify"></p>
			</form>


		</div>
	</div>
</body>
</html>