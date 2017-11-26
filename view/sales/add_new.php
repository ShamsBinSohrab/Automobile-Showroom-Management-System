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

<?php 
	if($_SERVER['REQUEST_METHOD']=="POST")
	{
		header("location: inventory.php");
	}
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Add New Car</title>
    <link rel="stylesheet" href="../css/style.css">

	<script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function()
		{
			
			if (!status) {}
			{
				document.getElementById("message").innerHTML = "* marked field must filled out";
				document.getElementById("message").style.color="black";	
			}
			// $('#insert').click(function(event){
			// 	// event.preventDefault();
			// 	$.ajax({
			// 		url: "../../service/sales/add_new_Service.php",
			// 		method: "post",
			// 		data: $('form').serialize(),
			// 		datatype: "text",
			// 		success: function(Result)
			// 		{
			// 			$('#Message').text(Result)
			// 		}
			// 	})	
			// })
		})
        
        function uploadPhoto(){
        
        var fileObj = document.getElementsByName("img")[0];
        var file = fileObj.files[0];
        var formdata = new FormData();
        formdata.append("img", file);
        var ch = document.getElementById('chassis_no').value;
        var br = document.getElementById('maker').value;
        var mo = document.getElementById('model').value;
        xhr = new XMLHttpRequest();
        
        var path = "../../service/sales/service_upload.php?ch="+ch;
        xhr.open("POST", path, true);

        xhr.onreadystatechange = function(){
            if(xhr.readyState==4){
                document.getElementById("notification").innerHTML = xhr.responseText;  
            }
        };
        xhr.send(formdata);
    }
        
	</script>

	<!-- Validation -->

	<script type="text/javascript">
		function validateForm() {
		    var maker = document.getElementById("maker").value;
		    var model = document.getElementById("model").value;
		    var grade = document.getElementById("grade").value;
		    var man_year = document.getElementById("man_year").value;
		    var color = document.getElementById("color").value;
		    var chassis_no = document.getElementById("chassis_no").value;
		    var engine_no = document.getElementById("engine_no").value;
		    var cc = document.getElementById("cc").value;
		    var seating_capacity=document.getElementById("seating_capacity").value;
		    var status=true;
		    
		    if (maker == "") {
		        // alert("All Field must be filled out");
		        document.getElementById("maker").style.borderColor="red";
		        document.getElementById("message").style.color="red";
		        status= false;
		    }
		    if (model == "") {
		        // alert("All Field must be filled out");
		        document.getElementById("model").style.borderColor="red";
		        document.getElementById("message").style.color="red";
		        status= false;
		         }
		    if (grade == "") {
		        // alert("All Field must be filled out");
		        document.getElementById("grade").style.borderColor="red";
		        document.getElementById("message").style.color="red";
		        status= false;
		         }
		    if (man_year == "" || isNaN(man_year) || !man_year.match(/^[2]{1}[0-9]{3}/)) {
		        // alert("All Field must be filled out");
		        document.getElementById("man_year").style.borderColor="red";
		        document.getElementById("message").style.color="red";
		        status= false;
		    }
		    if (color == "") {
		        // alert("All Field must be filled out");
		        document.getElementById("color").style.borderColor="red";
		        document.getElementById("message").style.color="red";
		        status= false;
		    }
		    if (chassis_no == "") {
		        // alert("All Field must be filled out");
		        document.getElementById("chassis_no").style.borderColor="red";
		        document.getElementById("message").style.color="red";
		        status= false;
		    }
		    if (engine_no == "") {
		        // alert("All Field must be filled out");
		        document.getElementById("engine_no").style.borderColor="red";
		        document.getElementById("message").style.color="red";
		        status= false;
		    }
		    if (cc == "" || isNaN(cc)) {
		        // alert("All Field must be filled out");
		        document.getElementById("cc").style.borderColor="red";
		        document.getElementById("message").style.color="red";
		        status= false;
		    }
		    if (seating_capacity == "" || isNaN(seating_capacity)) {
		        // alert("All Field must be filled out");
		        document.getElementById("seating_capacity").style.borderColor="red";
		        document.getElementById("message").style.color="red";
		        status= false;
		    }


		    if (!status) {
		    	window.alert("Please Fix the Error")
		    }

		    if(status)
		    {
		    	$.ajax({
		    		url: "../../service/sales/add_new_Service.php",
		    		method: "post",
		    		data: $('form').serialize(),
		    		datatype: "text",
		    		success: function(Result)
		    		{
		    			//$('#message').text(Result)
		    			window.alert("Successfully Added");
		    			window.location.href = "inventory.php";
		    		}
		    	})
		    }
		}
	</script>
