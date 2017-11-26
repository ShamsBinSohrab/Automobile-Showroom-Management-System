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
	$.ajax({
		url: "../../service/admin/service_view_emp.php",
		dataType: "html",
		success: function(Result){
			$('#emp').html(Result)
		}
	})
})

</script>

<html>
<head>
<meta charset="utf-8"/>
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
			
			<form action="#">
			<table style="width:70%" border="4px" cellpadding="15">
				<thead>
				<tr>
					<th>Employee ID</th>
					<th>Name</th>
					<th>Department</th>
					<th>Designation</th>
					<th>Phone</th>
					<th>Email</th>
				</tr>				
				</thead>
				<tbody id = "emp">
					
				</tbody>
		 
			</table>
			</form>


		</div>
	</div>
</body>
</html>