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
		url: "../../service/admin/service_show_offer.php",
		dataType: "html",
		success: function(Result){
			$('#offer').html(Result)
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
			<table style="width:80%" border="4px" cellpadding="15">
				<thead>
				<tr>
					<th>Title</th>
					<th>Total Views</th>
					<th>Delete Offers</th>
				</tr>				
				</thead>
				<tbody id = "offer">
					
				</tbody>
		 
			</table>
			</form>


		</div>
	</div>
</body>
</html>