</head>
<body class=" no_bg">
    <?php require_once("../sales/ext/ext_buttons.php") ?>
	<form method="post" onsubmit = "validateForm()" name="add_new_car" class="add_new_car">
		<fieldset>
			<legend align="center">Add New Car</legend>
			<p id="message"></p>
			<table border="1" class="form_add_car">
				<tr id="message"></tr>
				<tr>
					<td><sup>*</sup><label>Maker</label></td>
					<td><input type="text" placeholder="Maker Name" name="maker" id="maker"></td>

					<td><sup>*</sup><label>Model</label></td>
					<td><input type="text" placeholder="Model" name="model" id="model"></td>

					<td><sup>*</sup><label>Grade</label></td>
					<td><input type="text" placeholder="Grade" name="grade" id="grade"></td>

					<td><sup>*</sup><label>Manufacturing Year</label></td>
					<td><input type="text" placeholder="Manufacturing Year" name="man_year" id="man_year"></td>
				</tr>
				<tr>
					<td><sup>*</sup><label>Color</label></td>
					<td><input type="text" placeholder="Car Color" name="color" id="color"></td>

					<td><sup>*</sup><label>Chassis No.</label></td>
					<td><input type="text" placeholder="Chassis No." name="chassis_no" id="chassis_no"></td>

					<td><sup>*</sup><label>Engine No.</label></td>
					<td><input type="text" placeholder="Engine No." name="engine_no" id="engine_no"></td>

					<td><sup>*</sup><label>DISPLACEMENT(CC)</label></td>
					<td><input type="text" placeholder="DISPLACEMENT (CC)" name="cc" id="cc"></td>
				</tr>
			</table>
			<hr>

			<table>
				<tr>
					<td>
						<table border="1" class="other-options">
							<tr>
								<td><label>Date:</label></td>
								<td><?=date("d-M-y")?></td>

								<td><label>Shape:</label></td>
								<td><input type="radio" name="shape" value="Old">Old <input type="radio" name="shape" value="New">New</td>
						
							</tr>
							<tr>
								<td><label>Seating Capacity:</label></td>
								<td><input type="text" placeholder="Seating Capacity" name="seating_capacity" id="seating_capacity"></td>

								<td><label>Body Kit:</label></td>
								<td><input type="text" placeholder="Body Kit" name="body_kit"></td>
							</tr>
							<tr>
								<td><label>Mileage:</label></td>
								<td><input type="text" placeholder="Mileage" name="mileage"></td>

								<td><label>Start:</label></td>
								<td><input type="radio" name="start" value="Key Start">Key Start<input type="radio" name="start" value="Push Start">Push Start</td>
							</tr>
							<tr>
								<td><label>Rim:</label></td>
								<td><input type="radio" name="rim" value="Alloy">Alloy<input type="radio" name="rim" value="Cap">Cap</td>

								<td><label>Wheel Options:</label></td>
								<td><input type="radio" name="wheel_option" value="2WD">2WD<input type="radio" name="wheel_option" value="4WD">4WD</td>

							</tr>
							<tr>

								<td><label>Meter:</label></td>
								<td><input type="radio" name="meter" value="Normal">Normal<input type="radio" name="meter" value="Optic">Optic<input type="radio" name="meter" value="Digital">Digital</td>
								
								<td><label>Transmission</label></td>
								<td><input type="radio" name="transmission" value="Automatic" >Automatic<input type="radio" name="transmission" value="Manual">Manual</td>
							</tr>
							<tr>
								<td><label>Fuel:</label></td>
								<td><input type="radio" name="fuel" value="Octen/Petrol">Octen/Petrol<input type="radio" name="fuel" value="CNG">CNG</td>

							</tr>
							<tr>
								<td><label>Head Light:</label></td>
								<td colspan="2"><input type="radio" name="head_light" value="Normal">Normal<input type="radio" name="head_light" value="HID">HID<input type="radio" name="head_light" value="Projection HID">Projection HID</td>
							</tr>
							<tr>
								<td><label>Seat:</label></td>
								<td colspan="2"><input type="radio" name="seat" value="Fabric">Fabric<input type="radio" name="seat" value="Half Leather">Half Leather<input type="radio" name="seat" value="Leather">Leather</td>
							</tr>
							<tr>
							</tr>
						</table>
					</td>
					<td>
					<fieldset>
						<legend align="center">Options</legend>
						<table class="checkbox-options">
							<tr>
								<td><input type="checkbox" name="roof_rail" value="Roof Rail">Roof Rail</td>

								<td><input type="checkbox" name="air_bag" value="Air Bag">Air Bag</td>

								<td><input type="checkbox" name="cruise_control" value="Cruise Control">Cruise Control</td>						</tr>
							<tr>
								<td><input type="checkbox" name="rain_shed" value="Rain Shed">Rain Shed</td>

								<td><input type="checkbox" name="dvd_player" value="DVD Player">DVD Player</td>

								<td><input type="checkbox" name="back_camera" value="Back Camera">Back Camera</td>
							</tr>
							<tr>
								<td><input type="checkbox" name="four_cameras" value="4 Camera">4 Camera</td>

								<td><input type="checkbox" name="sunroof" value="Sunroof">Sunroof</td>

								<td><input type="checkbox" name="winker_mirror" value="Winker Mirror">Winker Mirror</td>
							</tr>
							<tr>
								<td><input type="checkbox" name="ac" value="Built In AC">Built In AC</td>

								<td><input type="checkbox" name="third_row_seats" value="3rd Row Seats">3rd Row Seats</td>

								<td><input type="checkbox" name="rear_ac" value="Rear AC">Rear AC</td>
							</tr>
							<tr>

								<td><input type="checkbox" name="high_roof" value="High Roof">High Roof</td>

								<td><input type="checkbox" name="low_roof" value="Low Roof">Low Roof</td>

								<td><input type="checkbox" name="wooden_panel" value="Wooden Panel">Wooden Panel</td>
							</tr>
							<tr>

								<td><input type="checkbox" name="wooden_steering" value="Wooden Stearing">Wooden Stearing</td>

								<td><input type="checkbox" name="low_floor" value="Low Floor">Low Floor</td>

								<td><input type="checkbox" name="high_floor" value="High Floor">High Floor</td>	
							</tr>
						</table>
					</td>
				</tr>
			</table>
			
            <div align = "left" class="img_upload">
                <fieldset>
                    <legend>Upload Image</legend>
                        <input name="img" id = "img" type="file"/>
                        <input type="button" onclick = "uploadPhoto()" value="Upload"/>
                        <img src="" class="car_photo">
                        <img src="" class="car_photo">
                        <img src="" class="car_photo">
                        <img src="" class="car_photo">
                        <img src="" class="car_photo">
                </fieldset>
            </div>
			
			<div align="right" class="submit">
				<input type="button" value="Add" align="right" id="insert" onclick="validateForm()"> <input type="reset" value="Clear">
			</div>
		</fieldset>
	</form>
	</fieldset>
</body>
</html>
