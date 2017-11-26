<?php
	require_once("../../data/connection.php");
	function add_new_car($chassis_no,$maker,$model,$grade,$color,$man_year,$engine_no,$cc,$shape,$start,$mileage,$rim,$wheel_option,$meter,$head_light,$seat,$seating_capacity,$body_kit,$transmission,$fuel,$wooden_panel,$cruise_control,$high_floor,$rain_shed,$dvd_player,$back_camera,$four_cameras,$sunroof,$winker_mirror,$ac,$rear_ac,$third_row_seats,$air_bag,$high_roof,$low_roof,$wooden_steering,$low_floor,$roof_rail)
	{
		$query = "insert into vehicle_inventory (maker, model, grade, chassis_no, engine_no, man_year, color, cc) values ('$maker', '$model', '$grade', '$chassis_no', '$engine_no', '$man_year', '$color', '$cc')";

		$another_query = "insert into vehicle_options (chassis_no, engine_no, shape, start, mileage, rim, wheel_option, meter, head_light, seat, seating_capacity, body_kit, transmission, fuel) values ('$chassis_no', '$engine_no', '$shape', '$start', '$mileage', '$rim', '$wheel_option', '$meter', '$head_light','$seat', $seating_capacity,'$body_kit', '$transmission', '$fuel')";
		
		$other_options_query = "insert into vehicle_other_options (chassis_no, wooden_panel, cruise_control, high_floor, rain_shed, dvd_player, back_camera, four_cameras, sunroof, winker_mirror, ac, third_row_seats, rear_ac, air_bag, high_roof, low_roof, wooden_steering, low_floor, roof_rail) values ('$chassis_no', '$wooden_panel', '$cruise_control', '$high_floor', '$rain_shed', '$dvd_player', '$back_camera', '$four_cameras', '$sunroof', '$winker_mirror', '$ac', '$third_row_seats', '$rear_ac', '$air_bag', '$high_roof', '$low_roof', '$wooden_steering', '$low_floor', '$roof_rail')";


		global $db;
		$result = mysqli_query($db,$query) or die($query);

		if($result)
		{
		   $another_result = mysqli_query($db,$another_query) or die($another_query); 
		    
		    if($another_result)
		    {
		        $other_options_result = mysqli_query($db,$other_options_query) or die($other_options_query);
		        return true;
		    }
		}

		else
		{
		  echo "Could not Add Data"; 
		  return false;
		}

	}
 ?>