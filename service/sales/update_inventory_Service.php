<?php
	require_once("../../data/sales/update_Inventory_Db.php");
	function update_Inverntory($chassis_no)
	{
		return update_Inverntory_Db($chassis_no);
	}
	function update_Inverntory_Options($chassis_no)
	{
		return update_Inverntory_Options_Db($chassis_no);
	}
	function update_Inverntory_Options_Other($chassis_no)
	{
		return update_Inverntory_Options_Other_Db($chassis_no);
	}




if($_SERVER['REQUEST_METHOD']=="POST")
{
	$maker=$_REQUEST['maker'];
	$model=$_REQUEST['model'];
	$grade=$_REQUEST['grade'];
	$color=$_REQUEST['color'];
	$man_year=$_REQUEST['man_year'];
	$chassis_no=$_REQUEST['chassis_no'];
	$engine_no=$_REQUEST['engine_no'];
	
	//optional inputs
    $shape = $_REQUEST['shape'];
    $start = $_REQUEST['start'];
    $mileage = $_REQUEST['mileage'];
    $rim = $_REQUEST['rim'];
    $wheel_option = $_REQUEST['wheel_option'];
    $meter = $_REQUEST['meter'];
    $head_light = $_REQUEST['head_light'];
    $seat = $_REQUEST['seat'];
    $seating_capacity = $_REQUEST['seating_capacity'];
    $body_kit = $_REQUEST['body_kit'];

	//select options
	if(isset($_REQUEST['wooden_panel']))
	{
		$wooden_panel = $_REQUEST['wooden_panel'];	
	}
	else
		$wooden_panel ="";		
	
	if(isset($_REQUEST['cruise_control']))
	{
		$cruise_control =$_REQUEST['cruise_control'];	
	}
	else
		$cruise_control ="";
	
	if(isset($_REQUEST['high_floor']))
	{
		$high_floor = $_REQUEST['high_floor'];
	}
	else
		$high_floor ="";

	if(isset($_REQUEST['rain_shed']))
	{
		$rain_shed = $_REQUEST['rain_shed'];
	}
	else
		$rain_shed ="";
	
	if(isset($_REQUEST['dvd_player']))
	{
	$dvd_player = $_REQUEST['dvd_player'];
	}
	else
		$dvd_player ="";
	
	if(isset($_REQUEST['back_camera']))
	{
	$back_camera = $_REQUEST['back_camera'];
	}
	else
		$back_camera ="";
	
	if(isset($_REQUEST['four_cameras']))
	{
	$four_cameras = $_REQUEST['four_cameras'];
	}
	else
		$four_cameras ="";
	
	if(isset($_REQUEST['sunroof']))
	{
	$sunroof = $_REQUEST['sunroof'];
	}
	else
		$sunroof ="";
	
	if(isset($_REQUEST['winker_mirror']))
	{
	$winker_mirror = $_REQUEST['winker_mirror'];
	}
	else
		$winker_mirror ="";
	
	if(isset($_REQUEST['ac']))
	{
	$ac =$_REQUEST['ac'] ;
	}
	else
		$ac ="";
	
	if(isset($_REQUEST['rear_ac']))
	{
	$rear_ac = $_REQUEST['rear_ac'];
	}
	else
		$rear_ac ="";
	
	if(isset($_REQUEST['third_row_seats']))
	{
	$third_row_seats =$_REQUEST['third_row_seats'];
	}
	else
		$third_row_seats ="";
	
	if(isset($_REQUEST['air_bag']))
	{
	$air_bag = $_REQUEST['air_bag'];
	}
	else
		$air_bag ="";
	
	if(isset($_REQUEST['high_roof']))
	{
	$high_roof = $_REQUEST['high_roof'];
	}
	else
		$high_roof ="";
	
	if(isset($_REQUEST['low_roof']))
	{
	$low_roof = $_REQUEST['low_roof'];
	}
	else
		$low_roof ="";
	
	if(isset($_REQUEST['wooden_steering']))
	{
	$wooden_steering = $_REQUEST['wooden_steering'];
	}
	else
		$wooden_steering ="";
	
	if(isset($_REQUEST['low_floor']))
	{
	$low_floor =$_REQUEST['low_floor'];
	}
	else
		$low_floor ="";
	
	if(isset($_REQUEST['roof_rail']))
	{
	$roof_rail = $_REQUEST['roof_rail'];
	}
	else
		$roof_rail ="";
	



   	update_Query_Db($chassis_no,$maker,$model,$grade,$color,$man_year,$engine_no);

   	update_Options_Query_Db($chassis_no,$engine_no,$shape,$start,$mileage,$rim,$wheel_option,$meter,$head_light,$seat,$seating_capacity,$body_kit);

   	update_Options_Other_Query_Db($chassis_no,$wooden_panel,$cruise_control,$high_floor,$rain_shed,$dvd_player,$back_camera,$four_cameras,$sunroof,$winker_mirror,$ac,$rear_ac,$third_row_seats,$air_bag,$high_roof,$low_roof,$wooden_steering,$low_floor,$roof_rail);
	
}


 ?>