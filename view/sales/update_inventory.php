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
	require("../../service/sales/update_inventory_Service.php");
	$chassis_no=$_REQUEST['chassis_no'];
	$row=update_Inverntory($chassis_no);
	$options_row=update_Inverntory_Options($chassis_no);
	$options_other_row=update_Inverntory_Options_Other($chassis_no);
	// if($db)
	// {
	// 	$query="select * from vehicle_inventory where chassis_no like '$chassis_no'";
	// 	$result=mysqli_query($db,$query) or die("Query Error");
	// 	$row=mysqli_fetch_assoc($result);

	// 	$options_query="select * from vehicle_options where chassis_no like '$chassis_no'";
	// 	$options_result=mysqli_query($db,$options_query);
	// 	$options_row=mysqli_fetch_assoc($options_result);

	// 	$option_other_query="select * from vehicle_other_options where chassis_no like '$chassis_no'";
	// 	$options_other_result=mysqli_query($db,$option_other_query);
	// 	$options_other_row=mysqli_fetch_assoc($options_other_result);
	// }
	if($_SERVER['REQUEST_METHOD']=="POST")
	{
		header("location: inventory.php");
	}
 ?>
 <script type="text/javascript" src="../js/jquery-3.2.1.min.js"></script>
 <!-- <script type="text/javascript">
 	$(document).ready(function()
 	{
 		$('#insert').click(function(){
 			$.ajax({
 				url: "../../service/sales/update_inventory_Service.php",
 				method: "post",
 				data: $('form').serialize(),
 				datatype: "text",
 				success: function(Result)
 				{
 					window.alert("Successfully Updated")
 					// $('#Message').text(Result)
 				}
 			})	
 		})
 	})
 </script> -->

 <script type="text/javascript">
 	function validateForm()
 	{
 		var maker=document.getElementById("maker").value;
 		var model=document.getElementById("model").value;
	    var grade = document.getElementById("grade").value;
	    var man_year = document.getElementById("man_year").value;
	    var color = document.getElementById("color").value;
	    var engine_no= document.getElementById("engine_no").value;
	    var cc = document.getElementById("cc").value;
	    var seating_capacity = document.getElementById("seating_capacity").value;
	    var status=true;

	    if (maker=="") {
	    	document.getElementById("maker").style.borderColor="#f00";
	    	status=false;
	    }
	    if (model=="") {
	    	document.getElementById("model").style.borderColor="#f00";
	    	status=false;
	    }
	    if (grade=="") {
	    	document.getElementById("grade").style.borderColor="#f00";
	    	status=false;
	    }
	    if (man_year=="") {
	    	document.getElementById("man_year").style.borderColor="#f00";
	    	status=false;
	    }
	    if (color=="") {
	    	document.getElementById("color").style.borderColor="#f00";
	    	status=false;
	    }
	    if (engine_no=="") {
	    	document.getElementById("engine_no").style.borderColor="#f00";
	    	status=false;
	    }
	    if (cc=="") {
	    	document.getElementById("cc").style.borderColor="#f00";
	    	status=false;
	    }
	    if (seating_capacity=="") {
	    	document.getElementById("seating_capacity").style.borderColor="#f00";
	    	status=false;
	    }

	    if (status) {
	    	 	$.ajax({
 				url: "../../service/sales/update_inventory_Service.php",
 				method: "post",
 				data: $('form').serialize(),
 				datatype: "text",
 				success: function(Result)
 				{
 					// console.log(Result);
 					window.alert("Successfully Updated")
		    		window.location.href = "inventory.php";
 					// $('#Message').text(Result)
 				}
 			})	
	    }

 	}
 </script>


