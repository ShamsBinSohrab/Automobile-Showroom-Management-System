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


function validate()
{
	var emp_name = document.getElementById('emp_name').value;
	var emp_department = document.getElementById('emp_department').value;
	var emp_designation = document.getElementById('emp_designation').value;
	var emp_phone = document.getElementById('emp_phone').value;
	var emp_email = document.getElementById('emp_email').value;

		var status = true;

		if(emp_name == "" || !emp_name.match(/^[a-zA-Z ]+$/))
		{	
			status = false;
			document.getElementById('emp_name').style.borderColor = "red"; 
		}

		if(emp_department =="" || !emp_department.match(/^[a-zA-Z ]+$/))
		{
			status = false;
			document.getElementById('emp_department').style.borderColor = "red"; 
		}

		if(emp_designation == "" || !emp_designation.match(/^[a-zA-Z ]+$/))
		{
			status = false;
			document.getElementById('emp_designation').style.borderColor = "red"; 
		}

		if(emp_phone == "" || !emp_phone.match(/^[01]{2}[0-9]{9}/))
		{
			status = false;
			document.getElementById("emp_phone").style.borderColor = "red"; 
		}

		if(emp_email == "")
		{
			status = false;
			document.getElementById('emp_email').style.borderColor = "red";
		}


		if(status)
		{
			$(document).ready(function(){
			
				$.ajax({
				url: "../../service/admin/service_edit_emp.php",
				method: "post",
				data: $('#edit_user').serialize(),
				dataType: "html",
				success: function(Result){
					$('#notify').html(Result)
				}
			})
		})

			document.getElementById('emp_name').style.borderColor = "green"; 
			document.getElementById('emp_department').style.borderColor = "green"; 
			document.getElementById('emp_designation').style.borderColor = "green"; 
			document.getElementById("emp_phone").style.borderColor = "green"; 
			document.getElementById('emp_email').style.borderColor = "green";
		} 

}



// $.ajax({
// 				url: "../../../service/admin/service_edit_emp.php",
// 				method: "post",
// 				data: $('#edit_user').serialize(),
// 				dataType: "html",
// 				success: function(Result){
// 					$('#notify').html(Result)
// 				}
// 			})





// $(document).ready(function(){
// 	$("#button_edit").click(function(event){
// 		event.preventDefault();
// 		$.ajax({
// 		url: "../../../service/admin/service_edit_emp.php",
// 		method: "post",
// 		data: $('#edit_user').serialize(),
// 		dataType: "html",
// 		success: function(Result){
// 			$('#notify').html(Result)
// 		}
// 	})
// 	})
// })

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
			<form method="POST" id = "edit_user">
				
			<?php
	
				require_once("connection.php");
				$id = $_REQUEST['id'];

				$query = "select * from emp_list where emp_id like '$id'";

				$result = mysqli_query($db,$query) or die($query);

				while($row = mysqli_fetch_assoc($result))
				{
					echo "
					<html>
					<table cellpadding='12'>
						<tr>
							<tr>
								<td> Employee ID:</td>
								<td><input type='hidden' name='emp_id' value ='$row[emp_id]'/></td> 
							</tr>
							<tr>
								<td> Name:</td>
								<td><input type='text' name='emp_name' value ='$row[emp_name]' id='emp_name'/></td> 
							</tr>
							<tr>
								<td> *Department:</td>
								<td>
								<select name='emp_department' id='emp_department'>
								  <option value=''>  Select a department  </option>
								  <option value='Sales'>Sales</option>
								  <option value='Admin'>Admin</option>
								  <option value='Account'>Account</option>
								  <option value='Others'>Others</option>
								</select>
								</td>
								<td><p id='msg2'></p></td>
							</tr>
							<tr>
								<td> Designation:</td>
								<td><input type='text' name='emp_designation' value ='$row[emp_designation]'id='emp_designation'/></td> 
							</tr>
							<tr>
								<td> Phone:</td>
								<td><input type='text' name='emp_phone' value ='$row[emp_phone]' id='emp_phone'/></td> 
							</tr>
							<tr>
								<td> Email:</td>
								<td><input type='email' name='emp_email' value ='$row[emp_email]' id='emp_email'/></td> 
							</tr>
							<tr>
								<td colspan='2' align='center'><input type='button' value='Edit User' id ='button_edit' onclick='validate()'/></td>
							</tr>
						</tr>
						</table></html>";
				}
			?>
			<p id = 'notify'></p>
			</form>
			

		</div>
	</div>
</body>
</html>