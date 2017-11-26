
<?php 
	require_once("../../service/sales/show_Details_Service.php");
	require_once("../../service/user/service_view_counter.php");

	$chassis_no=$_REQUEST['chassis_no'];
	$row=show_Details_Service($chassis_no);
	$options_row=show_Details_Options_Secvice($chassis_no);
	$options_other_row=show_Details_Other_Options_Secvice($chassis_no);

    if(!isset($_SESSION))
    {
        session_start();
    }

    if($_SESSION['user']==null)
    {
        $result = increase_counter($chassis_no);

        if(!$result)
        {
            add_new_model($chassis_no);
        }
    }

    
 ?>

<!DOCTYPE html>
<html>
    <head>
        <title>Car Details</title>
        <link rel="stylesheet" href="../css/style.css">
</head>
<body class="no_bg show_details">
	<fieldset>
				<legend align="center">Car Details</legend>
				<table border="1" class="form_add_car">
					<tr>
						<td><label>Maker</label></td>
						<td><?=$row['maker']?></td>

						<td><label>Model</label></td>
						<td><?=$row['model']?></td>

						<td><label>Grade</label></td>
						<td><?=$row['grade']?></td>

						<td><label>Manufacturing Year</label></td>
						<td><?=$row['man_year']?></td>
					</tr>
					<tr>
						<td><label>Color</label></td>
						<td><?=$row['color']?></td>

						<td><label>Chassis No.</label></td>
						<td><?=$row['chassis_no']?></td>

						<td><label>Engine No.</label></td>
						<td><?=$row['engine_no']?></td>

						<td><label>Displacement (CC)</label></td>
						<td><?=$row['cc']?></td>
					</tr>
				</table>
				<hr/>
			<table>
				<tr>
					<td>
					<table border="1" class="other-options">
						<tr>

							<?php 
								if (!empty($options_row['shape'])) {
								echo "<td><label>Shape:</label></td>";
								echo "<td>$options_row[shape]</td>";
								}
								else
								{
									echo "<td><label>Shape:</label></td>";
									echo "<td>Not Inserted</td>";
								}
							 ?>

							<?php 
								if (!empty($options_row['seating_capacity'])) {
								echo "<td><label>Seating Capacity:</label></td>";
								echo "<td>$options_row[seating_capacity]</td>";
								}
								else
								{
									echo "<td><label>Seating Capacity:</label></td>";
									echo "<td>Not Inserted</td>";
								}
							 ?>

					
						</tr>
						<tr>
							<?php 
								if (!empty($options_row['mileage'])) {
								echo "<td><label>Mileage:</label></td>";
								echo "<td>$options_row[mileage]</td>";
								}
								else
								{
									echo "<td><label>Mileage:</label></td>";
									echo "<td>Not Inserted</td>";
								}
							 ?>

							<?php 
								if (!empty($options_row['body_kit'])) {
								echo "<td><label>Body Kit:</label></td>";
								echo "<td>$options_row[body_kit]</td>";
								}
								else
								{
									echo "<td><label>Body Kit:</label></td>";
									echo "<td>Not Inserted</td>";
								}
							 ?>
						</tr>
						<tr>

							<?php 
								if (!empty($options_row['meter'])) {
								echo "<td><label>Meter:</label></td>";
								echo "<td>$options_row[meter]</td>";
								}
								else
								{
									echo "<td><label>Meter:</label></td>";
									echo "<td>Not Inserted</td>";
								}
							 ?>

							<?php 
								if (!empty($options_row['rim'])) {
								echo "<td><label>Rim:</label></td>";
								echo "<td>$options_row[rim]</td>";
								}
								else
								{
									echo "<td><label>Rim:</label></td>";
									echo "<td>Not Inserted</td>";
								}
							 ?>

						</tr>
						<tr>

							<?php 
								if (!empty($options_row['start'])) {
								echo "<td><label>Start:</label></td>";
								echo "<td>$options_row[start]</td>";
								}
								else
								{
									echo "<td><label>Start:</label></td>";
									echo "<td>Not Inserted</td>";
								}
							 ?>

							<?php 
								if (!empty($options_row['wheel_option'])) {
								echo "<td><label>Wheel Options:</label></td>";
								echo "<td>$options_row[wheel_option]</td>";
								}
								else
								{
									echo "<td><label>Wheel Options:</label></td>";
									echo "<td>Not Inserted</td>";
								}
							 ?>
						</tr>
						<tr>

							<?php 
								if (!empty($options_row['seat'])) {
								echo "<td><label>Seat:</label></td>";
								echo "<td>$options_row[seat]</td>";
								}
								else
								{
									echo "<td><label>Seat:</label></td>";
									echo "<td>Not Inserted</td>";
								}
							 ?>
							 
							<?php 
								if (!empty($options_row['head_light'])) {
								echo "<td><label>Head Light:</label></td>";
								echo "<td>$options_row[head_light]</td>";
								}
								else
								{
									echo "<td><label>Head Light:</label></td>";
									echo "<td>Not Inserted</td>";
								}
							 ?>
						</tr>
						<tr>

							<?php 
								if (!empty($options_row['fuel'])) {
								echo "<td><label>Fuel:</label></td>";
								echo "<td>$options_row[fuel]</td>";
								}
								else
								{
									echo "<td><label>Fuel:</label></td>";
									echo "<td>Not Inserted</td>";
								}
							 ?>
							 

							<?php 
								if (!empty($options_row['transmission'])) {
								echo "<td><label>Transmission:</label></td>";
								echo "<td>$options_row[transmission]</td>";
								}
								else
								{
									echo "<td><label>Transmission:</label></td>";
									echo "<td>Not Inserted</td>";
								}
							 ?>
						</tr>
						<tr>
							<td><label>Date:</label></td>
							<td>Not Inserted</td>
						</tr>
					</table>
					</td>
					<td>
					<fieldset>
						<legend align="center">Options</legend>
						<table class="checkbox-options">
							<?php 
								echo "<tr>";
									if($options_other_row['air_bag'])
									{
										echo "<td>";
											echo "$options_other_row[air_bag]";
										echo "</td>";
									}
								echo "</tr>";

								echo "<tr>";
									if($options_other_row['cruise_control'])
									{
										echo "<td>";
											echo "$options_other_row[cruise_control]";
										echo "</td>";
									}
								echo "</tr>";

								echo "<tr>";
									if($options_other_row['roof_rail'])
									{
										echo "<td>";
											echo "$options_other_row[roof_rail]";
										echo "</td>";
									}
								echo "</tr>";

								echo "<tr>";
									if($options_other_row['rain_shed'])
									{
										echo "<td>";
											echo "$options_other_row[rain_shed]";
										echo "</td>";
									}
								echo "</tr>";

								echo "<tr>";
									if($options_other_row['dvd_player'])
									{
										echo "<td>";
											echo "$options_other_row[dvd_player]";
										echo "</td>";
									}
								echo "</tr>";

								echo "<tr>";
									if($options_other_row['back_camera'])
									{
										echo "<td>";
											echo "$options_other_row[back_camera]";
										echo "</td>";
									}
								echo "</tr>";

								echo "<tr>";
									if($options_other_row['four_cameras'])
									{
										echo "<td>";
											echo "$options_other_row[four_cameras]";
										echo "</td>";
									}
								echo "</tr>";

								echo "<tr>";
									if($options_other_row['sunroof'])
									{
										echo "<td>";
											echo "$options_other_row[sunroof]";
										echo "</td>";
									}
								echo "</tr>";

								echo "<tr>";
									if($options_other_row['winker_mirror'])
									{
										echo "<td>";
											echo "$options_other_row[winker_mirror]";
										echo "</td>";
									}
								echo "</tr>";

								echo "<tr>";
									if($options_other_row['ac'])
									{
										echo "<td>";
											echo "$options_other_row[ac]";
										echo "</td>";
									}
								echo "</tr>";

								echo "<tr>";
									if($options_other_row['third_row_seats'])
									{
										echo "<td>";
											echo "$options_other_row[third_row_seats]";
										echo "</td>";
									}
								echo "</tr>";

								echo "<tr>";
									if($options_other_row['rear_ac'])
									{
										echo "<td>";
											echo "$options_other_row[rear_ac]";
										echo "</td>";
									}
								echo "</tr>";

								echo "<tr>";
									if($options_other_row['high_roof'])
									{
										echo "<td>";
											echo "$options_other_row[high_roof]";
										echo "</td>";
									}
								echo "</tr>";

								echo "<tr>";
									if($options_other_row['low_roof'])
									{
										echo "<td>";
											echo "$options_other_row[low_roof]";
										echo "</td>";
									}
								echo "</tr>";

								echo "<tr>";
									if($options_other_row['wooden_panel'])
									{
										echo "<td>";
											echo "$options_other_row[wooden_panel]";
										echo "</td>";
									}
								echo "</tr>";


								echo "<tr>";
									if($options_other_row['wooden_steering'])
									{
										echo "<td>";
											echo "$options_other_row[wooden_steering]";
										echo "</td>";
									}
								echo "</tr>";

								echo "<tr>";
									if($options_other_row['low_floor'])
									{
										echo "<td>";
											echo "$options_other_row[low_floor]";
										echo "</td>";
									}
								echo "</tr>";

								echo "<tr>";
									if($options_other_row['high_floor'])
									{
										echo "<td>";
											echo "$options_other_row[high_floor]";
										echo "</td>";
									}
								echo "</tr>";
							 ?>
						</table>
					</td>
				</tr>
			</table>
			
			<div align="right" class="submit">
					<?= "<a href='document_quotation.php?chassis_no=$row[chassis_no]'><button>To Print</button></a>";?>
					
                    <?php
                
                        if(isset($_SESSION) && $_SESSION['user']=="Sales")
                        {
                            echo "<a  href='inventory.php'><button>OK</button></a>";   
                        }
                
                        else
                        {
                            echo "<a  href='../../index.php'><button>OK</button></a>";
                        }
                
                    ?>
                    
			</div>
		</fieldset>
	</form>
	</fieldset>
</body>
</html>