<!DOCTYPE html>
<html>
<head>
	<title>Update Car</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body class="no_bg">
	<form method="post" class="update_Inventory">
		<fieldset>
			<legend align="center">Update Car</legend>
			<table border="1" class="form_add_car">
				<tr>

					<td><label>Chassis No:</td></label>
					<td><input type="hidden" placeholder="Chassis No." id="chassis_no" name="chassis_no" value="<?=$row['chassis_no']?>" ><?=$row['chassis_no']?></td>


					<td><label>Maker</label></td>
					<td><input type="text" placeholder="Maker Name" id="maker" name="maker" value="<?=$row['maker']?>"></td>

					<td><label>Model</label></td>
					<td><input type="text" placeholder="Model" id="model" name="model" value="<?=$row['model']?>"></td>

					<td><label>Grade</label></td>
					<td><input type="text" placeholder="Grade" id="grade" name="grade" value="<?=$row['grade']?>"></td>
				</tr>
				<tr>
					<td><label>Manufacturing Year</label></td>
					<td><input type="text" placeholder="Manufacturing Year" id="man_year" name="man_year" value="<?=$row['man_year']?>"></td>

					<td><label>Color</label></td>
					<td><input type="text" placeholder="Car Color" id="color" name="color" value="<?=$row['color']?>"></td>

					<td><label>Engine No.</label></td>
					<td><input type="text" placeholder="Engine No." id="engine_no" name="engine_no" value="<?=$row['engine_no']?>"></td>

					<td><label>Displacement (CC)</label></td>
					<td><input type="text" placeholder="Displacement (CC)" id="cc" name="cc" value="<?=$row['cc']?>"></td>
				</tr>
			</table>

			<table>
				<tr>
					<td>
						<table border="1" class="other-options">
							<tr>
								<td><label>Date:</label></td>
								<td><input type="date" name="date"></td>

								<td><label>Shape:</label></td>
								<?php 
									if($options_row['shape']=="Old")
									{
										echo "<td>";
										echo '<input type="radio" name="shape" value="Old" checked>Old <input type="radio" name="shape" value="New">New';
										echo "</td>";			
									}
									if($options_row['shape']=="New")
										{
											echo "<td>";
											echo '<input type="radio" name="shape" value="Old">Old <input type="radio" name="shape" value="New" checked>New';
											echo "</td>";			
										}
									if($options_row['shape']=="")
										{
											echo "<td>";
											echo '<input type="radio" name="shape" value="Old">Old <input type="radio" name="shape" value="New">New';
											echo "</td>";			
										}
								 ?>
						
							</tr>
							<tr>
								<td><label>Seating Capacity:</label></td>
								<td><input type="text" placeholder="Seating Capacity" id="seating_capacity" name="seating_capacity" value="<?=$options_row['seating_capacity']?>"></td>

								<td><label>Body Kit:</label></td>
								<td><input type="text" placeholder="Body Kit" name="body_kit" value="<?=$options_row['body_kit']?>"></td>
							</tr>
							<tr>
								<td><label>Mileage:</label></td>
								<td><input type="text" placeholder="Mileage" name="mileage" value="<?=$options_row['mileage']?>"></td>

								<td><label>Start:</label></td>
									<?php 
										if($options_row['start']=="Key Start")
										{
											echo "<td>";
											echo '<input type="radio" name="start" value="Key Start" checked>Key Start<input type="radio" name="start" value="Push Start">Push Start';
											echo "</td>";			
										}
										if($options_row['start']=="Push Start")
											{
												echo "<td>";
												echo '<input type="radio" name="start" value="Key Start">Key Start<input type="radio" name="start" value="Push Start" checked>Push Start';
												echo "</td>";			
											}
										if($options_row['start']=="")
											{
												echo "<td>";
												echo '<input type="radio" name="start" value="Key Start">Key Start<input type="radio" name="start" value="Push Start">Push Start';
												echo "</td>";			
											}
									 ?>
							</tr>
							<tr>
								<td><label>Rim:</label></td>
								<?php 
									if($options_row['rim']=="Alloy")
									{
										echo "<td>";
										echo '<input type="radio" name="rim" value="Alloy" checked>Alloy<input type="radio" name="rim" value="Cap">Cap';
										echo "</td>";			
									}
									if($options_row['rim']=="Cap")
										{
											echo "<td>";
											echo '<input type="radio" name="rim" value="Alloy">Alloy<input type="radio" name="rim" value="Cap" checked>Cap';
											echo "</td>";			
										}
									if($options_row['rim']=="")
										{
											echo "<td>";
											echo '<input type="radio" name="rim" value="Alloy">Alloy<input type="radio" name="rim" value="Cap">Cap';
											echo "</td>";			
										}
								 ?>

								<td><label>Wheel Options:</label></td>
									<?php 
										if($options_row['wheel_option']=="2WD")
										{
											echo "<td>";
											echo '<input type="radio" name="wheel_option" value="2WD" checked>2WD<input type="radio" name="wheel_option" value="4WD">4WD';
											echo "</td>";			
										}
										if($options_row['wheel_option']=="4WD")
											{
												echo "<td>";
												echo '<input type="radio" name="wheel_option" value="2WD">2WD<input type="radio" name="wheel_option" value="4WD" checked>4WD';
												echo "</td>";			
											}
										if($options_row['wheel_option']=="")
											{
												echo "<td>";
												echo '<input type="radio" name="wheel_option" value="2WD">2WD<input type="radio" name="wheel_option" value="4WD">4WD';
												echo "</td>";			
											}
									 ?>
							</tr>
							<tr>

								<td><label>Meter:</label></td>
									<?php 
										if($options_row['meter']=="Normal")
											{
												echo "<td>";
												echo '<input type="radio" name="meter" value="Normal" checked>Normal<input type="radio" name="meter" value="Optic">Optic<input type="radio" name="meter" value="Digital">Digital';
												echo "</td>";			
											}
										if($options_row['meter']=="Optic") 
											{
												echo "<td>";
												echo '<input type="radio" name="meter" value="Normal">Normal<input type="radio" name="meter" value="Optic" checked>Optic<input type="radio" name="meter" value="Digital">Digital';
												echo "</td>";			
											}										
										if($options_row['meter']=="Digital") 
											{
												echo "<td>";
												echo '<input type="radio" name="meter" value="Normal">Normal<input type="radio" name="meter" value="Optic">Optic<input type="radio" name="meter" value="Digital" checked>Digital';
												echo "</td>";			
											}
										if($options_row['meter']=="")
											{
												echo "<td>";
												echo '<input type="radio" name="meter" value="Normal">Normal<input type="radio" name="meter" value="Optic">Optic<input type="radio" name="meter" value="Digital">Digital';
												echo "</td>";			
											}
									 ?>
								<td><label>Transmission</label></td>
								<?php 
									if($options_row['transmission']=="Automatic")
										{
											echo "<td>";
											echo '<input type="radio" name="transmission" value="Automatic" checked>Automatic<input type="radio" name="transmission" value="Manual">Manual';
											echo "</td>";			
										}									
									if($options_row['transmission']=="Manual")
										{
											echo "<td>";
											echo '<input type="radio" name="transmission" value="Automatic">Automatic<input type="radio" name="transmission" value="Manual" checked>Manual';
											echo "</td>";			
										}
									if($options_row['transmission']=="")
										{
											echo "<td>";
											echo '<input type="radio" name="transmission" value="Automatic">Automatic<input type="radio" name="transmission" value="Manual">Manual';
											echo "</td>";			
										}
								 ?>
							</tr>


							<tr>

								<td><label>Fuel:</label></td>
									<?php 
										if($options_row['fuel']=="Octen/Petrol")
											{
												echo "<td>";
												echo '<input type="radio" name="fuel" value="Octen/Petrol" checked>Octen/Petrol<input type="radio" name="fuel" value="CNG">CNG';
												echo "</td>";			
											}										
										if($options_row['fuel']=="CNG")
											{
												echo "<td>";
												echo '<input type="radio" name="fuel" value="Octen/Petrol" >Octen/Petrol<input type="radio" name="fuel" value="CNG" checked>CNG';
												echo "</td>";			
											}
										if($options_row['fuel']=="")
											{
												echo "<td>";
												echo '<input type="radio" name="fuel" value="Octen/Petrol" >Octen/Petrol<input type="radio" name="fuel" value="CNG">CNG';
												echo "</td>";			
											}
									 ?>
							</tr>


								<!-- <td><label>Transmission</label></td>
								<td></td>
							</tr>
							<tr>
								<td><label>Fuel:</label></td>
								<td><input type="radio" name="fuel" value="Octen/Petrol">Octen/Petrol<input type="radio" name="fuel" value="CNG">CNG</td>

							</tr> -->
							<tr>
								<td><label>Head Light:</label></td>
									<?php 
										if($options_row['head_light']=="Normal")
											{
												echo "<td colspan='2'>";
												echo '<input type="radio" name="head_light" value="Normal" checked>Normal<input type="radio" name="head_light" value="HID">HID<input type="radio" name="head_light" value="Projection HID">Projection HID';
												echo "</td>";			
											}
										if($options_row['head_light']=="HID") 
											{
												echo "<td colspan='2'>";
												echo '<input type="radio" name="head_light" value="Normal">Normal<input type="radio" name="head_light" value="HID" checked>HID<input type="radio" name="head_light" value="Projection HID">Projection HID';
												echo "</td>";			
											}										
										if($options_row['head_light']=="Projection HID") 
											{
												echo "<td colspan='2'>";
												echo '<input type="radio" name="head_light" value="Normal">Normal<input type="radio" name="head_light" value="HID">HID<input type="radio" name="head_light" value="Projection HID" checked>Projection HID';
												echo "</td>";			
											}										
										if($options_row['head_light']=="") 
											{
												echo "<td colspan='2'>";
												echo '<input type="radio" name="head_light" value="Normal">Normal<input type="radio" name="head_light" value="HID">HID<input type="radio" name="head_light" value="Projection HID">Projection HID';
												echo "</td>";			
											}
									 ?>
							</tr>
							<tr>
								<td><label>Seat:</label></td>
									<?php 
										if($options_row['seat']=="Fabric")
											{
												echo "<td colspan='2'>";
												echo '<input type="radio" name="seat" value="Fabric" checked>Fabric<input type="radio" name="seat" value="Half Leather">Half Leather<input type="radio" name="seat" value="Leather">Leather';
												echo "</td>";			
											}
										if($options_row['seat']=="Half Leather") 
											{
												echo "<td colspan='2'>";
												echo '<input type="radio" name="seat" value="Fabric">Fabric<input type="radio" name="seat" value="Half Leather" checked>Half Leather<input type="radio" name="seat" value="Leather">Leather';
												echo "</td>";			
											}										
										if($options_row['seat']=="Leather") 
											{
												echo "<td colspan='2'>";
												echo '<input type="radio" name="seat" value="Fabric">Fabric<input type="radio" name="seat" value="Half Leather">Half Leather<input type="radio" name="seat" value="Leather" checked>Leather';
												echo "</td>";			
											}										
										if($options_row['seat']=="") 
											{
												echo "<td colspan='2'>";
												echo '<input type="radio" name="seat" value="Fabric">Fabric<input type="radio" name="seat" value="Half Leather">Half Leather<input type="radio" name="seat" value="Leather">Leather';
												echo "</td>";			
											}
									 ?>
							</tr>
						</table>
					</td>
					<td>
					<fieldset>
						<legend align="center">Options</legend>
						<table class="checkbox-options">
							<tr>	
									<td>
										<?php 
											if($options_other_row['roof_rail']=="Roof Rail")
											{
												echo '<input type="checkbox" name="roof_rail" value="Roof Rail" checked>Roof Rail';
											}
											else
											{
												echo '<input type="checkbox" name="roof_rail" value="Roof Rail">Roof Rail';
											}
											?>
									 </td>
									<td>
										<?php 
											if($options_other_row['air_bag']=="Air Bag")
											{
												echo '<input type="checkbox" name="air_bag" value="Air Bag" checked>Air Bag';
											}
											else
											{
												echo '<input type="checkbox" name="air_bag" value="Air Bag">Air Bag';
											}
											?>
									 </td>
									<td>
										<?php 
											if($options_other_row['cruise_control']=="Cruise Control")
											{
												echo '<input type="checkbox" name="cruise_control" value="Cruise Control" checked>Cruise Control';
											}
											else
											{
												echo '<input type="checkbox" name="cruise_control" value="Cruise Control">Cruise Control';
											}
										 ?>
									 	</td>			
							</tr>
							<tr>
										<td>
											<?php 
												if($options_other_row['rain_shed']=="Rain Shed")
												{
													echo '<input type="checkbox" name="rain_shed" value="Rain Shed" checked>Rain Shed';
												}
												else
												{
													echo '<input type="checkbox" name="rain_shed" value="Rain Shed">Rain Shed';
												}
											 ?>
									 	</td>	
										<td>
											<?php 
												if($options_other_row['dvd_player']=="DVD Player")
												{
													echo '<input type="checkbox" name="dvd_player" value="DVD Player" checked>DVD Player';
												}
												else
												{
													echo '<input type="checkbox" name="dvd_player" value="DVD Player">DVD Player';
												}
											 ?>
									 	</td>	
										<td>
											<?php 
												if($options_other_row['back_camera']=="Back Camera")
												{
													echo '<input type="checkbox" name="back_camera" value="Back Camera" checked>Back Camera';
												}
												else
												{
													echo '<input type="checkbox" name="back_camera" value="Back Camera">Back Camera';
												}
											 ?>
									 	</td>
							</tr>
							<tr>	
										<td>
											<?php 
												if($options_other_row['four_cameras']=="4 Camera")
												{
													echo '<input type="checkbox" name="four_cameras" value="4 Camera" checked>4 Camera';
												}
												else
												{
													echo '<input type="checkbox" name="four_cameras" value="4 Camera">4 Camera';
												}
											 ?>
									 	</td>	
										<td>
											<?php 
												if($options_other_row['sunroof']=="Sunroof")
												{
													echo '<input type="checkbox" name="sunroof" value="Sunroof" checked>Sunroof';
												}
												else
												{
													echo '<input type="checkbox" name="sunroof" value="Sunroof">Sunroof';
												}
											 ?>
									 	</td>
										<td>
											<?php 
												if($options_other_row['winker_mirror']=="Winker Mirror")
												{
													echo '<input type="checkbox" name="winker_mirror" value="Winker Mirror" checked>Winker Mirror';
												}
												else
												{
													echo '<input type="checkbox" name="winker_mirror" value="Winker Mirror">Winker Mirror';
												}
											 ?>
									 	</td>	
							</tr>
							<tr>
										<td>
											<?php 
												if($options_other_row['ac']=="Built In AC")
												{
													echo '<input type="checkbox" name="ac" value="Built In AC" checked>Built In AC';
												}
												else
												{
													echo '<input type="checkbox" name="ac" value="Built In AC">Built In AC';
												}
											 ?>
									 	</td>	
										<td>
											<?php 
												if($options_other_row['third_row_seats']=="3rd Row Seats")
												{
													echo '<input type="checkbox" name="third_row_seats" value="3rd Row Seats" checked>3rd Row Seats';
												}
												else
												{
													echo '<input type="checkbox" name="third_row_seats" value="3rd Row Seats">3rd Row Seats';
												}
											 ?>
									 	</td>	
										<td>
											<?php 
												if($options_other_row['rear_ac']=="Rear AC")
												{
													echo '<input type="checkbox" name="rear_ac" value="Rear AC" checked>Rear AC';
												}
												else
												{
													echo '<input type="checkbox" name="rear_ac" value="Rear AC">Rear AC';
												}
											 ?>
									 	</td>

								<td></td>
							</tr>
							<tr>
										<td>
											<?php 
												if($options_other_row['high_roof']=="High Roof")
												{
													echo '<input type="checkbox" name="high_roof" value="High Roof" checked>High Roof';
												}
												else
												{
													echo '<input type="checkbox" name="high_roof" value="High Roof">High Roof';
												}
											 ?>
									 	</td>
										<td>
											<?php 
												if($options_other_row['low_roof']=="Low Roof")
												{
													echo '<input type="checkbox" name="low_roof" value="Low Roof" checked>Low Roof';
												}
												else
												{
													echo '<input type="checkbox" name="low_roof" value="Low Roof">Low Roof';
												}
											 ?>
									 	</td>
										<td>
										<?php 
											if($options_other_row['wooden_panel']=="Wooden Panel")
											{
												echo '<input type="checkbox" name="wooden_panel" value="Wooden Panel" checked>Wooden Panel';
											}
											else
											{
												echo '<input type="checkbox" name="wooden_panel" value="Wooden Panel">Wooden Panel';
											}
										 ?>
									 	</td>
							</tr>
							<tr>
										<td>
											<?php 
												if($options_other_row['wooden_steering']=="Wooden Stearing")
												{
													echo '<input type="checkbox" name="wooden_steering" value="Wooden Stearing" checked>Wooden Stearing';
												}
												else
												{
													echo '<input type="checkbox" name="wooden_steering" value="Wooden Stearing">Wooden Stearing';
												}
											 ?>
									 	</td>
										<td>
											<?php 
												if($options_other_row['low_floor']=="Low Floor")
												{
													echo '<input type="checkbox" name="low_floor" value="Low Floor" checked>Low Floor';
												}
												else
												{
													echo '<input type="checkbox" name="low_floor" value="Low Floor">Low Floor';
												}
											 ?>
									 	</td>
										<td>
											<?php 
												if($options_other_row['high_floor']=="High Floor")
												{
													echo '<input type="checkbox" name="high_floor" value="High Floor" checked>High Floor';
												}
												else
												{
													echo '<input type="checkbox" name="high_floor" value="High Floor">High Floor';
												}
											 ?>
									 	</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
			

			<div align="right" class="submit">
				<input type="button" value="Update" align="right" id="insert"onclick="validateForm()"> <button type="button" class="btn" onclick="window.location.href='inventory.php'">Cancel</button>
			</div>
		</fieldset>
	</form>
</body>
</html>