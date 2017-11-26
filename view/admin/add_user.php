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
	/*float: center;*/
}

 
input, select{
    padding: 10px;
    font-weight: bolder;
}
.row{
	width: 70%;
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
#msg0,#msg1,#msg2,#msg3,#msg4,#msg5{
	color: #f00;
}

</style>


<script type="text/javascript" src="../js/jquery-3.2.1.js"></script>
<script>

// $(document).ready(function(){

// 	$('#emp_department').change(function(){
// 		var dp = document.getElementById('emp_department').value;
// 		document.getElementById('auto_id').innerhtml = "<td> *Employee ID:</td><td><input type='text' name='emp_id' id='emp_id' value = 'acc'/></td><td><p id='msg0'></p></td>";
// 	})

// })

function validate()
{
	var emp_id = document.getElementById('emp_id').value;
	var emp_name = document.getElementById('emp_name').value;
	var emp_depatment = document.getElementById('emp_department').value;
	var emp_designation = document.getElementById('emp_designation').value;
	var emp_phone = document.getElementById('emp_phone').value;
	var emp_email = document.getElementById('emp_email').value;

	var msg0 = document.getElementById('msg0');
	var msg1 = document.getElementById('msg1');
	var msg2 = document.getElementById('msg2');
	var msg3 = document.getElementById('msg3');
	var msg4 = document.getElementById('msg4');
	var msg5 = document.getElementById('msg5');

		var status = true;

		if(emp_name == "" || !emp_name.match(/^[a-zA-Z ]+$/))
		{	
			status = false;
			msg1.innerHTML= "Enter a valid Name";
			document.getElementById('emp_name').style.borderColor = "red"; 
		}
		// if(!emp_name.match(/^[a-zA-Z ]+$/))
		// {	
		// 	status = false;
		// 	msg.innerhtml= "Name only contain letter";
		// 	document.getElementById('emp_name').style.borderColor = "red"; 
		// }

		if(emp_depatment =="" || !emp_depatment.match(/^[a-zA-Z ]+$/))
		{
			status = false;
			msg2.innerHTML= "Select an option";
			document.getElementById('emp_department').style.borderColor = "red"; 
		}

		if(emp_designation == "" || !emp_designation.match(/^[a-zA-Z ]+$/))
		{
			status = false;
			msg3.innerHTML= "Enter a valid designation";
			document.getElementById('emp_designation').style.borderColor = "red"; 
		}

		if(emp_phone == "" || !emp_phone.match(/^[01]{2}[0-9]{9}/))
		{
			status = false;
			msg4.innerHTML= "Number starts with 01 and contains 11 digits";
			document.getElementById("emp_phone").style.borderColor = "red"; 
		}

		if(emp_email == "")
		{
			status = false;
			msg5.innerHTML= "Enter a valid e-mail";
			document.getElementById('emp_email').style.borderColor = "red";
		}
		if(emp_id == "")
		{
			status = false;
			msg0.innerHTML= "ID cannot be null";
			document.getElementById('emp_id').style.borderColor = "red";
		}


		if(status)
		{
			$(document).ready(function(){
			
				$.ajax({
				url: "../../service/admin/service_add_emp.php",
				method: "post",
				data: $('#add_user').serialize(),
				dataType: "text",
				success: function(Result){
					$('#notify').text(Result)
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
			<p id = "notify"></p>
			<form method="POST" id = "add_user">
			<table cellpadding="12">
			<tr>
				<tr>
					<td> *Employee ID:</td>
					<td><input type="text" name="emp_id" id="emp_id" /></td>
					<td><p id="msg0"></p></td> 
				</tr>
				<tr>
					<td> *Name:</td>
					<td><input type="text" name="emp_name" id="emp_name"/></td>
					<td><p id="msg1"></p></td>
					
				</tr>
				<tr>
					<td> *Department:</td>
					<td><!-- <input type="text" name="emp_department" id="emp_department"/> -->
						<select name="emp_department" id="emp_department">
						  <option value="">  Select a department  </option>
						  <option value="Sales">Sales</option>
						  <option value="Admin">Admin</option>
						  <option value="Account">Account</option>
						  <option value="Others">Others</option>
						</select>
					</td>
					<td><p id="msg2"></p></td>
					
				</tr>
				<tr>
					<td> *Designation:</td>
					<td><input type="text" name="emp_designation" id="emp_designation"/></td>
					<td><p id="msg3"></p></td> 
				</tr>
				<tr>
					<td> *Phone:</td>
					<td><input type="text" name="emp_phone" id="emp_phone"/></p></td> 
					<td><p id="msg4"></td>
				</tr>
				<tr>
					<td> Email:</td>
					<td><input type="email" name="emp_email" id="emp_email"/></td>
					<td><p id="msg5"></p></td> 
				</tr>
				<tr>
					<td> * marks are required fields</td>
				</tr>
				<tr>
					<td colspan="2" align="center"><input type="button" value="Add User" id = "button_add" onclick= "validate()"/></td>
				</tr>
			</tr>
			</table>
			</form>


		</div>
	</div>
</body>

 
</html>