<?php 
	require_once("../../data/connection.php");
 ?>
<?php
	function update_Inverntory_Db($chassis_no)
	{
		global $db;
		$query="select * from vehicle_inventory where chassis_no like '$chassis_no'";
		$result=mysqli_query($db,$query) or die("Query Error");
		$row=mysqli_fetch_assoc($result);
		return $row;
	}
	function update_Inverntory_Options_Db($chassis_no)
	{ 
		global $db;
		$options_query="select * from vehicle_options where chassis_no like '$chassis_no'";
		$options_result=mysqli_query($db,$options_query);
		$options_row=mysqli_fetch_assoc($options_result);
		return $options_row;

	}
	function update_Inverntory_Options_Other_Db($chassis_no)
	{
		global $db;
		$option_other_query="select * from vehicle_other_options where chassis_no like '$chassis_no'";
		$options_other_result=mysqli_query($db,$option_other_query);
		$options_other_row=mysqli_fetch_assoc($options_other_result);
		return $options_other_row;
	}

	function update_Query_Db($chassis_no,$maker,$model,$grade,$color,$man_year,$engine_no)
	{

		global $db;
       	$query="update vehicle_inventory set maker='$maker',model='$model',grade='$grade',color='$color',man_year='$man_year',engine_no='$engine_no'  where chassis_no like '$chassis_no'" ;
       	mysqli_query($db,$query);
	}

	function update_Options_Query_Db($chassis_no,$engine_no,$shape,$start,$mileage,$rim,$wheel_option,$meter,$head_light,$seat,$seating_capacity,$body_kit)
	{

		global $db;
		$options_query="update vehicle_options set engine_no='$engine_no',shape='$shape',start='$start',mileage='$mileage',rim='$rim',wheel_option='$wheel_option',meter='$meter',head_light='$head_light',seat='$seat',seating_capacity='$seating_capacity',body_kit='$body_kit' WHERE chassis_no like '$chassis_no'";
		mysqli_query($db,$options_query);
		
	}

	function update_Options_Other_Query_Db($chassis_no,$wooden_panel,$cruise_control,$high_floor,$rain_shed,$dvd_player,$back_camera,$four_cameras,$sunroof,$winker_mirror,$ac,$rear_ac,$third_row_seats,$air_bag,$high_roof,$low_roof,$wooden_steering,$low_floor,$roof_rail)
	{

		global $db;
		$option_other_query="update vehicle_other_options SET wooden_panel='$wooden_panel',cruise_control='$cruise_control',high_floor='$high_floor',rain_shed='$rain_shed',dvd_player='$dvd_player',back_camera='$back_camera',four_cameras='$four_cameras',sunroof='$sunroof',winker_mirror='$winker_mirror',ac='$ac',third_row_seats='$third_row_seats',rear_ac='$rear_ac',air_bag='$air_bag',high_roof='$high_roof',low_roof='$low_roof',wooden_steering='$wooden_steering',low_floor='$low_floor',roof_rail='$roof_rail' WHERE chassis_no like '$chassis_no'";
		mysqli_query($db,$option_other_query);
	}
 ?>