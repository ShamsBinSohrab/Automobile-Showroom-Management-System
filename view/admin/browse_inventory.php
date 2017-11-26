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
			
			<form action="#">
			<table style="width:70%" border="4px" cellpadding="15">
				<thead>
				<tr>
					<th>Employee ID</th>
					<th>Name</th>
					<th>Department</th>
					<th>Designation</th>
				</tr>				
				</thead>
				<tbody>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>						
						<td><a href="#">Edit <a></td>					
						<td><a href="#">Delete <a></td>					
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td><a href="#">Edit <a></td>					
						<td><a href="#">Delete <a></td>	
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td><a href="#">Edit <a></td>					
						<td><a href="#">Delete <a></td>	
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td><a href="#">Edit <a></td>					
						<td><a href="#">Delete <a></td>	
					</tr>
				</tbody>
		 
			</table>
			</form>


		</div>
	</div>
</body>
</html>