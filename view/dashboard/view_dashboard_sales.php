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
body{
	box-sizing: border-box;
}
table {
    border-collapse: collapse;
}

table, td, th {
    border: 0px solid black;
    padding:6px;
}

td{
	padding: 10px;
	padding-top: 20px;
}
.btnsales{
	height: auto;
	width:13%;
}
.btnsales input{
	padding: 10px;
	width: 170px;
	font-weight: bolder;
}
</style>

<html>
	<head>
		<title>System Dashboard</title>
		<hr/>
		<h2 align = "center">Dashboard - Sales</h2>
		<hr/>
	</head>
	
	<body>

	<table>
		<tr>
			<!-- Inventory Button TD -->
			<td>
				<?php require_once("../sales/ext/ext_buttons.php") ?>
			</td>
			<td></td>
		</tr>
	</table>
	</body>

</html>
